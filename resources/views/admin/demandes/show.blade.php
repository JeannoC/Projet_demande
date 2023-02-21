@extends('layout.app')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-user"></i> {{$demande->demandeur->user->prenom ." ".$demande->demandeur->user->prenom}}</h1>
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
                <div class="card-body">
                    <h2 class="text-center">Les actions sur cette demande</h2>
                    <table class="table table-striped table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom </th>
                                <th>PRENOM</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php $id = 1;?>
                            @foreach($demandeadmin as $key=> $demadmin)
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td>{{$demadmin->user->name}}</td>
                                    <td>{{$demadmin->user->prenom}}</td>
                                    <td>{{$demadmin->action}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
                    @if($document)
                    <div class="tab-pane" id="detail">
                        <div class="row col-md-10 center">
                            <p class="h1 ">Liste des doucments</p>
                            <div class="row">
                                <div class="card mr-1 col-md-5">
                                    <img src="{{asset('img/images/'.$document->name)}}" class="card-img-top" alt="...">
                                    <div class="card-body ">
                                      <p class="card-text">Photo d'identité</p>
                                    </div>
                                  </div>
                                  <div class="card col-md-5">
                                    <img src="{{asset('img/imageSignature/'.$document->filename)}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                      <p class="card-text">Photo de signature</p>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>
        </div>

    </div>
</main>
@endsection
