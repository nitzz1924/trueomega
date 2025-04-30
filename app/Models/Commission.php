<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $fillable = [
        'parent_id',
        'user_id',
        'comm_amount',
        'comm_percentage',
        'order_amount',
        'comm_month',
    ];
}
