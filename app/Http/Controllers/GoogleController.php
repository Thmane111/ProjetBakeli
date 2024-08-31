<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Auth;
class GoogleController extends Controller
{
    //



    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();

    }

    public function redirectToGoogleCallback()
    {
        $user=Socialite::driver('google')->user();
        $this->registerOrLoginUser($user);
        
        return redirect()->route('/');

    }

    protected function _registerOrLoginUser($data)
    {
        $user= User::where('email','=',$data->email)->first();
        if(!$user)
        {
            $user= new User();
            $user->name=$data->name;
            $user->email=$data->email;
            $user->provider_id=$data->id;
            $user->avatar=$data->avatar;
            $user->save();



        }
        Auth::login($user);
    }
}
