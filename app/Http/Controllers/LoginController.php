<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('admin.login.login',[

        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) { //get from user table check by credentials
            $request->session()->regenerate();
            return redirect()->intended('admin/home');
        }

//        return back()->withErrors([
//            'email' => 'The provided credentials do not match our records',
//        ]);

        return back()->with('loginError','Login failed');
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();;
        return redirect('admin/login');

    }

}
