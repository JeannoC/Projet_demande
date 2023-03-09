<?php

namespace App\Http\Controllers;


use PDF;
use App\Models\Demande;
use App\Models\Demandeur;
use Illuminate\Http\Request;
use App\Models\DocumentDemande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DocumentDemandeurController extends Controller
{

    public function voirdocument($id)
    {
        $doc = DocumentDemande::where('demande_id',$id)->get();
        $demande = Demande::FindOrFail($id);
        $users = Auth::user();

        foreach($doc as $docs){
            $path = base_path('public/storage/'.$docs->path);
            $type = pathinfo($path,PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $pic[] = 'data:image/' . $type . ';base64,' . base64_encode($data);
        }
        $data = [
            'date' => date('Y'),
            'demande' => $demande,
            'users'=>$users,
            'doc'=>$doc,
            'pic'=>$pic,
        ];
        if($demande->type_demande == 'attestation'){
            $pdf = PDF::loadView('documents.attestation', $data)
                ->setPaper('a4', 'portrait');
            return $pdf->download($demande->type_demande.'.pdf');
        }
        if($demande->type_demande == 'laisser passer'){
            $pdf = PDF::loadView('documents.laisserpasser', $data);
            return $pdf->download($demande->type_demande.'.pdf');
        }
        if($demande->type_demande == 'carte'){
            $pdf = PDF::loadView('documents.carte',$data);
            return $pdf->download($demande->type_demande.'.pdf');
        }

        // return view('documents.carte',compact('demande','users','pic','doc'));

    }


}
