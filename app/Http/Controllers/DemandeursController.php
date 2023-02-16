<?php

namespace App\Http\Controllers;

use App\Models\Demandeur;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DemandeursController extends Controller
{
   public function store(Request $request){

    $validation = Validator::make($request->all(),[
        'nom_pere' => 'bail|required',
        'nom_mere' => 'bail|required',
        'lieu_naissance' => 'bail|required',
        'date_naissance' => 'bail|required',
        'genre' => 'bail|required',
        'telephone' => 'bail|required',
    ]);
    if($validation->fails()){
        return redirect()->back()->withErrors($validation)->withInput();

    }else{

        $demandeur = Demandeur::where('user_id', Auth::user()->id)->first();
        if($demandeur == null){
            $demandeur = new Demandeur();
        }
        $demandeur->telephone = $request->telephone;
        $demandeur->nom_pere = $request->nom_pere;
        $demandeur->nom_mere = $request->nom_mere;
        $demandeur->lieu_naissance = $request->lieu_naissance;
        $demandeur->date_naissance = $request->date_naissance;
        $demandeur->user_id = Auth::user()->id;
        $demandeur->genre =  $request->genre;
        $demandeur->save();

        if($demandeur == null){
            toastr()->success("Votre compte a été completer avec succès ");
            return redirect()->back();
        }else{
            toastr()->success("Votre compte a été modifier avec succès ");
            return redirect()->back();
        }
    }
   }

    public function profile(){
        $ldemande = Demandeur::where('user_id',Auth::user()->id)->first();
        return view('demandeur.index',compact('ldemande'));
    }

    public function index(Request $request){
        $segment = $request->segment(2);
        $demandeur = Demandeur::where('user_id',Auth::user()->id)->first();
        if($segment == 'attestations'){
            $demandes = Demande::where('demandeur_id',$demandeur->id)->where('type_demande','attestation')->get();
            $last_demande = $demandes->last(); 
        }elseif($segment == "laisser-passer"){
            $demandes = Demande::where('demandeur_id',$demandeur->id)->where('type_demande','laisser passer')->get();
            $last_demande = $demandes->last();
        }else{
            $demandes = Demande::where('demandeur_id',$demandeur->id)->get();
            $last_demande = $demandes->last();
        }
        return view('demandeur.index',compact('segment','demandes','last_demande'));
    }

    public function completprofil(){
        $demandeur = Demandeur::where('user_id',Auth::user()->id)->first();
        return view('demandeur.completprofil', compact('demandeur'));
    }

}
