<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

        <!-- Styles -->
        <style>
            html, body {
                background: linear-gradient(to bottom, #1010a7 0%, #928089 100%);
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }
            .btn{
                background-color: #0f3d66;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            {{-- <div class="code">
                @yield('code')
            </div> --}}
            
            <div class="jumbotron jumbotron rounded shadow-md">
                <div class="container">
                    <h1 class="text-center"><span class="badge badge-danger">Attention</span></h1>
                    <hr class="my-2">
                    <h2 class="lead">@yield('message')</h2>
                    <p class="lead">
                        <a class="btn btn-secondary btn-lg float-right" href="/" role="button" style="">Retour</a>
                    </p>
                </div>
            </div>
            {{-- <div class="message" style="padding: 10px;">
                @yield('message')
            </div>
        <p class="d-flex justify-content-center">
            <a href="/" class="btn btn-secondary mt-2">
                <i class="fas fa-backward" aria-hidden="true"></i>
                précédent</a> --}}
        </p>
        </div>
    </body>
</html>