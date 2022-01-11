<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(){
        $genres = Genre::all();
        $books = Book::all();

        return view('manage', compact(['books', 'genres']));
    }

    public function insert(Request $req){

        $req->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'author' => 'required',
                'price' => 'required|integer',
                'image' => 'required|mimes:png,jpg,jpeg|max:5048',
                'genre' => 'required|exists:genres,id'            
            ]
        );

        $file = $req->file('image');
        $imageName = time().".".$file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $imageName);

        $book = Book::create([
            'title' => $req->title,
            'description' => $req->description,
            'author' => $req->author,
            'price' => $req->price,
            'cover' => 'images/'.$imageName
        ]);

        $book->genre()->sync($req->genre);

        return redirect()->back()->with('success', 'New Book Added!');
    }

    public function edit($id){
        $books = Book::find($id);
        $genres = Genre::all();
        return view('editAdmin', compact(['books', 'genres']));
    }

    public function update(Request $req){

        $file = $req->file('image');

        $book = Book::find($req->id);

        if($file != null){
            $req->validate(
                [
                    'title' => 'required',
                    'description' => 'required',
                    'author' => 'required',
                    'price' => 'required|integer',
                    'genre' => 'required|exists:genres,id',
                    'image' => 'required|mimes:png,jpg,jpeg|max:5048'         
                ]
            );

            $imageName = time().".".$file->getClientOriginalExtension();
            Storage::putFileAs('public/images', $file, $imageName);

            Storage::delete('public/'.$book->cover);
            $book->update([
                'title' => $req->title,
                'description' => $req->description,
                'author' => $req->author,
                'price' => $req->price,
                'cover' => 'images/'.$imageName
            ]);
        }
        else{

            $req->validate(
                [
                    'title' => 'required',
                    'description' => 'required',
                    'author' => 'required',
                    'price' => 'required|integer',
                    'genre' => 'required|exists:genres,id'       
                ]
            );

            $book->update([
                'title' => $req->title,
                'description' => $req->description,
                'author' => $req->author,
                'price' => $req->price,
                'cover' => $book->cover
            ]);
        }
        $book->genre()->sync($req->genre);

        return redirect('/detail/'.$book->id)->with('message', 'Book Updated!');
    }

    public function delete($id){
        $book = Book::find($id);
        Storage::delete('public/'.$book->cover);
        $book->genre()->detach($id);
        $book->delete();
        return redirect('/display');
    }

    public function search(Request $req){
        $keyword = $req->keyword;
        $books = Book::where('title', 'LIKE', "%$keyword%")->paginate(5);

        if(Auth::user() == null){
            return view('showGuest', compact('books'));
        }
        elseif(Auth::user() != null){
            if(Auth::user()->role == 'admin'){
                return view('show', compact('books'));
            }
            elseif(Auth::user()->role == 'member'){
                return view('showMember', compact('books'));
            }
        }
        
    }    
}
