<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Site Metas -->
<title>JPOV TAMKINE</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- site icon -->
{{-- <link rel="icon" href="{{ asset('front/images/logo.png') }}" type="favicon/png" /> --}}
<link rel="icon" href="{{ asset('front/images/orientation-tamkine-32x32.png') }}" type="favicon/png" sizes="32x32">
<link rel="icon" href="{{ asset('front/images/orientation-tamkine-192x192.png') }}" sizes="192x192">
<link rel="apple-touch-icon-precomposed" href="{{ asset('front/images/orientation-tamkine-180x180.png') }}"
    sizes="180x180">
<!-- Bootstrap core CSS -->
<link href="{{ asset('front/css/bootstrap.css') }}" rel="stylesheet">
<!-- FontAwesome Icons core CSS -->
<link href="{{ asset('front/css/font-awesome.min.css') }}" rel="stylesheet">
<!-- Custom animate styles for this template -->
<link href="{{ asset('front/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('front/js/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

<!-- Custom styles for this template -->
<link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
<!-- Responsive styles for this template -->
<link href="{{ asset('front/css/responsive.css') }}" rel="stylesheet">
<!-- Colors for this template -->
<link href="{{ asset('front/css/colors.css') }}" rel="stylesheet">
<!-- light box gallery -->
<link href="{{ asset('front/css/ekko-lightbox.css') }}" rel="stylesheet">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-192719815-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-192719815-1');
</script>


</head>

