<?php

namespace App\Http\Controllers;

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
            $document = new DocumentDemandeur();
            if($request->file('images'))
            {
                $file=$request->file('images');
                $uploadDestination="img/images";
                $originalExtensions=$file->getClientOriginalExtension();
                $originalName=time().".".$originalExtensions;
                $nomImage=$uploadDestination."/".$originalName;
                $file->move($uploadDestination,$originalName);
                $document->filename=$originalName;
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
            toastr()->success("Document ajouté avec success");
            return back();

        }
    }
}
