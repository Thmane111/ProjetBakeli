<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use App\Models\Module;
use App\Models\Attribution;
use Auth;
class MembreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_user=User::All();

        $vv=module::all()->where('dimunitif','=','ListAnnonce')->first();

        $modESCOUNT=module::all()->where('dimunitif','=','ListAnnonce')->count();

        $modES=module::all()->where('dimunitif','=','ListAnnonce')->first();
        $list_user_count=User::all()->count();
        $attribut=Attribution::all()->where('etat','=',Auth::guard('admin')->user()->id)->first();
        return view('Back.Membres.index',compact('list_user','list_user_count','attribut','modES','vv','modESCOUNT'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Back.Membres.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'NumTel' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image'=>'required|image|mimes:jpg,png,jiff,svg,jpeg|Max:2048',
        ]);

    $save= new User;
    $save->name=$request->nom;
    $save->prenom=$request->prenom;
    $save->email=$request->email;
    $save->telephone=$request->NumTel;
    $save->NumWhatsap=$request->NumWht;
    $save->deletable=0;

    $save->etat=0;

    $save-> password=Hash::make($request->password);

    if($request->hasfile('image')){
        $file= $request->file('image');
        $extension= $file->getClientOriginalExtension();
        $filename= time(). '.'. $extension;
        $file->move('photo/profile/',$filename);
        $save->image=$filename;
    }else{

        $save->image='';
    }
    $save->save();

    return BACK()->with('message',"user enregistre !");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detail=User::All()->where('id','=',$id)->first();

        return view('Back.Membres.view',compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $modif=User::findOrFail($id);
        return view('Back.Membres.edit',compact('modif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Membre $membre): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Membre $membre): RedirectResponse
    {
        //
    }


    public function state(Request $request,$id)
    {
        $mod=User::findOrFail($id);
        if($mod->etat==0)
        {
            $etat=1;
            $message="User activer";
        }elseif ($mod->etat==1)
        {
            $etat=0;
            $message="User desactiver";
        }
           $mod->etat=$etat;
           $mod->save();
           return BACK()->with('message',$message);

    }
}














































































