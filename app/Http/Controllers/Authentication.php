<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hamcrest\Type\IsNumeric;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class Authentication extends Controller
{
  
    public function index(){
        return view('login');
    }
   
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }
}
