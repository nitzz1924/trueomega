<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'projectname',
        'projectthumbnail',
        'categories',
        'projectstatus',
        'projectdescription',
    ];
}
