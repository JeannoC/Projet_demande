@extends('layout.app')
@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file"></i> Gestion des {{ $segments=="nouveaux" ? 'nouveaux' : 'traitées'}}  demande</h1>
            <p>Cet onglet permet d'afficher les historiques des demande qui n'ont pas été validés d'abord</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Gestion des demandes</a></li>
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
                                    <th>{{$segments=="nouveaux" ? 'Valider': 'Status'}}</th>
                                </thead>
                                <tbody>
                                    @foreach($demande as $key=> $demand)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{substr($demand->created_at, 0, 10)}}</td>
                                        <td>{{$demand->users_id->Prenom}}</td>
                                        <td>{{$demand->users_id->name}}</td>
                                        <td>{{$demand->type_demande}}</td>
                                        <td>{{$demand->demandeurs_id->genre}}</td>
                                        <td>{{$demand->demandeurs_id->date_naissance}}</td>
                                        <td>{{$demand->demandeurs_id->lieu_naissance}}</td>
                                        <td>
                                            <a href="{{route('admins.demande.show',$demand->id)}}" class="btn btn-info"><i class="fa fa-folder-open"></i></a>
                                        </td>
                                        <td>
                                            @if($segments=="nouveaux")
                                            <form action="{{route('admins.demande.update',$demand->id)}}" method="post">
                                                @csrf
                                                {{method_field('put')}}
                                                <button class="btn btn-info" type="submit">Valider</button>
                                            </form>
                                            @else
                                                <span>Traitees</span>
                                            @endif
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
