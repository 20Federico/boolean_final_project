<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        {{-- tomtom --}}
        <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps.css' />
        <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps-web.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <title>@yield('title')</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous" defer></script>

        @yield('head_extra')
    </head>
    <body>
      <div id="app">
        <nav class="sb-topnav navbar navbar-expand main-nav">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{route('admin.apartments.index')}}">BoolBnB</a>

            {{-- logout dropdown --}}
            <ul class="navbar-nav ms-auto pe-3 d-flex align-items-center">
              <!-- Authentication Links -->
                          
            <div class="sb-sidenav-footer text-light me-2">
                {{-- <div class="small">Logged in as:</div> --}}
                @if (Auth::user()->name)
                {{ Auth::user()->name }} {{-- <span class="surname d-none">{{ Auth::user()->surname }}</span> --}}
                @else    
                {{substr(Auth::user()->email, 0, strpos(Auth::user()->email, '@' ))  }}
                @endif
            </div>
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
              <!-- Sidebar Toggle-->
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!" style="color: #d48166"><i class="fas fa-bars"></i></button>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            {{-- <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{route('admin.home')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a> --}}
                            <div class="sb-sidenav-menu-heading">Area Personale</div>
                            <a class="nav-link" href="{{route('admin.apartments.index')}}">
                              <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                              I Miei Appartamenti
                            </a>
                            <a class="nav-link" href="{{route('admin.messages.index')}}">
                              <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                              Messaggi
                            </a>
                            <div class="sb-sidenav-menu-heading">Pubblica</div>
                            <a class="nav-link" href="{{route('guests.home')}}">
                              <div class="sb-nav-link-icon"><i class="fas fa-window-restore"></i></div>
                              Area Pubblica
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid p-0 p-md-5">
                      @yield('content')
                    </div>
                </main>
                <footer class="py-5 bg-light mt-auto border-top">
                    <div class="container">
                        <div>
                            <div class="row row-cols-1 row-cols-sm-4 d-flex flex-column flex-sm-row">
                                <div class="col ps-4"><strong>Assistenza</strong>
                                    <div class="mt-3 border-bottom w-100">
                                        <ul class="assistenza w-100">
                                            <li><a href="#">Centro Assistenza</a></li>
                                            <li><a href="#">Informazioni di sicurezza</a></li>
                                            <li><a href="#">Opzioni di cancellazione</a></li>
                                            <li><a href="#">Accessibilità per tutti</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col ps-4 mt-3 mt-sm-0"><strong>Community</strong>
                                    <div class="mt-3 border-bottom border-bottom w-100">
                                        <ul class="community w-100">
                                            <li><a href="#">Airbnb.org: un rifugio sicuro</a></li>
                                            <li><a href="#">Tutte le info sulla nostra community</a></li>
                                            <li><a href="#">Entra nella community</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col ps-4 mt-3 mt-sm-0"><strong>Ospitare</strong>
                                    <div class="mt-3 border-bottom w-100">
                                        <ul class="ospitare w-100">
                                            <li><a href="#">Prova a ospitare</a></li>
                                            <li><a href="#">AirCover: host protetti</a></li>
                                            <li><a href="#">Esplora le risorse per host</a></li>
                                            <li><a href="#">Vai al nostro forum</a></li>
                                            <li><a href="#">Come ospitare</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col ps-4 mt-3 mt-sm-0"><strong>Informazioni</strong>
                                    <div class="mt-3 w-100">
                                        <ul class="informazioni w-100">
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
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between small">
                            <div class="privacy">
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
        
                            <div class="social my-4">
                                <a href="https://it-it.facebook.com/" target="_blank"><i class="fab fa-facebook fa-lg me-2"></i></a>
                                <a href="https://www.instagram.com/boolbnb/" target="_blank"><i class="fab fa-instagram fa-lg me-2"></i></a>
                                <a href="https://twitter.com/bn_bool" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
                            </div>
                            <div class="text-muted">Copyright &copy; Your BoolBnB 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
      </div>
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.15.0/services/services-web.min.js"></script>
      @yield('extra_scripts')
    </body>
</html>
