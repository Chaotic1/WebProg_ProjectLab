<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('showMember', compact('books'));
    }

    public function details($id){
        $books = Book::find($id);
        $genres = Genre::all();
        return view('detailMember', compact('books', 'genres'));
    }

    public function edit($id){
        $books = Book::find($id);
        $genres = Genre::all();
        return view('updateCart', compact('books', 'genres'));
    }

    public function profile(){
        return view('memberProfile');
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
}
