@extends('layout.master')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file"></i> Presentation</h1>
            <p>Cet onglet permet d'afficher les presentations</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Presentations</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Nouvelle presentation</button>
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Nouvelle presentation</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admins.presentation.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Titre*</label>
                                        <input type="text" value="" name="titre" class="form-control  @error('titre') is-invalid @enderror">
                                        @error('titre')<span class="text text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Image*</label>
                                        <input type="file" value="" name="images" class="form-control @error('image') is-invalid @enderror">
                                        @error('images')<span class="text text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Description</label>
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="" cols="30" rows="10"></textarea>
                                        @error('description')<span class="text text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($presentations as $presentation)
        <div class="col-3">
            <div class="card" style="width: 18rem;">
            <img src="{{asset('img/presentations/'.$presentation->images)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$presentation->titre}}</h5>
                <p class="card-text">
                    @if(strlen($presentation->description)<200)
                        {{$presentation->description}}
                    @else
                    <?php
                        echo substr(strip_tags($presentation->description), 0, 200).'...';
                    ?>
                    @endif
                </p>
                <a href="{{route('admins.presentation.show',$presentation->id)}}" class="btn btn-primary">Lire plus</a>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg{{$presentation->id}}">Modifier</button>
                <div class="modal fade bs-example-modal-lg{{$presentation->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Modification</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('admins.presentation.update',$presentation->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{method_field('put')}}
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Titre*</label>
                                            <input type="text" required value="{{$presentation->titre}}" name="titre_update" class="form-control @error('titre_update') is-invalid @enderror">
                                            @error('titre_update')<span class="text text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Image*</label>
                                            <input type="file" value="" name="image_update" class="form-control @error('image_update') is-invalid @enderror">
                                            @error('image_update')<span class="text text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Description</label>
                                            <textarea name="description_update" required class="form-control @error('description_update') is-invalid @enderror" id="" cols="30" rows="10">{{$presentation->description}}</textarea>
                                            @error('description_update')<span class="text text-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary">Modifier</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{route('admins.presentation.destroy',$presentation->id)}}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
            {{ $presentations->links() }}
        </div>
    </div>
</main>
@endsection
