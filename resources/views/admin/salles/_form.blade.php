<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Salle</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="inputName">Nom</label>
            <input type="text" id="inputNom" class="form-control" name="nomDeLaSalle" value="{{ old('nomDeLaSalle',$salle->nom) }}">
            @if($errors->has('nomDeLaSalle'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('nomDeLaSalle') }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="inputDescription">Description</label>
            <textarea id="inputDescription" class="form-control" rows="5" name="descriptionDeLaSalle" value="{{ old('descriptionDeLaSalle', $salle->description) }}">{{ old('descriptionDeLaSalle', $salle->description) }}
          </textarea>
            @if($errors->has('descriptionDeLaSalle'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('descriptionDeLaSalle') }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
              <label for="inputStandSalle">Stand</label>
              <div class="custom-file">
                  <input type="file" id="inputStandSalle" name="standDeLaSalle" lang="fr" value="{{ old('standDeLaSalle',$salle->stand) }}">
                  <small>{{ $salle->stand }}</small>
              </div>
              @if($errors->has('standDeLaSalle'))
              <span class="text-danger" role="alert">
                  <strong>{{ $errors->first('standDeLaSalle') }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="inputVideo">Lien de vidéo</label>
              <div class="custom-file">
                <input type="text" id="inputVideo" class="form-control" name="videoDeLaSalle" value="{{ old('videoDeLaSalle', $salle->lien_video) }}">
              </div>
              @if($errors->has('inputVideo'))
              <span class="text-danger" role="alert">
                  <strong>{{ $errors->first('inputVideo') }}</strong>
              </span>
              @enderror
              <div class="form-group">
                <label for="user">Utilisateur</label>
                <select id="user" class="form-control custom-select" name="user">
                  @foreach ($users as $user)
                  <option value="{{ old('user', $user->id) }}" {{ $user->id == $salle->user_id ? 'selected' : '' }}>{{ old('user', $user->nom." " .$user->prenom) }}</option>
                  @endforeach
                  </select>
                  @if($errors->has('user'))
                  <span class="text-danger" role="alert">
                      <strong>{{ $errors->first('user') }}</strong>
                  </span>
                  @enderror
              </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>