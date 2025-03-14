@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success my-2">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">

                    @if(Auth::check() && Auth::user()->type_usager === 'professeur')
                        <!-- Bouton pour ouvrir le modal de création de groupe -->
                        <div class="mt-5 mb-3">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createGroupModal">
                                Créer un groupe
                            </button>
                        </div>
                    @endif

                    <!-- Liste des groupes -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5 style="color: black;">Liste des Groupes</h5>

                        </div>
                        <div class="card-body">
                            <table class="table table-bordered align-middle text-center">
                                <thead>
                                    <tr>
                                        <th>Nom du Groupe</th>
                                        <th>Nombre d'Étudiants</th>
                                        @if(Auth::check() && Auth::user()->type_usager === 'professeur')
                                            <th>Actions</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($groupes as $groupe)
                                        <tr>
                                            <td>{{ $groupe->nom }}</td>
                                            <td>{{ $groupe->usagers->count() }}</td>
                                            @if(Auth::check() && Auth::user()->type_usager === 'professeur')
                                                <td>
                                                    <!-- Bouton Modifier -->
                                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editGroupModal-{{ $groupe->id_groupe }}">
                                                        Modifier
                                                    </button>
                                                    <!-- Bouton Supprimer -->
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteGroupModal-{{ $groupe->id_groupe }}">
                                                        Supprimer
                                                    </button>
                                                    <!-- Bouton M'ajouter -->
                                                    <form action="{{ route('groupes.attach_prof', $groupe->id_groupe) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-info btn-sm">
                                                            M'ajouter
                                                        </button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>

                                        @if(Auth::check() && Auth::user()->type_usager === 'professeur')
                                        <!-- Modal Edition de Groupe -->
                                        <div class="modal fade" id="editGroupModal-{{ $groupe->id_groupe }}" tabindex="-1" aria-labelledby="editGroupModalLabel-{{ $groupe->id_groupe }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('groupes.update', $groupe->id_groupe) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editGroupModalLabel-{{ $groupe->id_groupe }}">Modifier le groupe</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if($errors->any())
                                                                <div class="alert alert-danger mb-2">
                                                                    <ul>
                                                                       @foreach($errors->all() as $error)
                                                                          <li>{{ $error }}</li>
                                                                       @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endif
                                                            <div class="mb-3">
                                                                <label for="nom" class="form-label">Nom du groupe</label>
                                                                <input type="text" name="nom" id="nom" class="form-control" value="{{ $groupe->nom }}" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="usager_ids" class="form-label">Sélectionnez les étudiants</label>
                                                                <select name="usager_ids[]" id="usager_ids" class="form-select" multiple required>
                                                                    @foreach($usagers as $usager)
                                                                        <option value="{{ $usager->id }}"
                                                                            {{ $groupe->usagers->contains($usager->id) ? 'selected' : '' }}>
                                                                            {{ $usager->nom }} {{ $usager->prenom }} ({{ $usager->matricule }})
                                                                        </option>
                                                                    @endforeach
                                                                </select>
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

                                        <!-- Modal Suppression de Groupe -->
                                        <div class="modal fade" id="deleteGroupModal-{{ $groupe->id_groupe }}" tabindex="-1" aria-labelledby="deleteGroupModalLabel-{{ $groupe->id_groupe }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('groupes.destroy', $groupe->id_groupe) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteGroupModalLabel-{{ $groupe->id_groupe }}">Supprimer le groupe</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Voulez-vous vraiment supprimer ce groupe ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                    @empty
                                        <tr>
                                            <td colspan="3">Aucun groupe n'a été créé pour le moment.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @if(Auth::check() && Auth::user()->type_usager === 'professeur')
    <!-- Modal Création de Groupe -->
    <div class="modal fade" id="createGroupModal" tabindex="-1" aria-labelledby="createGroupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('groupes.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createGroupModalLabel">Créer un groupe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        @if($errors->any() && old('nom'))
                            <div class="alert alert-danger mb-2">
                                <ul>
                                   @foreach($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                   @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom du groupe</label>
                            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="usager_ids" class="form-label">Sélectionnez les étudiants</label>
                            <select name="usager_ids[]" id="usager_ids" class="form-select" multiple required>
                                @foreach($usagers as $usager)
                                    <option value="{{ $usager->id }}">{{ $usager->nom }} {{ $usager->prenom }} ({{ $usager->matricule }})</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Maintenez Ctrl/Cmd pour sélectionner plusieurs étudiants.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
@endsection
