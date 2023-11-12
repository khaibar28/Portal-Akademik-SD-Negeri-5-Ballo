<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'user_number' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->route('home');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
