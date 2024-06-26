<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = [
        'user_id', 'name', 'gender', 'email', 'address', 'phone', 'notes', 'product_id', 'product_name', 'product_price', 'payment_method', 'status'
    ];

    protected $attributes = [
        'status' => 'Chờ Duyệt',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

