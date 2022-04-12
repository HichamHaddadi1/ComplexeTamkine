@extends('layouts.orientateur')
@section('content')
  <!-- Main content -->
  <br>
    <div class="container">
        <h3 class="txt_center">Ma salle</h3>
        <br>
        <div class="card card-primary" id="card-profile">
         <div class="card-header">
           <h3 class="card-title" id="nom">{{$salle->nom}}</h3>

           <div class="card-tools">
             <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
               <i class="fas fa-minus"></i>
             </button>
           </div>
         </div>
         <div class="card-body">
            <div class="description">
                <div id="lien_stand">
                    <img src="{{ asset('dist/files/stands/'.$salle->stand) }}" alt="">
                </div>
                <p id="description">{{$salle->description}}</p>
                <div id="lien_video">
                    Lien de la vidéo de ma présentation : <a href="#" data-toggle="modal" data-target="#modal_video_salle">{{$salle->lien_video}}</a>.
                </div>
            </div>
        </div><!-- /.card-body -->

        <div class="actions-salle text_lg_center">
          <button type="button" class="btn-imp mb_1" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="$('.succes').css('display','none');">Modifier mes informations &nbsp;<i class="fas fa-edit"></i></button>
          <button type="button" style="margin-left: 0" class="btn-imp mb_1" id="btn-dso"><a href="{{route('orientateur.salle.demarrer')}}">Démarrer ma salle &nbsp;<i class="fas fa-play"></i></a></button>
          <button type="button" class="btn-imp hidden_xs_up" id="btn-dso"><a href="{{route('orientateur.rejoindre.salle.pleniere',['id'=> $salle->id])}}" target="_blank">Rejoindre la salle de plénière &nbsp;<i class="fas fa-play"></i></a></button>
          </div>
       </div>

    </div>

<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modifier ma salle</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="succes" style="display: none"> Modifié avec succès ! </div>
            <form name="modifie-salle-orientateur" id="frmSalleOr">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputNom">Nom</label>
                    <input type="text" id="inputNom" class="form-control" name="inputNom" value="{{$salle->nom}}">
                </div>
                <div class="form-group">
                    <label for="inputDescription">Description</label>
                    <textarea id="inputDescription" class="form-control" rows="5" name="inputDescription">{{$salle->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="inputLienVideo">Lien de la vidéo de ma présentation</label>
                    <input type="text" id="inputLienVideo" class="form-control" name="inputLienVideo" value="{{$salle->lien_video}}">
                </div>
                <div class="form-group">
                    <label for="inputStandSalle">Image d'arrière plan</label>
                    <div class="custom-file">
                        <input type="file" id="inputStandSalle" name="standDeLaSalle" lang="fr">
                    </div>
                    <small style="color:red">L'image d'arrière plan ne doit pas dépasser 512 Ko(PNG).</small>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-imp" data-dismiss="modal">Annuler</button>
          <button type="button" class="btn-imp" id="btn-mso" data-id="{{$salle->id}}">Modifier</button>
        </div>
      </div>
  </div>
</div>
  <br>

  <!-- Button trigger modal -->
  <div class="modal fade" id="modal_video_salle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
       <div class="modal-content">
        <iframe width="100%" height="560" src="{{ $salle->lien_video }}"></iframe>
       </div>
    </div>
</div>
  @endsection
