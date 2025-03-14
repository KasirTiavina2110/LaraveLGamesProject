@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="row justify-content-center w-100">
        <div class="col-lg-6">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-secondary text-white">
                    <h4>Connexion</h4>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('auth.login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="matricule" class="form-label">Matricule</label>
                            <input type="text" class="form-control" id="matricule" name="matricule" value="{{ old('matricule') }}" required>
                            @error('matricule')
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
                            <label for="type_usager" class="form-label">Type d'utilisateur</label>
                            <select class="form-select" id="type_usager" name="type_usager" required>
                                <option value="etudiant" {{ old('type_usager') == 'etudiant' ? 'selected' : '' }}>etudiant</option>
                                <option value="professeur" {{ old('type_usager') == 'professeur' ? 'selected' : '' }}>Professeur</option>
                            </select>
                            @error('type_usager')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                    </form>
                    <div class="text-center mt-3">
                        <p>Pas encore inscrit ? <a href="{{ route('auth.register') }}">Créer un compte</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
