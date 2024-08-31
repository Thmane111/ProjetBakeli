<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Validation\Rules;
use App\Notifications\AnnoncNotification;

class AdminControlle extends Controller
{
    public function Index()
    {
        return view('admin.loginAdmin');

    }

    public function Dashboard()
    {
        return view('Back.partials.main');
    }

    public function Login(Request $request)
    {
        //dd($request->all());
        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email'=>$check['email'], 'password'=>$check['password']])){

            return redirect()->route('admin.Dashboard')->with('error','Admin login Successefuly');;
        }else{
            return back()->with('error','Invalide Email ou mot de passe');
        }

    }

    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('loginAdmin')->with('error','Deconnexion reussi');;

    }

    public function AdminRegister()
    {
        return view('admin.AdminRegister');
    }

    public function AdminRegisterCreate(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
        
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Admin::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        $save= new Admin;
        $save->name=$request->nom;
        $save->prenom=$request->prenom;
        $save->email=$request->email;
     
        $save->deletable=0;
   
        $save->etat=0;
    
        $save->password=Hash::make($request->password);
        $save->save();
        return redirect()->route('loginAdmin')->with('error','Enregistrement reussi');;

    }

    public function notify()
    {
        if(Auth::guard('admin')->user()){
        $prod=Product::all()->where('id','=',101)->first();
        
        Auth::guard('admin')->user()->notify(new AnnoncNotification($prod));
        }
        dd('done');
    }
}
