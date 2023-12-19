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

        function enableSubmit() {
            var checkBox = document.getElementById("acceptTerms");
            var submitBtn = document.getElementById("submitBtn");

            submitBtn.disabled = !checkBox.checked;
        }
    </script>

</head>

<body>
    <header>
        <div id="app">
            <nav class="navbar navbar-expand-md">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <div id="logo-header">
                            <img src="{{ asset('images/logoFooter.png') }}" alt="logo A vos plats!">
                            <img src="{{ asset('images/Logo-txt.png') }}" alt="">
                        </div>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}"
                        style="background-color: white">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <div id="box-link-nav-mobile">
                                        @auth
                                            <a id="home-img" href="{{ url('/home') }}">
                                                <img id="photo_profil" class="rounded-circle"
                                                    src="{{ asset('photos_de_profil/' . Auth::user()->photo) }}"
                                                    alt="Photo de profil">
                                            </a>
                                        @else
                                            <div id="link-nav" class="d-flex justify-content-end">
                                                <a href="{{ url('/apropos') }}">A propos</a>
                                                <a href="{{ route('editFormContact') }}">Contact</a>
                                            </div>

                                            <div id="links-login" class="d-flex justify-content-end flex-column">
                                                <a class="dropdown-item" href="{{ route('login') }}">Se connecter</a>
                                                <a class="dropdown-item" href="{{ route('register') }}">Créer un compte</a>
                                            </div>
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><i class="fa-solid fa-user"></i></a>
                                            <div id="nav-connexion" class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('login') }}">Se connecter</a>
                                                <a class="dropdown-item" href="{{ route('register') }}">Créer un compte</a>
                                            </div>




                                        @endauth
                                    </div>
                                @endif
                            @else
                                <div id="link-nav-mobile" class="d-flex">
                                    <div id="link-nav-mobile-menu" class="d-flex align-items-center">
                                        <a href="{{ url('/apropos') }}">A propos</a>
                                        <a href="{{ route('editFormContact') }}">Contact</a>
                                    </div>
                                    <div id="navbarUserConnectMobile" class="d-flex flex-column d-md-none">
                                        <a href="{{ url('/home') }}">Mon profil</a>
                                        <a href="{{ route('editUser', $user = Auth::user()) }}">{{ __('Modifier mes informations') }}</a>
                                        <a href="{{ route('editPasswordUser', $user = Auth::user()) }}">{{ __('Modifier mon mot de passe') }}</a>
                                        @if (Auth::user()->role_id == 2)
                                            <a href="{{ route('indexBackOffice') }}">{{ __('Espace Administrateur') }}</a>
                                        @endif
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                            {{ __('Me déconnecter') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                    <div  id="menu-user-connect" class="d-flex align-items-center d-none d-md-flex">
                                        <a href="{{ url('/home') }}"><img id="photo_profil" class="rounded-circle"
                                                src="{{ asset('photos_de_profil/' . Auth::user()->photo) }}"
                                                alt="Photo de profil"></a>
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdownMobile" class="nav-link dropdown-toggle" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" v-pre></a>

                                            <div id="navbar-drop-connect" class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="navbarDropdown">
                                                
                                                <a class="dropdown-item" href="{{ url('/home') }}">Mon profil</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('editUser', $user = Auth::user()) }}">{{ __('Modifier mes informations') }}</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('editPasswordUser', $user = Auth::user()) }}">{{ __('Modifier mon mot de passe') }}</a>
                                                @if (Auth::user()->role_id == 2)
                                                    <a class="dropdown-item"
                                                        href="{{ route('indexBackOffice') }}">{{ __('Espace Administrateur') }}</a>
                                                @endif
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
                                    </div>

                                @endguest
                            </div>
                        </ul>
                    </div>
                    {{-- <a href="{{ redirect()->back() }}">Retour</a> --}}
                </div>
            </nav>
        </div>
    </header>
    <div class="container-fluid text-center">
        @if (session()->has('message'))
            <p class="alert alert-success mt-3">{{ session()->get('message') }}</p>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    @yield('content')



    <footer class="d-flex flex-column justify-content-end">
        <div id="footer-infos" class="d-flex justify-content-around align-items-center">
            <div>
                <img src="{{ asset('images/logoFooter.png') }}" id="logoFooter" alt="">
            </div>
            <div id="socialLinks-box" class="">
                <div>
                    <p class="m-0">Ne ratez rien de notre actualité, suivez-nous :</p>
                </div>
                <div>
                    <a href="#"><i class="fa-brands fa-facebook ps-3"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram ps-2"></i></a>
                </div>
            </div>
            <div>
                <nav>
                    <ul class="list-unstyled text-center">
                        <li><a class="text-decoration-none" href="{{ url('/apropos') }}">A propos</a></li>
                        <li><a class="text-decoration-none" href="{{ route('editFormContact') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div id="copy" class="bg-black">
            <p class="m-0 text-center">Copyright © 2023 | Propulsé par Hélène LAUNAY | <a class="text-decoration-none"
                    href="{{ url('/mentionsLegales') }}">Mentions légales</a> | <a class="text-decoration-none"
                    href="{{ url('/rgpd') }}">Politiques de confidentialités</a></p>
        </div>
    </footer>



</body>

</html>
