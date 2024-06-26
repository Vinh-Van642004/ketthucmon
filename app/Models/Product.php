<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clothes;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function Clothe()
    {
        return $this->belongsTo(Clothes::class,'clothes_id','id');
    }
}
