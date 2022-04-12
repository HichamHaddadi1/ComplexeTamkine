@extends('layouts.admin')
@section('content')
  <!-- Main content -->
  <br>
  <form method="post" action="{{ route('users.update',['user' => $user->id]) }}" enctype="multipart/form-data">
    {{csrf_field()}}
    @method('put')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Utilisateur : {{ $user->nom }}</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
                <div class="form-group">
                    <label for="orientateurnom">Nom</label>
                    <input type="text" id="orientateurnom" class="form-control" name="orientateurnom" value="{{ old('orientateurnom', $user->nom) }}">
                    @if($errors->has('orientateurnom'))
                    <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('orientateurnom') }}</strong>
                    </span>
                    @enderror
                 </div>
                <div class="form-group">
                    <label for="orientateurprenom">Prénom</label>
                    <input type="text" id="orientateurprenom" class="form-control" name="orientateurprenom" value="{{ old('orientateurprenom',$user->prenom) }}">
                    @if($errors->has('orientateurprenom'))
                    <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('orientateurprenom') }}</strong>
                    </span>
                    @enderror
                 </div>
                <div class="form-group">
                  <label for="inputEmail">Email</label>
                  <input type="email" class="form-control" id="inputEmail" name="email" value="{{ old('email',$user->email) }}">
                  @if($errors->has('email'))
                  <span class="text-danger" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="region">Région</label>
                  <select id="region" class="form-control custom-select" name="region">
                    @foreach ($regions as $region)
                    <option value="{{ old('region', $region->id) }}" {{ $region->id == $user->region_id ? 'selected' : '' }}>{{ old('region', $region->nom) }}</option>
                    @endforeach
                    </select>
                    @if($errors->has('region'))
                    <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('region') }}</strong>
                    </span>
                    @enderror
                </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <input type="submit" value="Editer la salle" class="btn btn-info float-right">
        <a href="{{ route('users.index') }}" class="btn btn-success float-right">Annuler</a>
      </div>
    </div>
</form>
  <!-- /.content -->
  <br>
@endsection
