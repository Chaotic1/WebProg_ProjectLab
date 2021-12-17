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

        $genre = Genre::create([
            'name' => $req->name
        ]);

        $genre->book()->sync($req->book);

        return redirect()->back();
    }

    public function details($id){
        $genres = Genre::find($id);
        $books = Book::all();
        return view('genreDetail', compact(['genres', 'books']));
    }

    public function update(Request $req){
        $genre = Genre::find($req->id);
        $genre->first()->update([
            'name' => $req->name
        ]);

        if($genre->name == $req->name){
            $genre->name = $genre->name;
        }
        
        return redirect()->back();
    }

    public function delete($id){
        $genres = Genre::find($id);
        $genres->delete();
        return redirect()->back();
    }
}
