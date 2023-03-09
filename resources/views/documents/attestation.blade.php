<!DOCTYPE html>
<style>
    body{
        margin:-10px;
        padding:-10px;

    }
    h1{
        text-align: center;
    }
    .patro{
        font-style: bold;
    }
    .contenu{
        padding: 20px;
    }
    .generale{
       margin-top : 450px;
       text-align: center;
    }
    @page { margin: 0.5cm; }

</style>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
   <div class="contenu">
    <h1>{{Str::upper( $demande->type_demande)}}</h1>
    <h6 style="text-align: center">{{Str::upper($date)}}</h6>
        <p>Nous Nom Entreprise </p>
        <p><strong>NOM :</strong> {{$users->name}}</p>
        <p><strong>PRENOM :</strong> {{$users->prenom}}</p>
        <p><strong>DATE DE NAISSANCE :</strong> {{$demande->demandeur->date_naissance}}</p>
        <p><strong>LIEU DE NAISSANCE :</strong> {{$demande->demandeur->lieu_naissance}}</p>
        <br><br><br>
        <p>En foi de quoi, nous lui délivrons la présente attestation pour servir et valoir de ce que de droit</p>
        <p class="lieu"> Fait le {{ $demande->validated_at }} à Conakry</p>
        <div class="generale">
            <h6 >DIRECTEUR GENERAL</h6>
             <p >Photo signature</p>
             <h6 style="text-decoration: underline">NOM PRENOM DIRECTEUR</h6>
        </div>
   </div>

</body>
</html>
