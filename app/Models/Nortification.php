<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nortification extends Model
{
    protected $fillable = [
        'notificationname',
        'notificationimg',
        'notificationdes',
        'sendto',
    ];
}
