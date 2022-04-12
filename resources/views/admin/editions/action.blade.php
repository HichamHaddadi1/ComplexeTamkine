@extends('layouts.admin')
@section('content')
  <!-- Main content -->
  <br>
  <div class="container">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                    <form @if(isset($type) && $type=="creation") method="post" action="{{ route('admin.edition.create') }}" @else method="post" action="{{route('admin.edition.modifier',['id'=> $edition->id])}}" @endif  enctype="multipart/form-data" form id="valider">
                        {{csrf_field()}}
                        <div class="card card-secondary">
                            <div class="card-header">
                              <h3 class="card-title">L'édition</h3>
                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                              </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="orientateurnom">Nom</label>
                                    <input type="text" class="form-control" name="titre" value="{{ old('titre',$edition->titre  ?? null) }}">
                                    @if($errors->has('titre'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('titre') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="orientateurnom">Description</label>
                                    <textarea name="description" id="" cols="30" rows="5" class="form-control">{{ old('description',$edition->description  ?? null) }}</textarea>
                                    @if($errors->has('description'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="orientateurnom">Date début</label>
                                    <input type="date" class="form-control" name="date_debut" value="{{ old('date_debut',$edition->date_debut  ?? null) }}">
                                    @if($errors->has('date_debut'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('date_debut') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="orientateurnom">Date fin</label>
                                    <input type="date" class="form-control" name="date_fin" value="{{ old('date_fin',$edition->date_fin  ?? null) }}">
                                    @if($errors->has('date_fin'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('date_fin') }}</strong>
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
                                       Créer Édition
                                    @else
                                       <i class="fas fa-pencil-alt"></i>
                                       Modifier Édition
                                    @endif
                                </button>

                            <a href="{{ route('admin.editions.index') }}" class="btn btn-secondary float-right btnAnnuler">Annuler</a>
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
