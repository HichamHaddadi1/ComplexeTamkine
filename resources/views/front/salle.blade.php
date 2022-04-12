@extends('layouts.site')
@section('content')
{{--    <!-- about section -->--}}
{{--    @include('front.inculdes.about_dottat')--}}
{{--    <!-- end about section -->--}}


    <!-- section -->
    <section class="layout_padding section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text_align_center">
                    <div class="full heading_s1">
                        <h2 style="width: 100%;">Les salles des conseillers virtuel </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($salles as $salle)
              <div class="col-md-3 mx-auto mb-5">
                <div class="card text-center">
                    <h4 class="card-title p-2" style="border-bottom: 1px solid rgb(198, 198, 198); margin-bottom: -1px; color:#78b490;" >{{ $salle->nom }}</h4>
                    <img class="card-img" src="{{ asset('dist/files/stands/' . $salle->stand) }}" alt="{{ $salle->nom }}">
                    <div class="card-body">
                      <p class="card-text">{{ Str::limit($salle->description, 50) }}</p>
                    </div>
                  </div>
              </div>
                @endforeach


            </div>
            <div class="row">
                <div class="col-lg-12 hidden-xs-down text_align_center">
                    {{ $salles->links('vendor.pagination.orientation') }}
                </div>
                <div class="col-lg-12 hidden-md-up text_align_center" style="margin-left: -15px">
                    {{ $salles->links('vendor.pagination.mobile-orientation') }}
                </div>
            </div>


            <div class="row mt-3">
                <div class="col-md-8 offset-2">
                <div class="full center">
                <p class="large text-center large_gras">Pour entrer dans votre salle virtuelle et discuter à propos de votre cursus scolaire avec l’un de ces
                orientateurs, <a href="{{ route('register') }}" class="link">veuillez-vous inscrire</a></p>
                {{-- <a class="blue_bt" href="">S'inscrire</a>--}}
                </div>
                </div>
                </div>

{{--            <div class="row">--}}

{{--                <div class="col-md-4 text_align_center">--}}
{{--                    <div class="cours">--}}
{{--                        <img class="img-responsive" src="{{ asset('front/images/cour1.png') }}" alt="#" />--}}
{{--                    </div>--}}
{{--                    <h3>Design</h3>--}}
{{--                    <p>adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in re</p>--}}
{{--                </div>--}}

{{--                <div class="col-md-4 text_align_center">--}}
{{--                    <div class="cours">--}}
{{--                        <img class="img-responsive" src="{{ asset('front/images/cour2.png') }}" alt="#" />--}}
{{--                    </div>--}}
{{--                    <h3>Coding</h3>--}}
{{--                    <p>adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in re</p>--}}
{{--                </div>--}}

{{--                <div class="col-md-4 text_align_center">--}}
{{--                    <div class="cours">--}}
{{--                        <img class="img-responsive" src="{{ asset('front/images/cour3.png') }}" alt="#" />--}}
{{--                    </div>--}}
{{--                    <h3>Javascript</h3>--}}
{{--                    <p>adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in re</p>--}}
{{--                </div>--}}

{{--            </div>--}}
            {{--        <div class="row">--}}
            {{--            <div class="col-md-12">--}}
            {{--                <div class="full center">--}}
            {{--                    <a class="blue_bt" href="#">Read More</a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{-- <div class="row">
                <div class="col-lg-12 text_align_center">
                    <ul class="pagination modal-4">
                        <li><a href="#" class="prev">
                                <i class="fa fa-chevron-left"></i>
                                Previous
                            </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li> <a href="#">2</a></li>
                        <li> <a href="#">3</a></li>
                        <li> <a href="#">4</a></li>
                        <li> <a href="#" class="active">5</a></li>
                        <li> <a href="#">6</a></li>
                        <li> <a href="#">7</a></li>
                        <li><a href="#" class="next"> Next
                                <i class="fa fa-chevron-right"></i>
                            </a></li>
                    </ul>
                </div>
            </div> --}}

        </div>
    </section>
    <!-- end section -->
@endsection
@section('body')
    id="inner_page"
@endsection
