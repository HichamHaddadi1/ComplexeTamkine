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
  <link rel="stylesheet" href="{{ asset('dist/css/style_badr.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <a href="{{ route('fermer.salles') }}" class="nav-link">Fermer les salles ouvertes</a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Déconnexion') }}
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

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4"
  style="background: linear-gradient(to bottom, #000066 10%, #66ccff 100%);">
    <!-- Brand Logo -->
    <a href="{{ route('profile.dashboard') }}" class="brand-link">
      <img src="{{ asset('dist/img/logo_tamkine_white.png') }}" alt="logo tamkine" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light text-white">Orientation</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel my-3 pb-3 d-flex">
        <div class="icon-profile">
            <i class="fas fa-user-alt"></i>
         </div>
        <div class="info">
          <a  class="d-block">{{ Auth::user()->prenom .' '.Auth::user()->nom }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item {{ Route::currentRouteName() == 'profile.info'  ? 'menu-is-opening menu-open' : '' }}">
            <a class="nav-link">
              <i class="fas fa-user-circle" aria-hidden="true"></i>
              <p>
                Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('profile.info') }}" class="nav-link">
                  <i class="far fa-user"  aria-hidden="true"></i>
                  <p>Mon compte</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ Request::is('admin/salles') || Request::is('admin/orientateur') ? 'menu-is-opening menu-open' : '' }}">
            <a class="nav-link">
                <i class="fa fa-users" aria-hidden="true"></i>
              <p>
                Les universités
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('orintateur.liste') }}" class="nav-link test">
                  <i class="fa fa-list" aria-hidden="true"></i>
                  <p>Liste des universités</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
          <li class="nav-item {{ Request::is('admin/users') ? 'menu-is-opening menu-open' : '' }}">
            <a class="nav-link">
                <i class="far fa-user"></i>
              <p>
                Participants
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <p>Liste des participants</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ Request::is('admin/intervenants') ? 'menu-is-opening menu-open' : '' }}">
            <a class="nav-link">
                <i class="far fa-user"></i>
              <p>
                Intervenants
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.intervenants.index') }}" class="nav-link">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <p>Liste des intervenants</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ Request::is('admin/programmes') ? 'menu-is-opening menu-open' : '' }}">
            <a class="nav-link">
                <i class="far fa-file"></i>
                <p>
                  Programmes
                  <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.programmes.index')}}" class="nav-link">
                   <i class="far fa-file"></i>
                   <p>Liste des programmes</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ Request::is('admin/enregistrements') ? 'menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link">
               <i class="fas fa-microphone"></i>
               <p>
                 Enregistrements
                 <i class="fas fa-angle-left right"></i>
               </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.enregistrements')}}" class="nav-link">
                  <i class="fas fa-microphone"></i>
                  <p>Tous</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">Autres</li>
            <li class="nav-item">
                <a href="{{route('admin.editions.index')}}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>
                        Editions
                    </p>
                </a>
            </li> <!-- fin Edition -->

             <li class="nav-item">
               <a href="https://analytics.google.com/" target="_blank" class="nav-link">
                 <i class="nav-icon far fa-calendar-alt"></i>
                 <p>
                   Statistiques
                 </p>
               </a>
             </li><!-- fin Statistiques -->

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/main.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
{{-- <script src="{{ asset ('plugins/chart.js/Chart.min.js') }}"></script> --}}
<!-- AdminLTE for demo purposes -->

{{-- <script src="{{ asset('dist/js/demo.js') }}"></script> --}}
<script src="{{ asset('dist/js/script_zineb.js') }}"></script>
<script src="{{ asset('dist/js/script_badr.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> --}}
{{-- sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
{{-- <script src="{{ asset('dist/js/pages/dashboard3.js') }}"></script> --}}
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
    <strong>Copyright &copy; 2021 <a href="http://tamkine.org/">TAMKINE Technologies</a>.</strong>
    Tous les droits sont réservés.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.0.0
    </div>
  </footer>
</div>
<script>

// for sidebar menu entirely but not cover treeview
// $('ul.nav-sidebar a').filter(function() {
// 	 return this.href == url;
// }).parent().addClass('menu-open');
// ul.nav-sidebar>li>ul

$(document).ready(function(){
  if($('ul.nav-sidebar>li>ul>li>a').hasClass('active')){
   $(this).parent().prev().addClass('menu-open');
  }
});
// if($('ul.nav-sidebar>li>ul>li>a').hasClass('nav-link')){
//   console.log('true');
// }

// for treeview
// $('ul.treeview-menu a').filter(function() {
// 	 return this.href == url;
// }).parentsUntil(".nav-sidebar > .treeview-menu").addClass('menu-open');
//
// var url = window.location;
// console.log(url);
</script>
</body>
</html>
