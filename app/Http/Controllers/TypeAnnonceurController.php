<?php

namespace App\Http\Controllers;

use App\Models\type_annonceur;
use App\Models\module;
use App\Models\Attribution;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TypeAnnonceurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vv=module::all()->where('dimunitif','=','type_vende')->first();

        $modESCOUNT=module::all()->where('dimunitif','=','type_vende')->count();

        $modES=module::all()->where('dimunitif','=','type_vende')->first();

        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();

        $type_vende_count=type_annonceur::all()->count();
        $type_vende=type_annonceur::all();
        return view('Back.type_vendeur.index',compact('type_vende','type_vende_count','attribut','modES','vv','modESCOUNT'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateDate=$request->validate([
            'statut'=>'required|string',



    ]);


    $save= new type_annonceur;
    $save->statut =$request->statut;


    $save->etat=0;

    $save->save();
    return BACK()->with('message',"enregistre !");
    }

    /**
     * Display the specified resource.
     */
    public function show(type_annonceur $type_annonceur): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(type_annonceur $type_annonceur): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateDate=$request->validate([
            'statut'=>'required|string',
    ]);
    $save= type_annonceur::find($id);
    $save->statut =$request->statut;
    $save->update();
    return BACK()->with('message',"Modification reussi !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $des=type_annonceur::findOrFail($request->id_f);
        $des->delete();
            return BACK()->with("message","Suppression reussi");
    }



    public function state(Request $request,$id)
    {
        $mod=type_annonceur::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="type vende activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="type vende desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}
