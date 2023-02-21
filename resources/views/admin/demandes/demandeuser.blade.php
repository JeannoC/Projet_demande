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
    @if(session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
    @endif
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
                                            <a href="{{route('admins.demande.show',$demand->id)}}" class="btn btn-info btn-md"><i class="fa fa-folder-open"></i></a>
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
