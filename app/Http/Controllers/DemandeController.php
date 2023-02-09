<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Demande;
use Illuminate\Support\Facades\Validator;
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
            $demande=Demande::where('demande',1)->where('prevalitation',0)->orderBy('id','DESC')->get();
            return view('admin.demande.index',compact('demande','count_demande','segments'));
        }elseif($segments == "traiter"){
            $demandeNotif=new NotificationController();
            $count_demande=$demandeNotif->compteDemande();
            $demande=Demande::where('demande',1)->where('actifs',1)->orderBy('id','DESC')->get();
            return view('admin.demande.index',compact('demande','count_demande','segments'));
        }

    }

    public function preValidation(){
        $demandeNotif=new NotificationController();
        $count_demande=$demandeNotif->compteDemande();
        $demande=Demande::where('demande',1)->where('prevalitation',1)->orderBy('id','DESC')->get();
        return view('admin.prevalidation.preValidation',compact('demande','count_demande'));
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
    public function store(Request $request, $id)
    {

        $validation = Validator::make($request->all(),[
            'name' => 'bail|required|min:3',
            'prenom' => 'bail|required',
            'email' => 'bail|required|email|max:255',
            'name_pere' => 'bail|required',
            'nom_mere' => 'bail|required',
            'lieu_naissance' => 'bail|required',
            'date_naissance' => 'bail|required',
            'genre' => 'bail|required',
            'type_demande' => 'bail|required',
            'telephone' => 'bail|required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_signature' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validation->fails()){

            return redirect()->back()->withErrors($validation)->withInput();
        }else{
            $imageName = time().'.'.$request->images->extension();
            $request->images->move(public_path('images'), $imageName);
            $imageNames = time().'.'.$request->image_signature->extension();
            $request->image_signature->move(public_path('images'), $imageNames);
            $demande = new Demande();
            $demande->name=$request->name;
            $demande->prenom=$request->prenom;
            $demande->email=$request->email;
            $demande->telephone=$request->telephone;
            $demande->nom_pere=$request->name_pere;
            $demande->nom_mere=$request->name_mere;
            $demande->lieu_naissance=$request->lieu_naissance;
            $demande->date_naissance=$request->date_naissance;
            $demande->type_demande=$request->type_demande;
            $demande->genre=$request->genre;
            $demande->photo=$imageName;
            $demande->photo_signature=$imageNames;
            $demande->users_id=$id;

            $demande->save();
            toastr()->success("Création du compte effectuée avec success");
            return back();

        }
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
    public function update(Request $request, $id)
    {

        $demande=Demande::FindOrFail($id);
        $demande->prevalitation=1;
        $demande->update();
        toastr()->success('Validation éffectuée avec succèss');
        return back();

    }

    public function updatevalidation(Request $request, $id)
    {
        $identifiant=rand(111111000,999999000);
        $users=User::FindOrFail($id);
        $users->identifiant=$identifiant;
        $demande=Demande::FindOrFail($id);
        $demande->actifs=1;
        $demande->update();

        $gmail=$users->email;
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
