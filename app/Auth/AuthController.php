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
            $user->attachRole('demandeur');
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

}
