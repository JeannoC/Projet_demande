<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Demande;
use Nette\Utils\Random;
use App\Models\Demandeur;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use App\Http\Controllers\NotificationController;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $segments =request()->segment(1);
        if($segments == "nouveaux"){
            $demandeNotif=new NotificationController();
            $count_demande=$demandeNotif->compteDemande();
            $demande=User::where('demande',1)->where('actifs',0)->orderBy('id','DESC')->get();
            return view('admin.demande.index',compact('demande','count_demande','segments'));
        }
        if($segments == "traiter"){
            $demandeNotif=new NotificationController();
            $count_demande=$demandeNotif->compteDemande();
            $demande=User::where('demande',1)->where('actifs',1)->orderBy('id','DESC')->get();
            return view('admin.demande.index',compact('demande','count_demande','segments'));
        }

    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $demandeur = Demandeur::where('users_id',Auth::user()->id)->first();
        $demande = new Demande();
        $demande->type_demande = 'attestation';
        $demande->demandeur_id = $demandeur->id;
        $demande->save();
        toastr()->success('Demande effectué avec succès');
        return back();
    }

    public function storepasser()
    {
        $demandeur = Demandeur::where('users_id',Auth::user()->id)->first();
        $demande = new Demande();
        $demande->type_demande = 'laisser passer';
        $demande->demandeur_id = $demandeur->id;
        $demande->save();
        toastr()->success('Demande effectué avec succès');
        return back();
    }

  


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demande = Demande::find($id);
        $demandeNotif = new NotificationController();
        $count_demande = 0; //$demandeNotif->compteDemande();

        if($demande)
        {
            return view('admin.demande.show',compact('demande','count_demande'));
        }else{
            return back();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $demande=Demande::FindOrFail($id);
        $demande->admin_id = Auth::user()->id;
        $demande->prevalitation=1;
        $demande->update();
        toastr()->success('Validation éffectuée avec succèss');
        return back();

    }

    public function updatevalidation(Request $request, $id)
    {
        $demande=Demande::FindOrFail($id);
        $demande->actifs=1;
        $demande->update();
        $gmail = $users->email;
        //envoyer l'email a l'utilisateur
        toastr()->success('Validation éffectuée avec succèss');
        return redirect()->route('mailing',$users->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
