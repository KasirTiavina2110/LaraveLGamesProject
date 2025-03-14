@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Afficher les informations du jeu -->
    <h1>{{ $jeu->titre }}</h1>
    <p><strong>Catégorie :</strong> {{ $jeu->categorie }}</p>
    <p><strong>Taille :</strong> {{ $jeu->taille }}GB</p>
    <p><strong>Description :</strong> {{ $jeu->description }}</p>
    <p><strong>Réalisateur :</strong> {{ $jeu->realisateur }}</p>

    <!-- Affichage des images du jeu -->
    <h3>Images du jeu</h3>
    <div class="row">
        @if ($jeu->images->isNotEmpty())
            @foreach ($jeu->images as $image)
                <div class="col-lg-4">
                    <img src="{{ $image->url }}" alt="Image du jeu {{ $jeu->titre }}" style="width: 100%; margin-bottom: 10px;">
                </div>
            @endforeach
        @else
            <p>Aucune image disponible pour ce jeu.</p>
        @endif
    </div>
</div>
@endsection
