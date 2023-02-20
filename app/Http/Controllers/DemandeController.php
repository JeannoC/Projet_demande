<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Demande;
use Nette\Utils\Random;
use App\Models\Demandeur;
use Illuminate\Http\Request;
use App\Models\DocumentDemandeur;
use App\Models\DemandeUtilisateur;
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
        $segments =request()->segment(2);
        if($segments == "nouveaux"){
            $demandeNotif=new NotificationController();
            $count_demande=$demandeNotif->compteDemande();
            $demandes = Demande::whereNull('isValidated')->orderBy('id','DESC')->get();
        }
        if($segments == "traiter"){
            $demandeNotif = new NotificationController();
            $count_demande = $demandeNotif->compteDemande();
            $demandes = Demande::whereNotNull('isValidated')->orderBy('id','DESC')->get();
        }
        return view('admin.demandes.index',compact('count_demande','segments','demandes'));

    }
    public function preValidation(){
        $segments =request()->segment(1);
        $demandeNotif=new NotificationController();
        $count_demande=$demandeNotif->compteDemande();
        $demandes=Demande::where('isValidated',1)->where('isAccepted',null)->orderBy('id','DESC')->get();
        return view('admin.preValidation.preValidation',compact('demandes','count_demande','segments'));
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
        $demandeur = Demandeur::where('user_id',Auth::user()->id)->first();
        $demande = new Demande();
        $demande->type_demande = 'attestation';
        $demande->demandeur_id = $demandeur->id;
        $demande->save();
        return back()->with(['success'=>'Demande effectué avec succès']);
    }

    public function storepasser()
    {
        $demandeur = Demandeur::where('user_id',Auth::user()->id)->first();
        $demande = new Demande();
        $demande->type_demande = 'laisser passer';
        $demande->demandeur_id = $demandeur->id;
        $demande->save();
        return back()->with(['success'=>'Demande effectué avec succès']);
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
        $demandeur = $demande->demandeur->user->id;
        $demandeurs = Demandeur::where('user_id',$demandeur)->first();
        $document = DocumentDemandeur::where('demandeur_id',$demandeurs->id)->first();
        $demandeNotif = new NotificationController();
        $demandeadmin = DemandeUtilisateur::where("demande_id",$id)->get();
        $count_demande = 0; //$demandeNotif->compteDemande();

        if($demande)
        {
            return view('admin.demandes.show',compact('demande','count_demande','document','demandeadmin'));
        }else{
            return back();
        }

    }

    public function demandeutilisateur(){
        $segments =request()->segment(1);
        $demandeNotif=new NotificationController();
        $count_demande=$demandeNotif->compteDemande();
        $demandeuser = DemandeUtilisateur::where('user_id', Auth::user()->id)->get();
        return view('admin.demandes.demandeuser',compact('demandeuser','count_demande','segments'));

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
        if(Auth::user()->hasRole('pdg')){
            $demande=Demande::FindOrFail($id);
            $demande->isValidated = True;
            $demande->isAccepted = True;
            $demande->validated_at = date('Y-m-d');
            $demande->update();
        }else{
            $demande=Demande::FindOrFail($id);
            $demande->isValidated = True;
            $demande->validated_at = date('Y-m-d');
            $demande->update();
        }
        $demandeuser =new DemandeUtilisateur();
        $demandeuser->user_id = Auth::user()->id;
        $demandeuser->demande_id = $demande->id;
        $demandeuser->action = "valider";
        $demandeuser->save();

        toastr()->success('Validation éffectuée avec succèss');
        return back();
    }
    public function rejeterupdate(Request $request, $id)
    {
        $demande=Demande::FindOrFail($id);
        $demande->isDismiss = True;
        $demande->dismissed_at = date('Y-m-d');
        $demande->comment = $request->commentaire;
        $demande->update();

        $demandeuser =new DemandeUtilisateur();
        $demandeuser->user_id = Auth::user()->id;
        $demandeuser->demande_id = $demande->id;
        $demandeuser->action = "rejeter";
        $demandeuser->save();

        toastr()->success('La Demande  rejeter avec succèss');
        return back();
    }

    public function updatevalidation(Request $request, $id)
    {
        $demande=Demande::FindOrFail($id);
        $demande->isAccepted = true;
        $demande->update();

        $gmail = $demande->demandeur->user->email;
        $user =$demande->demandeur->user->id;
        //envoyer l'email a l'utilisateur
        toastr()->success('Prevalidation éffectuée avec succèss');
        return redirect()->route('mailing',$user);

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
