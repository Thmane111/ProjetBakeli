<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthAdmin\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth-admin.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {



                    $request->authenticate();

                    $request->session(['admin_data' => Auth::guard('admin')->user()]);

                    return redirect()->intended(RouteServiceProvider::ADMIN_HOME)->with('message','Bienvenue sur votre panel');

        }




    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->forget('admin_data');

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
