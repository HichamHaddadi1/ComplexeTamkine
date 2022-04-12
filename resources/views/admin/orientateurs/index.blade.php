@extends('layouts.admin')
@section('content')
    <br>
    @if (Session::has('status'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ session::get('status') }}</strong>
        </div>
    @endif


    <div class="rechercher-admin float-left">
        <form action="{{ route('admin.orientateur.recherche') }}" method="GET" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q" id="inputQ"
                    @if (isset($q)) value="{{ $q }}" @endif placeholder="Recherche par nom">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <button class="btn-filter-edition" id="btn-filter-edition">
            <i class="fas fa-filter"></i>
        </button>
        <form name="frm_filter_edition" id="frm-filter-edition" action="{{ route('admin.filter.orientateur.edition') }}"
            method="GET" role="search" style="display: none;">
            {{ csrf_field() }}
            <div class="input-group">
                <select class="form-control custom-select auto-select" name="inputEdition"
                    onchange="document.frm_filter_edition.submit()">
                    <option value="-1">Veuillez choisir une édition</option>
                    @foreach ($editions as $ed)
                        <option value="{{ $ed->id }}">{{ $ed->titre }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

    <div class="exporter-data float-right">
        <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Exporter
            </button>
            <div class="dropdown-menu exporte-dropdown" aria-labelledby="dropdownMenuButton">
                <form action="{{ route('admin.orientateur.export') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="example-date-input" class="col-4 col-form-label">Date début</label>
                        <div class="col-8">
                            <input class="form-control" type="date" name="dateDebut">
                        </div>
                    </div><!-- fin item 1 -->
                    <div class="form-group row">
                        <label for="example-date-input" class="col-4 col-form-label">Date fin</label>
                        <div class="col-8">
                            <input class="form-control" type="date" name="dateFin">
                        </div>
                    </div><!-- fin item 2 -->
                    <button type="submit" class="btn btn-primary btn-sm float-right">
                        <i class="far fa-file-excel"></i>
                        Exporter
                    </button>
                </form>
                <!--L'affichage des error-->
                @if ($errors->any())
                    <br><br>
                    <ul class="errors">
                        @foreach ($errors->all() as $error)
                            <li class="red">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div><!-- dropdown-menu -->
        </div>
    </div>
    <div>
        {{-- <a href="{{ route('fermer.salles') }}" class="btn btn-danger float-right" id="btn-fermer-salles"> --}}
        {{-- <i class="fas fa-times"></i> --}}
        {{-- Fermer les salles ouvertes --}}
        {{-- </a> --}}
        <a href="{{ route('create.salle.view') }}" class="btn btn-primary float-right">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Créer université
        </a>
    </div>
    <br><br>
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header text-center">

                <h3 class="card-title">
                    <span class="badge badge-info">{{ $salles->total() }}</span>
                    <span class="text-truncate">Université(s) affichées</span>&nbsp; &nbsp;

                    <span class="badge badge-danger">{{ \App\User::where([['role', 'orientateur']])->count() }}</span>
                    <a href="{{ route('orintateur.liste') }}" class="text-truncate">Tous</a>&nbsp; &nbsp;

                    <span
                        class="badge badge-success">{{ \App\Salle::where([['id', '!=', 1], ['is_running', true]])->count() }}</span>
                    <a href="{{ route('admin.orientateur.salle_ouvertes') }}" class="text-truncate">Les Salles
                        Ouvertes</a>
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>

                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped salles table-hover">
                        <thead>
                            <tr>
                                <th id="nomcomplet" style="width: 20% !important;">
                                    Nom complet
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Salle
                                </th>
                                <th>
                                    Type
                                </th>
                                <th>
                                    Edition
                                </th>
                                <th>
                                    Date
                                </th>
                                <th class="text-center action" style="width: 25% !important;">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($salles as $salle)
                                @if (!empty($salle->user))
                                    <tr>
                                        <td>
                                            <p class="m-0">
                                                {{ $salle->user->nom . ' ' . $salle->user->prenom }}
                                            </p>
                                            <small class="text-danger"><strong>Téléphone:
                                                    {{ $salle->user->tel }}</strong></small>
                                        </td>
                                        <td>
                                            {{ $salle->user->email }}
                                        </td>

                                        <td>
                                            <a class="text-danger"
                                                href="{{ route('salles.show', ['salle' => $salle->id]) }}">{{ $salle->nom }}</a>
                                            <p class="m-0">
                                                @if ($salle->is_running)
                                                    <small class="text-danger"><strong>(Ouverte)</strong></small>
                                                @else
                                                    <small class="text-danger text"><strong>(Fermée)</strong></small>
                                                @endif
                                            </p>
                                        </td>
                                        <td>
                                            {{ $salle->user->type }}
                                        </td>
                                        <td>
                                            <small>{{ $salle->user->edition['titre'] }}</small>
                                        </td>
                                        <td>
                                            <small>{{ $salle->user->created_at }}</small>
                                        </td>

                                        <td class="project-actions text-right d-flex">
                                            <div class="">
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('startmeeting', ['id' => $salle->id]) }}">
                                                    <i class="fa fa-play fa-sm" aria-hidden="true"></i>
                                                    Démarer
                                                </a>
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('orientateur.edit', ['id' => $salle->id]) }}">
                                                    <i class="fas fa-pencil-alt fa-sm">
                                                    </i>
                                                    Editer
                                                </a>
                                                <a class="btn btn-danger btn-sm" data-id="{{ $salle->user->id }}"
                                                    onclick="deleteItem(this,'/admin/supprimerorientateur/')">
                                                    <i class="fas fa-trash fa-sm">
                                                    </i>
                                                    Supprimer
                                                </a>
                                                <a class="btn btn-success btn-sm" onclick="sendmsg(this,'/admin/sendmail/')"
                                                data-id="{{ $salle->user->id }}">
                                                    <i class="fas fa-paper-plane">
                                                    </i>
                                                    Envoyer
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td class="text-center" colspan="7">

                                        Tableau vide
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="text-center">
            {{ $salles->links() }}
        </div>

    </section>
    <!-- /.content -->
    <br>
    <script>
        function deleteItem(e, deleteUrl) {
            let id = e.getAttribute('data-id');
            var token = $("meta[name='csrf-token']").attr("content");
            console.log(deleteUrl + id);

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name=_token]').attr('content')
                }
            });
            swalWithBootstrapButtons
                .fire({
                    title: 'Tu es sure ?',
                    text: "Tu ne peux pas récupérer l'enregistrement après la suppression",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Oui, Supprimer',
                    cancelButtonText: 'Non, Annuler',
                    reverseButtons: false
                })

                .then((willDelete) => {
                    if (willDelete.value == true) {
                        $.ajax({
                            type: 'DELETE',
                            url: deleteUrl + id,
                            data: {
                                "_token": token
                            },
                            success: function(data) {
                                console.log('Succeess');
                                swalWithBootstrapButtons.fire(
                                    'Supprimé!',
                                    'Le fichier est bien supprimé',
                                    "success"
                                );
                                location.reload(true);
                                // get_company_data();
                                // $("#" + id + "").remove();  you can add name div to remove }

                            },
                        });
                    }
                    if (willDelete.dismiss == 'cancel') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Queque chose fausse ici!',
                            footer: 'Essayer encore'
                        })
                    }
                });
        };

        function sendmsg(e, sendUrl) {
            let id = e.getAttribute('data-id');
            var token = $("meta[name='csrf-token']").attr("content");
            console.log(sendUrl + id);

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name=_token]').attr('content')
                }
            });
            swalWithBootstrapButtons
                .fire({
                    title: 'Tu es sure ?',
                    // text: "Tu ne peux pas récupérer l'enregistrement après la suppression",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Oui, Envoyer',
                    cancelButtonText: 'Non, Annuler',
                    reverseButtons: false
                })

                .then((willDelete) => {
                    if (willDelete.value == true) {
                        $.ajax({
                            type: 'GET',
                            url: sendUrl + id,
                            data: {
                                "_token": token
                            },
                            success: function(data) {
                                console.log('Succeess');
                                swalWithBootstrapButtons.fire(
                                    'Envoyer!',
                                    'L\'email est bien Envoyer',
                                    "success"
                                );
                                location.reload(true);
                                // get_company_data();
                                // $("#" + id + "").remove();  you can add name div to remove }

                            },
                        });
                    }
                    if (willDelete.dismiss == 'cancel') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Queque chose fausse ici!',
                            footer: 'Essayer encore'
                        })
                    }
                });
        };
    </script>
@endsection
