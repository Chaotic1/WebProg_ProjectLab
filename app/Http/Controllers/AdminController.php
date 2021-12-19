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

        $user->update([
            'name' => $req->name
        ]);

        //$user->save();

        return redirect()->back();
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
            $user->update([
                'name' => $req->name,
                'role' => $req->role
            ]);
        }
        else{
            $user->update([
                'name' => $req->name,
                'email' => $req->email,
                'role' => $req->role
            ]);
        }
        return redirect()->back();
    }
}
