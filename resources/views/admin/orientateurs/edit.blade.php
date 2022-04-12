@extends('layouts.admin')
@section('content')
  <!-- Main content -->
  <br>
  <form method="post" action="{{ route('orientateur.update',['id' => $salle->id]) }}" enctype="multipart/form-data">
    {{csrf_field()}}
    @method('put')
      @include('admin.orientateurs._form')
    <div class="row">
      <div class="col-12">
        <input type="submit" value="Editer la salle" class="btn btn-success float-right">
        <a href="{{ route('orintateur.liste') }}" class="btn btn-secondary float-right btnAnnuler">Annuler</a>
      </div>
    </div>
</form>
  <!-- /.content -->
  <br>
@endsection
