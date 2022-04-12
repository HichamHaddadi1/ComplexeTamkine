@extends('layouts.admin')
@section('content')
  <!-- Main content -->
  <br>
  <form method="post" action="{{ route('orientateur.create') }}" enctype="multipart/form-data" form id="valider">
    {{csrf_field()}}
      @include('admin.orientateurs._form')
    <div class="row">
      <div class="col-12">
        <a href="{{ route('orientateur.create') }}" id="btnSave" onclick="event.preventDefault(); document.getElementById('valider').submit();" class="btn btn-info float-right">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Créer une université
        </a>
        <a href="{{ route('orintateur.liste') }}" class="btn btn-secondary float-right btnAnnuler">Annuler</a>
  {{-- <button type="submit"  class="btn btn-primary float-right">
    <i class="fa fa-plus" aria-hidden="true"></i>
    Créer l'orientateur
  </button> --}}
      </div>
    </div>
</form>
  <!-- /.content -->
  <br>
@endsection
