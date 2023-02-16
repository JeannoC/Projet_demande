@extends('layout.app')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-user"></i> {{$demande->prenom ." ".$demande->name}}</h1>
            <p>Cet onglet permet d'afficher l'information d'un demande</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">{{$demande->demandeur->user->prenom ." ".$demande->demandeur->user->name}}</a></li>
        </ul>
    </div>
    <style>
        .titre_demande{
            font-size: 14px;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
        <div class="card">
                <div class="card-bordy">
                    <div class="col-md-4">
                        <p><strong class="titre_demande">Prénom et nom :</strong> {{$demande->demandeur->user->prenom ." ".$demande->demandeur->user->name}}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong class="titre_demande">Téléphone :</strong> {{$demande->demandeur->telephone}}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong class="titre_demande">Email :</strong> {{$demande->demandeur->user->email}}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong class="titre_demande">Genre :</strong> {{$demande->demandeur->genre}}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong class="titre_demande">Date de naissance :</strong> {{$demande->demandeur->date_naissance}}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong class="titre_demande">Lieu de naissance :</strong> {{$demande->demandeur->lieu_naissance}}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong class="titre_demande">Filiation du père :</strong> {{$demande->demandeur->nom_pere}}</p>
                    </div>
                    <div class="col-md-4">
                        <p><strong class="titre_demande">Filiation de la mère :</strong> {{$demande->demandeur->nom_mere}}</p>
                    </div>
                    <div class="col-6">
                        <p><strong class="titre_demande">Photo :</strong> <img src="{{asset('img/images/'.$demande->photo)}}" alt="" width="90%"></p>
                    </div>
                    <div class="col-6">
                        <p><strong class="titre_demande">Photo Signature :</strong> <img src="{{asset('img/imageSignature/'.$demande->photo_signature)}}" alt="" width="90%"></p>
                    </div>
                </div>
                <form action="{{route('admins.demande.update',$demande->id)}}" method="post">
                    @csrf
                    {{method_field('put')}}
                    <button class="btn btn-info" type="submit">Valider</button>
                </form>
            </div>
        </div>
        </div>

    </div>
</main>
@endsection
