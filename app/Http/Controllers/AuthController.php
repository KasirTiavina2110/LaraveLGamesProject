<?php
namespace App\Http\Controllers;

use App\Http\Requests\UsagerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Usager;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(UsagerRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $usager = Usager::where('matricule', $validatedData['matricule'])->first();

            if ($usager && Hash::check($validatedData['mdp'], $usager->mdp)) {
                Auth::login($usager);
                $request->session()->regenerate();

                return redirect()->route('jeux.profiles')->with('success', 'Bienvenue ' . $usager->prenom . '!');
            }

            return redirect()->back()->withErrors(['matricule' => 'Les informations de connexion sont incorrectes.'])->withInput();
        } catch (\Exception $e) {
            Log::error('Erreur lors de la connexion : ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue.'])->withInput();
        }
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(UsagerRequest $request)
    {
        $validatedData = $request->validated();

        $usager = Usager::create([
            'matricule' => $validatedData['matricule'],
            'email' => $validatedData['email'],
            'mdp' => Hash::make($validatedData['mdp']),
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'type_usager' => $validatedData['type_usager'],
            'programme' => $validatedData['programme'] ?? null,
        ]);

        Auth::login($usager);

        return redirect()->route('jeux.profiles')->with('success', 'Inscription réussie.');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Vous vous êtes déconnecté.');
    }

    public function listeEtudiants()
    {
    // Initialisation de la variable $etudiants comme un tableau vide
    $etudiants = [];

    // Vérification si l'utilisateur connecté est un professeur
    if (Auth::user()->type_usager === 'professeur') {
        // Récupération de tous les utilisateurs de type 'etudiant'
        $etudiants = Usager::where('type_usager', 'etudiant')->get();
    }

    // Retour de la vue 'jeux.streams' avec la variable $etudiants
    return view('jeux.streams', compact('etudiants'));
    }

    public function update(UsagerRequest $request, $id)
    {
        try {
            // Trouver l'utilisateur
            $usager = Usager::findOrFail($id);

            // Journaliser l'utilisateur trouvé
            Log::info('Utilisateur trouvé : ', $usager->toArray());

            // Valider les données
            $validatedData = $request->validate([
                'prenom' => 'required|string|max:255',
                'nom' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'programme' => 'nullable|string|max:255',
                'mdp' => 'nullable|string|min:6|confirmed',
            ]);

            Log::info('Données validées pour la mise à jour : ', $validatedData);

            // Mettre à jour les champs
            DB::transaction(function () use ($validatedData, $usager, $request) {
                $usager->update([
                    'prenom' => $validatedData['prenom'],
                    'nom' => $validatedData['nom'],
                    'email' => $validatedData['email'],
                    'programme' => $request->input('programme', null),
                ]);

                // Si un mot de passe est fourni, le mettre à jour
                if ($request->filled('mdp')) {
                    $usager->update(['mdp' => Hash::make($validatedData['mdp'])]);
                }
            });

            // Rediriger avec un message de succès
            return redirect()->route('jeux.profiles')->with('success', 'Profil mis à jour avec succès !');
        } catch (\Exception $e) {
            // Journaliser l'erreur
            Log::error('Erreur lors de la mise à jour : ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour.'])->withInput();
        }
    }

    public function delete($id)
    {
        try {
            $usager = Usager::findOrFail($id);

            DB::transaction(function () use ($usager) {
                // Déconnexion de l'utilisateur
                Auth::logout();

                // Supprimer les commentaires et notes liés à cet utilisateur
                $usager->commentaires()->delete();
                $usager->ratings()->delete();

                // Supprimer l'utilisateur lui-même
                $usager->delete();
            });

            return redirect('/')->with('success', 'Votre profil a été supprimé avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de l\'utilisateur : ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de la suppression.']);
        }
    }
}
