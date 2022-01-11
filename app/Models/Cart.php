<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cartDetail(){
        return $this->hasMany(CartDetail::class);
    }

    protected $fillable = [
        'user_id', 'grand_total'
    ];
}
