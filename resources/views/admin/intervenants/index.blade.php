@extends('layouts.admin')
@section('content')
    <br>
    @if (Session::has('status'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ session::get('status') }}</strong>
        </div>
    @endif
    <section class="rechercher-admin float-left">
        <form action="{{route('admin.intervenants.recherche')}}" method="GET" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q" id="inputQ" @if(isset($q)) value="{{$q}}"  @endif
                placeholder="Rechercher" >
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
    </section>

    <div class="exporter-data float-right">
        <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Exporter
            </button>
            <div class="dropdown-menu exporte-dropdown" aria-labelledby="dropdownMenuButton">
                <form action="{{ route('admin.intervenants.export') }}" method="POST">
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
                @if($errors->any())
                    <br><br>
                    <ul class="errors">
                        @foreach ($errors->all() as $error)
                           <li class="red">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
            </div><!-- dropdown-menu -->
        </div>
    </div>
    <a href="{{route('admin.intervenants.action',['id'=> -1])}}" class="btn btn-primary float-right">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Créer une intervenant
    </a>
    <br><br>
        <section class="content">
            <!-- Default box -->
            <div class="card">
              <div class="card-header text-center">
                <h3 class="card-title">
                    <span class="badge badge-danger">{{ $users->total() }}</span>
                    <span class="text-truncate"> Intervenants </span>
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
                                <th>
                                    Nom complet
                                </th>
                                <th>
                                    Téléphone
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    N° d'édition
                                </th>
                                <th>
                                    Date
                                </th>
                                <th class="text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            @if (!empty($user))
                            <tr>
                                <td>
                                    {{ $user->prenom }} {{ $user->nom }}
                                </td>
                                <td>
                                    {{ $user->tel }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td class="text-danger">
                                    {{$user->edition["titre"]}}
                                </td>
                                <td>
                                    <small>{{ $user->created_at }}</small>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.intervenants.action',['id' => $user->id ]) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Editer
                                    </a>
                                    <a class="btn btn-danger btn-sm" data-id="{{ $user->id }}" onclick="deleteItem(this,'/admin/users/')">
                                        <i class="fas fa-trash">
                                        </i>
                                        Supprimer
                                    </a>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td class="text-center" colspan="5">
                                    Tableau vide
                                </td>
                            </tr>
                            @endif
                            @endforeach

                        </tbody>
                    </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>

            <div class="text-center">
                {{ $users->links() }}
            </div>

            <!-- /.card -->

          </section>
          <!-- /.content -->
          <br>
@endsection
