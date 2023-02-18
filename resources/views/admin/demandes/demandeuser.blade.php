@extends('layout.app')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file"></i> Gestion des demandes traité par l'admin</h1>
            <p>Cet onglet permet d'afficher les historiques des demande validés par {{Auth::user()->prenom.' '.Auth::user()->name}}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Gestion de mes demandes</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="card">
                    <div class="card card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="sampleTable">
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
                                </thead>
                                <tbody>
                                    @foreach($demandeuser as $key=> $demand)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{substr($demand->created_at, 0, 10)}}</td>
                                        <td>{{$demand->demande->demandeur->user->prenom}}</td>
                                        <td>{{$demand->demande->demandeur->user->name}}</td>
                                        <td>{{Str::upper($demand->demande->type_demande)}}</td>
                                        <td>{{$demand->demande->demandeur->genre}}</td>
                                        <td>{{$demand->demande->demandeur->date_naissance}}</td>
                                        <td>{{$demand->demande->demandeur->lieu_naissance}}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn-sm" type="submit"><i class="fa fa-folder-open"></i></button>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Vous voulez affichier les details de cette demande</h5>
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
