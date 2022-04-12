@extends('layouts.participant')
@section('content')
    <div class="container">


        <div class="row">
            <div class="col-lg-12">
                <div class="info-box">
                    <div class="row">
                        <div class="col-md-2 col-sm-12">
                            <span class="info-box-icon wh_3 center_margin"><i class="fas fa-video-slash"></i></span>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <div class="info-box-content text_sm_center">
                                <h3>Salles fermées
                                </h3>

                                    Sur cette page, vous trouverez tous les conseillers d'orientation
                                    qui vont être présents avec nous lors de cette deuxième édition des Journées Portes Ouvertes Virtuelles
                                    <br>
                                    Pour discuter avec eux à propos de votre cursus scolaire et de votre avenir, dirigez-vous vers les salles ouvertes.
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>


                </div>
                <!-- /.info-box -->
            </div>
        </div>


        <div class="recherche">
            <button class="btn-recherche-globale">
                <i class="fas fa-search"></i>
            </button>
            <button class="btn-recherche-par-region">
                <i class="fas fa-filter"></i>
            </button>
        </div>

        <!-- -->
        <div class="row" id="recherche-items">
            <div class="recherche-par-regions"  @if(isset($typeRecherche) && $typeRecherche == 'regions') style="display: block;" @else style="display: none;" @endif>
                <form name="frmRgions" action="{{route('participant.recherche_salles_fermees_regions')}}" method="GET" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <select class="form-control custom-select auto-select" name="inputRegion" onchange="document.frmRgions.submit()">
                            <option value="-1" @if(isset($q) && $typeRecherche == 'regions' && $q == "-1") selected  @endif>Veuillez choisir une régions</option>
                            @foreach ($regions as $reg)
                                <option value="{{$reg->id}}" @if(isset($q) && $typeRecherche == 'regions' && $q == $reg->id) selected  @endif>{{$reg->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="recherche-globale" id="" @if(isset($typeRecherche) && $typeRecherche == 'globale') style="display: block;" @else style="display: none;" @endif>
                <form action="{{route('participant.recherche_salles_fermees_globale')}}" method="GET" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <select class="form-control custom-select auto-select" name="inputTypeRecherche" class="select-auto" id="inputTypeRecherche">
                            <option value="salles.nom" @if(isset($type) && $typeRecherche == 'globale' && $type == "salles.nom") selected  @endif>Nom de la Salle</option>
                            <option value="users.nom" @if(isset($type) && $typeRecherche == 'globale' && $type == "users.nom") selected  @endif>Nom de propriétaire de la salle</option>
                            <option value="users.prenom" @if(isset($type) && $typeRecherche == 'globale' && $type == "users.prenom") selected  @endif>Prénom de propriétaire de la salle</option>
                            <option value="users.email" @if(isset($type) && $typeRecherche == 'globale' && $type == "users.email") selected  @endif>Email de propriétaire de la salle</option>
                            <option value="tous" @if(isset($type) && $typeRecherche == 'globale' && $type == "tous") selected  @endif>Tous</option>
                        </select>

                        <input type="text" class="form-control" name="q" id="inputQ" @if(isset($q) && $typeRecherche == 'globale') value="{{$q}}"  @endif
                            placeholder="Rechercher des salles"> <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>

        <!-- -->
        @if ($salles_fermees->total()>0)
            <div class="salles-ouverts row">
                @foreach ($salles_fermees as $sal)
                    <div class="card-salle col-md-3 col-xs-12">
                        <div class="titre">{{$sal->nom}}</div>
                        <div class="img">
                            <img src="{{ asset('dist/files/stands/'.$sal->stand) }}" alt="">
                        </div>
                        <div class="decription">{{ substr($sal->description, 0, 90)."..." }}</div>
                        <div class="btnR">
                            <a href="{{route('participant.rejoidre',['id'=> $sal["id"]])}}" class="btn btn-primary" tabindex="-1">Savoirs Plus</a>
                    </div>
                </div>
                @endforeach
            </div><!-- -->
            <div id="pagination">
                {{ $salles_fermees->links() }}
            </div>
            @else
               <p class="alert alert-danger text-center" role="alert">
                   Aucune salle virtuelle n'est disponible pour l'instant.
                </p>
                <br>
            @endif
    </div>

@endsection
