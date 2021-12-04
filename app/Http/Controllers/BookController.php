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

    public function edit($id){
        $books = Book::find($id);
        $genres = Genre::all();
        return view('editAdmin', compact(['books', 'genres']));
    }

    public function update(Request $req){

        $file = $req->file('image');

        $book = Book::find($req->id);
        echo collect($req->all());
        $book->title = $req->title != null ? $req->title : $book->title;
        $book->description = $req->description != null ? $req->description : $book->description;
        $book->author = $req->author != null ? $req->author : $book->author;
        $book->price = $req->price != null ? $req->price : $book->price;

        if($file != null){
            $imageName = time().".".$file->getClientOriginalExtension();
            Storage::putFileAs('public/images', $file, $imageName);

            Storage::delete('public/'.$book->cover);
            $book->cover = 'images/'.$imageName;
        }
        else{
            $book->cover = $book->cover;
        }

        $book->save();

        $book->genre()->sync($req->genre);

        return redirect()->back();
    }
}
