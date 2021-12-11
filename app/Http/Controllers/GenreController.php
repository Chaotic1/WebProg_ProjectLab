<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
        $genres = Genre::all();
        return view('manageGenre', compact('genres'));
    }

    public function insert(Request $req){
        $genre = new Genre();
        $genre->name = $req->name;

        $genre->save();

        $genre->book()->sync($req->book);

        return redirect()->back();
    }

    public function details($id){
        $genres = Genre::find($id);
        $books = Book::all();
        //dd($genres->book);
        return view('genreDetail', compact(['genres', 'books']));
    }

    public function update(Request $req){
        $genre = Genre::find($req->id);
        $genre->name = $req->name != null ? $req->name : $genre->title;

        $genre->save();

        $genre->book()->sync($req->book);

        return redirect()->back();
    }

    public function delete($id){

    }
}
