<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('pages.login.index');
    }

    public function authenticate(Request $request){
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($validatedData)){
            $request->session()->regenerate();

            return redirect('/');
        }

        return redirect('/');
    }

    public function logout(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
