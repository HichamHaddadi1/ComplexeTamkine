@extends('layouts.admin')
@section('content')
  <!-- Main content -->
  <br>
  <div class="container">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                    <form @if(isset($type) && $type=="creation") method="post" action="{{ route('admin.intervenants.create') }}" @else method="post" action="{{route('admin.intervenants.modifier',['id'=> $user->id])}}" @endif  enctype="multipart/form-data" form id="valider">
                        {{csrf_field()}}
                        <div class="card card-secondary">
                            <div class="card-header">
                              <h3 class="card-title">L'intervenant</h3>
                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                              </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="num_edition">N° d'édition</label>
                                    <select class="form-control" name="num_edition">
                                        @foreach ($editions as $edition)
                                            <option value="{{ old('num_edition', $edition->id  ?? null) }}" {{ $edition->id == ($salle->user->num_edition ?? null) ? 'selected' : '' }}>{{ $edition->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="orientateurnom">Nom</label>
                                    <input type="text" id="nom" class="form-control" name="nom" value="{{ old('nom',$user->nom  ?? null) }}">
                                    @if($errors->has('nom'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="orientateurnom">Prénom</label>
                                    <input type="text" id="prenom" class="form-control" name="prenom" value="{{ old('prenom',$user->prenom  ?? null) }}">
                                    @if($errors->has('prenom'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('prenom') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="orientateurnom">Email</label>
                                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email',$user->email  ?? null) }}">
                                    @if($errors->has('email'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="orientateurnom">Télèphone</label>
                                    <input type="tel" id="tel" class="form-control" name="tel" value="{{ old('tel',$user->tel  ?? null) }}">
                                    @if($errors->has('tel'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="region">Région</label>
                                    <select id="region" class="form-control custom-select" name="region">
                                      @foreach ($regions as $region)
                                        <option value="{{ old('region', $region->id  ?? null) }}" {{ $region->id == ($user->region_id ?? null) ? 'selected' : '' }}>{{ $region->nom }}</option>
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

                        <!-- -->
                        <div class="row">
                          <div class="col-12">

                                <button type="submit" id="btnSave" class="btn btn-info float-right">
                                    @if(isset($type) && $type=="creation")
                                       <i class="fa fa-plus" aria-hidden="true"></i>
                                       Créer Intervenant
                                    @else
                                       <i class="fas fa-pencil-alt"></i>
                                       Modifier Intervenant
                                    @endif
                                </button>

                            <a href="{{ route('admin.intervenants.index') }}" class="btn btn-secondary float-right btnAnnuler">Annuler</a>
                          </div>
                        </div>
                        <!-- -->
                    </form>
              </div>
          </div>
      </div>
  </div>
  <!-- /.content -->
  <br>
@endsection
