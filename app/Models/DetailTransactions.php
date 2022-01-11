<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransactions extends Model
{
    use HasFactory;

    public function header(){
        return $this->belongsTo(HeaderTransactions::class);
    }

    protected $fillable = [
        'header_id','book_id', 'title', 'description', 'author', 'price', 'cover', 'subtotal', 'grand_total', 'quantity'
    ];
}
