@extends('layouts.login')



@section('content')

    {{--    <!-- section -->--}}

    {{--    <section class="main_full inner_page">--}}

    {{--        <div class="container-fluid">--}}

    {{--            <div class="row">--}}

    {{--                <div class="full">--}}

    {{--                    <h3>S'inscrire</h3>--}}

    {{--                </div>--}}

    {{--            </div>--}}

    {{--        </div>--}}

    {{--    </section>--}}

    {{--    <!-- end section -->--}}



    <!-- section -->

    <section class="layout_padding section auth_section">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 text_align_center">

                    <div class="text-center">

                        <a href="{{ route('front.home') }}"><img src="{{ asset('front/images/orientation-tamkine-100x100.png') }}" width="100" height="100" class="rounded" alt="orientation tamkine"></a>

                    </div>

                    <div class="full">

                        <h2 class="header_text">Se connecter</h2>

                    </div>

                    {{--                    <div class="full">--}}

                    {{--                        <p class="large">Les Journées Nationales d'Accompagnement et d'Orientation Virtuelles</p>--}}

                    {{--                    </div>--}}

                </div>

            </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="contact_section w-50 mx-auto mt-5 " style="margin-bottom: 20%;">


                        <div class="row">

                            <div class="col-md-10 offset-md-1">

                                <div class="form_cont">

                                    <form method="POST" action="{{ route('admin.login') }}">

                                        @csrf



                                        <fieldset>







                                            <div class="field">

                                                <input type="email" class="input_auth" value="{{ old('email') }}" name="email" placeholder="Adresse e-mail (Exemple: xyz@xyz.com)">

                                                @error('email')

                                                <span class="invalid-feedback" role="alert">

                                                        <strong>{{ $message }}</strong>

                                                    </span>

                                                @enderror

                                            </div>
                                            <div class="field">

                                                <input type="password" class="input_auth" name="password" placeholder="Mot de passe">

                                                @error('password')

                                                <span class="invalid-feedback" role="alert">

                                                        <strong>{{ $message }}</strong>

                                                    </span>

                                                @enderror

                                            </div>

                                            <div class="field center">

                                                <button type="submit">Se connecter</button>

                                            </div></fieldset>



                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- end section -->

    {{--<div class="container">--}}

    {{--    <div class="row justify-content-center">--}}

    {{--        <div class="col-md-8">--}}

    {{--            <div class="card">--}}

    {{--                <div class="card-header">{{ __('Login') }}</div>--}}



    {{--                <div class="card-body">--}}

    {{--                    <form method="POST" action="{{ route('login') }}">--}}

    {{--                        @csrf--}}



    {{--                        <div class="form-group row">--}}

    {{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}



    {{--                            <div class="col-md-6">--}}

    {{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}



    {{--                                @error('email')--}}

    {{--                                    <span class="invalid-feedback" role="alert">--}}

    {{--                                        <strong>{{ $message }}</strong>--}}

    {{--                                    </span>--}}

    {{--                                @enderror--}}

    {{--                            </div>--}}

    {{--                        </div>--}}



    {{--                        <div class="form-group row">--}}

    {{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}



    {{--                            <div class="col-md-6">--}}

    {{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}



    {{--                                @error('password')--}}

    {{--                                    <span class="invalid-feedback" role="alert">--}}

    {{--                                        <strong>{{ $message }}</strong>--}}

    {{--                                    </span>--}}

    {{--                                @enderror--}}

    {{--                            </div>--}}

    {{--                        </div>--}}



    {{--                        <div class="form-group row">--}}

    {{--                            <div class="col-md-6 offset-md-4">--}}

    {{--                                <div class="form-check">--}}

    {{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}



    {{--                                    <label class="form-check-label" for="remember">--}}

    {{--                                        {{ __('Remember Me') }}--}}

    {{--                                    </label>--}}

    {{--                                </div>--}}

    {{--                            </div>--}}

    {{--                        </div>--}}



    {{--                        <div class="form-group row mb-0">--}}

    {{--                            <div class="col-md-8 offset-md-4">--}}

    {{--                                <button type="submit" class="btn btn-primary">--}}

    {{--                                    {{ __('Login') }}--}}

    {{--                                </button>--}}



    {{--                                @if (Route::has('password.request'))--}}

    {{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}

    {{--                                        {{ __('Forgot Your Password?') }}--}}

    {{--                                    </a>--}}

    {{--                                @endif--}}

    {{--                            </div>--}}

    {{--                        </div>--}}

    {{--                    </form>--}}

    {{--                </div>--}}

    {{--            </div>--}}

    {{--        </div>--}}

    {{--    </div>--}}

    {{--</div>--}}

@endsection

@section('body')

    id="inner_page" class="body_auth"

@endsection

@section('js')

    !(function ($){

    "use strict";

    $('#agree-term').change(function(event){

    if ($(this).is(':checked')) {

    $(this).closest('form').find('button[type="submit"]').removeAttr('disabled');

    }else{

    $(this).closest('form').find('button[type="submit"]').attr('disabled','disabled');

    }

    });

    })(jQuery);

@endsection

