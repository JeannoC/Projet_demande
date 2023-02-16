<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Validator;
class UtilisateurController extends Controller
{
    public function index()
    {
        $users=User::all();
        $demandeNotif=new NotificationController();
        $count_demande=$demandeNotif->compteDemande();
        return view('admin.dashbords.includes.__utilisateur',compact('users','count_demande'));
    }
    public function store(Request $request){
        $validation = Validator::make($request->all(),[
            'name' => 'bail|required|min:3',
            'prenom' => 'bail|required',
            'email' => 'bail|required|email|max:255|unique:users',
            'password' => 'bail|required',
        ]);
        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }
        else{
            $user = new User();
            $user->name=$request->name;
            $user->prenom=$request->prenom;
            $user->email=$request->email;
            $user->password=bcrypt($request->password);
            $user->save();
            $user->attachRole('admin');
            toastr()->success("Création du compte effectuée avec success");
            return back();

        }
    }
    public function inscription(){
        return view('Auth::register');
    }
    public function suspendre($id)
    {
        $users=User::FindOrFail($id);
        $users->statuts=0;
        $users->update();
        toastr()->success("Le compte de ".$users->nom." a été verrouillé");
        return back();
    }
    public function desuspendre($id)
    {
        $users=User::FindOrFail($id);
        $users->statuts=1;
        $users->update();
        toastr()->success("Le compte de".$users->nom." est deverrouillé");
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
        //
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
        //
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
