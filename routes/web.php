<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JeuxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupeController;
use App\Http\Middleware\RoleMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route vers la page d'accueil
Route::get('/', [JeuxController::class, 'index'])->name('home');

// Routes pour le contrôleur JeuxController
Route::prefix('jeux')->group(function () {
    // Afficher la liste des jeux
    Route::get('/', [JeuxController::class, 'index'])->name('jeux.index');

    // Afficher les détails d'un jeu
    Route::get('/details/{id_jeu?}', [JeuxController::class, 'details'])->name('jeux.details');

    // Profil de l'utilisateur (authentification requise)
    Route::middleware(['auth'])->group(function () {
        Route::get('/profiles', [JeuxController::class, 'profiles'])->name('jeux.profiles');
        Route::get('/library', [JeuxController::class, 'library'])->name('jeux.library');
    });

    //Streams réservés aux professeurs
    Route::get('/streams', [JeuxController::class, 'streams'])->name('jeux.streams')
        ->middleware(RoleMiddleware::class . ':professeur');

    // Gestion des jeux (réservée aux professeurs)
    Route::middleware([RoleMiddleware::class . ':professeur'])->group(function () {
        Route::post('/', [JeuxController::class, 'store'])->name('jeux.store');
        Route::put('/{id_jeu}', [JeuxController::class, 'update'])->name('jeux.update');
        Route::delete('/{id_jeu}', [JeuxController::class, 'destroy'])->name('jeux.destroy');
    });
    // Liste des étudiants (réservée aux professeurs)
    Route::get('/listeEtudiants', [AuthController::class, 'listeEtudiants'])->name('jeux.streams')
        ->middleware([RoleMiddleware::class . ':professeur']);
});


// Routes pour l'authentification
Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::put('/update/{id}', [AuthController::class, 'update'])->name('auth.update');
    Route::delete('/delete/{id}', [AuthController::class, 'delete'])->name('auth.delete');
});


Route::get('/jeux/browse', [GroupeController::class, 'browse'])
    ->middleware([RoleMiddleware::class.':professeur'])
    ->name('jeux.browse');


Route::post('/groupes', [GroupeController::class, 'store'])->name('groupes.store');
Route::put('/groupes/{id}', [GroupeController::class, 'update'])->name('groupes.update');
Route::delete('/groupes/{id}', [GroupeController::class, 'destroy'])->name('groupes.destroy');
Route::post('/groupes/{id_groupe}/attach-prof', [GroupeController::class, 'attachProfessor'])
    ->name('groupes.attach_prof')
    ->middleware(['auth', RoleMiddleware::class . ':professeur']);

// Route pour enregistrer un commentaire
Route::post('/jeux/{id_jeu}/commentaire', [JeuxController::class, 'storeComment'])->name('jeux.comment.store')->middleware('auth');

// Route pour enregistrer un téléchargement
Route::post('/jeux/{id_jeu}/download', [JeuxController::class, 'storeDownload'])->name('jeux.download.store')->middleware('auth');
Route::get('/library', [JeuxController::class, 'library'])
    ->name('jeux.library')
    ->middleware('auth'); // Accessible uniquement par les utilisateurs connectés

    Route::get('/admin/downloads', [JeuxController::class, 'allDownloads'])
    ->name('admin.downloads')
    ->middleware('auth', RoleMiddleware::class.':professeur');
