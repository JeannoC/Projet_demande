<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    @toastr_css
    <link rel="stylesheet" href="{{asset('preloader/preloader.css')}}">
    <title>Nom Entreprise</title>
    <link rel="icon" type="image/png" href="{{asset('img/front/favicon-1.png')}}">
  </head>
  <body>
  <div class="preloader" id="preloader">
    <div class="preloader"></div>
</div>
    <section class="material-half-bg">
      <div class="cover" style="background: #078a36"></div>
    </section>
    <section class="login-content" >
      <div class="logo">
        <h1>Nom Entreprise</h1>
      </div>
      <div class="login-box" >
        <div  class="login-form">
          <div class="alert-info" style="border-radus:8px">
              <p class="login-head" style="padding:15px">Nous allons vous envoyez un lien via gmail pour completer la creation de votre compte</p>
          </div>
          <div class="form-group">
              <label for="">{{ $nom }}  {{ $name }}</label>
            <h5 class="control-label"> Est envoyer à ce mail</h5>
            <label class="control-label">{{ $email }}</label>
          </div>
          <div class="row">
            <div class="col-6">
                <a href="{{route('front.index')}}" style="margin-left:10px;">Page d'accueil</a>
            </div>
            <div class="col-6">
                <a href="{{route('register.incription')}}" style="margin-left:0px;">Créer votre compte</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
    <script src="{{asset('front/assets/js/jquery.min.js')}}"></script>
	  <script type="text/javascript" src="{{asset('preloader/preloader.js')}}"></script>
    @toastr_js
    @toastr_render
  </body>

</html>

