@extends('layouts.app')

@section('title', 'Détails du jeu')

@section('content')
<style>
    .commentaires {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-top: 20px;
    }
    .commentaire {
        background-color: #e9ecef;
        padding: 15px;
        margin-bottom: 10px;
        border-radius: 5px;
    }
    .commentaire strong {
        color: #007bff;
        font-size: 1.1em;
    }
    h3 {
        text-align: center;
    }
    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
    }
    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">

                <!-- Section d'affichage des images avec carousel -->
                <div id="featured-section" class="row">
                    <div class="col-lg-12">
                        <div class="feature-banner header-text">
                            @if ($jeuDetail && $jeuDetail->images->isNotEmpty())
                                <div id="featuredImageCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($jeuDetail->images as $index => $image)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <img src="{{ $image->url }}" alt="Image du jeu {{ $jeuDetail->titre }}" class="d-block w-100" style="border-radius: 23px;">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#featuredImageCarousel" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Précédent</span>
                                    </a>
                                    <a class="carousel-control-next" href="#featuredImageCarousel" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Suivant</span>
                                    </a>
                                </div>
                            @else
                                <img src="{{ asset('assets/images/feature-right.jpg') }}" alt="Image par défaut" class="d-block w-100" style="border-radius: 23px;">
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Détails du jeu -->
                @if($jeuDetail)
                    <div class="game-details mt-4">
                        <h2 class="text-center my-4">{{ $jeuDetail->titre }}</h2>
                        <p class="text-center">{{ $jeuDetail->description }}</p>

                        <!-- Bouton Télécharger le jeu -->
                        @auth
                            <div class="text-center mb-3">
                                @if($alreadyDownloaded)
                                    <p class="text-success">Vous avez déjà téléchargé ce jeu.</p>
                                @else
                                    <form action="{{ route('jeux.download.store', $jeuDetail->id_jeu) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-info">Télécharger ce jeu</button>
                                    </form>
                                @endif
                            </div>
                        @endauth

                        <!-- Section des commentaires -->
                        <div class="commentaires">
                            <h3>Commentaires</h3>
                            @if ($commentaires->isNotEmpty())
                                @foreach ($commentaires as $commentaire)
                                    <div class="commentaire">
                                        <strong>{{ $commentaire->usager->nom }}</strong>
                                        <p>{{ $commentaire->contenu }}</p>
                                    </div>
                                @endforeach
                                {{ $commentaires->links() }}
                            @else
                                <p>Aucun commentaire pour ce jeu.</p>
                            @endif

                            @auth
                                @if($alreadyCommented)
                                    <p class="text-center text-warning">Vous avez déjà commenté ce jeu.</p>
                                @else
                                    <form action="{{ route('jeux.comment.store', $jeuDetail->id_jeu) }}" method="POST" class="mt-4">
                                        @csrf
                                        <div class="mb-3">
                                            <textarea name="contenu" class="form-control" rows="3" placeholder="Votre commentaire..." required></textarea>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Commenter</button>
                                        </div>
                                    </form>
                                @endif
                            @endauth
                        </div>

                        <!-- Vidéo YouTube -->
                        <div class="video-container mt-5">
                            <h3>Vidéo du Jeu</h3>
                            @if ($jeuDetail->videos->isNotEmpty())
                                @php
                                    $video = $jeuDetail->videos->first();
                                    $videoId = '';
                                    if ($video) {
                                        parse_str(parse_url($video->url, PHP_URL_QUERY), $youtubeParams);
                                        $videoId = $youtubeParams['v'] ?? '';
                                    }
                                @endphp
                                @if ($videoId)
                                    <iframe src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                @else
                                    <p>Vidéo non disponible.</p>
                                @endif
                            @else
                                <p>Pas de vidéo pour ce jeu.</p>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- ***** Other Games Section Start ***** -->
                <div class="other-games mt-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4><em>Liste de</em> Jeux</h4>
                        </div>
                        @foreach($jeux as $jeu)
                            <div class="col-lg-6">
                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="{{ $jeu->images->first()->url ?? asset('assets/images/feature-left.jpg') }}" alt="" class="templatemo-item hover-effect">
                                            <h4>{{ $jeu->titre }}</h4>
                                            <span>{{ $jeu->categorie }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <ul>
                                                <li><i class="fa fa-server"></i> {{ $jeu->taille }} GB</li>
                                                <li><i class="fa fa-gamepad"></i> {{ $jeu->realisateur }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <a href="{{ route('jeux.details', ['id_jeu' => $jeu->id_jeu]) }}" class="btn btn-primary">Voir en Détails</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- ***** Other Games Section End ***** -->

            </div>
        </div>
    </div>
</div>
@endsection
