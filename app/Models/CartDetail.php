<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }

    protected $fillable = [
        'cart_id', 'book_id', 'quantity', 'subtotal'
    ];

}
