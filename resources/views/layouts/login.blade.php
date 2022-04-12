<!DOCTYPE html>

<html lang="en">

<!-- Basic -->

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->

<title>Orientation</title>

<meta name="keywords" content="">

<meta name="description" content="">

<meta name="author" content="">

<!-- site icon -->

{{--<link rel="icon" href="{{ asset('front/images/logo.png') }}" type="favicon/png" />--}}

<link rel="icon" href="{{ asset('front/images/orientation-tamkine-32x32.png') }}" type="favicon/png" sizes="32x32">

<link rel="icon" href="{{ asset('front/images/orientation-tamkine-192x192.png') }}" sizes="192x192">

<link rel="apple-touch-icon-precomposed" href="{{ asset('front/images/orientation-tamkine-180x180.png') }}" sizes="180x180">

<!-- Bootstrap core CSS -->

<link href="{{ asset('front/css/bootstrap.css') }}" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->

<link href="{{ asset('front/css/font-awesome.min.css') }}" rel="stylesheet">

<!-- Custom styles for this template -->

<link href="{{ asset('front/css/style.css') }}" rel="stylesheet">

<!-- Responsive styles for this template -->

<link href="{{ asset('front/css/responsive.css') }}" rel="stylesheet">

<!--[if lt IE 9]>

<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-192719815-1"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());

 gtag('config', 'UA-192719815-1');
</script>

</head>

<body @yield('body')>

 @yield('content')

 <script src="{{ asset('front/js/jquery.min.js') }}"></script>

 <script>

     @yield('js')

 </script>

</body>

</html>

