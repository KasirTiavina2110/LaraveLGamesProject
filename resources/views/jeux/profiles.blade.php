@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="row w-100">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-lg">
                <div class="card-header bg-secondary text-white text-center">
                    <h2>Bienvenue, {{ Auth::user()->prenom }} {{ Auth::user()->nom }} !</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 text-center">
                            <img src="{{ asset('assets/images/profile.jpg') }}" alt="Profile Image" style="border-radius: 23px; width: 100%;">
                        </div>
                        <div class="col-lg-8">
                            <p><strong>Matricule :</strong> {{ Auth::user()->matricule }}</p>
                            <p><strong>Type :</strong> {{ ucfirst(Auth::user()->type_usager) }}</p>
                            @if(Auth::user()->programme)
                                <p><strong>Programme :</strong> {{ Auth::user()->programme }}</p>
                            @endif
                            <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <!-- Boutons Edit et Delete -->
                    <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="fa fa-edit"></i> Modifier
                    </button>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProfileModal">
                        <i class="fa fa-trash"></i> Supprimer
                    </button>
                </div>
            </div>
        </div>
    </div>

   
@endsection
