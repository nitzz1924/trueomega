<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommisionList extends Model
{
    protected $table = 'commission_lists';
    protected $fillable = [
        'level',
        'commission_percentage',
    ];
}
