@extends('layouts.app')

@section('title', 'Streams')

@section('content')
<div class="container-fluid d-flex align-items-center justify-content-center" style="min-height: 100vh; background: url('https://c4.wallpaperflare.com/wallpaper/651/727/590/gaming-setup-steelseries-keyboards-headphones-mouse-pad-hd-wallpaper-preview.jpg') no-repeat center center; background-size: containt;">
    <div class="row w-100">
        <div class="col-lg-10 mx-auto">
            <!-- Conteneur principal centré -->
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 50vh; min-width: auto; background-color: rgba(255, 255, 255, 0.7); border-radius: 15px;">
                <div class="card-header bg-secondary text-white text-center w-100 mb-4" style="border-radius: 10px;">
                    <h2>Liste des Étudiants</h2>
                </div>
                <div class="card-body w-100">
                    @if(Auth::user()->type_usager === 'professeur')
                        @if($etudiants->isEmpty())
                            <p class="text-center">Aucun étudiant trouvé.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped text-center" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Matricule</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Email</th>
                                            <th>Programme</th>
                                            <th style="width: 150px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($etudiants as $etudiant)
                                            <tr>
                                                <td>{{ $etudiant->matricule }}</td>
                                                <td>{{ $etudiant->nom }}</td>
                                                <td>{{ $etudiant->prenom }}</td>
                                                <td>{{ $etudiant->email }}</td>
                                                <td>{{ $etudiant->programme }}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $etudiant->id }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $etudiant->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal Modifier Étudiant -->
                                            <div class="modal fade" id="editUserModal{{ $etudiant->id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $etudiant->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form method="POST" action="{{ route('auth.update', $etudiant->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary text-white">
                                                                <h5 class="modal-title" id="editUserModalLabel{{ $etudiant->id }}">Modifier l'étudiant</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="prenom" class="form-label">Prénom</label>
                                                                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $etudiant->prenom }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="nom" class="form-label">Nom</label>
                                                                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $etudiant->nom }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Email</label>
                                                                    <input type="email" class="form-control" id="email" name="email" value="{{ $etudiant->email }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="programme" class="form-label">Programme</label>
                                                                    <input type="text" class="form-control" id="programme" name="programme" value="{{ $etudiant->programme }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                                <button type="submit" class="btn btn-success">Modifier</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- Modal Supprimer Étudiant -->
                                            <div class="modal fade" id="deleteUserModal{{ $etudiant->id }}" tabindex="-1" aria-labelledby="deleteUserModalLabel{{ $etudiant->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form method="POST" action="{{ route('auth.delete', ['id' => $etudiant->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger text-white">
                                                                <h5 class="modal-title" id="deleteUserModalLabel{{ $etudiant->id }}">Confirmer la suppression</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Êtes-vous sûr de vouloir supprimer cet étudiant ? Cette action est irréversible.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                                                                <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    @else
                        <p class="text-danger text-center">Vous n'avez pas les permissions nécessaires pour accéder à cette page.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
