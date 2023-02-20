<!-- Loopple Templates: https://www.loopple.com/templates | Copyright Loopple (https://www.loopple.com) | This copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{env('APP_NAME','')}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="https://rawcdn.githack.com/Loopple/loopple-public-assets/ad60f16c8a16d1dcad75e176c00d7f9e69320cd4/argon-dashboard/css/nucleo/css/nucleo.css">
    <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/loopple/loopple.css')}}">




        <link rel="stylesheet" href="{{asset('assets/css/generation/datatables.min.css')}}">
</head>

<body style="background-color:#f8f9fe">
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white loopple-fixed-start" id="sidenav-main">
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                 <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashbord.index')}}">
                            <i class="fa fa-desktop text-primary"></i>
                            <span class="nav-link-text">Tableau de bord</span>
                        </a>
                    </li>
                    @if(Auth::user()->hasRole('demandeur'))
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('completprofil')}}">
                                <i class="fa fa-user text-primary"></i>
                                <span class="nav-link-text">Mon Profil</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="#dropdown-db" aria-expanded="true" data-toggle="collapse" class="nav-link"><i class="fa fa-folder text-danger"></i>Mes Demandes</a>
                            <ul id="dropdown-db" class="collapse list-unstyled pt-0 ml-4">
                                <li><a href="{{route('profile.laisser-passer')}}" class="dropdown-item" >Laisser-Passer</a></li>
                                <li><a href="{{route('profile.attestations')}}" class="dropdown-item" >Attestation</a></li>
                            </ul>
                        </li>
                    @endif
                    @if (Auth::user()->hasRole('admin'))
                        <li class="nav-item ">
                            <a href="#dropdown-db" aria-expanded="true" data-toggle="collapse" class="nav-link"><i class="fa fa-folder text-danger"></i>Les Demandes</a>
                            <ul id="dropdown-db" class="collapse list-unstyled pt-0 ml-4">
                                <li><a href="{{route('admins.demande.nouvelle')}}" class="dropdown-item {{ (request()->segment(2)== 'nouveaux') ? 'active' : ''}}" ><i class="fa fa-bell"></i><span class="app-menu__label"> Nouveaux</span>@if($count_demande>0)<span class="badge badge-danger">{{$count_demande}}</span>@endif</a></li>
                                <li><a href="{{route('admins.demande.traites')}}" class="dropdown-item {{(request()->segment(2)== 'traiter') ? 'active': ''}}" ><i class="fa fa-user-circle"></i><span class="app-menu__label"> Traités</span></a></li>
                            </ul>
                        </li><li class="nav-item"><a class="nav-link {{(request()->segment(1)== 'prevalidation') ? 'active': ''}}" href="{{route('admins.demande.utilisateur')}}"><i class="fa fa-user"></i><span class="app-menu__label">Mes demandes traitées</span></a></li>
                    @endif
                    @if (Auth::user()->hasPermission('valider'))
                        <li class="nav-item"><a class="nav-link {{(request()->segment(1)== 'prevalidation') ? 'active': ''}}" href="{{route('admins.preValidation')}}"><i class="fa fa-user"></i><span class="app-menu__label">Pre validation</span></a></li>
                    @endif
                    @if(Auth::user()->hasRole('admin'))
                        <li class="nav-item"><a class="nav-link {{(request()->segment(1)== 'users') ? 'active': ''}}" href="{{route('admins.utilisateur')}}"><i class="fa fa-user"></i><span class="app-menu__label">Gestion des utilisateurs</span></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="main-content" id="panel">
        <nav class="navbar navbar-top navbar-expand navbar-dark border-bottom bg-warning" id="navbarTop">
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
                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="https://demos.creative-tim.com/argon-dashboard/assets-old/img/theme/team-4.jpg">
                                    </span>
                                    <div class="media-body  ml-2   d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->prenom }} {{Auth::user()->name}}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Bienvenue!</h6>
                                </div>
                                <a href="{{route('completprofil')}}" class="dropdown-item">
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
            </nav>
        <div class="container-fluid pt-3">
           @yield('content')
        </div>
        <!-- Footer -->
        <footer class="footer pt-0 px-4">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center  text-lg-left  text-muted">
                        © 2021 Made with
                        <a href="https://www.creative-tim.com/product/argon-dashboard" class="font-weight-bold ml-1" target="_blank"></a>
                        &amp;<a href="https://www.loopple.com" class="font-weight-bold ml-1" target="_blank"></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script>
         setTimeout(function(){
          document.querySelector('#casser').remove();
            }, 5000);
    </script>
    <!-- <div class="loopple-badge">Made with<a href="https://www.loopple.com"><img src="https://www.loopple.com/img/loopple-logo.png" class="loopple-ml-1" style="width:55px"></a></div> -->
    <script src="https://rawcdn.githack.com/Loopple/loopple-public-assets/5cef8f62939eeb089fa26d4c53a49198de421e3d/argon-dashboard/js/vendor/jquery.min.js"></script>
    <script src="https://rawcdn.githack.com/Loopple/loopple-public-assets/5cef8f62939eeb089fa26d4c53a49198de421e3d/argon-dashboard/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="https://rawcdn.githack.com/Loopple/loopple-public-assets/5cef8f62939eeb089fa26d4c53a49198de421e3d/argon-dashboard/js/vendor/js.cookie.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="https://rawcdn.githack.com/Loopple/loopple-public-assets/5cef8f62939eeb089fa26d4c53a49198de421e3d/argon-dashboard/js/vendor/chart.extension.js"></script>
    <script src="https://rawcdn.githack.com/Loopple/loopple-public-assets/7bb803d2af2ab6d71d429b0cb459c24a4cd0fbb4/argon-dashboard/js/argon.min.js"></script>



    <script src="{{asset('assets/js/generationjs/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/generationjs/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/generationjs/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('assets/js/generationjs/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/generationjs/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/js/generationjs/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/js/generationjs/datatables/buttons.print.min.js')}}"></script>
</body>
