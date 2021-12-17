<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderTransactions extends Model
{
    use HasFactory;

    public function detail(){
        return $this->hasMany(DetailTransactions::class);
    }

    protected $fillable = [
        'user_id', 'uuid'
    ];
}
