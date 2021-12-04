<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(){
        $genres = Genre::all();
        $books = Book::all();
        return view('manage', compact(['books', 'genres']));
    }

    public function insert(Request $req){

        //dd($req);

        $file = $req->file('image');
        $imageName = time().".".$file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $imageName);

        $book = new Book();
        $book->title = $req->title;
        $book->description = $req->description;
        $book->author = $req->author;
        $book->price = $req->price;
        $book->cover = 'images/'.$imageName;
        //$book->genre_id = $req->genre[0];

        $book->save();

        $book->genre()->sync($req->genre);

        return redirect()->back();
    }

    public function display(){
        $books = Book::all();
        return view('show', compact('books'));
    }

    public function details($id){
        $books = Book::find($id);
        $genres = Genre::all();
        return view('detailAdmin', compact('books', 'genres'));
    }
}
