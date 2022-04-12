@extends('layouts.participant')

@section('content')

    <div class="container">
        <br>
        <h3 class="txt_center">{{ $salle->nom }} </h3> <br><br>
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-body">

                        <div class="alert alert-info bg_participant">

                            <h5><i class="icon fas fa-info"></i> Info!</h5>

                            En attendant que votre orientateur rejoigne la salle, prenez un moment pour découvrir La Fondation Tamkine et ses activités en visionnant sa vidéo représentative.

                            Bon visionnage <i class="icon fas fa-smile-beam"></i>!



                        </div>

                    </div>

                    <!-- /.card-body -->

                </div>

                <!-- /.card -->

            </div>

            <!-- /.col -->

        </div>

        <!-- /.row -->

        <div class="row">

            <div class="col-md-6">

                <a id="play-video" href="#">

                    <img class="img-video shadow-img-video" src="https://cache.magicmaman.com/data/photo/w1000_ci/5j/ecole-troisieme-orientation.jpg">



                    <span class="video-play-button" data-toggle="modal" data-target=".bd-example-modal-lg">

                        <i class="far fa-play-circle"></i>

                   </span>

                </a>

            </div>

            <div class="col-md-6">

                  <h3 class="nom-moderateur">{{ $orientateur->prenom }} {{ $orientateur->nom }}</h3>

                  <p>{{ $salle->description }}</p>

            </div>

        </div>

    </div>







<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">

       <div class="modal-content">

          <iframe width="100%" height="560" src="{{ $salle->lien_video }}"></iframe>

       </div>

    </div>

</div>



    <br><br>

@endsection

