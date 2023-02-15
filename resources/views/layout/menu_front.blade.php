 <!-- Header Area -->
 <header class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5">
                <ul class="social-links">
                    <li><a href="https://www.facebook.com/waqfguinee/" target="_blank"><i class="icofont-facebook"></i></a></li>
                    <li><a href="#" target="_blank"><i class="icofont-twitter"></i></a></li>
                    <li><a href="#" target="_blank"><i class="icofont-instagram"></i></a></li>
                    <li><a href="#" target="_blank"><i class="icofont-linkedin"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCoYqIU47wzh7TOdh60SwY0A" target="_blank"><i class="icofont-youtube"></i></a></li>
                </ul>
            </div>

            <div class="col-lg-7 col-md-7">
                <ul class="header-info">
                    <li><a href="{{route('front.presentation.propos')}}">A propos</a></li>
                    <li>Demande d'attestation et laisse passe</li>
                </ul>
            </div>
        </div>
    </div>
		</header>
        <!-- End Header Area -->

        <!-- Navbar Area -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <a class="navbar-brand" href="{{route('front.index')}}"><span>Nom Entreprise</span></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item active"><a class="nav-link" href="{{route('front.index')}}">Accueil</a></li>
                                @if (Auth::user())
                                     @if (Auth::user()->statuts==0)
                                            <li class="nav-item"><a class="nav-link" href="{{route('profile')}}">Profil</a></li>
                                     @else
                                            <li class="nav-item"><a class="nav-link" href="{{route('dashbord.index')}}">Administration</a></li>
                                    @endif
                                @else
                                     <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Connexion</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
