@extends('layouts.site')
@section('content')
    <!-- section -->
    <section class="layout_padding section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text_align_center">
                    <div class="full heading_s1">
                        <h2 style="width: 100%">Le programme </h2>
                    </div>
                    <div class="full">
                        <p class="large">Téléchargez le fichier ci-dessous pour consulter le programme de cette deuxième édition des Journées Nationales d'Accompagnement et d'Orientation Virtuelles.</p>
                    </div>
                </div>
            </div>
            <div class="row mb-2 justify-content-center">
                <div class="col-md-4 text_align_center">
                    <div class="field">
                        <select class="form-control form-control-lg region input_auth" name="program" onchange="top.location.href = 'download/'.concat(this.options[this.selectedIndex].value)">
                            <option selected="selected" disabled="disabled">Autre Programmes</option>
                            {{--                            @foreach ($regions as $region)--}}
                            <option value="edition_2020">Édition 2020</option>
                            {{--                            @endforeach--}}

                        </select>
                        @error('region')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-md-4 text_align_center">
                    <div class="card">
                        <img src="{{ asset('front/images/programme_2021.PNG') }}" class="card-img-top" alt="Programme 2021">
                        <div class="card-body">
                            <h5 class="card-title">Le Programme</h5>
{{--                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
                            <a href="{{ route('front.download_now') }}" class="blue_bt download">Télécharger</a>
                        </div>
                    </div>
                </div>

{{--                <div class="col-md-4 text_align_center">--}}
{{--                    <div class="card">--}}
{{--                        <img src="{{ asset('front/images/orientation_arabic.PNG') }}" class="card-img-top" alt="...">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">Version Arabe</h5>--}}
{{--                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
{{--                            <a href="{{ route('front.downloadAR') }}" class="blue_bt download">Télécharger</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>

            </div>

        </div>
    </section>
    <!-- end section -->
@endsection
@section('body')
    id="inner_page"
@endsection
