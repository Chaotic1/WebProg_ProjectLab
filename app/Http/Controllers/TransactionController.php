<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\DetailTransactions;
use App\Models\Genre;
use App\Models\HeaderTransactions;
use GuzzleHttp\Psr7\Header;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showHistory(){
        $headers = HeaderTransactions::all();

        return view('history', compact('headers'));
    }

    public function showHistoryDetails($id){

        $headers = HeaderTransactions::find($id);
        $details = DetailTransactions::all();
    
        return view('historyDetail', compact('headers', 'details'));
    }

    public function bookDetail($id){
        $books = Book::find($id);
        $genres = Genre::all();
        $details = DetailTransactions::all();

        return view('bookHistoryDetail', compact(['books', 'genres', 'details']));        
    }
}
