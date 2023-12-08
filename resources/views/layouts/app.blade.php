<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>A vos plats !</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Mukta:wght@300;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <script>
        function confirmDelete() {
            // J'utilise window.confirm pour afficher une boite de dialogue
            var confirmation = window.confirm("Êtes-vous sûr de vouloir supprimer votre compte?")
            // Retourne true si l'utilisateur clique sur Ok, false sinon sur Annuler
            return confirmation;
        }
    </script>
</head>

<body>
    <header>
        <div id="app">
            <nav class="navbar navbar-expand-md">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img id="logo-header" src="{{ asset('images/logoHeader.png') }}" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <div>
                                        @auth
                                            <a href="{{ url('/home') }}">
                                                <img id="photo_profil" class="rounded-circle" src="{{ asset('photos_de_profil/' . Auth::user()->photo) }}" alt="Photo de profil">
                                            </a>
                                        @else
                                            <div>
                                                <a href="#">A propos</a>
                                                <a href="#">Contact</a>
                                            </div>

                                            <a href="{{ route('login') }}">Se connecter</a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}">Créer un compte</a>
                                            @endif
                                        </li>
                                        @endauth
                                    </div>
                                @endif
                            @else
                                <a href="#">A propos</a>
                                <a href="#">Contact</a>
                                <a href="{{ url('/home') }}"><img id="photo_profil" class="rounded-circle"
                                        src="{{ asset('photos_de_profil/' . Auth::user()->photo) }}"
                                        alt="Photo de profil"></a>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre></a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('/home') }}">Mon profil</a>
                                        <a class="dropdown-item"
                                            href="{{ route('editUser', $user = Auth::user()) }}">{{ __('Modifier mes informations') }}</a>
                                        <a class="dropdown-item"
                                            href="{{ route('editPasswordUser', $user = Auth::user()) }}">{{ __('Modifier mon mot de passe') }}</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Me déconnecter') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                    <a href="{{ redirect()->back() }}">Retour</a>
                </div>
            </nav>
        </header>
            <div class="container-fluid text-center">
                @if (session()->has('message'))
                    <p class="alert alert-success">{{ session()->get('message') }}</p>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            @yield('content')

        </div>

        <footer class="d-flex flex-column justify-content-end">
            <div id="footer-infos" class="d-flex justify-content-around align-items-center">
                <div>
                    <img src="{{ asset('images/logoFooter.png') }}" id="logoFooter" alt="">
                </div>
                <div class="d-flex align-items-center">
                    <p class="m-0">Ne ratez rien de notre actualité, suivez-nous :</p>
                    <i class="fa-brands fa-facebook ps-3"></i>
                    <i class="fa-brands fa-instagram ps-2"></i>
                </div>
                <div>
                    <nav>
                        <ul class="list-unstyled text-center">
                            <li><a class="text-decoration-none" href="">A propos</a></li>
                            <li><a class="text-decoration-none" href="">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div id="copy" class="bg-black">
                <p class="m-0 text-center">Copyright © 2023 | Propulsé par Hélène LAUNAY | <a class="text-decoration-none" href="">Mentions légales</a> | <a
                    class="text-decoration-none" href="">Politiques de confidentialités</a></p>
            </div>
        </footer>
        
        
        </body>
        
        </html>

