<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Monolog\Handler\IFTTTHandler;

class AuthController extends Controller
{
    public function loginPage(Request $req){

        $email = $req->cookie('email');
        $password = $req->cookie('password');

        return view('login', compact('email', 'password'));
    }

    public function registerPage(){
        return view('register');
    }

    public function register(Request $req){

        $validateData = $req->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'confirm' => 'required'
            ]
        );

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

            return redirect()->back()->with('message', 'User Registered!');
        }

        elseif($req->password != $req->confirm){
            return redirect()->back()->with('error', 'Password Does Not Match!');
        }
    }

    public function login(Request $req){

        $validateData = $req->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]
        );
        
        $credentials = ['email' => $req->email,
                        'password' => $req->password];

        if(Auth::attempt($credentials)){
            if(Auth::user()->role=='admin'){

                if($req->remember){
                    Cookie::queue('email', $req->email, 10080);
                    return redirect('/display');
                }
                else{
                    return redirect('/display');
                }
            }
            elseif(Auth::user()->role=='member'){

                if($req->remember){
                    Cookie::queue('email', $req->email, 10080);
                    return redirect('/displayMember'); 
                }
                else{
                    return redirect('/displayMember');
                }
            }
        }
        else{
            return redirect()->back()->with('message', 'Try Again');
        }
    }

    public function resetIndex(){
        $users = Auth::user();

        if($users->role == 'admin'){
            return view('resetAdmin', compact('users'));
        }
        elseif($users->role == 'member'){
            return view('resetMember', compact('users'));
        }
    }

    public function resetPass(Request $req){

        $req->validate([
            'oldPass' => 'required',
            'newPass' => 'required|min:8',
            'newConfirm' => 'required|min:8'
        ]);

        $user = User::where('id', '=', Auth::user()->id)->first();

        if(!(Hash::check($req->oldPass, Auth::user()->password))){
            return redirect()->back()->with("error", "Current Password does not match");
        }

        if(strcmp($req->oldPass, $req->newPass) == 0){
            return redirect()->back()->with("error", "New Password cannot match Old Password");
        }

        if($req->newPass == $req->newConfirm){
            $user->password = bcrypt($req->newPass);
            $user->save();
            return redirect()->back()->with("success", "Password Changed!");
        }
        else{
            return redirect()->back()->with("error", 'New Password does not match New Confirm');
        }
    }

    public function logout(){
        Auth::logout();
        return view('login');
    }
}
