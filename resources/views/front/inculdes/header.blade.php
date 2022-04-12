<header class="header">

    <div class="header_top_section">
        <div class="container margin_rl">
            <div class="row">
                <div class="col-lg-1 col-4">
                    <div class="full">
                        <div class="logo">
                            <a href="{{ route('front.home') }}"><img src="{{ asset('front/images/orientation-tamkine-270x118.png') }}" alt="Tamkine JPOV" /></a>
                        </div>
                    </div>
                </div>
                <div class="hidden-lg-up col-8">
                    <div class="full">
                        <div class="main_menu text-right mt_2">
                                    <ul class="navbar-nav">
                                        @guest
                                            <li class="nav-item">
                                                <a class="nav-link color-grey-hover auth first" href="{{ route('login') }}">Se Connecter</a>
                                                @if (Route::has('register'))/
                                                <a class="nav-link color-grey-hover auth second" href="{{ route('register') }}">Espace Etudiant</a>
                                                @endif
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                {{--                                            Bienvenue, <a class="nav-link color-grey-hover auth first" href="javascript:void(0)">{{ Auth::user()->nom }}</a>--}}
                                                {{--                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">--}}
                                                {{--                                                <a class="dropdown-item" href="#">{{ __('My Account') }}</a>--}}
                                                {{--                                                <a class="dropdown-item @if(\Illuminate\Support\Facades\Auth::user()->first_name) has_value @endif" href="{{ route('logout') }}" onclick="event.preventDefault();--}}
                                                {{--                                                     document.getElementById('logout-form').submit();">{{ __('Sign Out') }}</a>--}}
                                                {{--                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
                                                {{--                                                    @csrf--}}
                                                {{--                                                </form>--}}
                                                {{--                                            </div>--}}
                                                <div class="dropdown">
                                                    <button class="btn_auth nav-link color-grey-hover" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Bienvenue, <span>{{ Str::before(Auth::user()->nom, ' ') }}</span>
                                                        <span data-letters="{{ substr(Auth::user()->nom,0,1).substr(Auth::user()->prenom,0,1) }}"></span>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item @if(\Illuminate\Support\Facades\Auth::user()->nom) has_value @endif" href="{{ route('profile.dashboard') }}">Mon Compte</a>
                                                        <a class="dropdown-item @if(\Illuminate\Support\Facades\Auth::user()->nom) has_value @endif" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">{{ __('Se déconnecter') }}</a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                        @endguest
                                    </ul>
                                    {{--                                    <ul class="navbar-nav">--}}
                                    {{--                                        <li class="nav-item">--}}
                                    {{--                                            <a class="nav-link" href="#"><img src="{{ asset('front/images/search_icon.png') }}" alt="#" /></a>--}}
                                    {{--                                        </li>--}}
                                    {{--                                    </ul>--}}

                        </div>
                    </div>
                </div>
                <div class="col-lg col-sm-12 site_information">
                    <div class="full">
                        <div class="main_menu">
                            <nav class="navbar navbar-inverse navbar-toggleable-md " >
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cloapediamenu" aria-controls="cloapediamenu" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="float-left">Menu</span>
                                    <span class="float-right"><i class="fa fa-bars"></i> <i class="fa fa-close"></i></span>
                                </button>
                                <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">
                                    <ul class="navbar-nav">
                                        <li class="nav-item active home">
                                            <a class="nav-link" href="{{ route('front.home') }}">Accueil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link color-aqua-hover" href="{{ route('front.salle') }}">Salles des universités</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link color-aqua-hover" href="{{ route('front.download') }}">Programme</a>
                                        </li>
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link color-grey-hover" href="time.html">Contactez-nous</a>--}}
{{--                                        </li>--}}
                                        <li class="nav-item contact">
                                            <a class="nav-link color-grey-hover" href="{{ route('front.contact') }}">Contactez-nous</a>
                                        </li>
                                        <div class="hidden_lg_down">
                                        @guest
                                        <li class="nav-item">
                                            <a class="nav-link color-grey-hover auth first" href="{{ route('login') }}">Se Connecter</a>
                                            @if (Route::has('register'))/
                                            <a class="nav-link color-grey-hover auth second" href="{{ route('register') }}">Espace Etudiant</a>
                                            @endif
                                        </li>
                                        @else
                                        <li class="nav-item">
                                            <div class="dropdown">
                                                <button class="btn_auth nav-link color-grey-hover" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Bienvenue, <span>{{ Str::before(Auth::user()->nom, ' ') }}</span>
                                                    <span data-letters="{{ substr(Auth::user()->nom,0,1).substr(Auth::user()->prenom,0,1) }}"></span>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item @if(\Illuminate\Support\Facades\Auth::user()->nom) has_value @endif" href="{{ route('profile.dashboard') }}">Mon Compte</a>
                                                    <a class="dropdown-item @if(\Illuminate\Support\Facades\Auth::user()->nom) has_value @endif" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">{{ __('Se déconnecter') }}</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                        @endguest
                                        <li>
                                            <a href="/sponsoring-jpov" class="btn btn-primary">Become Sponsor</a>
                                        </li>
                                        </div>
                                    </ul>
{{--                                    <ul class="navbar-nav">--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link" href="#"><img src="{{ asset('front/images/search_icon.png') }}" alt="#" /></a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
{{--<header class="header">--}}

{{--    <div class="header_top_section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-3">--}}
{{--                    <div class="full">--}}
{{--                        <div class="logo">--}}
{{--                            <a href="{{ route('front.home') }}"><img src="{{ asset('front/images/orientation_tamkine.png') }}" alt="Orientation Tamkine" /></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-9 site_information">--}}
{{--                    <div class="full">--}}
{{--                        <div class="main_menu">--}}
{{--                            <nav class="navbar navbar-inverse navbar-toggleable-md">--}}
{{--                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cloapediamenu" aria-controls="cloapediamenu" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                                    <span class="float-left">Menu</span>--}}
{{--                                    <span class="float-right"><i class="fa fa-bars"></i> <i class="fa fa-close"></i></span>--}}
{{--                                </button>--}}
{{--                                <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">--}}
{{--                                    <ul class="navbar-nav">--}}
{{--                                        <li class="nav-item active">--}}
{{--                                            <a class="nav-link" href="{{ route('front.home') }}">Accueil</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link color-aqua-hover" href="{{ route('front.salle') }}">Salle d’Orientation</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link color-aqua-hover" href="{{ route('front.download') }}">Télécharger</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item">--}}
{{--                                            --}}{{--                                            <a class="nav-link color-grey-hover" href="time.html">Contactez-nous</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link color-grey-hover" href="contact.html">Contactez-nous</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link color-grey-hover" href="{{ route('login') }}">Se connecter</a>/--}}
{{--                                            <a class="nav-link color-grey-hover" href="{{ route('register') }}">S'inscrire</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                    --}}{{--                                    <ul class="navbar-nav">--}}
{{--                                    --}}{{--                                        <li class="nav-item">--}}
{{--                                    --}}{{--                                            <a class="nav-link" href="#"><img src="{{ asset('front/images/search_icon.png') }}" alt="#" /></a>--}}
{{--                                    --}}{{--                                        </li>--}}
{{--                                    --}}{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </nav>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</header>--}}
