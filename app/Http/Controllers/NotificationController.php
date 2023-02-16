<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
class NotificationController extends Controller
{
    public function compteDemande(){
        $demande=Demande::where('isValidated',0)->count();
        return $demande;
    }
}
