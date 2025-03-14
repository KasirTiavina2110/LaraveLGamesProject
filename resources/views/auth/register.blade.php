@extends('layouts.app')

@section('title', 'Inscription')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="row justify-content-center w-100">
        <div class="col-lg-6">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-secondary text-white">
                    <h4>Inscription</h4>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('auth.register.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="matricule" class="form-label">Matricule</label>
                            <input type="text" class="form-control" id="matricule" name="matricule" value="{{ old('matricule') }}" required>
                            @error('matricule')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
                            @error('nom')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                            @error('prenom')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="mdp" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="mdp" name="mdp" required>
                            @error('mdp')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="mdp_confirmation" class="form-label">Confirmer le mot de passe</label>
                            <input type="password" class="form-control" id="mdp_confirmation" name="mdp_confirmation" required>
                        </div>
                        <div class="mb-3">
                            <label for="programme" class="form-label">Programme</label>
                            <input type="text" class="form-control" id="programme" name="programme" value="{{ old('programme') }}" required>
                            @error('programme')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="type_usager" class="form-label">Type d'utilisateur</label>
                            <select class="form-select" id="type_usager" name="type_usager" required>
                                <option value="etudiant" {{ old('type_usager') == 'etudiant' ? 'selected' : '' }}>etudiant</option>
                                <option value="professeur" {{ old('type_usager') == 'professeur' ? 'selected' : '' }}>Professeur</option>
                            </select>
                            @error('type_usager')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Créer un compte</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
