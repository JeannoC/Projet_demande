<?php

namespace App\Auth;

use App\Models\User;
use App\Models\Demande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Context;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Type\Integer;

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
        ]);
        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }
        else{
            $user = new User();
            $user->name=$request->name;
            $user->prenom=$request->prenom;
            $user->email=$request->email;
            $user->token_validated_at=Carbon::now();
            $user->token=sha1($request->email);
            $user->avatar="avatar.jpg";
            if($user->save()){
                $user->attachRole('utilisateur');
                return redirect()->route('pwdconfirmmailing',$user->token);
                return view('password.passwordconfirmliengmail',compact('email'));

            }
        }
    }
    public function passwordconfirmation_put(Request $request, $token){
        $validation = Validator::make($request->all(),[
            'password' => 'bail|required|confirmed',
        ]);
        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }
        else{
            $user=User::where('token',$token)->first();
            $date_auj = Carbon::now();
            $create_date = Carbon::parse($user->token_validated_at);
            $date_dif = $create_date->diffInSeconds($date_auj); //8640000
            if($date_dif > 86400){
                return redirect()->back()->withError("votre demande de création de compte a expiré. Veillez reinitialiser ");
            }else {
                $user->password = bcrypt($request->password);
                $user->token_confirmated_at = Carbon::now();
                $user->save();
                $credentials = $request->only('email', 'password');
                if (Auth::Attempt($credentials))
                {
                    return redirect()->route('dashbord.index');
                }
            }
            
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
