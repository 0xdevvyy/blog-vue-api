<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create(){
        return view('auth.login');
    }


    public function login(Request $request){
        $attr = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255']
        ]);

        if(!Auth::attempt($attr)){
            return back()->withErrors(['password' => 'Unable to Uathenticate']);
        }

        $request->session()->regenerate();

        return redirect()->intended('/login')->with('success',  'Successfully Login!');
    }

    public function welcome(){
        return view('welcome');
    }
}
