@extends('layouts.admin')

@section('content')

  <!-- Main content -->
        <br><br>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Durée</th>
                <th scope="col">Participiants</th>
                <th scope="col">Nom de salle</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($recordsObject as $recording)
                <tr>
                    <td class="img">
                        <img src="{{ $recording['playback']['format']['preview']['images']['image'][0] }}" alt="" width="80">
                    </td>
                    <td class="duree">
                        {{ Carbon\Carbon::createFromTimestampMs($recording['endTime']-$recording['startTime'])->format('H:i:s') }}
                    </td>
                    <td class="par">
                        {{ $recording['participants'] }}
                    </td>
                    <td class="nom-salle">
                        {{ $recording['name']}}
                    </td>
                    <td class="date">
                        {{ Carbon\Carbon::parse($recording['startTime']/1000)->format('d/m/Y H:i:s') }}
                    </td>
                    <td class="sup">
                        <a href="{{ $recording['playback']['format']['url'] }}">
                            <button type="button" class="btn btn-success btn-sm" id="btn-msu" data-id="{{ $recording['recordID'] }}" onclick=" $('#btnSEs').attr('data-id', $(this).attr('data-id')); " >Voir &nbsp; <i class="fas fa-video"></i></button>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" onclick="$('#btn-sup-enr').attr('data-chemin','{{ route('admin.enregistrements.supprimer',['id' => $recording['recordID'] ]) }}');">
                            <i class="fas fa-trash fa-sm">
                            </i>
                            Supprimer
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
  <!-- /.content -->
  <br>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
                <br><h5 class="swal2-title">Tu es sure ?</h5>
                <div class="swal2-content">
                    Tu ne peux pas récupérer l'enregistrement après la suppression
                </div>
                <div class="modal-btns">
                  <button type="button" class="btn btn-success" data-dismiss="modal">Non, Annuler</button>
                  <button type="button" class="btn btn-danger" id="btn-sup-enr">Oui, Supprimer</button>
                </div><br>
          </div>
        </div>
    </div>

@endsection

