<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produst;

class Clothes extends Model
{
    use HasFactory;

    protected $table = "clothe";

    public function Produst()
    {
        return $this->belongsTo(Produst::class, 'clothes_id','id');
    }
}
