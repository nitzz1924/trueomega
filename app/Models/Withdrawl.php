<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdrawl extends Model
{
    protected $fillable = [
        'userid',
        'withdrawl_amt',
        'status',
        'transaction_details',
    ];
}
