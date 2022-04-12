@extends('layouts.login')

@section('content')
    {{-- <!-- section --> --}}
    {{-- <section class="main_full inner_page"> --}}
    {{-- <div class="container-fluid"> --}}
    {{-- <div class="row"> --}}
    {{-- <div class="full"> --}}
    {{-- <h3>S'inscrire</h3> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    {{-- </section> --}}
    {{-- <!-- end section --> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- section -->
    <section class="layout_padding section auth_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text_align_center">
                    <div class="text-center">
                        <a href="{{ route('front.home') }}"><img
                                src="{{ asset('front/images/orientation-tamkine-100x100.png') }}" width="100" height="70"
                                class="rounded" alt="orientation tamkine"></a>
                    </div>
                    <div class="full">
                        <h3 class="header_text">S'inscrire</h3>

                    </div>

                </div>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row mt-5 mb-5">
                    <div class="col-lg mb-3">
                        <div class="form mr-4">
                            <div class="row ml-2">
                                <label for="first_name">Prénom</label>
                            <input type="text" name="first_name" class="form-control mt-1 mb-3" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row ml-2">
                                <label for="last_name">Nom</label>
                                <input type="text" name="last_name" class="form-control mt-1 mb-3" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row ml-2">
                                <label for="telephone">Téléphone</label>
                                <input type="text" name="telephone" class="form-control mt-1 mb-3" value="{{ old('telephone') }}">
                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row ml-2">
                                <label for="date_de_naissance">Date de naissance</label>
                                <input type="date" name="date_de_naissance" class="form-control mt-1 mb-3"value="{{ old('date_de_naissance') }}">
                                @error('date_de_naissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row ml-2">
                                <label for="etablissement">Etablissement</label>
                                <input type="text" name="etablissement" class="form-control mt-1 mb-3"value="{{ old('etablissement') }}">
                                @error('etablissement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg mb-3">
                        <div class="form mr-4">
                            <div class="row ml-2">
                                <label for="niveau">Niveau d'études</label>
                                <select name="niveau" id="" class="form-control mt-1 mb-3">
                                    <option value="" selected disabled>Niveau d'études</option>
                                    <option value="baccalauriat">Baccalauréat</option>
                                    <option value="bac_1">Bac +1</option>
                                    <option value="bac_2">Bac +2</option>
                                    <option value="licence">Licence</option>
                                    <option value="master">Master</option>
                                    <option value="doctorant">Doctorant</option>
                                </select>
                                @error('niveau')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row ml-2">
                                <label for="filiere">Filière</label>
                                <select name="filiere" id="" class="form-control mt-1 mb-3">
                                    <option value="" selected disabled>Filière</option>
                                    <option value="Filière  " >Filière</option>
                                </select>
                                @error('filiere')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row ml-2">
                                <label for="university">Université / Grande Ecole recherchée</label>
                                <select name="university" id="" class="form-control mt-1 mb-3">
                                    <option value="" selected disabled>Université</option>
                                    <option value="Université" >Université</option>
                                </select>
                                @error('university')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row ml-2">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control mt-1 mb-3" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row ml-2">
                                <label for="email">Confirmer Email</label>
                                <input type="text" name="email_confirmation" class="form-control mt-1 mb-3"value="{{ old('email') }}">
                                @error('email_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg mb-3">
                        <div class="form mr-4">
                            <div class="row ml-2">
                                <label for="formation">Formation recherchée </label>
                                <input type="text" name="formation" class="form-control mt-1 mb-3"value="{{ old('formation') }}">
                                @error('formation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row ml-2 mt-5">
                            <div class="text-muted">
                                Conformément à la loi 09-08, vous disposez d'un droit d'accès, de rectification et
                                d'opposition
                                au traitement de vos données personnelles. Ce traitement a été autorisé par la CNDP sous le
                                N°
                                A-669/2020
                            </div>
                            <div class="form-check mt-3">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="condition" id="" value="checkedValue" required>
                                    J'ai lu et j'accepte les conditions générales d'utilisation, notamment la mension
                                    relative à
                                    la protection des données personnelles
                                </label>
                                @error('condition')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="row">
                                <div class="col-9"></div>
                                <div class="col-2 mt-4">
                                    <button type="submit" class="btn btn-primary mt-3">S'inscrire &nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="row ">

                </div>
            </form>
        </div>
        </div>
    </section>
@endsection
@section('body')
    id="inner_page" class="body_auth"
@endsection
@section('js')
    (function ($){
    "use strict";
    $('#agree-term').change(function(event){
    if ($(this).is(':checked')) {
    console.log('azaz');
    $(this).closest('form').find('button[type="submit"]').removeAttr('disabled');
    }else{
    $(this).closest('form').find('button[type="submit"]').attr('disabled','disabled');
    }
    });
    })(jQuery);
@endsection
