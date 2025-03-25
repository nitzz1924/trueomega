<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'ratings',
        'name',
        'email',
        'reviewtxt',
        'productid',
        'userid',
    ];
}
