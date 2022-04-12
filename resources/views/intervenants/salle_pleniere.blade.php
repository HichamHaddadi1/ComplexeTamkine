@extends('layouts.intervenant')
@section('content')
  <!-- Main content -->
  <br>
    <div class="container">
      <h3 class="txt_center">Salle de plénière</h3>
      <br>
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
                <!-- Description -->
                <tr colspan="2">
                    <p>{{$salle->description}}
                        <a href="#" data-toggle="modal" data-target="#modal_video_salle"> 
                            <strong> Cliquer ici pour voir la vidéo . </strong> 
                        </a>   </p>
                </tr>
                <td colspan="2" class="actions-salle">
                    <br>
                    <button type="button" class="btn-imp-int" id="btn-dso"><a href="{{route('intervenant.rejoindre.salle.pleniere',['id'=> $salle->id])}}">Rejoindre la salle &nbsp;<i class="fas fa-play"></i></a></button>
                </td>
            </table>
         </div>
         <!-- /.card-body -->
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

