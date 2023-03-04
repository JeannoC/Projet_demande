@extends('layout.app')
@section('content')
<div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <div class="row col-md-10 center">
                <fieldset class="h1 ">Veuillez effectuer votre payement</fieldset>
            <br><br>
            @if(session()->has('success'))
            <div id="casser" class="alert alert-success col-12">{{session('success')}} </div>
            @endif
            <form action="" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Demandeur*</label>
                        <input type="text" name="demandeur" value="{{$demande ? $demande->demandeur->user->prenom : old('demandeur')}}" class="form-control  @error('demandeur') is-invalid @enderror" readonly>
                        @error('demandeur')<span class="text text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>Demande*</label>
                        <input type="text" value="{{$demande ? $demande->type_demande: old('demande')}}" name="demande" class="form-control  @error('demande') is-invalid @enderror" readonly>
                        @error('nom_mere')<span class="text text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>Montant*</label>
                        <input type="number" class="form-control" name="montant" value="">
                        @error('montant')<span class="text text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="from-group col-md-6">
                        <label for="monnaie">Monnaie*</label>
                        <select class="form-control" name="monnaie" id="monnaie">
                            <option value="Orange Money" >Orange Money</option>
                            <option value="PayPal" >PayPal</option>
                            <option value="Carte Visa" >Carte Visa</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 mt-5">
                        <button type="submit" class="btn btn-primary">Payer</button>
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

