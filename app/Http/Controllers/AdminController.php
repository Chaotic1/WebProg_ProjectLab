<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function display(){
        $books = Book::all();
        return view('show', compact('books'));
    }

    public function details($id){
        $books = Book::find($id);
        $genres = Genre::all();
        return view('detailAdmin', compact('books', 'genres'));
    }

    public function profile(){
        return view('adminProfile');
    }

    public function profileEdit(Request $req){
        $user = User::where('id', '=', Auth::user()->id);

        $req->validate([
            'name' => 'required'
        ]);

        $user->update([
            'name' => $req->name
        ]);

        return redirect()->back()->with('message', 'Profile Updated!');
    }

    public function userManage(){
        $users = User::all();

        return view('manageUser', compact('users'));
    }

    public function userDetails($id){
        $users = User::find($id);

        return view('userDetail', compact('users'));
    }

    public function userDetailsUpdate(Request $req){

        $user = User::find($req->id);

        if($user->email == $req->email){

            $req->validate([
                'name' => 'required',
                'role'  => 'required'
            ]);

            if($req->role == "member" or $req->role == "admin"){

                $user->update([
                    'name' => $req->name,
                    'role' => $req->role
                ]);
                return redirect()->back()->with('success', 'User Updated');
                
            }
            else{
                return redirect()->back()->with('error', 'Role must be either (member) or (admin)!');
            }
        }
        else{

            $req->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email|email',
                'role' => 'required'
            ]);

            if($req->role == 'member' or $req->role == 'admin'){
                $user->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'role' => $req->role
                ]);
                return redirect()->back()->with('success', 'User Updated');
            }
            else{
                return redirect()->back()->with('error', 'Role must be either (member) or (admin)!');
            }
        }    
    }

    public function userDelete(Request $req){
        $user = User::find($req->id);

        $user->delete();

        return redirect('/manageUser')->with('message', 'User Deleted');
    }
}
