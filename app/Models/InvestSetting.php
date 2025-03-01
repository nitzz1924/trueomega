<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestSetting extends Model
{
    protected $fillable = [
        'description',
        'bannervideo',
        'imagestoshare',
        'videostoshare',
    ];
}
