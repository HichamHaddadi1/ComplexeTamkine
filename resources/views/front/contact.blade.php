@extends('layouts.site')

@section('content')
{{--    <!-- section -->--}}
{{--    <section class="main_full inner_page">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="full">--}}
{{--                    <h3>Contact</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- end section -->--}}

    <!-- section -->
    <section class="layout_padding section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text_align_center">
                    <div class="full heading_s1">
                        <h2 style="width: 100%">Contactez-nous </h2>
                    </div>
                    <div class="full">
                        <p class="large">Vous avez une question ? N’hésitez pas à nous contacter !</p>
                    </div>
                </div>
            </div>
            @if(session()->has('success'))
            {{--        swal("Nous avons bien reçu votre message.", "{{ session()->get('success') }}", "success");--}}

            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                Nous avons bien reçu votre message. {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="contact_section margin_top_30">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="form_cont">
                                    <form action="{{ route('front.contactSubmit') }}" method="POST">
                                        @csrf
                                        <fieldset>
                                            <div class="field">
                                                <input type="text" name="prenom" placeholder="Prénom">
                                                @error('prenom')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="field">
                                                <input type="text" name="nom" placeholder="Nom">
                                                @error('nom')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="field">
                                                <input type="email" name="email" placeholder="Email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="field">
                                                <textarea name="msg" placeholder="Message"></textarea>
                                                @error('msg')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="field center">
                                                <button>Envoyer le message</button>
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


@endsection
@section('body')
    id="inner_page"
@endsection
