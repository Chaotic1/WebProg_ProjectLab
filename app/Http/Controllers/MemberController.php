<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

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
}
