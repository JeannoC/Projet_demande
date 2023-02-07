<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Demande;
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
            $demande=Demande::where('demande',1)->where('actifs',0)->orderBy('id','DESC')->get();
            return view('admin.demande.index',compact('demande','count_demande','segments'));
        }elseif($segments == "traiter"){
            $demandeNotif=new NotificationController();
            $count_demande=$demandeNotif->compteDemande();
            $demande=Demande::where('demande',1)->where('actifs',1)->orderBy('id','DESC')->get();
            return view('admin.demande.index',compact('demande','count_demande','segments'));
        }

    }


    public function prevalidation(Request $request)
    {
            $demandeNotif=new NotificationController();
            $count_demande=$demandeNotif->compteDemande();
            $demande=Demande::where('demande',1)->where('prevalidation',1)->orderBy('id','DESC')->get();
            return view('admin.preValidation.preValidation',compact('demande','count_demande'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demande=User::where('demande',1)->where('id',$id)->first();
        $demandeNotif=new NotificationController();
        $count_demande=$demandeNotif->compteDemande();

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
    /* public function update(Request $request, $id)
    {
        $identifiant=rand(111111000,999999000);
        $users=User::FindOrFail($id);
        $users->prevalitation=1;
        $users->identifiant=$identifiant;
        $users->update();

        $gmail=$users->email;
        //envoyer l'email a l'utilisateur
        toastr()->success('Validation éffectuée avec succèss');
        return redirect()->route('mailing',$users->id);


    } */


    public function update(Request $request, $id)
    {
        $users=User::FindOrFail($id);
        $users->Demande->prevalitation=1;
        $users->update();

        return back();
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
