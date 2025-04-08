<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyCart extends Model
{
    protected $fillable = [
        'productid',
        'userid',
        'productname',
        'productimage',
        'price',
        'quantity',
        'status',
    ];
}
