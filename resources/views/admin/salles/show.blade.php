@extends('layouts.admin')
@section('content')
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br><br>
                {{-- <a href="{{route('create.salle.view')}}" class="btn btn-primary float-right">Créer une nouvelle salle</a><br><br>--}}
                <section class="content">
                    @if (Session::has('status'))
                        <p class="alert alert-success" role="alert">
                            <strong class="text-danger">{{ session::get('status') }}</strong>
                        </p>
                @endif
                <!-- Default box -->
                    <div class="card col-md-8" style="margin: auto;">
                        <div class="card-header">
                            <h3 class="card-title">
                                <span class="text-truncate"> Salles </span>
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
                                <table class="table table-striped salles">
                                    <thead>
                                    <tr>
                                        <th>
                                            Nom de la salle
                                        </th>
                                        <th>
                                            Propriétaire
                                        </th>
                                        <th>
                                            Crée le
                                        </th>
                                        {{-- <th>
                                            Actions
                                        </th> --}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            {{$salle->nom}}
                                        </td>
                                        <td>
                                            @if ($salle->user)
                                                {{ $salle->user->nom ." ". $salle->user->prenom }}
                                            @else
                                                <span class="text-danger">(Aucun utilisateur)</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $salle->created_at }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </section>
                <!-- /.content -->
                <br>
            </div>
        </div>
    </div>

@endsection
