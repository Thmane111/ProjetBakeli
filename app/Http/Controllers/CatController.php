<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\sous_categorie;
use App\Models\Module;
use App\Models\Attribution;
use App\Models\NavigueMenu;
use Auth;
use Illuminate\Http\Request;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vv=module::all()->where('dimunitif','=','categorie')->first();

        $modESCOUNT=module::all()->where('dimunitif','=','categorie')->count();

        $modES=module::all()->where('dimunitif','=','categorie')->first();

        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();

        $cat=categorie::all();
        $cat_count=categorie::all()->count();
        $navv=NavigueMenu::all();
        return view('Back.categorie.index',compact('cat','cat_count','attribut','modES','vv','modESCOUNT','navv'));
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
        $validateDate=$request->validate([
            'nom_cat'=>'required|string',
            'caption'=>'required|string',


    ]);

    $verifie=categorie::all()->where('nom_cat','=',$request->nom_cat)
    ->where('caption','=',$request->caption)->count();
    if($verifie==0){


    $save= new categorie;
    $save->nom_cat =$request->nom_cat;
    $save->caption =$request->caption;
    $save->navigue_menu_id=$request->navigue;
    if($request->detail==null){
        $save->detail==" ";
    }else{
    $save->detail=$request->detail;
    }
    $save->deletable=0;
    $save->etat=0;

    $save->save();
    return BACK()->with('message',"Module enregistre !");
    }else{
        return BACK()->with('error',"Catégorie existe deja!");
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voirs=categorie::All()->where('id','=',$id)->first();
        return view('Back.categorie.view',compact('voirs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modif_cat=categorie::findOrFail($id);
        return view('Back.categorie.edit',compact('modif_cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateDate=$request->validate([
            'nom_cat'=>'required|string',
            'caption'=>'required|string',


    ]);
    $verifie=categorie::all()->where('nom_cat','=',$request->nom_cat)
    ->where('id','!=',$request->id)->count();

    if($verifie==0){

    $save=categorie::find($request->id);
    if($request->detail==null){
        $save->detail=$request->detail2;
    }else{
        $save->detail=$request->detail;
    }
    $save->nom_cat =$request->nom_cat;
    $save->caption =$request->caption;



    $save->update();
    return BACK()->with('message',"Modification enregistre !");
}else{
    return BACK()->with('error',"categorie existe deja!");
}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $cat_del=categorie::findOrFail($request->id_f);
        $verifier_sous_cat=sous_categorie::all()->where('categorie_id','=',$request->id_f)->count();

        if($verifier_sous_cat!=0){
            $verifier_sous_cat2=sous_categorie::all()->where('categorie_id','=',$request->id_f);
            foreach($verifier_sous_cat2 as $verifier_sous_cat2S){

                $verifier_sous_cat21=sous_categorie::findOrFail($verifier_sous_cat2S->id);
                $verifier_sous_cat21->delete();
                }

        }
        $cat_del->delete();
            return BACK()->with("message","Suppression reussi Avec Success");
    }

    public function state(Request $request,$id)
    {
        $mod=categorie::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="categorie activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="categorie desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}
