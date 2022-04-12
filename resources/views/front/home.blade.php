@extends('layouts.site')
@section('content')
    <!-- section -->
    @include('front.inculdes.banner_section_top')
    <!-- end section -->
    <!-- about section -->
    <section class="layout_padding section about_dottat">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text_align_center">
                    <div class="full heading_s1">
                        <h2>A propos des Journées Portes Ouvertes Virtuelles (JPOV)</h2>
                    </div>
                    <div class="full">
                        <p class="large">Vous êtes élève, étudiant ou parents soucieux de l’avenir de votre enfant ?
                            Vous êtes au bon endroit !
                            Les Journées Portes Ouvertes Virtuelles (JPOV) organisées par la Fondation Tamkine assistent
                            élèves et étudiants dans leur orientation, leur permettant de faire des choix informés
                            d’orientation évitant tout changement de parcours scolaire souvent perçu comme un échec.
                            Pour contribuer à une réussite dans les études universitaire, et à celle professionnelle, la
                            Plateforme Tamkine Orientation a été conçue pour permettre l’interaction virtuelle des élèves,
                            des étudiants et de leurs parents avec des spécialistes en orientation pédagogique en mesure de
                            les aider à faire des choix en fonction de leurs préférences et de leurs profils.</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="about_img text_align_center">

                        <img class="img-video shadow-img-video" src="{{ asset('front/images/banner.png') }}">
                        <a id="play-video" href="javascript:void(0)">
                            <span class="video-play-button" data-toggle="modal" data-target=".bd-example-modal-lg">
                                <i class="fa fa-play-circle icon_video"></i>
                            </span>
                        </a>
                        {{-- <img data-toggle="modal" data-target=".bd-example-modal-lg" src="{{ asset('front/images/ab_img.png')  }}" alt="#"> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <iframe class="yt_player_iframe" width="100%" height="560" src="https://www.youtube.com/embed/6xdZPUTZ25o"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" frameborder="0"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <!-- section -->
    <section class="layout_padding section" id="salles">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text_align_center">
                    <div class="full heading_s1">
                        <h2>Les salles des universités</h2>
                    </div>
                </div>
            </div>

            {{--  --}}
            <div class="card text-center mx-auto shadow mb-5 bg-white rounded" style="width: 40%;">
                <div class="card-body">
                    <h4 class="card-title">Universités Internationales Partenaires</h4>
                </div>
            </div>
            {{--  --}}
            <div class="owl-carousel owl-theme">

                @foreach ($salles as $salle)
                    {{-- <div class="ite">
                        <div class="col">
                            <div class="cours">
                                <img class="img-responsive rounded-circle"
                                    src="{{ asset('dist/files/stands/' . $salle->stand) }}" alt="{{ $salle->nom }}"
                                    width="230" height="230" />
                            </div>
                            <h3>{{ $salle->nom }}</h3>
                            <p>{{ Str::limit($salle->description, 100) }}</p>
                        </div>
                    </div> --}}
                    <div class="card text-center">
                        <h4 class="card-title p-3" style="border-bottom: 1px solid rgb(198, 198, 198); margin-bottom: -1px; color:#78b490;" >{{ $salle->nom }}</h4>
                        <img class="card-img" src="{{ asset('dist/files/stands/' . $salle->stand) }}" alt="{{ $salle->nom }}">
                        <div class="card-body">
                          <p class="card-text">{{ Str::limit($salle->description, 50) }}</p>
                        </div>
                      </div>
                @endforeach
            </div>

            <div class="card text-center mt-5 mx-auto shadow mb-5 bg-white rounded" style="width: 40%;">
                <div class="card-body">
                    <h4 class="card-title">Universités Nationales Partenaires</h4>
                </div>
            </div>
            <div class="text-primary h6 mb-3">
                Choisissez la région / ville ou vous voulez étudier, vous serez dirigé directement vers l'université ou la
                grande école se trouvant dans votre région, celle la plus proche de vous.
            </div>
            <select name="national" id="national" class="form-control w-50 mb-5 mx-auto">
                <option value="" selected disabled class="text-center">Veuillez Sélectionner votre region</option>
                @foreach ($regions as $reg)
                    <option value="{{ $reg->id }}">{{ $reg->nom }}</option>
                @endforeach
            </select>
            {{--  --}}
            <div class="row test mx-auto">
                @foreach ($salles as $salle)
                <div class="col-3">
                    <div class="{{ 'item-'.$salle->user->region_id }}" id="item">
                            <div class="cours">
                                <img class="img-responsive rounded-circle"
                                    src="{{ asset('dist/files/stands/' . $salle->stand) }}" alt="{{ $salle->nom }}"
                                    width="230" height="230" />
                            </div>
                            <h3>{{ $salle->nom }}</h3>
                            <p>{{ Str::limit($salle->description, 100) }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
            {{-- <div class="my-slider">

              </div> --}}
            {{--  --}}
            {{-- <div class="row">
                @foreach ($salles as $salle)
                <div class="col-md-3 text_align_center">
                    <div class="cours">
                        <img class="img-responsive rounded-circle" src="{{ asset('dist/files/stands/'.$salle->stand) }}" alt="{{ $salle->nom }}" width="230" height="230" />
                    </div>
                    <h3>{{ $salle->nom }}</h3>
                    <p>{{ Str::limit($salle->description,100) }}</p>
                </div>
                @endforeach


            </div> --}}
            <div class="row">
                <div class="col-lg-12 hidden-xs-down text_align_center">
                    {{ $salles->links('vendor.pagination.orientation') }}
                </div>
                <div class="col-lg-12 hidden-md-up text_align_center" style="margin-left: -15px">
                    {{ $salles->links('vendor.pagination.mobile-orientation') }}
                </div>
            </div>


            <div class="row mt-3">
                <div class="col-md-8 offset-xl-2">
                    <div class="full center">
                        <p class="large text-center large_gras">Pour entrer dans votre salle virtuelle et discuter à
                            propos de votre cursus scolaire avec l’un des conseillers en orientation,
                            <a href="{{ route('register') }}" class="link">veuillez-vous inscrire</a>
                        </p>
                        {{-- <a class="blue_bt" href="">S'inscrire</a> --}}
                    </div>
                </div>
            </div>



        </div>
    </section>
    <!-- end section -->

    <!-- section -->
    <section id="clients" class="container clients section">
        <div class="container text_align_center">
            <div class="section-title heading_s1 full">
                <h2>Nos partenaires</h2>
            </div>
        </div>

        <div class="titres_par">
            <button class="tous btn-par btn-active" type="*">Tous</button>
            <button class="type1 btn-par border-left" type="media">Media</button>
            <button class="type2 btn-par border-left" type="partenaire-academique">Partenaire académique</button>
            <button class="tous btn-par border-left" type="organisme-fondation-instituts">Organisme - Fondation -
                Instituts</button>
        </div>
        <!--fin titres --> <br>
        <div class="owl-carousel clients-carousel" id="tous-par">
            <img src="{{ asset('front/images/clients/assabah.jpg') }}" alt="Assabah" width="110" height="84">
            <img src="{{ asset('front/images/clients/fondation_orange.png') }}" alt="Fondation Orange" width="110"
                height="84">
            <img src="{{ asset('front/images/clients/Laser_rs.png') }}" alt="Laser Rs" width="110" height="84">
            <img src="{{ asset('front/images/clients/OCP.png') }}" alt="OCP" width="110" height="84">
            <img src="{{ asset('front/images/clients/rainbow.png') }}" alt="RAINBOW" width="110" height="84">
            <img src="{{ asset('front/images/clients/sdcc.png') }}" alt="SDCC" width="110" height="84">
            <img src="{{ asset('front/images/clients/atlantic_radio.png') }}" alt="Atlantic Radio" width="110"
                height="84">
            <img src="{{ asset('front/images/clients/economiste.png') }}" alt="Economiste" width="110" height="84">
            <img src="{{ asset('front/images/clients/hit_radio.jpg') }}" alt="Hit Radio" width="110" height="84">
            <img src="{{ asset('front/images/clients/azawan.png') }}" alt="azawan" width="110" height="84">
            <img src="{{ asset('front/images/clients/2M.png') }}" alt="2M" width="110" height="84">
        </div>
        <div class="owl-carousel clients-carousel" id="media">
            <img src="{{ asset('front/images/clients/assabah.jpg') }}" alt="Assabah" width="110" height="84">
            <img src="{{ asset('front/images/clients/fondation_orange.png') }}" alt="Fondation Orange" width="110"
                height="84">
            <img src="{{ asset('front/images/clients/Laser_rs.png') }}" alt="Laser Rs" width="110" height="84">
            <!-- <img src="{{ asset('front/images/clients/OCP.png') }}" alt="OCP" width="110" height="84">
                            <img src="{{ asset('front/images/clients/rainbow.png') }}" alt="RAINBOW" width="110" height="84">
                            <img src="{{ asset('front/images/clients/sdcc.png') }}" alt="SDCC" width="110" height="84">
                            <img src="{{ asset('front/images/clients/atlantic_radio.png') }}" alt="Atlantic Radio" width="110" height="84">
                            <img src="{{ asset('front/images/clients/economiste.png') }}" alt="Economiste" width="110" height="84">
                            <img src="{{ asset('front/images/clients/hit_radio.jpg') }}" alt="Hit Radio" width="110" height="84">
                            <img src="{{ asset('front/images/clients/azawan.png') }}" alt="azawan" width="110" height="84">
                            <img src="{{ asset('front/images/clients/2M.png') }}" alt="2M" width="110" height="84"> -->
        </div>
        <div class="owl-carousel clients-carousel" id="partenaire-academique">
            <!-- <img src="{{ asset('front/images/clients/assabah.jpg') }}" alt="Assabah" width="110" height="84">
                            <img src="{{ asset('front/images/clients/fondation_orange.png') }}" alt="Fondation Orange" width="110" height="84">
                            <img src="{{ asset('front/images/clients/Laser_rs.png') }}" alt="Laser Rs" width="110" height="84"> -->
            <img src="{{ asset('front/images/clients/OCP.png') }}" alt="OCP" width="110" height="84">
            <img src="{{ asset('front/images/clients/rainbow.png') }}" alt="RAINBOW" width="110" height="84">
            <img src="{{ asset('front/images/clients/sdcc.png') }}" alt="SDCC" width="110" height="84">
            <!-- <img src="{{ asset('front/images/clients/atlantic_radio.png') }}" alt="Atlantic Radio" width="110" height="84">
                            <img src="{{ asset('front/images/clients/economiste.png') }}" alt="Economiste" width="110" height="84">
                            <img src="{{ asset('front/images/clients/hit_radio.jpg') }}" alt="Hit Radio" width="110" height="84">
                            <img src="{{ asset('front/images/clients/azawan.png') }}" alt="azawan" width="110" height="84">
                            <img src="{{ asset('front/images/clients/2M.png') }}" alt="2M" width="110" height="84"> -->
        </div>
        <div class="owl-carousel clients-carousel" id="ofi">
            <!-- <img src="{{ asset('front/images/clients/assabah.jpg') }}" alt="Assabah" width="110" height="84">
                            <img src="{{ asset('front/images/clients/fondation_orange.png') }}" alt="Fondation Orange" width="110" height="84">
                            <img src="{{ asset('front/images/clients/Laser_rs.png') }}" alt="Laser Rs" width="110" height="84">
                            <img src="{{ asset('front/images/clients/OCP.png') }}" alt="OCP" width="110" height="84">
                            <img src="{{ asset('front/images/clients/rainbow.png') }}" alt="RAINBOW" width="110" height="84">
                            <img src="{{ asset('front/images/clients/sdcc.png') }}" alt="SDCC" width="110" height="84"> -->
            <img src="{{ asset('front/images/clients/atlantic_radio.png') }}" alt="Atlantic Radio" width="110"
                height="84">
            <img src="{{ asset('front/images/clients/economiste.png') }}" alt="Economiste" width="110" height="84">
            <img src="{{ asset('front/images/clients/hit_radio.jpg') }}" alt="Hit Radio" width="110" height="84">
            <img src="{{ asset('front/images/clients/azawan.png') }}" alt="azawan" width="110" height="84">
            <img src="{{ asset('front/images/clients/2M.png') }}" alt="2M" width="110" height="84">
        </div>
        </div>



    </section>
    <!-- end section -->

    @guest
        <!-- <div id="overlayPopup" class="overlayPopup" style="display: block;">
                                <div id="popup1" class="popup-content">
                                    <div class="headerPopup">
                                        <div id="closeBtn" class="closeBtn">
                                            <i class="fa fa-times-circle" onclick="overlayPopup.style.display='none'"></i>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-md-7 form_login">
                                                <form method="POST" action="{{ route('login') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Adresse E-mail</label>
                                                        <input name="email" placeholder="name@exemple.com" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        @error('email')
                                                                    <small id="emailHelp" class="form-text text-muted">{{ $message }}</small>
                                                                    @endif
                                                                </div>
                                                                <div class="text-right">
                                                                    <button type="submit" class="btn_login btn_primary">Se connecter</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-5 text-center form_register">
                                                            <span>Vous n'avez pas de compte ?</span><br><a href="{{ route('register') }}">Cliquez ICI pour s'inscrire !</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div> -->
            <!-- transparent fullscreen background -->
            <div class="mlctr-underlayer">
                <!-- master popup div container -->
                <div class="mlctr-popup">
                    <a class="mlctr-close"></a>
                    <!-- following onsubmit event is required -->
                    <form method="POST" action="{{ route('login') }}" id="MailocatorForm">
                        @csrf
                        <!-- following div will be overwritten with success message -->
                        <div class="mlctr-message-success">
                            <div class="mlctr-red-box"><img
                                    src="http://orientation.tamkine.org/front/images/orientation_tamkine.png"></div>
                            <h2>Vous n'avez pas de compte ?</h2>
                            <p class="mlctr-hexa words word-1 myword">Cliquez ICI pour <a style="margin-left: 18px;"
                                    class="font-weight-bold myspans" href="{{ route('register') }}">
                                    <span>S'</span>
                                    <span>i</span>
                                    <span>n</span>
                                    <span>s</span>
                                    <span>c</span>
                                    <span>r</span>
                                    <span>i</span>
                                    <span>r</span>
                                    <span>e</span>
                                    <span>!</span>
                                </a>
                            </p>

                            <input type="text" name="email" placeholder="Adresse e-mail" aria-describedby="emailHelp" />
                            <input type="submit" value="Se connecter" / style="background-color: #78b490;">
                            <div class="mlctr-privacy">
                                Si vous avez une compte entrez votre email pour se connecter.
                            </div>
                            @error('email')
                                <div class="alert alert-info text-center font-weight-bold" role="alert" style="margin-top: 10px;">
                                    {{ $message }}
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    <!--/end of my-popup-container -->
                </div>
                <!--/end of my-popup-background-layer -->
            @endguest
        @endsection
        @section('body')
            id="home_page" class="home_page"
        @endsection


        @section('js')
            {{-- <script>
                const national = $('#national');
                // const nationalCard = $('.item');

                $('body').on('change', '#national', function() {

                    console.log(national.val());
                    $("[id^='item']").each(function()
                    {
                        console.log(this.className);
                        console.log('.item-'+national.val());

                        if ('.item-'+national.val() == '.'+this.className) {
                            $(this).css("visibility", "visible");
                        }
                        else
                        {
                            $(this).css("visibility", "hidden");
                        }

                })


                });
            </script> --}}
            <script>
                const national = $('#national');
                const nationalCard = $('.row.test');
                national.change(function() {
                    let id = $(this).find(":selected").val();
                    console.log(id);
                    $.ajax({
                        url: '/getNationalUniversity/' + id,
                        method: 'GET',
                        success: function(result) {
                            console.log(result);
                            nationalCard.html(" ");
                            for (var i = 0; i < result.data.length; i++) {
                                var option =
                                '<div class="col">'+
                                '<div class="cours">'+
                               ' <img class="img-responsive rounded-circle" src="/dist/files/stands/'+result.data[i].stand+'" alt="" width="230" height="230" />'+
                            ' <h3>'+result.data[i].nom+'</h3>'+
                            '<p>'+result.data[i].description.substring(0, 70)+'</p>'
                            '</div>'+
                            '</div>'
                                ;

                                console.log(option);
                                nationalCard.append(option);

                            }


                        }
                    });
                });
                </script>
            <script>
                $('.owl-carousel').owlCarousel({
                    loop: true,
                    margin: 10,
                    center: true,
                    nav: true,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 4
                        }
                    }
                });
            </script>
            <script>
                document.addEventListener('DOMContentLoaded', function(event) {
                    // array with texts to type in typewriter
                    var dataText = ["Fondation Tamkine"];

                    // type one text in the typwriter
                    // keeps calling itself until the text is finished
                    function typeWriter(text, i, fnCallback) {
                        // chekc if text isn't finished yet
                        if (i < (text.length)) {
                            // add next character to h1
                            document.querySelector(".word h3").innerHTML = text.substring(0, i + 1) +
                                '<span aria-hidden="true"></span>';
                            // wait for a while and call this function again for next character
                            setTimeout(function() {
                                typeWriter(text, i + 1, fnCallback)
                            }, 100);
                        }
                        // text finished, call callback if there is a callback function
                        else if (typeof fnCallback == 'function') {
                            // call callback after timeout
                            setTimeout(fnCallback, 700);
                        }
                    }
                    // start a typewriter animation for a text in the dataText array
                    function StartTextAnimation(i) {
                        if (typeof dataText[i] == 'undefined') {
                            setTimeout(function() {
                                StartTextAnimation(0);
                            }, 1000);
                        }
                        // check if dataText[i] exists
                        // if (i < dataText[i].length) {
                        if (i < 1) {
                            // text exists! start typewriter animation
                            typeWriter(dataText[i], 0, function() {
                                // after callback (and whole text has been animated), start next text
                                StartTextAnimation(i + 1);
                            });
                        }
                    }
                    // start the text animation
                    StartTextAnimation(0);
                });

                @if (Request::__get('page') > 0)
                    $(document).ready(function () {
                    $('html, body').animate({
                    scrollTop: $('#salles').offset().top
                    }, 1400);
                    });
                @endif
            </script>
        @endsection
