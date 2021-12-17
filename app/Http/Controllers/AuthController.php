<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monolog\Handler\IFTTTHandler;

class AuthController extends Controller
{
    public function loginPage(){
        return view('login');
    }

    public function registerPage(){
        return view('register');
    }

    public function register(Request $req){

        if($req->password == $req->confirm){
            $user = User::create([
                'name' => $req->name,
                'email' => $req->email,
                'password' => bcrypt($req->password)
            ]);

            $cart = Cart::create([
                'user_id' => $user->id,
                'grand_total' => 0
            ]);

            return redirect()->back();
        }

        elseif($req->password != $req->confirm){
            return ('Password dont match bruh');
        }
    }

    public function login(Request $req){
        
        $credentials = ['email' => $req->email,
                        'password' => $req->password];

        if(Auth::attempt($credentials)){
            // dd(Auth::user()->role);
            if(Auth::user()->role=='admin'){
                return redirect('/display');
            }
            elseif(Auth::user()->role=='member'){
                return redirect('/displayMember');
            }
            else{
                return redirect('/displayGuest');
            }
            
        }
        else{
            return redirect()->back()->with('message', 'Try Again');
        }
    }

    public function logout(){
        Auth::logout();
        return view('login');
    }
}
