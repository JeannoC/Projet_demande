<?php

namespace App\Http\Controllers;
use App\Models\Demande;
use Illuminate\Http\Request;
class FrontedController extends Controller
{
    public function index(){
        return view('frontend.accueil.index');
    }
    public function modifier_profile($id){
        $edit = Demande::FindOrFail($id);
        return view('Auth::editdemande', compact('edit'));
    }

    public function laisserpasser(){
        $laisserpasser = Demande::where('type_demande','laisser-passer')->get();
        return view('Auth::laisserpasser',compact('laisserpasser'));
    }

    public function attestation(){
        $attestation = Demande::where('type_demande','attestation')->get();
        return view('Auth::attestation',compact('attestation'));
    }
}
