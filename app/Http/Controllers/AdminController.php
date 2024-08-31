<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\groupe;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $list_user=User::All()->where('role','=','1');
        return view('Back.utilisateurs.index',compact('list_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.loginAdmin');
    }

    public function ajout_user()
    {
        $list_g=groupe::all();
        return view('Back.utilisateurs.add',compact('list_g'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input= $request->all();
        $this->validate($request,[
        'email'=>'required|email',
        'password'=>'required',
        ]);

        if(auth()->attempt(['email' => $input['email'], 'password' => $input['password']]))
        {
            if(auth()->user()->role =='1')

            {
           

                $request->session()->regenerate();
                return redirect('/dashboardAD');
            }
            else   
            if(auth()->user()->role =='O')
            {
                return view('/dashboard');
            }
            else{
                return redirect('/dashboard');
               
            }
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
        $detail=ADMIN::All()->where('id','=',Auth::guard('admin')->user()->id)->first();
        return view('Back.utilisateurs.view',compact('detail'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_del=User::findOrFail($id);
        $user_del->delete();
            return BACK()->with("message","Suppression reussi Avec Success");
    }




     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function enregistre(Request $request)
    {
        
    $save= new User;
    $save->nom=$request->nom;
    $save->prenom=$request->prenom;
    $save->email=$request->email;
    $save->telephone=0;
    $save->deletable=0;
    $save->groupe_id=$request->groupe;
    $save->etat=0;
    $save->role=$request->role;
    $save-> password=Hash::make($request->password);
   
    if($request->hasfile('image')){
        $file= $request->file('image');
        $extension= $file->getClientOriginalExtension();
        $filename= time(). '.'. $extension;
        $file->move('photo/profile/',$filename);
        $save->image=$filename;
    }else{
        return $request ;
        $save->image='';
    }
    $save->save();

    return BACK()->with('message',"user enregistre !");

    }
}
