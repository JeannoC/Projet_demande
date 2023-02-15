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
                            @foreach($demande as $key=> $demand)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{substr($demand->created_at, 0, 10)}}</td>
                                <td>{{$demand->prenom}}</td>
                                <td>{{$demand->name}}</td>
                                <td>{{$demand->type_demande}}</td>
                                <td>{{$demand->genre}}</td>
                                <td>{{$demand->date_naissance}}</td>
                                <td>{{$demand->lieu_naissance}}</td>
                                <td>
                                    <a href="{{route('admins.demande.show', $demand->id)}}" class="btn btn-info"><i class="fa fa-folder-open"></i></a>
                                </td>
                                <td>
                                    <form action="{{route('admins.demande.updatevalidation',$demand->id)}}" method="post">
                                        @csrf
                                        {{method_field('put')}}
                                        <button class="btn btn-info" type="submit">Valider</button>
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
</main>
@endsection
