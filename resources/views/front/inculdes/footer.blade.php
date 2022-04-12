<!-- footer -->
<footer class="footer layout_padding">
    <div class="container">
        <div class="row">

            <div class="col-md-5 col-sm-12">
                <a href="{{ route('front.home') }}"><img class="img-responsive" src="{{ asset('front/images/orientation-tamkine-270x118.png') }}" alt="orientation tamkine" /></a>
                <div class="footer_link_heading">
                    <div class="footer_menu margin_top_30">
                        <ul>
                            <li><a href="tel:9876543210">+212 537 708 391</a></li>
                            <li><a href="#">orientation@tamkine.com</a></li>
                            <li><a href="#">Adresse: 5, Rue sousa escalier B
                                    Hassan, Rabat</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="row">

                    <div class="col-md-4 col-sm-12">
                        <div class="footer_link_heading">
                            <h3>LIENS UTILES</h3>
                        </div>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="{{ route('front.home') }}">Accueil</a></li>
                                <li><a href="{{ route('front.salle') }}">Salles des universités</a></li>
                                <li><a href="{{ route('front.download') }}">Programme</a></li>
                                <li><a href="{{ route('front.contact') }}">Contactez-nous</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="footer_link_heading">
                            <h3>NOS RÉSEAUX SOCIAUX</h3>
                            <p>Pour rester informé sur nos activités, actualités et offres d’emploi, suivez-nous sur :</p>
                        </div>
                        <div class="social-links mt-3">
                            <a href="https://www.facebook.com/fondation.tamkine" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.youtube.com/channel/UCp_O8II2Nh2v3ShIylpYhYg/?sub_confirmation=1" class="youtube"><i class="fa fa-youtube"></i></a>
                            <a href="https://www.linkedin.com/in/fondation-tamkine-2910031a5/" class="linkedin"><i class="fa fa-linkedin"></i></a>
                            <a href="https://twitter.com/fondationtamki1" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="https://t.me/togetherwewillsucceed" class="telegram"><i class="fa fa-telegram"></i></a>
                            <a href="https://www.instagram.com/fondation_tamkine/" class="instagram"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>
<div class="cpy">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>&copy; Copyright {{ \Carbon\Carbon::now()->year }}. Tous les droits sont réservés.<a href="{{ route('front.home') }}"> Tamkine Orientation</a></p>
            </div>
        </div>
    </div>
</div>
<!-- end footer -->
