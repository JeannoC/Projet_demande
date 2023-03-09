<!DOCTYPE html>
</html lang="en">
<head>
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
      .contenaire{
        height: 20%;
      }
      .activity-container {
        display: flex;
        flex-direction:row;
        justify-content: flex-start;
      }
      .img-content {
        border-radius: 10%;
        margin-right: 15px;
        float: left;
        width: auto;
        height: 100%;
      }
      .img {
        border-radius: 5px;
        border: 1px solid #f5f5f5;
        padding: 3px;
      }

      p {
        margin:0;
      }

      .title{
        text-align: left;
        padding-left: 170px;
      }
      

    @page { margin: 0.5cm; }
  </style>
</head>
<body>
    <div class="contenaire">
      <div class="title">
        <h1>{{Str::upper( $demande->type_demande)}}</h1>
      </div>
      <div class="activity-container">
        <div class="img-content">
          <img src="{{$pic[0]}}" class="img" alt="ma photo" width="100px"/>
          <!-- @foreach ($pic as $pics)
          @endforeach -->
          <!-- <p><strong>DATE DE DELIVRANCE :</strong> {{$demande->validated_at}}</p>
          <p><strong>DATE D'EXPIRATION :</strong> {{date('Y-m-d', strtotime($demande->validated_at. ' + 2 years'));}}</p> -->
        </div>
        <div class="content-info">
          <p><strong>NOM :</strong> {{$users->name}}</p>
          <p><strong>PRENOM :</strong> {{$users->prenom}}</p>
          <p><strong>DATE DE NAISSANCE :</strong> {{$demande->demandeur->date_naissance}}</p>
          <p><strong>LIEU DE NAISSANCE :</strong> {{$demande->demandeur->lieu_naissance}}</p>
          <p><strong>SEXE :</strong> {{$demande->demandeur->genre}}</p>
          <p><strong>ADRESSE :</strong> {{$demande->demandeur->adresse}}</p>
          <p><strong>TAILLE :</strong> {{$demande->demandeur->taille}}</p>
          <div class="general">
              <p style="text-align:left;">Signature et cachet du directeur générel</p>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
