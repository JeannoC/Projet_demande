@extends('layout.app')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file"></i> La Liste des demandes pre-validé</h1>
            <p>Cet onglet permet d'afficher a Liste des demandes pre-validé</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Listes des demandes</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="card">
                    <div class="card card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="sampleTable">
                            <thead>
                                <th>N°</th>
                                <th>Date demande</th>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>Type de Demande</th>
                                <th>Genre</th>
                                <th>Date Naissance</th>
                                <th>Lieu Naissance</th>
                                <th><i class="fa fa-folder-open"></i></th>
                                <th>Valider</th>
                            </thead>
                            <tbody>
                                @foreach($demandes as $key=> $demand)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{substr($demand->created_at, 0, 10)}}</td>
                                    <td>{{$demand->demandeur->user->prenom}}</td>
                                    <td>{{$demand->demandeur->user->name}}</td>
                                    <td>{{Str::upper($demand->type_demande)}}</td>
                                    <td>{{$demand->demandeur->genre}}</td>
                                    <td>{{$demand->demandeur->date_naissance}}</td>
                                    <td>{{$demand->demandeur->lieu_naissance}}</td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#exampleModaldetail" class="btn btn-info btn-sm" type="submit"><i class="fa fa-folder-open"></i></button>
                                        <div class="modal fade" id="exampleModaldetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModaldetail">Vous voulez affichier les details de cette demande</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                        <a href="{{route('admins.demande.show',$demand->id)}}" class="btn btn-info">oui</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{route('admins.demande.updatevalidation',$demand->id)}}" method="post" enctype="multipart/form-data" >
                                            @csrf
                                            {{method_field('put')}}
                                            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn-sm" type="submit">Valider</button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Vous voulez effectuer une validation final <br> de cette demande Mr DG</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                            <button type="submit" class="btn btn-primary">Oui</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
