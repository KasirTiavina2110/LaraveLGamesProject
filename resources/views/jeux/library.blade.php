@extends('layouts.app')

@section('title', 'Ma Bibliothèque')

@section('content')
<div class="container">
    <h2>Ma Bibliothèque</h2>
    @if($downloads->isEmpty())
        <p>Aucun jeu téléchargé pour le moment.</p>
    @else
        <ul class="list-group">
            @foreach($downloads as $download)
                <li class="list-group-item">
                    <strong>{{ $download->jeu->titre }}</strong> ({{ $download->jeu->categorie }})
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
