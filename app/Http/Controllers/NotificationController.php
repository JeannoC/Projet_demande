<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
class NotificationController extends Controller
{
    public function compteDemande(){
        $demande=Demande::where('demande',1)->where('actifs',0)->count();
        return $demande;
    }
}
