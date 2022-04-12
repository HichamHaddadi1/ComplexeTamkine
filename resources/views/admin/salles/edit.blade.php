@extends('layouts.admin')
@section('content')
  <!-- Main content -->
  <br>
  <form method="post" action="{{ route('salles.update',['salle' => $salle->id]) }}" enctype="multipart/form-data">
    {{csrf_field()}}
    @method('put')
    @include('admin.salles._form')
    <div class="row">
      <div class="col-12">
        <a href="{{ route('salles.index') }}" class="btn btn-secondary">Annuler</a>
        <input type="submit" value="Editer la salle" class="btn btn-success float-right">
      </div>
    </div>
</form>
  <!-- /.content -->
  <br>
@endsection
