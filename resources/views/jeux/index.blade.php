@extends('layouts.app')

@section('title', 'GamePortal Accueil')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/card.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">

<!-- ***** Banner Start ***** -->
<div class="main-banner">
    <div class="row">
        <div class="col-lg-7">
            <div class="header-text">
                <h6>GamePortal</h6>
                <h4><em>Nouveau</em> Jeu</h4>
                <div class="main-button">
                    @if(Auth::check() && (Auth::user()->type_usager === 'professeur' || (Auth::user()->type_usager === 'etudiant' && Auth::user()->programme === 'Informatique')))
                        <!-- Bouton pour ouvrir le modal d'ajout de jeu -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGameModal">
                            Ajouter un nouveau jeu
                        </button>
                    @else
                        <p class="text-muted">Seuls les professeurs ou les étudiants du programme Informatique peuvent ajouter un jeu.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Banner End ***** -->

<!-- Afficher les messages de succès ou d'erreur -->
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<!-- ***** Modal d'ajout de jeu ***** -->
@if(Auth::check() && (Auth::user()->type_usager === 'professeur' || (Auth::user()->type_usager === 'etudiant' && Auth::user()->programme === 'Informatique')))
<div class="modal fade" id="addGameModal" tabindex="-1" aria-labelledby="addGameModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="addGameForm" action="{{ route('jeux.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addGameModalLabel">Ajouter un jeu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" id="titre" name="titre" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="categorie">Catégorie</label>
                        <input type="text" class="form-control" id="categorie" name="categorie" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="taille">Taille (GB)</label>
                        <input type="number" class="form-control" id="taille" name="taille" step="0.1" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="realisateur">Réalisateur</label>
                        <input type="text" class="form-control" id="realisateur" name="realisateur" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="zip">Fichier ZIP</label>
                        <input type="text" class="form-control" id="zip" name="zip" required>
                    </div>

                    <!-- Images -->
                    <div class="form-group mb-3">
                        <label>Images</label>
                        <div id="image-fields-add">
                            <div class="input-group mb-2">
                                <input type="url" class="form-control" name="images[]" placeholder="URL de l'image">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary remove-image-field">&times;</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" id="add-image-field-add">Ajouter une image</button>
                    </div>

                    <!-- Vidéos -->
                    <div class="form-group mb-3">
                        <label>Vidéos</label>
                        <div id="video-fields-add">
                            <div class="input-group mb-2">
                                <input type="url" class="form-control" name="videos[]" placeholder="URL de la vidéo">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary remove-video-field">&times;</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" id="add-video-field-add">Ajouter une vidéo</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

<!-- ***** Liste des jeux ***** -->
<div class="most-popular">
    <div class="row">
        <div class="col-lg-12">
            <div class="heading-section">
                <h4><em>Les plus populaires</em> en ce moment</h4>
            </div>
        </div>
    </div>

    <!-- Filtre par catégorie -->
    <form method="GET" action="{{ route('home') }}" class="mb-4">
        <div class="form-group">
            <label for="categorie">Filtrer par catégorie :</label>
            <select name="categorie" id="categorie" class="form-control" onchange="this.form.submit()">
                <option value="all" {{ $categorieSelectionnee == 'all' ? 'selected' : '' }}>Toutes les catégories</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie }}" {{ $categorieSelectionnee == $categorie ? 'selected' : '' }}>{{ $categorie }}</option>
                @endforeach
            </select>
        </div>
    </form>

    <div class="row" id="popular-games">
        @foreach($jeux as $jeu)
        <div class="col-lg-3 col-sm-6 mb-4">
            <div class="card h-100">
                @if($jeu->images->isNotEmpty())
                    <a href="{{ $jeu->images->first()->url }}" class="glightbox" data-gallery="gallery-{{ $jeu->id_jeu }}">
                        <img src="{{ $jeu->images->first()->url }}" class="card-img-top" alt="{{ $jeu->titre }}">
                    </a>
                @else
                    <img src="{{ asset('assets/images/default-game.jpg') }}" class="card-img-top" alt="{{ $jeu->titre }}">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $jeu->titre }}</h5>
                    <p class="card-text">{{ $jeu->categorie }}</p>
                    <div class="mt-auto">
                        <div class="d-flex justify-content-between">
                            <!-- Voir -->
                            <a href="{{ route('jeux.details', ['id_jeu' => $jeu->id_jeu]) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> Voir
                            </a>

                            @if(Auth::check() && Auth::user()->type_usager === 'professeur')
                                <!-- Modifier -->
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editGameModal-{{ $jeu->id_jeu }}">
                                    <i class="fas fa-cog"></i> Modifier
                                </button>
                                <!-- Supprimer -->
                                <button
                                    type="button"
                                    class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteGameModal"
                                    data-id="{{ $jeu->id_jeu }}">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(Auth::check() && Auth::user()->type_usager === 'professeur')
        <!-- Modal de modification -->
        <div class="modal fade" id="editGameModal-{{ $jeu->id_jeu }}" tabindex="-1" aria-labelledby="editGameModalLabel-{{ $jeu->id_jeu }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('jeux.update', ['id_jeu' => $jeu->id_jeu]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Modifier {{ $jeu->titre }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Formulaire de modification -->
                            <div class="form-group mb-3">
                                <label for="titre">Titre</label>
                                <input type="text" name="titre" class="form-control" value="{{ $jeu->titre }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" rows="3" required>{{ $jeu->description }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="categorie">Catégorie</label>
                                <input type="text" name="categorie" class="form-control" value="{{ $jeu->categorie }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="taille">Taille (GB)</label>
                                <input type="number" step="0.01" name="taille" class="form-control" value="{{ $jeu->taille }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="realisateur">Réalisateur</label>
                                <input type="text" name="realisateur" class="form-control" value="{{ $jeu->realisateur }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="zip">Fichier ZIP</label>
                                <input type="text" name="zip" class="form-control" value="{{ $jeu->zip }}" required>
                            </div>

                            <!-- Images -->
                            <div class="form-group mb-3">
                                <label>Images</label>
                                <div id="image-fields-{{ $jeu->id_jeu }}">
                                    @foreach($jeu->images as $image)
                                    <div class="input-group mb-2">
                                        <input type="url" name="images[]" class="form-control" value="{{ $image->url }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-danger remove-image-field" type="button">&times;</button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-secondary" onclick="addImageField('{{ $jeu->id_jeu }}')">Ajouter une image</button>
                            </div>
                            <!-- Vidéos -->
                            <div class="form-group mb-3">
                                <label>Vidéos</label>
                                <div id="video-fields-{{ $jeu->id_jeu }}">
                                    @foreach($jeu->videos as $video)
                                    <div class="input-group mb-2">
                                        <input type="url" name="videos[]" class="form-control" value="{{ $video->url }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-danger remove-video-field" type="button">&times;</button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-secondary" onclick="addVideoField('{{ $jeu->id_jeu }}')">Ajouter une vidéo</button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

    <!-- Pagination -->
    @if($jeux->hasPages())
    <div class="pagination justify-content-center">
        {{ $jeux->links() }}
    </div>
    @endif
</div>

@if(Auth::check() && Auth::user()->type_usager === 'professeur')
<!-- Modal de suppression -->
<div class="modal fade" id="deleteGameModal" tabindex="-1" aria-labelledby="deleteGameModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteGameModalLabel">Supprimer le jeu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <p id="deleteGameMessage">Voulez-vous vraiment supprimer ce jeu ?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('jeux.destroy', ['id_jeu' => $jeu->id_jeu]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialiser GLightbox
        GLightbox({
            selector: '.glightbox',
            touchNavigation: true,
            loop: true,
            zoomable: true,
        });

        // Pour le modal d'ajout de jeu (sans id_jeu)
        const addImageFieldAddBtn = document.getElementById('add-image-field-add');
        const imageFieldsAdd = document.getElementById('image-fields-add');
        if (addImageFieldAddBtn && imageFieldsAdd) {
            addImageFieldAddBtn.addEventListener('click', function () {
                const newField = `
                    <div class="input-group mb-2">
                        <input type="url" class="form-control" name="images[]" placeholder="URL de l'image">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-danger remove-image-field">&times;</button>
                        </div>
                    </div>`;
                imageFieldsAdd.insertAdjacentHTML('beforeend', newField);
            });
        }

        const addVideoFieldAddBtn = document.getElementById('add-video-field-add');
        const videoFieldsAdd = document.getElementById('video-fields-add');
        if (addVideoFieldAddBtn && videoFieldsAdd) {
            addVideoFieldAddBtn.addEventListener('click', function () {
                const newField = `
                    <div class="input-group mb-2">
                        <input type="url" class="form-control" name="videos[]" placeholder="URL de la vidéo">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-danger remove-video-field">&times;</button>
                        </div>
                    </div>`;
                videoFieldsAdd.insertAdjacentHTML('beforeend', newField);
            });
        }

        // Pour les champs dynamiques dans les modals de modification
        window.addImageField = function (jeuId) {
            const imageFields = document.getElementById(`image-fields-${jeuId}`);
            const newField = `
                <div class="input-group mb-2">
                    <input type="url" class="form-control" name="images[]" placeholder="URL de l'image">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-danger remove-image-field">&times;</button>
                    </div>
                </div>`;
            imageFields.insertAdjacentHTML('beforeend', newField);
        };

        window.addVideoField = function (jeuId) {
            const videoFields = document.getElementById(`video-fields-${jeuId}`);
            const newField = `
                <div class="input-group mb-2">
                    <input type="url" class="form-control" name="videos[]" placeholder="URL de la vidéo">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-danger remove-video-field">&times;</button>
                    </div>
                </div>`;
            videoFields.insertAdjacentHTML('beforeend', newField);
        };

        // Suppression des champs dynamiques (pour ajout et modification)
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-image-field')) {
                e.target.closest('.input-group').remove();
            }
            if (e.target.classList.contains('remove-video-field')) {
                e.target.closest('.input-group').remove();
            }
        });

        // Gestion du formulaire de suppression
        const deleteGameModal = document.getElementById('deleteGameModal');
        const deleteGameForm = document.getElementById('deleteGameForm');

        if (deleteGameModal) {
            deleteGameModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const gameId = button.getAttribute('data-id');
                deleteGameForm.action = `/jeux/${gameId}`;
            });
        }
    });
</script>
@endpush