<body @yield('body')>
    <!-- header -->
    @include('front.inculdes.header')
    <!-- end header -->

    @yield('content')
    {{-- <div id="overlayPopup" class="overlayPopup" style="display: block;"> --}}
    {{-- <div id="popup1" class="popup-content"> --}}
    {{-- <div class="headerPopup"> --}}
    {{-- <div id="closeBtn" class="closeBtn"> --}}
    {{-- <i class="fa fa-times-circle" onclick="overlayPopup.style.display='none'"></i> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- <div class="content"> --}}
    {{-- <div style="margin:25px"> --}}
    {{-- <div> --}}
    {{-- <h3 style="text-align: center" class="">Recevez nos derniers tutoriels</h3> --}}
    {{-- </div> --}}

    {{-- <div class="email_text"> --}}
    {{-- <i class="fa fa-envelope"></i> Veuillez entrer votre  adresse email --}}
    {{-- </div> --}}
    {{-- <div class="row"> --}}
    {{-- <div class="col-12"> --}}
    {{-- <div class="form-group floating-label-form-group controls"> --}}
    {{-- <input type="text" class="form-control" id="email" name="name" placeholder="Votre email ..." style=" background-color: white"> --}}
    {{-- <p class="help-block text-danger">qsdqsdqs</p> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}


    {{-- <div style="text-align:right; padding-top:24pt"> --}}
    {{-- <span>Vous n'avez pas de compte ?</span><a href="">S'inscrire</a> --}}
    {{-- <button class="btn btn-primary" id="newsletter" name="newsletter">Se Connecter</button> --}}
    {{-- </div> --}}
    {{-- <div class="row"> --}}
    {{-- <div class="col-md-8 text-md-right text-sm-center register"><span>Vous n'avez pas de compte ?</span><a href="">S'inscrire</a></div> --}}
    {{-- <div class="col-md-4 text-md-right text-sm-center"><button class="btn btn-primary" id="newsletter" name="newsletter">Se Connecter</button></div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}

    {{-- </div> --}}
    {{-- </div> --}}

    {{-- <div id="overlayPopup" class="overlayPopup" style="display: block;"> --}}
    {{-- <div id="popup1" class="popup-content"> --}}
    {{-- <div class="headerPopup"> --}}
    {{-- <div id="closeBtn" class="closeBtn"> --}}
    {{-- <i class="fa fa-times-circle" onclick="overlayPopup.style.display='none'"></i> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- <div class="content"> --}}
    {{-- <div class="row"> --}}
    {{-- <div class="col-md-7 form_login"> --}}
    {{-- <form method="POST" action="{{ route('login') }}"> --}}

    {{-- @csrf --}}

    {{-- <div class="form-group"> --}}
    {{-- <label for="exampleInputEmail1">Adresse E-mail</label> --}}
    {{-- <input name="email" placeholder="name@exemple.com" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
    {{-- @error('email') --}}
    {{-- <small id="emailHelp" class="form-text text-muted">{{ $message }}</small> --}}
    {{-- @endif --}}
    {{-- </div> --}}
    {{-- <div class="text-right"> --}}
    {{-- <button type="submit" class="btn_login btn_primary">Se connecter</button> --}}
    {{-- </div> --}}
    {{-- </form> --}}
    {{-- </div> --}}
    {{-- <div class="col-md-5 text-center form_register"> --}}
    {{-- <span>Vous n'avez pas de compte ?</span><br><a href="{{ route('register') }}">Cliquez ICI pour s'inscrire !</a> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}

    {{-- </div> --}}
    {{-- </div> --}}


    <!-- section -->
    {{-- <section class="layout_padding section"> --}}
    {{-- <div class="container-fluid"> --}}
    {{-- <div class="row"> --}}
    {{-- <div class="col-lg-12 text_align_center"> --}}
    {{-- <div class="full heading_s1"> --}}
    {{-- <h2>Our Coaching Time</h2> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- <div class="row"> --}}
    {{-- <div class="col-md-12 cours_timging_bg"> --}}
    {{-- <div class="container"> --}}
    {{-- <div class="time_table"> --}}
    {{-- <ul><li>Monday</li><li>8 Am - 6 Pm</li></ul> --}}
    {{-- <ul><li>Tuesday</li><li>9 Am - 5 Pm</li></ul> --}}
    {{-- <ul><li>Wednesday</li><li>10 Am - 8 Pm</li></ul> --}}
    {{-- <ul><li>Thursday</li><li>8  Am - 6 Pm</li></ul> --}}
    {{-- <ul><li>Friday</li><li>6 Am - 4 Pm</li></ul> --}}
    {{-- <ul><li>Saturday</li><li>9 Am - 5 Pm</li></ul> --}}
    {{-- <ul><li>Sunday</li><li>Holiday</li></ul> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </section> --}}
    <!-- end section -->

    <!-- section -->
    {{-- <section class="layout_padding section"> --}}
    {{-- <div class="container-fluid"> --}}
    {{-- <div class="row"> --}}
    {{-- <div class="col-lg-12 text_align_center"> --}}
    {{-- <div class="full heading_s1"> --}}
    {{-- <h2>Our Success Stories</h2> --}}
    {{-- </div> --}}
    {{-- <div class="full"> --}}
    {{-- <p class="large">In ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>consequat. Duis aute irure dolor in re</p> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- <div class="col-md-12 testimonial"> --}}
    {{-- <div class="full text_align_center"> --}}
    {{-- <img src="{{ asset('front/images/testimon.png') }}" alt="#" /> --}}
    {{-- <h3><span class="theme_color_text">koluda</span><br><small>Student</small></h3> --}}
    {{-- </div> --}}
    {{-- <div class="full margin_top_30 text_align_center"> --}}
    {{-- <h4>I have successfully complated</h4> --}}
    {{-- <p>adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud<br>exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in re</p> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </section> --}}
    <!-- end section -->


    <!-- section -->
    {{-- <section class="section blue_pattern_bg" style="background-color: #3b3bff;"> --}}
    {{-- <div class="container"> --}}
    {{-- <div class="row"> --}}
    {{-- <div class="col-md-6"> --}}
    {{-- <div class="full"> --}}
    {{-- <h4>Subscribe Now to Our Newsletter !</h4> --}}
    {{-- <p>adipiscing elit, sed do eiusmod tempor incididunt ut<br>labore et dolore magna aliqua.</p> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- <div class="col-md-6"> --}}
    {{-- <div class="form_subribe"> --}}
    {{-- <form> --}}
    {{-- <input type="email" name="email" placeholder="Enter Your Email" /> --}}
    {{-- <button>Subscribe</button> --}}
    {{-- </form> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </section> --}}
    <!-- end section -->

    @include('front.inculdes.footer')
    <!-- Core JavaScript
   ================================================== -->
    <script src="{{ asset('front/js/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="{{ asset('front/js/tether.min.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/parallax.js') }}"></script>
    <script src="{{ asset('front/js/animate.js') }}"></script>
    <script src="{{ asset('front/js/ekko-lightbox.js') }}"></script>
    <script src="{{ asset('front/js/custom.js') }}"></script>
    <script src="{{ asset('front/js/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
    <script src="{{ asset('front/js/aos/aos.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
    @yield('js')
</body>

</html>
