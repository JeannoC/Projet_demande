<?php

namespace App\Http\Controllers;

use App\Mail\Signup;
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
}
