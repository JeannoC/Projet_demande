@extends('layout.master')
@section('content')
<main class="app-content">
<div class="app-title">
    <div>
        <h1><i class="fa fa-users"></i> Gestion des utilisateurs</h1>
        <p>Cet onglet permet d'afficher la gestion des utilisateurs</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active"><a href="#">Accueil</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <form action="{{route('users.store')}}" method="post" class="row">
            @csrf
                <div class="form-group col-md-3">
                    <label for="">Nom Complet</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name"  placeholder="Saisir nom complet">
                    @error('name')<span class="text text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="">Entrer L'Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email"  placeholder="Saisir email">
                    @error('email')<span class="text text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="">Numéro de téléphone</label>
                    <input type="text" class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact') }}" name="contact"  placeholder="Saisir contact">
                    @error('contact')<span class="text text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="">Mot de passe</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password"  placeholder="Saisir le mot de passe">
                    @error('password')<span class="text text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="">Actions</label><br>
                    <button type="submit" class="btn btn-primary">Enregister</button>
                </div>
            </form>
        </div>
        <div class="tile">
        <div class="table-responsive">
                <table class="table table-striped table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>NOM COMPLET</th>
                            <th>CONTACT</th>
                            <th>EMAIL</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 1;?>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$id++}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->telephone}}</td>
                            <td>{{$user->email}}</td>
                            <td class="text-xs-center">
                                @if($user->statuts==1)
                                <form action="{{url('suspendre/'.$user->id)}}" method="post">
                                    {{@csrf_field()}}
                                    {{method_field('put')}}
                                    <button class="btn btn-info" ><i class="fa fa-unlock"></i></button>
                                </form>
                                @else
                                <form action="{{url('desuspendre/'.$user->id)}}" method="post">
                                    {{@csrf_field()}}
                                    {{method_field('put')}}
                                    <button class="btn btn-info" ><i class="fa fa-lock"></i></button>
                                </form>
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
</main>
@endsection