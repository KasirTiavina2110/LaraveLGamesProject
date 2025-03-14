@extends('layouts.app')

@section('title', 'Tous les téléchargements')

@section('content')
<div class="container">
    <h2 class="text-center my-4">Tous les téléchargements</h2>

    @if($downloads->isEmpty())
        <p class="text-center">Aucun téléchargement enregistré pour le moment.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom du Jeu</th>
                    <th>Catégorie</th>
                    <th>Nom de l'utilisateur</th>
                    <th>Email de l'utilisateur</th>
                    <th>Date du téléchargement</th>
                </tr>
            </thead>
            <tbody>
                @foreach($downloads as $download)
                    <tr>
                        <td>{{ $download->jeu->titre }}</td>
                        <td>{{ $download->jeu->categorie }}</td>
                        <td>{{ $download->usager->nom }} {{ $download->usager->prenom }}</td>
                        <td>{{ $download->usager->email }}</td>
                        <td>{{ $download->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
