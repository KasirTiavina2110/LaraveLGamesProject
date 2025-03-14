<!-- resources/views/layouts/header.blade.php -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="{{ route('jeux.index') }}" class="logo">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Cyborg Logo">
                    </a>
                    <ul class="nav">
                        <li><a href="{{ route('jeux.index') }}">Home</a></li>

                        @if(Auth::check() && Auth::user()->type_usager === 'professeur')
                            <li><a href="{{ route('jeux.browse') }}">Browse</a></li>
                            <li><a href="{{ route('jeux.streams') }}">Streams</a></li>
                        @endif

                        <li>
                            @if(Auth::check())
                                <form method="POST" action="{{ route('auth.logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Se déconnecter</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-success">Se connecter</a>
                            @endif
                        </li>

                        <li>
                            @if(Auth::check())
                                <a href="{{ route('jeux.profiles') }}">
                                    Profile <img src="{{ asset('assets/images/profile-header.jpg') }}" alt="">
                                </a>
                            @else
                                <a href="{{ route('login') }}">
                                    Profile <img src="{{ asset('assets/images/profile-header.jpg') }}" alt="">
                                </a>
                            @endif
                        </li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>
