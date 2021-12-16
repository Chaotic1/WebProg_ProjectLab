<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function genre(){
        return $this->belongsToMany(Genre::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    protected $fillable = [
        'title', 'description', 'author', 'price', 'cover'
    ];
}
