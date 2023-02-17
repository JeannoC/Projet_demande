@extends('layout.app')
@section('content')
@include('demandeur.frontdemandeur')
<div class="col-12">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profil</a></li>
          <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Documents</a></li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <div class="row col-10 center">
                <fieldset class="h1 ">Veuillez completer votre profil</fieldset>
            <br><br>
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
            <div class="row col-10 center">
                <fieldset class="h1 ">Veuillez ajouter vos documents</fieldset>
            <br><br>
            <form action="{{route('demande.document')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-row">
                    <div class="file-upload col-6">
                        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Ajout Photo</button>
                        <div class="image-upload-wrap">
                          <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" name="images"/>
                          <div class="drag-text">
                            <h3>Faites glisser et déposez ou sélectionnez ajouter une image</h3>
                          </div>
                        </div>
                        <div class="file-upload-content">
                          <img class="file-upload-image" src="#" alt="your image" />
                          <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload()" class="remove-image">Suprimer <span class="image-title">Uploaded Image</span></button>
                          </div>
                        </div>
                      </div>
                      <div class="file-upload col-6">
                          <button class="file-upload-btn" type="button" onclick="$('.file-upload-inputs').trigger( 'click' )">Ajout Photo Signature</button>
                          <div class="image-upload-wraps">
                            <input class="file-upload-inputs" type='file' onchange="readURLS(this);" accept="image/*" name="image_signature"/>
                            <div class="drag-text">
                              <h3>Faites glisser et déposez ou sélectionnez ajouter une image</h3>
                            </div>
                          </div>
                          <div class="file-upload-contents">
                            <img class="file-upload-images" src="#" alt="your image" />
                            <div class="image-title-wrap">
                              <button type="button" onclick="removeUploads()" class="remove-image">Suprimer <span class="image-title">Uploaded Image</span></button>
                            </div>
                          </div>
                        </div>
                    <div class="form-group col-md-12 mt-5">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
