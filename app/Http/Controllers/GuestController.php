<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('showGuest', compact('books'));
    }

    public function details($id){
        $books = Book::find($id);
        $genres = Genre::all();
        return view('detailGuest', compact('books', 'genres'));
    }
}
