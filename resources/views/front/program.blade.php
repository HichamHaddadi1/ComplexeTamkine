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
                        <select class="form-control form-control-lg region input_auth" id="program" name="program" onchange="top.location.href = '/program/'.concat(this.options[this.selectedIndex].value)">
                            <option selected="selected" value="">S'il vous plaît sélectionnez votre édition</option>
                            @foreach ($editions as $edition)

                            <option value="{{ $edition->slug }}" @if($edition->id == $id_ed) selected @endif>{{ $edition->titre }}</option>
{{--                            <option value="edition_2021">Édition 2021</option>--}}
                            @endforeach

                        </select>
                        @error('region')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">

                @foreach($programs as $program)
                <div class="col-md-4 text_align_center">
                    <div class="card">
                        <img src="{{ asset('dist/files/programmes/imgs/'.$program->photo) }}" class="card-img-top" alt="Orientation Francais">
                        <div class="card-body">
                            <h5 class="card-title">{{ $program->titre }}</h5>
                            <p class="card-text">{{ $program->description }}</p>
                            <a download href="{{ asset('dist/files/programmes/fichieres/'.$program->lien) }}" class="blue_bt download">Télécharger</a>
                        </div>
                    </div>
                </div>
                @endforeach
{{--                <div class="col-md-4 text_align_center">--}}
{{--                    <div class="card">--}}
{{--                        <img src="{{ asset('front/images/orientation_arabic.PNG') }}" class="card-img-top" alt="Orientation Arabic">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">Version Arabe</h5>--}}
{{--                            --}}{{--                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
{{--                            <a href="#" class="blue_bt download">Télécharger</a>--}}
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
@section('js')
{{--    <script>--}}
{{--        $("#program").change(function(){--}}

{{--            $.ajax({--}}
{{--                url: "{{  route('front.edition' ,'slug')  }}".replace('slug',$(this).val()),--}}
{{--                --}}{{--url: "{!!  route('front.edition', ' '.$(this).val() )  !!}",--}}
{{--                method: 'GET',--}}
{{--                success: function(data) {--}}
{{--                    // $('#city').html(data.html);--}}
{{--                    console.log(data.editions[0]);--}}
{{--                }--}}
{{--            });--}}

{{--            console.log($(this).val());--}}
{{--        });--}}
{{--    </script>--}}
@endsection
