<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Icon;
use App\Models\Module;
use App\Models\Attribution;
use Auth;
use App\Models\sous_categorie;
use Illuminate\Http\Request;

class Sous_CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sous_cat=sous_categorie::all();
        $cat=Categorie::all();
        $icon=Icon::all();

        $vv=module::all()->where('dimunitif','=','sous_categories')->first();

        $modESCOUNT=module::all()->where('dimunitif','=','sous_categories')->count();

        $modES=module::all()->where('dimunitif','=','sous_categories')->first();
        $sous_cat_count=sous_categorie::all()->count();
        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();
        return view('Back.sous_categorie.index',compact('sous_cat','sous_cat_count','cat','icon','modESCOUNT','modES','vv'));
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
            'sous_cat'=>'required|string',

            'categorie'=>'required|string',

    ]);


    $save= new sous_categorie;
    $save->nom_type =$request->sous_cat;
    $save->categorie_id=$request->categorie;
    $save->deletable=0;
    $save->etat=0;
    if($request->icon_id=="0"){
        $save->icon_id=0;
    }else{
        $save->icon_id=$request->icon_id;
    }

    $save->save();
    return BACK()->with('message',"enregistre reussi!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sous_categorie  $sous_categorie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voirs=sous_categorie::All()->where('id','=',$id)->first();
        return view('Back.sous_categorie.view',compact('voirs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sous_categorie  $sous_categorie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modif_cat=sous_categorie::findOrFail($id);
        $cat=Categorie::all();
        return view('Back.sous_categorie.edit',compact('modif_cat','cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sous_categorie  $sous_categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateDate=$request->validate([
            'sous_cat'=>'required|string',


    ]);
     $verifie=sous_categorie::all()->where('nom_type','=',$request->sous_cat)
     ->where('id','!=',$request->id)
     ->count();

     if($verifie==0){
        $save=sous_categorie::find($request->id);
    $save->nom_type =$request->sous_cat;
    if($request->categorie==0){
        $save->categorie_id=$request->categorie2;
    }else{
        $save->categorie_id=$request->categorie;
    }
    if($request->icon_id=="0"){
        $save->icon_id=0;
    }else{
        $save->icon_id=$request->icon_id;
    }


    $save->update();
    return BACK()->with('message',"enregistre reussi!");
}else{
    return BACK()->with('error',"type catégorie existe deja");
}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sous_categorie  $sous_categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat_del=sous_categorie::findOrFail($id);
        $cat_del->delete();
            return BACK()->with("message","Suppression reussi Avec Success");
    }

    public function state($id)
    {
        $mod=sous_categorie::findOrFail($id);
        if($mod->etat==0)
        {
            $etat=1;
            $message="Type de catégorie Activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="Type de catégorie Desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}
