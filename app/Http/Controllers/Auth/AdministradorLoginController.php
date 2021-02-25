<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class AdministradorLoginController extends Controller
{
    public function login() {
        if (Auth::guard('admin')->user())
            return redirect('administradorHome');
        else
            return view('auth.administradorLogin');
    }

    public function authenticate(Request $request) {
        $request->validate([
            'login' => 'required|string',
            'clave' => 'required|string',
        ]);

        $credentials = $request->only('login', 'clave');


        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('administradorHome');
        }

        return redirect('login')->with('error', true);
    }

    public function logout() {
        Auth::guard('admin')->logout();

        return redirect('login');
    }

    public function username() {
        return 'login';
    }
}
