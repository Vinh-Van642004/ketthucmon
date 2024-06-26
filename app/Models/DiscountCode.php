<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    protected $table = 'discount_codes'; // Tên bảng trong CSDL
    protected $fillable = [
        'code', 'discount_amount'
    ];

    // Các phương thức và quan hệ (nếu có)
}
