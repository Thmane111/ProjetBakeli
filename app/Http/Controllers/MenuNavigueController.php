<?php

namespace App\Http\Controllers;

use App\Models\NavigueMenu;
use App\Models\module;
use App\Models\Attribution;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MenuNavigueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vv=module::all()->where('dimunitif','=','nav')->first();

        $modESCOUNT=module::all()->where('dimunitif','=','nav')->count();

        $modES=module::all()->where('dimunitif','=','nav')->first();

        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();

        $nav_count=NavigueMenu::all()->count();
        $nav=NavigueMenu::all();
        return view('Back.MenuNavigue.index',compact('nav','nav_count','attribut','modES','vv','modESCOUNT'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateDate=$request->validate([
            'nom'=>'required|string',
    ]);


    $save= new NavigueMenu;
    $save->nom =$request->nom;
    
    $save->etat=0;
    $save->save();
    return BACK()->with('message',"enregistre !");
    }

    /**
     * Display the specified resource.
     */
    public function show(NavigueMenu $navigueMenu): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NavigueMenu $navigueMenu): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validateDate=$request->validate([
            'nom'=>'required|string',
    ]);
    $save= NavigueMenu::find($id);
    $save->nom =$request->nom;
    $save->update();
    return BACK()->with('message',"Modification reussi !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $des=NavigueMenu::findOrFail($request->id_f);
        $des->delete();
            return BACK()->with("message","Suppression reussi");
    }



    public function state(Request $request,$id)
    {
        $mod=NavigueMenu::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="Navbar activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="Navbar desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}
