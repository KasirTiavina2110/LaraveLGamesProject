<?php

namespace App\Http\Controllers;
use App\Http\Requests\JeuxRequest;
use App\Models\Jeu;
use App\Models\Image;
use App\Models\Video;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class JeuxController extends Controller
{
    /**
     * Affiche la page d'accueil avec les jeux populaires et les catégories.
     */
    public function index(Request $request)
    {
        // Récupérer la catégorie sélectionnée depuis la requête
        $categorieSelectionnee = $request->input('categorie', 'all');

        // Récupérer les catégories distinctes pour la liste déroulante
        $categories = Jeu::select('categorie')->distinct()->pluck('categorie');

        // Construire la requête de base pour les jeux
        $jeuxQuery = Jeu::with('images')
            ->withAvg('ratings', 'note');

        // Filtrer par catégorie si une catégorie spécifique est sélectionnée
        if ($categorieSelectionnee !== 'all') {
            $jeuxQuery->where('categorie', $categorieSelectionnee);
        }

        // Récupérer les jeux triés par note moyenne décroissante
        $jeux = $jeuxQuery->orderByDesc('ratings_avg_note')
            ->paginate(6);

        // Retourner la vue 'jeux.index' avec les variables nécessaires
        return view('jeux.index', compact('jeux', 'categories', 'categorieSelectionnee'));
    }

    /**
     * Affiche les détails d'un jeu spécifique.
     */
    public function details($id_jeu = null)
{
    // Récupérer tous les jeux avec leurs images pour l'affichage dans la liste ou le menu
    $jeux = Jeu::with('images')->get();

    if ($id_jeu) {
        // Récupérer le jeu spécifique avec ses images, vidéos, ratings et commentaires
        $jeuDetail = Jeu::with(['images', 'videos', 'ratings'])
                        ->findOrFail($id_jeu);
    } else {
        // Si aucun ID n'est fourni, sélectionner un jeu au hasard
        $jeuDetail = Jeu::with(['images', 'videos', 'ratings'])
                        ->inRandomOrder()->firstOrFail();
    }

    // Vérifier si l'utilisateur a déjà téléchargé le jeu
    $alreadyDownloaded = Auth::check() && Download::where('usager_id', Auth::id())->where('jeu_id', $jeuDetail->id_jeu)->exists();

    // Vérifier si l'utilisateur a déjà commenté le jeu
    $alreadyCommented = Auth::check() && $jeuDetail->commentaires()->where('usager_id', Auth::id())->exists();

    // Paginer les commentaires du jeu
    $commentaires = $jeuDetail->commentaires()->with('usager')->paginate(3);

    // Retourner la vue avec les jeux, le jeu en détail, les commentaires, et les indicateurs
    return view('jeux.details', compact('jeux', 'jeuDetail', 'commentaires', 'alreadyDownloaded', 'alreadyCommented'));
}


    /**
     * Affiche la page des profils.
     */
    public function profiles()
    {
        return view('jeux.profiles');
    }

    /**
     * Affiche la page des streams.
     */
    public function streams()
    {
        return view('jeux.streams');
    }

    /**
     * Affiche la page de navigation des jeux.
     */
    public function browse()
    {
        // Récupérer tous les jeux avec leurs images et notes moyennes
        $jeux = Jeu::with('images')
            ->withAvg('ratings', 'note')
            ->paginate(10);

        // Récupérer les catégories distinctes pour les filtres
        $categories = Jeu::select('categorie')->distinct()->pluck('categorie');

        return view('jeux.browse', compact('jeux', 'categories'));
    }

    /**
     * Stocke un nouveau jeu dans la base de données.
     */
    public function store(JeuxRequest $request)
    {
        try {
            DB::beginTransaction();

            // Récupérer les données validées
            $validatedData = $request->validated();

            // Enregistrer le jeu
            $jeu = new Jeu();
            $jeu->titre = $validatedData['titre'];
            $jeu->description = $validatedData['description'];
            $jeu->categorie = $validatedData['categorie'];
            $jeu->taille = $validatedData['taille'] ?? null;
            $jeu->realisateur = $validatedData['realisateur'] ?? null;
            $jeu->zip = $validatedData['zip'] ?? null;

            $jeu->save();

            // Enregistrer les images associées (URLs)
            if (isset($validatedData['images'])) {
                foreach ($validatedData['images'] as $imageUrl) {
                    if (!empty($imageUrl)) {
                        $image = new Image();
                        $image->jeu_id = $jeu->id_jeu;
                        $image->url = $imageUrl;
                        $image->save();
                    }
                }
            }

            // Enregistrer les vidéos associées
            if (isset($validatedData['videos'])) {
                foreach ($validatedData['videos'] as $videoUrl) {
                    if (!empty($videoUrl)) {
                        $video = new Video();
                        $video->jeu_id = $jeu->id_jeu;
                        $video->url = $videoUrl;
                        $video->save();
                    }
                }
            }

            DB::commit();

            return redirect()->back()->with('success', 'Le jeu a été ajouté avec succès.');
        } catch (\Exception $e) {
            DB::rollback();

            // Enregistrer l'erreur dans les logs
            Log::error('Erreur lors de l\'ajout du jeu : ' . $e->getMessage());

            // Rediriger avec un message d'erreur général
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'ajout du jeu. Veuillez réessayer plus tard.')->withInput();
        }
    }

    /**
     * Affiche un jeu spécifique.
     */
    public function show(string $id)
    {
        $jeu = Jeu::with(['images', 'videos', 'ratings', 'commentaires'])->findOrFail($id);
        return view('jeux.show', compact('jeu'));
    }

    public function update(JeuxRequest $request, $id)
{
    $jeu = Jeu::findOrFail($id);

    DB::transaction(function () use ($request, $jeu) {
        // Récupère toutes les données validées
        $validatedData = $request->validated();

        // Mise à jour des champs du jeu
        $jeu->update([
            'titre' => $validatedData['titre'],
            'description' => $validatedData['description'],
            'categorie' => $validatedData['categorie'],
            'taille' => $validatedData['taille'],
            'realisateur' => $validatedData['realisateur'],
            'zip' => $validatedData['zip'],
        ]);

        // Mettre à jour les images
        $jeu->images()->delete();
        if (!empty($validatedData['images'])) {
            foreach ($validatedData['images'] as $url) {
                if ($url) {
                    $jeu->images()->create(['url' => $url]);
                }
            }
        }

        // Mettre à jour les vidéos
        $jeu->videos()->delete();
        if (!empty($validatedData['videos'])) {
            foreach ($validatedData['videos'] as $url) {
                if ($url) {
                    $jeu->videos()->create(['url' => $url]);
                }
            }
        }
    });

    return redirect()->back()->with('success', 'Jeu mis à jour avec succès !');
}


    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $jeu = Jeu::findOrFail($id);

                // Supprimer les images associées
                $jeu->images()->delete();

                // Supprimer les vidéos associées
                $jeu->videos()->delete();

                // Supprimer les notes et commentaires (ajoutez les relations si elles existent)
                $jeu->ratings()->delete();
                $jeu->commentaires()->delete();

                // Supprimer le jeu lui-même
                $jeu->delete();
            });

            return redirect()->back()->with('success', 'Le jeu a été supprimé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression.');
        }
    }

    public function storeDownload($id_jeu)
{
    $jeu = Jeu::findOrFail($id_jeu);

    // Vérifier si déjà téléchargé (optionnel)
    if (Download::where('usager_id', Auth::id())->where('jeu_id', $id_jeu)->exists()) {
        return redirect()->back()->with('success', 'Vous avez déjà téléchargé ce jeu.');
    }

    // Ajouter le téléchargement
    Download::create([
        'usager_id' => Auth::id(),
        'jeu_id' => $jeu->id_jeu,
    ]);

    return redirect()->back()->with('success', 'Le jeu a été téléchargé avec succès!');
}
public function storeComment(Request $request, $id_jeu)
{
    $jeu = Jeu::findOrFail($id_jeu);

    // Vérifier si l'utilisateur a déjà commenté
    if ($jeu->commentaires()->where('usager_id', Auth::id())->exists()) {
        return redirect()->back()->with('success', 'Vous avez déjà commenté ce jeu.');
    }

    // Valider la requête
    $request->validate([
        'contenu' => 'required|string|max:1000',
    ]);

    // Créer le commentaire
    $jeu->commentaires()->create([
        'usager_id' => Auth::id(),
        'contenu' => $request->input('contenu'), // Utilisez 'contenu' ici
    ]);

    return redirect()->back()->with('success', 'Commentaire ajouté avec succès!');
}

/*public function library()
{
    $downloads = Auth::user()->downloads()->with('jeu')->get();

    return view('jeux.library', compact('downloads'));
}*/
public function allDownloads()
{
    $downloads = Download::with(['jeu', 'usager'])->get();

    return view('admin.downloads', compact('downloads'));
}



}

