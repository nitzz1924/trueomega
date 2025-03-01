<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name',
        'mobilenumber',
        'email',
        'city',
        'state',
        'housecategory',
        'inwhichcity',
        'propertyid',
        'userid',
        'status',
        'followupdetails',
    ];
}
