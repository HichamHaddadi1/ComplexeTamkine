<!DOCTYPE html>

<html lang="fr-FR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Orientation</title>
  <!-- site icon -->
  <link rel="icon" href="{{ asset('front/images/orientation-tamkine-32x32.png') }}" type="favicon/png" sizes="32x32">
  <link rel="icon" href="{{ asset('front/images/orientation-tamkine-192x192.png') }}" sizes="192x192">
  <link rel="apple-touch-icon-precomposed" href="{{ asset('front/images/orientation-tamkine-180x180.png') }}" sizes="180x180">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
   <link rel="stylesheet" href="{{ asset('dist/css/style_zineb.css') }}">
   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-192719815-1"></script>
   <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());

         gtag('config', 'UA-192719815-1');
    </script>
</head>

<!--
`body` tag options:
  Apply one or more of the following classes to to the body tag
  to get the desired effect
  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
              <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                  </li>
                  <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('front.home') }}" class="nav-link">Accueil</a>
                  </li>
                  <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('front.contact') }}" class="nav-link">Contact</a>
                  </li>
              </ul>

              <!-- Right navbar links -->
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('D??connexion') }}
                              <i class="fas fa-sign-out-alt"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </li>
                </ul>
              </nav>
              <!-- /.navbar -->
        </nav>
        <!-- /.navbar -->



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar-participant">
    <!-- Brand Logo -->
    <a href="{{ route('front.home') }}" class="brand-link">
      <img src="{{ asset('dist/img/logo_tamkine_white.png') }}" alt="Logo Tamkine White" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">JPOV</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="icon-profile">
               <i class="fas fa-user-alt"></i>
            </div>
            <div class="info">
              <div class="d-block">{{ ucfirst(Auth::user()->prenom) .' '.ucfirst(Auth::user()->nom) }}</div>
            </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('profile.info')}}" class="nav-link">
                    <i class="far fa-user"></i>&nbsp;&nbsp;
                    <p>
                       Mon compte
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('participant.salle_ouvert')}}" class="nav-link">
                    <i class="fas fa-laptop"></i>&nbsp;&nbsp;
                    <p>
                        Salles Ouvertes  <span class="badge badge_ouverts">{{ \App\Salle::where([['id', '!=', 1],['is_running', true]])->count() }}</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('participant.salles')}}" class="nav-link">
                    <i class="far fa-calendar-check"></i>&nbsp;&nbsp;
                    <p>
                       Salles des Univerisites<span class="badge badge_ouverts" style="width: 30px;">{{ \App\Salle::where([['id', '!=', 1],['is_running', false]])->count() }}</span>
                    </p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <!-- Contenu de la page -->
        @yield('content')
        <!-- Fin contenu de la page-->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    Copyright &copy; {{ now()->year }} <strong><a href="#">TAMKINE Technologies</a>.</strong>
      Tous les droits sont r??serv??s.
{{--    <div class="float-right d-none d-sm-inline-block">--}}
{{--      <b>Version</b> 2.0.0--}}
{{--    </div>--}}
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('dist/js/main.js') }}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset ('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard3.js') }}"></script>
    <!-- script zineb -->
    <script src="{{ asset('dist/js/script_zineb.js') }}"></script>
</body>

</html>

