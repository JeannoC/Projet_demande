@extends('layout.app')
@section('content')
<div class="col-md-12">
    <div class="card">
      <div class="card-header p-2 col-md-12">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profil</a></li>
          <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Documents</a></li>
            @if (Auth::user()->hasRole('demandeur'))
                @if ($document)
                    <li class="nav-item"><a class="nav-link" href="#detail" data-toggle="tab">Detail</a></li>
                @endif
            @endif
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <div class="row col-md-10 center">
                <fieldset class="h1 ">Veuillez completer votre profil</fieldset>
            <br><br>
            @if(session()->has('success'))
            <div id="casser" class="alert alert-success col-12">{{session('success')}} </div>
            @endif
            <form action="{{route('demandeursoumis')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <input type="text" value="{{Auth::user()->id}}" readonly name="identifiant" class="form-control  @error('identifiant') is-invalid @enderror" hidden>
                        @error('identifiant')<span class="text text-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label>Nom Père*</label>
                        <input type="text" name="nom_pere" value="{{$demandeur ? $demandeur->nom_pere : old('nom_pere')}}" class="form-control  @error('nom_pere') is-invalid @enderror">
                        @error('nom_pere')<span class="text text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nom Mere*</label>
                        <input type="text" value="{{$demandeur ? $demandeur->nom_mere: old('nom_mere')}}" name="nom_mere" class="form-control  @error('nom_mere') is-invalid @enderror">
                        @error('nom_mere')<span class="text text-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label>Date de Naissance*</label>
                        <input type="date" value="{{$demandeur ? $demandeur->date_naissance : old('date_naissance')}}" name="date_naissance" class="form-control  @error('date_naissance') is-invalid @enderror">
                        @error('date_naissance')<span class="text text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>Lieu Naissance*</label>
                        <input type="text" value="{{$demandeur ? $demandeur->lieu_naissance : old('lieu_naissance')}}" name="lieu_naissance" class="form-control  @error('lieu_naissance') is-invalid @enderror">
                        @error('lieu_naissance')<span class="text text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>Telephone*</label>
                        <input type="text" value="{{$demandeur ? $demandeur->telephone :  old('telephone')}}" name="telephone" class="form-control  @error('telephone') is-invalid @enderror">
                        @error('telephone')<span class="text text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="from-group col-md-6">
                        <label for="genre">Genre*</label>
                        <select class="form-control" name="genre" id="genre">
                            <option value="masculin" {{ $demandeur && $demandeur->genre == 'masculin' ? 'selected' :''  }}>Masculin</option>
                            <option value="feminin" {{ $demandeur && $demandeur->genre == 'feminin' ? 'selected' :''  }} >Feminin</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 mt-5">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </form>
            </div>
          </div>
          <div class="tab-pane" id="timeline">
            <div class="row col-md-10 center">
                <fieldset class="h1 ">Veuillez ajouter vos documents</fieldset>
            <br><br>
            <form action="{{route('demande.document')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Photo*</label>
                        <input type="file" name="images"  class="form-control  @error('images') is-invalid @enderror">
                        @error('images')<span class="text text-danger">{{$message}}</span>@enderror
                    </div>
                     <div class="form-group col-md-6">
                        <label>Photo signature*</label>
                        <input type="file" name="image_signature"  class="form-control  @error('image_signature') is-invalid @enderror">
                        @error('image_signature')<span class="text text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-md-12 mt-5">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </form>
            </div>
          </div>
           @if (Auth::user()->hasRole('demandeur'))
                @if ($document)
                <div class="tab-pane" id="detail">
                    <div class="row col-md-10 center">
                        <p class="h1 ">Vos Documents</p>
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
           @endif
        </div>
      </div>
    </div>
  </div>
@endsection

