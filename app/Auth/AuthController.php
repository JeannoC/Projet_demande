<?php

namespace App\Auth;

use App\Models\User;
use App\Models\Demande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Context;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginForm()
    {
       return view('Auth::login');
    }

    public function file(){
        $liste_demande = Demande::where('users_id', Auth::user()->id)->get();
        return view('Auth::profile',compact('liste_demande'));
    }

    public function login(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'email' => 'bail|required|email|max:255',
            'password'=>'bail|required'
        ]);

        $credentials = $request->only('email', 'password');
        
        if (Auth::Attempt($credentials))
        {

            return redirect()->route('dashbord.index');
            
        }

        return redirect()->back()->withError("Identifiant ou mot de passe incorrect");
    }

    public function create(Request $request){
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
            $user->attachRole('utilisateur');
            toastr()->success("Création du compte effectuée avec success");
            return redirect()->route('profile');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('front.index');
    }

    public function update(Request $request)
    {

    }

    public function create_demande(Request $request, $id){

        $usersInfos=User::FindOrFail($id);


        $validation = Validator::make($request->all(),[
            'name_pere' => 'bail|required|min:3',
            'name_mere' => 'bail|required|min:3',
            'type_demande' => 'bail|required',
            'lieu_naissance' => 'bail|required',
            'genre' => 'bail|required',
            'date_naissance' => 'bail|required',

        ]);
        //user segmeent
        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else{
            $usersInfos->nom_pere=$request->name_pere;
            $usersInfos->nom_mere=$request->name_mere;
            $usersInfos->type_demande=$request->type_demande;
            $usersInfos->lieu_naissance=$request->lieu_naissance;
            $usersInfos->genre=$request->genre;
            $usersInfos->name=$request->name;
            $usersInfos->prenom=$request->prenom;
            $usersInfos->email=$request->email;
            $usersInfos->date_naissance=$request->date_naissance;
            $usersInfos->demande='1';
            $usersInfos->save();

            toastr()->success('Enregistrement éffectué avec succèss');
            return redirect()->route('profile');
        }
    }

    public function adddemande(){
        return view('Auth::demande');
    }
}
