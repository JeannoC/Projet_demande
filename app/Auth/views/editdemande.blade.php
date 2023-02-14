<!-- Loopple Templates: https://www.loopple.com/templates | Copyright Loopple (https://www.loopple.com) | This copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Demande</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
        <link rel="stylesheet" href="https://rawcdn.githack.com/Loopple/loopple-public-assets/ad60f16c8a16d1dcad75e176c00d7f9e69320cd4/argon-dashboard/css/nucleo/css/nucleo.css">
        <link rel="stylesheet" href="{{asset('theme.css')}}">
        <link rel="stylesheet" href="{{asset('loopple.css')}}">
    </head>
    <style>
        body {
  font-family: sans-serif;
  background-color: #eeeeee;
}

.file-upload {
  background-color: #ffffff;
  width: 600px;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #3ba1d8;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #3ba1d8;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #022f48;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-contents {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.file-upload-inputs {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #3eb1c7;
  position: relative;
}

.image-upload-wraps {
  margin-top: 20px;
  border: 4px dashed #3eb1c7;
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color:  #58bcef;
  border: 4px dashed #ffffff;
}

.image-dropping,
.image-upload-wraps:hover {
  background-color: #58bcef;
  border: 4px dashed #ffffff;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #42a6bd;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 200px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}

.file-upload-images {
  max-height: 200px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}
    </style>
    <body>
        <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white loopple-fixed-start" id="sidenav-main">
            <div class="navbar-inner">
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:">
                                <i class="fa fa-desktop text-primary"></i>
                                <span class="nav-link-text">Tableau de bord</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="#dropdown-db" aria-expanded="true" data-toggle="collapse" class="nav-link"><i class="fa fa-folder text-danger"></i>Mes Demandes
                            </a>
                            <ul id="dropdown-db" class="collapse list-unstyled pt-0 ml-4">
                                <li><a href="#" class="dropdown-item" >Laisser-Passer</a></li>
                                <li><a href="#" class="dropdown-item" >Attestation</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="main-content" id="panel">
            <nav class="navbar navbar-top navbar-expand navbar-dark border-bottom " id="navbarTop" style="background-color: #078a36" >
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center  ml-md-auto ">
                            <li class="nav-item d-xl-none">
                                <div class="pr-3 sidenav-toggler sidenav-toggler-dark active" data-action="sidenav-pin" data-target="#sidenav-main">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item d-sm-none">
                                <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                    <i class="ni ni-zoom-split-in"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                            <li class="nav-item dropdown">
                                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="media align-items-center">
                                        <div class="media-body  ml-2   d-lg-block">
                                            <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->prenom }} {{Auth::user()->name}}</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu  dropdown-menu-right ">
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Bienvenue!</h6>
                                    </div>
                                    <a href="{{route('profile')}}" class="dropdown-item">
                                        <i class="fa fa-user"></i>
                                        <span>Mon Profil</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{route('logout')}}" class="dropdown-item">
                                        <i class="fa fa-sign-out-alt"></i>
                                        <span>Deconnexion</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid pt-3 " style="background-color: #fff;">
                <div class="row col-10 center">
                    <fieldset class="h1 ">Formulaire de demande</fieldset>
                <br><br>
                <form action="{{route('create_demande')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="text" value="{{Auth::user()->id}}" readonly name="identifiant" class="form-control  @error('identifiant') is-invalid @enderror" hidden>
                            @error('identifiant')<span class="text text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nom*</label>
                            <input type="text" value="{{Auth::user()->name}}" readonly name="name" class="form-control  @error('name') is-invalid @enderror" >
                            @error('name')<span class="text text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Prenom*</label>
                            <input type="text" value="{{Auth::user()->prenom}}" readonly name="prenom" class="form-control  @error('prenom') is-invalid @enderror">
                            @error('prenom')<span class="text text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nom Père*</label>
                            <input type="text" value="{{$edit->nom_pere}}" name="name_pere" class="form-control  @error('name_pere') is-invalid @enderror">
                            @error('name_pere')<span class="text text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nom Mere*</label>
                            <input type="text" value="{{$edit->nom_mere}}" name="name_mere" class="form-control  @error('name_mere') is-invalid @enderror">
                            @error('name_mere')<span class="text text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email*</label>
                            <input type="email" value="{{Auth::user()->email}}" readonly name="email" class="form-control  @error('email') is-invalid @enderror">
                            @error('email')<span class="text text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Date de Naissance*</label>
                            <input type="date" value="{{$edit->date_naissance}}" name="date_naissance" class="form-control  @error('date_naissance') is-invalid @enderror">
                            @error('date_naissance')<span class="text text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Lieu Naissance*</label>
                            <input type="text" value="{{$edit->lieu_naissance}}" name="lieu_naissance" class="form-control  @error('lieu_naissance') is-invalid @enderror">
                            @error('lieu_naissance')<span class="text text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Telephone*</label>
                            <input type="text" value="{{$edit->telephone}}" name="telephone" class="form-control  @error('telephone') is-invalid @enderror">
                            @error('telephone')<span class="text text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="from-group col-md-6">
                            <label for="genre">Genre*</label>
                            <select class="form-control" name="genre" id="genre">
                            <option value="{{$edit->genre}}" selected>{{$edit->genre}}</option>
                                <option value="masculin">Masculin</option>
                                <option value="feminin">Feminin</option>
                            </select>
                        </div>
                        <div class="from-group col-md-6">
                            <label for="type_demande">Type de demande</label>
                            <select class="form-control" name="type_demande" id="type_demande">
                                <option value="{{$edit->type_demande}}" selected>{{$edit->type_demande}}</option>
                                <option value="laisser-passer">Laisser passer</option>
                                <option value="atestation">Atestation</option>
                                <option value="carte">Carte</option>
                            </select>
                        </div>
                        <div class="file-upload col-6">
                            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Ajout Photo</button>
                            <div class="image-upload-wrap">
                              <input class="file-upload-input" type='file' value="{{$edit->photo}}" onchange="readURL(this);" accept="image/*" name="images"/>
                              <div class="drag-text">
                                <img src="{{asset('img/images/'.$edit->photo)}}" alt="" width="90%">
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
                                <input class="file-upload-inputs" type='file' value="{{$edit->photo_signature}}" onchange="readURLS(this);" accept="image/*" name="image_signature"/>
                                <div class="drag-text">
                                  <img src="{{asset('img/imageSignature/'.$edit->photo_signature)}}" alt="" width="90%">
                                </div>
                              </div>
                              <div class="file-upload-contents">
                                <img class="file-upload-images" src="#" alt="your image" />
                                <div class="image-title-wrap">
                                  <button type="button" onclick="removeUploads()" class="remove-image">Suprimer <span class="image-title">Uploaded Image</span></button>
                                </div>
                              </div>
                            </div>
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary">Mise a jour</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            <!-- Footer -->
        </div>


        <script src="{{asset('loopple.js')}}"></script>
        <script src="{{asset('ifile.js')}}"></script>
        <script src="https://rawcdn.githack.com/Loopple/loopple-public-assets/5cef8f62939eeb089fa26d4c53a49198de421e3d/argon-dashboard/js/vendor/jquery.min.js"></script>
        <script src="https://rawcdn.githack.com/Loopple/loopple-public-assets/5cef8f62939eeb089fa26d4c53a49198de421e3d/argon-dashboard/js/vendor/bootstrap.bundle.min.js"></script>
        <script src="https://rawcdn.githack.com/Loopple/loopple-public-assets/5cef8f62939eeb089fa26d4c53a49198de421e3d/argon-dashboard/js/vendor/js.cookie.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
        <script src="https://rawcdn.githack.com/Loopple/loopple-public-assets/5cef8f62939eeb089fa26d4c53a49198de421e3d/argon-dashboard/js/vendor/chart.extension.js"></script>
        <script src="https://rawcdn.githack.com/Loopple/loopple-public-assets/7bb803d2af2ab6d71d429b0cb459c24a4cd0fbb4/argon-dashboard/js/argon.min.js"></script>
    </body>
</html>

