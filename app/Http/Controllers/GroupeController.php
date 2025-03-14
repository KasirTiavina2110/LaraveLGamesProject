<?php
namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Usager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupeController extends Controller
{
    public function browse()
    {
        $usagers = Usager::where('type_usager', 'etudiant')->get();
        $groupes = Groupe::with('usagers')->get(); // Charger les groupes avec leurs usagers
        return view('jeux.browse', compact('usagers', 'groupes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'usager_ids' => 'required|array',
            'usager_ids.*' => 'exists:usagers,id',
        ]);

        DB::transaction(function () use ($request) {
            $groupe = Groupe::create(['nom' => $request->input('nom')]);
            $groupe->usagers()->attach($request->input('usager_ids'));
        });

        return redirect()->route('jeux.browse')->with('success', 'Groupe créé avec succès!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'usager_ids' => 'required|array',
            'usager_ids.*' => 'exists:usagers,id',
        ]);

        DB::transaction(function () use ($request, $id) {
            $groupe = Groupe::findOrFail($id);
            $groupe->update(['nom' => $request->nom]);
            // Synchroniser les usagers sélectionnés
            $groupe->usagers()->sync($request->usager_ids);
        });

        return redirect()->route('jeux.browse')->with('success', 'Groupe mis à jour avec succès!');
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $groupe = Groupe::findOrFail($id);
            $groupe->usagers()->detach(); // détacher tous les usagers
            $groupe->delete();
        });

        return redirect()->route('jeux.browse')->with('success', 'Groupe supprimé avec succès!');
    }
    public function attachProfessor($id_groupe)
{
    // Récupérer le groupe
    $groupe = Groupe::findOrFail($id_groupe);

    // Récupérer l'ID du professeur connecté
    $profId = Auth::id();

    // Vérifier si le professeur fait déjà partie du groupe
    if ($groupe->usagers->contains($profId)) {
        // Le professeur est déjà dans le groupe
        return redirect()->back()->with('success', 'Vous faites déjà partie de ce groupe.');
    }

    // Si le professeur n'est pas encore dans le groupe, on l'ajoute
    $groupe->usagers()->attach($profId);
    return redirect()->back()->with('success', 'Vous avez été ajouté au groupe avec succès.');
}

}
