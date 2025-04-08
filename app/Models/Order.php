<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'userid',
        'billing_address',
        'shipping_address',
        'grandtotal',
        'products',
        'orderstatus',
    ];
}
