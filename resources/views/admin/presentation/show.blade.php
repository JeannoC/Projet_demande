@extends('layout.master')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file"></i> Affichage d'une activité</h1>
            <p>Cet onglet permet d'afficher les details d'une activité</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Affichage d'une activité</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('img/presentations/'.$presentations->images)}}" class="card-img-top" alt="...">

            </div>
            <div class="tile">
                <h5 class="card-title">{{$presentations->titre}}</h5>
                <p class="card-text">
                    {{$presentations->description}}
                </p>
            </div>
        </div>
    </div>
</main>
