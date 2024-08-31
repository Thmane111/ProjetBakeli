<?php

namespace App\Http\Controllers;

use App\Models\PlanAbonnement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\module;
use App\Models\Attribution;
use Auth;

class PlanAbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vv=module::all()->where('dimunitif','=','plan')->first();

        $modESCOUNT=module::all()->where('dimunitif','=','plan')->count();

        $modES=module::all()->where('dimunitif','=','plan')->first();

        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();

        $plan_count=PlanAbonnement::all()->count();
        $plan=PlanAbonnement::all();
        return view('Back.plan_abonnement.index',compact('plan','plan_count','attribut','modES','vv','modESCOUNT'));
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
            'prix'=>'required|string',
    ]);


    $save= new PlanAbonnement;
    $save->nom =$request->nom;
    $save->prix =$request->prix;
    $save->duration =$request->dure;
    $save->etat=0;
    $save->save();
    return BACK()->with('message',"enregistre !");
    }

    /**
     * Display the specified resource.
     */
    public function show(PlanAbonnement $planAbonnement): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlanAbonnement $planAbonnement): Response
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
            'prix'=>'required|string',
    ]);
    $save= PlanAbonnement::find($request->id);
    $save->nom=$request->nom;
    $save->prix=$request->prix;
    if($request->dure=="0"){
        $save->duration=$request->dure2;
    }else{
        $save->duration=$request->dure;
    }
    $save->update();
    return BACK()->with('message',"Modification reussi !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $des=PlanAbonnement::findOrFail($request->id_f);
        $des->delete();
            return BACK()->with("message","Suppression reussi");
    }


    public function state(Request $request,$id)
    {
        $mod=PlanAbonnement::findOrFail($request->id_s);
        if($mod->etat==0)
        {
            $etat=1;
            $message="plan d'\abonnement activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="plan d'\abonnement desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}
