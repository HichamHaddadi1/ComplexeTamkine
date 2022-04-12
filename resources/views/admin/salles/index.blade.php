@extends('layouts.admin')
@section('content')
    <br>

    <a href="{{route('create.salle.view')}}" class="btn btn-primary float-right">Créer une nouvelle salle</a><br><br>
        <section class="content">
            @if (Session::has('status'))
            <p class="alert alert-success" role="alert">
                <strong class="text-white">{{ session::get('status') }}</strong>
            </p>
            @endif
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                   <span class="badge badge-danger">{{ $salles->total() }}</span>
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
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($salles as $sal)
                            <tr>
                                <td>
                                    {{$sal->nom}}
                                </td>
                                <td>
                                    {{ $sal->user->nom ." ". $sal->user->prenom }} 
                                </td>
                                <td>
                                    {{ $sal->created_at }}
                                </td>
                                <td>    
                                    <a class="btn btn-primary btn-sm" href="{{ route('startmeeting',['id'=> $sal->id]) }}"> 
                                        <i class="fa fa-play fa-sm" aria-hidden="true"></i>
                                        Démarer
                                    </a>   
                                    <a class="btn btn-info btn-sm" href="{{ route('salles.edit',['salle'=>$sal->id]) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Editer
                                    </a>
                                    <a class="btn btn-danger btn-sm" data-id="{{ $sal->id }}" onclick="deleteItem(this,' salles/')">
                                        <i class="fas fa-trash">
                                        </i>
                                        Supprimer
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">
            
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
        </section>
        {{ $salles->links() }}
          <!-- /.content -->
          <br>
@endsection
