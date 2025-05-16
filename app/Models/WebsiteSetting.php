<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    protected $fillable = [
        'mainslideriamges',
        'offersliderimages',
        'firstofferimage',
        'secondofferimage',
        'orderamount',
    ];
}
