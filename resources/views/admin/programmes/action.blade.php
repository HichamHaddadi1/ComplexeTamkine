@extends('layouts.admin')
@section('content')
  <!-- Main content -->
  <br>
  <div class="container">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                    <form @if(isset($type) && $type=="creation") method="post" action="{{ route('admin.programme.create') }}" @else method="post" action="{{route('admin.programme.modifier',['id'=> $programme->id])}}" @endif  enctype="multipart/form-data" form id="valider">
                        {{csrf_field()}}
                        <div class="card card-secondary">
                            <div class="card-header">
                              <h3 class="card-title">Programme</h3>
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
                                            <option value="{{ old('num_edition', $edition->id  ?? null) }}" {{ $edition->id == ($programme->num_edition ?? null) ? 'selected' : '' }}>{{ $edition->titre }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                <div class="form-group">
                                    <label for="orientateurnom">Titre</label>
                                    <input type="text" id="titre" class="form-control" name="titre" value="@if(isset($programme->titre)) {{ $programme->titre}}  @endif">
                                    @if($errors->has('titre'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('titre') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="orientateurprenom">Description</label>
                                    <textarea id="description" class="form-control" name="description">@if(isset($programme->description)) {{$programme->description}} @endif</textarea>
                                    @if($errors->has('description'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                      <label for="date">Date</label>
                                      <input type="date" class="form-control" id="date" name="date" value="@if(isset($programme->date)){{ $programme->date }}@endif">
                                      @if($errors->has('date'))
                                      <span class="text-danger" role="alert">
                                          <strong>{{ $errors->first('date') }}</strong>
                                      </span>
                                      @enderror
                                </div> --}}
                                <div class="form-group">
                                    <label for="inputStandSalle">Photo</label>
                                    <div class="custom-file">
                                        <input type="file" id="photo" name="photo" lang="fr">
                                    </div>
                                    @if($errors->has('photo'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputStandSalle">Fichier</label>
                                    <div class="custom-file">
                                        <input type="file" id="fichier" name="fichier" lang="fr">
                                    </div>
                                    @if($errors->has('fichier'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('fichier') }}</strong>
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
                                       Créer programme
                                    @else
                                       <i class="fas fa-pencil-alt"></i>
                                       Modifier programme
                                    @endif
                                </button>

                            <a href="{{ route('admin.programmes.index') }}" class="btn btn-secondary float-right btnAnnuler">Annuler</a>
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
