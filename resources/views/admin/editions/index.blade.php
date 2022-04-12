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
        <form action="{{route('admin.edition.recherche')}}" method="GET" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q" id="inputQ" @if(isset($q)) value="{{$q}}"  @endif
                placeholder="Rechercher des salles" >
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
    </section>

    <a href="{{route('admin.edition.action',['id'=> -1])}}" class="btn btn-primary float-right">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Créer une édition
    </a>
    <br><br>
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header text-center">
                <h3 class="card-title">
                    <span class="badge badge-danger">{{ $editions->total() }}</span>
                    <span class="text-truncate"> Editions </span>
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
                               <th id="nomcomplet">
                                   Titre
                               </th>

                               <th>
                                   Date début
                               </th>
                               <th>
                                   Date fin
                            </th>
                               <th class="text-center action" style="width: 204px">
                                   Action
                               </th>
                           </tr>
                        </thead>
                        <tbody>
                        @forelse($editions as $ed)
                            @if ($editions->total()>0)
                                <tr>
                                    <td>
                                        {{ $ed->titre }}
                                    </td>
                                    <td>
                                        {{ $ed->date_debut }}
                                    </td>
                                    <td>
                                        {{ $ed->date_fin }}
                                    </td>

                                    <td class="project-actions text-right d-flex">
                                        <div class="">
                                            <a class="btn btn-info btn-sm" href="{{route('admin.edition.action',['id'=> $ed->id])}}">
                                                <i class="fas fa-pencil-alt fa-sm">
                                                </i>
                                                Editer
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" onclick="$('#btn-sup-ed').attr('href','{{ route('admin.edition.supprimer',['id' => $ed->id ]) }}');">
                                                <i class="fas fa-trash fa-sm">
                                                </i>
                                                Supprimer
                                            </button>
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
            {{ $editions->links() }}
        </div>

    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <br><h5 class="swal2-title">Tu es sure ?</h5>
                <div class="swal2-content">
                    Tu ne peux pas récupérer l'enregistrement après la suppression
                </div>
                <div class="modal-btns">
                    <a href="#" type="button" class="btn btn-success" id="btn-sup-ed">Oui, Supprimer</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Non, Annuler</button>
                </div><br>
            </div>
        </div>
    </div>
@endsection
