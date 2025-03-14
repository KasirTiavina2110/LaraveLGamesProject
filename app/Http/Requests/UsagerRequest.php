<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UsagerRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à faire cette requête.
     */
    public function authorize()
    {
        return true; // Autoriser cette requête
    }

    /**
     * Règles de validation applicables à la requête.
     */
    public function rules()
    {
        $routeName = $this->route()->getName();
        $userId = Auth::id(); // Récupérer l'ID de l'utilisateur connecté

        if ($routeName === 'auth.login') {
            // Règles spécifiques pour la connexion
            return [
                'matricule' => 'required|string|exists:usagers,matricule',
                'mdp' => 'required|string',
            ];
        }

        if ($routeName === 'auth.update') {
            return [
                'prenom' => 'required|string|max:255',
                'nom' => 'required|string|max:255',
                'email' => 'required|email|unique:usagers,email,' . Auth::id(),
                'programme' => 'nullable|string|max:255',
                'type_usager' => 'nullable|in:professeur,etudiant',
            ];
        }
        if ($routeName === 'auth.register') {
            // Règles pour l'inscription
            return [
                'matricule' => 'required|string|unique:usagers,matricule|max:255',
                'type_usager' => 'required|in:etudiant,professeur',
                'email' => 'required|email|unique:usagers,email',
                'mdp' => 'required|string|min:5|confirmed',
                'programme' => 'required|string|max:255',
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
            ];
        }

        // Règles pour l'inscription
        return [
            'matricule' => 'required|string|unique:usagers,matricule|max:255',
            'type_usager' => 'required|in:etudiant,professeur',
            'email' => 'required|email|unique:usagers,email',
            'mdp' => 'required|string|min:5|confirmed',
            'programme' => 'nullable|string',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ];
    }

    /**
     * Messages personnalisés pour les règles.
     */
    public function messages()
    {
        return [
            'matricule.required' => 'Le matricule est obligatoire.',
            'matricule.unique' => 'Ce matricule est déjà utilisé.',
            'matricule.exists' => 'Ce matricule n\'existe pas dans notre système.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'mdp.required' => 'Le mot de passe est obligatoire.',
            'mdp.min' => 'Le mot de passe doit contenir au moins 5 caractères.',
            'mdp.confirmed' => 'Les mots de passe ne correspondent pas.',
        ];
    }
}
