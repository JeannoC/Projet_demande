<!-- Loopple Templates: https://www.loopple.com/templates | Copyright Loopple (https://www.loopple.com) | This copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Profile Dashboard</title>
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
  background: #1FB264;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #15824B;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #1AA059;
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

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #1FB264;
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #1FB264;
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
  color: #15824B;
  padding: 60px 0;
}

.file-upload-image {
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
                                <li><a href="{{route('laisserpasser')}}" class="dropdown-item" >Laisser-Passer</a></li>
                                <li><a href="{{route('attestation')}}" class="dropdown-item" >Attestation</a></li>
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
            <div class="container pt-3">
                    <div class="row">
                        <div class="col-12">
                            <a href="{{route('adddemande')}}" >
                                <button type="button" class="btn btn-success" style="background-color: #1AA059; border:none" >Faire une demande</button>
                            </a>

                        </div>
                    </div>
                    <br>
                <div class="row ">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="mb-0">Les Demande en cours</h3>
                                    </div>
                                </div>
                            </div>
                <table class="table table-striped table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Type Demande</th>
                            <th>Date Demande</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 1;?>
                        @foreach($laisserpasser as $liste)
                        <tr>
                            <td>{{$id++}}</td>
                            <td>{{$liste->type_demande}}</td>
                            <td>{{$liste->created_at}}</td>
                            @if($liste->actifs == 0)
                                <td>En cours de traitement</td>
                                <td><a href="{{route('modifier_profile', $liste->id )}}" class="btn btn-primary" style="background-color: #1AA059; border:none"><i class="fa fa-edit"></i> Modifier</a></td>

                            @else
                                <td>Demande traitée</td>
                            @endif

                        </tr>
                        @endforeach
                    </tbody>
                </table>
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

