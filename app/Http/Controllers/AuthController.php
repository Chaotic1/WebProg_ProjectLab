<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage(){
        return view('login');
    }

    public function login(Request $req){
        
        $credentials = ['email' => $req->email,
                        'password' => $req->password];

        if(Auth::attempt($credentials)){
            return view('redirection');
        }
        else{
            return 'fail';
        }
    }

    public function logout(){
        Auth::logout();
        return view('login');
    }
}
