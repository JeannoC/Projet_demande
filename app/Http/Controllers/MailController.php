<?php

namespace App\Http\Controllers;

use App\Mail\Signup;
use App\Mail\pwdconfirm;
use App\Mail\pwdoublier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
class MailController extends Controller
{
    public function index($id){
        $user=User::FindOrFail($id);
        $gmail=$user->email;
        $nom=$user->identifiant;

        Mail::to($gmail)->send(new Signup($nom));

        return redirect()->back();
    }

    public function pwdconfirm($token){
        $user=User::where('token',$token)->first();
        $email=$user->email;
        $nom =$user->prenom;
        $name =$user->name;
        $token =$user->token;
        Mail::to($email)->send(new pwdconfirm($nom,$token));
        return view('password.passwordconfirmliengmail', compact('email','nom','name'));
    }

    public function pwdoublier($token){
        $user=User::where('token',$token)->first();
        $email=$user->email;
        $nom =$user->prenom;
        $name =$user->name;
        $token =$user->token;
        Mail::to($email)->send(new pwdoublier($nom,$token));
        return view('password.passwordliengmail', compact('email','nom','name'));
    }
}
