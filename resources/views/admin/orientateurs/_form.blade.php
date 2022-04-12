<div class="row">
    <div class="col-md-6">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Orientateur</h3>

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
                <label for="type">Type d'universté</label>
                <select class="form-control" name="type">
                   <option value="national">National</option>
                   <option value="international">International</option>
                </select>
            </div>
              <div class="form-group">
                  <label for="orientateurnom">Nom d'université</label>
                  <input type="text" id="orientateurnom" class="form-control" name="orientateurnom" value="{{ old('orientateurnom', $salle->user->nom  ?? null) }}">
                  @if($errors->has('orientateurnom'))
                  <span class="text-danger" role="alert">
                      <strong>{{ $errors->first('orientateurnom') }}</strong>
                  </span>
                  @enderror
               </div>
              <div class="form-group">
                  <label for="orientateurprenom">Responsable d'université</label>
                  <input type="text" id="orientateurprenom" class="form-control" name="orientateurprenom" value="{{ old('orientateurprenom',$salle->user->prenom  ?? null) }}">
                  @if($errors->has('orientateurprenom'))
                  <span class="text-danger" role="alert">
                      <strong>{{ $errors->first('orientateurprenom') }}</strong>
                  </span>
                  @enderror
               </div>
              <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="email" value="{{ old('email',$salle->user->email  ?? null) }}">
                @if($errors->has('email'))
                <span class="text-danger" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="tel">Téléphone</label>
                <input type="tel" class="form-control" id="tel" name="tel" value="{{ old('tel',$salle->user->tel  ?? null) }}">
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
                  <option value="{{ old('region', $region->id  ?? null) }}" {{ $region->id == ($salle->user->region_id ?? null) ? 'selected' : '' }}>{{ $region->nom }}</option>
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
    <div class="col-md-6">
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
            <input type="text" id="inputNom" class="form-control" name="nomDeLaSalle" value="{{ old('nomDeLaSalle',$salle->nom  ?? null) }}">
            @if($errors->has('nomDeLaSalle'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('nomDeLaSalle') }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="inputDescription">Description</label>
            <textarea id="inputDescription" class="form-control" rows="5" name="descriptionDeLaSalle" value="{{ old('descriptionDeLaSalle', $salle->description ?? null) }}">{{ old('descriptionDeLaSalle', $salle->description  ?? null) }}</textarea>
            @if($errors->has('descriptionDeLaSalle'))
            <span class="text-danger" role="alert">
                <strong>{{ $errors->first('descriptionDeLaSalle') }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
              <label for="inputStandSalle">Stand</label>
              <div class="custom-file">
                  <input type="file" id="inputStandSalle" name="standDeLaSalle" lang="fr">
                  <small>{{ $salle->stand ?? null}}</small>
              </div>
              @if($errors->has('standDeLaSalle'))
              <span class="text-danger" role="alert">
                  <strong>{{ $errors->first('standDeLaSalle') }}</strong>
              </span>
              @enderror
            </div>
            {{-- <div class="form-group">
              <label for="inputVideo">Lien de vidéo</label>
              <div class="custom-file">
                <input type="text" id="inputVideo" class="form-control" name="videoDeLaSalle" value="{{ old('videoDeLaSalle', $salle->lien_video ?? null) }}">
              </div>
              @if($errors->has('videoDeLaSalle'))
              <span class="text-danger" role="alert">
                  <strong>{{ $errors->first('videoDeLaSalle') }}</strong>
              </span>
              @enderror
          </div> --}}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
