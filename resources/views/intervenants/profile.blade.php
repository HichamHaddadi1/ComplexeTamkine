@extends('layouts.intervenant')
@section('content')
  <!-- Main content -->
  <br>
    <div class="container">
        <h3 class="txt_center">Mon profil</h3> <br>
        <div class="card card-primary" id="card-profile-intervenant">
         <div class="card-header">
           <h3 class="card-title"></h3>

           <div class="card-tools">
             <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
               <i class="fas fa-minus"></i>
             </button>
           </div>
         </div>
         <div class="card-body">
            <table class="tab_info_pro">
                <!-- Nom -->
                <tr>
                    <td class="col-left">Nom:</td>
                    <td class="col-right" id="nom">{{$usr->nom}}</td>
                </tr>
                <!-- Prenom -->
                <tr>
                    <td class="col-left">Prenom:</td>
                    <td class="col-right" id="prenom">{{$usr->prenom}}</td>
                </tr>
                <!-- email -->
                <tr>
                    <td class="col-left">Email:</td>
                    <td class="col-right" id="email">{{$usr->email}}</td>
                </tr>
                <!-- Tel -->
                <tr>
                    <td class="col-left">Téléphone:</td>
                    <td class="col-right" id="tel">{{$usr->tel}}</td>
                </tr>
                <!-- Region -->
                <tr>
                    <td class="col-left">Région:</td>
                    <td class="col-right" id="region">{{ $usr->region->nom}}</td>
                </tr>

                <td colspan="2" class="actions-salle">
                    <br>
                    <button type="button" class="btn-imp-int" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="$('.succes').css('display','none');">Modifier mon profil &nbsp;<i class="fas fa-edit"></i></button>
                </td>
            </table>
         </div>
         <!-- /.card-body -->
       </div>
    </div>

    <!-- Large modal -->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modifier mon profil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="succes" style="display: none"> Modifié avec succès ! </div>
            <form action="" id="frmReg">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputNom">Nom</label>
                    <input type="text" id="inputNom" class="form-control" name="inputNom" value="{{$usr->nom}}">
                </div>
                <div class="form-group">
                    <label for="inputPrenon">Prénom</label>
                    <input type="text" id="inputPrenon" class="form-control" name="inputPrenom" value="{{$usr->prenom}}">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="text" id="inputEmail" class="form-control" name="inputEmail" value="{{$usr->email}}">
                </div>
                <div class="form-group">
                    <label for="inputTel">Téléphone</label>
                    <input type="text" id="inputTel" class="form-control" name="inputTel" value="{{$usr->tel}}">
                </div>
                <div class="form-group">
                    <label for="inputRegions">Région</label>
                    <select id="inputCategories" class="form-control custom-select" name="inputRegion">
                        <option value="-1">Veuillez sélectionner votre région</option>
                        @foreach ($regions as $reg)
                            <option value="{{$reg->id}}" @if($usr->region_id == $reg->id) selected @endif>{{$reg->nom}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-imp-int" data-dismiss="modal">Annuler</button>
          <button type="button" class="btn-imp-int" id="btn-mpo" data-id="{{$usr->id}}">Modifier</button>
        </div>
      </div>
  </div>
</div>
  <br>
  @endsection
