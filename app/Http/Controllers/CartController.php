<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){

        $users = Auth::user();

        $carts = $users->cart;

        $cart_details = $carts->cartDetail;

        foreach ($cart_details as $items){
            $carts->grand_total += $items->subtotal;
        }


        return view('cart', compact(['carts', 'users', 'cart_details']));

    }

    public function insert(Request $req){

        $books = Book::find($req->id);

        $users = Auth::user();
        $carts = $users->cart;

        $item = CartDetail::where('cart_id', $carts->id)->where('book_id', $req->id)->first();

        if(empty($item)){
            $cart = CartDetail::create([
                'cart_id' => $carts->id,
                'book_id' => $req->id,
                'quantity' => $req->quantity,
                'subtotal' => $books->price * $req->quantity
            ]);
        }
        else{
            CartDetail::where('cart_id', $carts->id)->where('book_id', $req->id)->
            update(["quantity" => $item["quantity"] + $req->quantity, "subtotal" => $books->price * ($item["quantity"] + $req->quantity)]);
        }

        return redirect()->back();
    }

    public function update(Request $req){
        $cart = CartDetail::find($req->id);

        $users = Auth::user();
        $carts = $users->cart;
        $cart_details = $carts->cartDetail;


        foreach($cart_details as $items){

            if($items->cart_id == $carts->id){
                $items->first()->update([
                    'quantity' => $req->quantity,
                    'subtotal' => $items->book->price * $req->quantity
                ]);
                
                
                if($items->quantity == $req->quantity){
                    $items->quantity = $items->quantity;
                }
            }
        }

        return redirect('/cart');

    }

    public function delete($id){
        $cart = CartDetail::find($id);
        $cart->delete();
        return redirect()->back();
    }
}
