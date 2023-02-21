<?php

namespace App\Http\Controllers;


use PDF;
use App\Models\Demande;
use App\Models\Demandeur;
use Illuminate\Http\Request;
use App\Models\DocumentDemandeur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DocumentDemandeurController extends Controller
{
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_signature' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else{
            $demandeur = Demandeur::where('user_id',Auth::user()->id)->first();
            $document = DocumentDemandeur::where('demandeur_id',$demandeur->id)->first();
            if($document == null){
                $document = new DocumentDemandeur();
            }
            if($request->file('images'))
            {
                $file=$request->file('images');
                $uploadDestination="img/images";
                $originalExtensions=$file->getClientOriginalExtension();
                $originalName=time().".".$originalExtensions;
                $nomImage=$uploadDestination."/".$originalName;
                $file->move($uploadDestination,$originalName);
                $document->name=$originalName;
                $document->type_document = 'photo identite';
                $document->path = $nomImage;
            }
            if($request->file('image_signature'))
            {
                $file=$request->file('image_signature');
                $uploadDestination="img/imageSignature";
                $originalExtensions=$file->getClientOriginalExtension();
                $originalName=time().".".$originalExtensions;
                $nomImages=$uploadDestination."/".$originalName;
                $file->move($uploadDestination,$originalName);
                $document->filename=$originalName;
                $document->type_document = 'photo signature';
                $document->path = $nomImages;
            }
            $demandeur = Demandeur::where('user_id',Auth::user()->id)->first();
            $document->demandeur_id = $demandeur->id;
            $document->save();
            if($document == null){
                return redirect()->back()->with(['success'=>'Votre document à été ajouter avec succès']);
            }else{
                return redirect()->back()->with(['success'=>'Votre document à été modifier avec succès']);
            }

        }
    }


    public function voirdocument()
    {
        $demandeur = Demandeur::where('user_id',Auth::user()->id)->first();
        $demande = new Demande();
        $users = Auth::user();
        $demande = Demande::where('demandeur_id',$demandeur->id)->first();
        $data = [
            'date' => date('m/d/Y'),
            'demande' => $demande,
            'demandeur' => $demandeur,
            'users'=>$users,
        ]; 
            
        $pdf = PDF::loadView('documents.doc', $data);
        return $pdf->download($demande->type_demande.'.pdf');
        
        
    }
    

}
