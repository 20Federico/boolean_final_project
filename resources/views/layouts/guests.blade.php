<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <title>@yield('title')</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous" defer></script>

        {{-- @yield('head_extra') --}}
    </head>
    <body>
        <header>
            <div id="app">
                <nav class="sb-topnav navbar navbar-expand main-nav">
                    <!-- Navbar Brand-->
                    <a class="navbar-brand ps-3" href="{{route('admin.home')}}">BoolBnB</a>

                    <!-- Sidebar Toggle-->
                    {{-- <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button> --}}
                    
                    {{-- logout dropdown --}}
                    <ul class="navbar-nav ms-auto pe-3">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user fa-fw"></i>
                            </a>
        
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
        
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            @yield('content')
        </main>

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div>
                    <div class="row row-cols-4">
                        <div class="col"><strong>Assistenza</strong>
                            <div class="mt-3">
                                <ul class="assistenza">
                                    <li><a href="#">Centro Assistenza</a></li>
                                    <li><a href="#">Informazioni di sicurezza</a></li>
                                    <li><a href="#">Opzioni di cancellazione</a></li>
                                    <li><a href="#">Accessibilità per tutti</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col"><strong>Community</strong>
                            <div class="mt-3">
                                <ul class="community">
                                    <li><a href="#">Airbnb.org: un rifugio sicuro</a></li>
                                    <li><a href="#">Tutte le info sulla nostra community</a></li>
                                    <li><a href="#">Entra nella community</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col"><strong>Ospitare</strong>
                            <div class="mt-3">
                                <ul class="ospitare">
                                    <li><a href="#">Prova a ospitare</a></li>
                                    <li><a href="#">AirCover: host protetti</a></li>
                                    <li><a href="#">Esplora le risorse per host</a></li>
                                    <li><a href="#">Vai al nostro forum</a></li>
                                    <li><a href="#">Come ospitare responsabilmente</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col"><strong>Informazioni</strong>
                            <div class="mt-3">
                                <ul class="informazioni">
                                    <li><a href="#">Newsroom</a></li>
                                    <li><a href="#">Scopri le nuove funzionalità</a></li>
                                    <li><a href="#">Lettera dai nostri fondatori</a></li>
                                    <li><a href="#">Opportunità di lavoro</a></li>
                                    <li><a href="#">Investitori</a></li>
                                    <li><a href="#">Airbnb Luxe</a></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    <hr>
                </div>
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your BoolBnB 2022</div>

                    <div class="social">
                        <a href="https://it-it.facebook.com/"><i class="fab fa-facebook fa-lg me-2"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg me-2"></i></a>
                        <a href="https://twitter.com/"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>

                    <div class="privacy">
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>