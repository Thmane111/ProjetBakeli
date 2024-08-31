<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use App\Models\Admin;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if($request->RouteIs('app.*')){
            return route('app.login');
           }elseif($request->RouteIs('admin.*')){
            $verifier_exist=Admin::all()->count();
            if($verifier_exist!=0){
            return route('admin.login');
            }else{
                return route('admin.register');
            }
           }else{
            return route('dashboard');
           }
    }
}
