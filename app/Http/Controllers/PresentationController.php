<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activite;
use App\Http\Controllers\NotificationController;
use App\Models\Presentation;
class PresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandeNotif=new NotificationController();
        $count_demande=$demandeNotif->compteDemande();
        $presentations=Presentation::simplePaginate(16);
        return view('admin.presentation.index',compact('presentations','count_demande'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'images'=>'required|image',
            'titre'=>'required',
            'description'=>'required'
        ]);

        if($request->file('images'))
        {
            $file=$request->file('images');
            $uploadDestination="img/presentations/";
            $originalExtensions=$file->getClientOriginalExtension();
            $originalName=time().".".$originalExtensions;
            $nomImage=$uploadDestination."/".$originalName;
            $file->move($uploadDestination,$originalName);


            $presentation =  new Presentation();
            $presentation->titre=$request->titre;
            $presentation->description=$request->description;
            $presentation->images=$originalName;
            $presentation->save();

            toastr()->success('Enregistrement éffectué avec succèss');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demandeNotif=new NotificationController();
        $count_demande=$demandeNotif->compteDemande();
        $presentations=Presentation::FindOrFail($id);
        return view('admin.presentation.show',compact('presentations','count_demande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $presentation=Presentation::FindOrFail($id);
        request()->validate([
            'titre_update'=>'required',
            'description_update'=>'required'
        ]);

        if($request->file('image_update'))
        {
            $file=$request->file('image');
            $uploadDestination="img/presentations/";
            $originalExtensions=$file->getClientOriginalExtension();
            $originalName=time().".".$originalExtensions;
            $nomImage=$uploadDestination."/".$originalName;
            $file->move($uploadDestination,$originalName);

            $presentation->titre=$request->titre_update;
            $presentation->description=$request->description_update;
            $presentation->images=$originalName;
            $presentation->update();

            toastr()->success('Modification éffectuée avec succèss');

        }else{
            $presentation->titre=$request->titre_update;
            $presentation->description=$request->description_update;
            $presentation->update();
            toastr()->success('Modification éffectuée avec succèss');
        }


        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $presentations=Presentation::FindOrFail($id);
        $presentations->delete();
        toastr()->success('Suppression éffectuée avec succèss');
        return back();
    }
}
