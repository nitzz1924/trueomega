<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllProduct extends Model
{
    protected $fillable = [
        'productname',
        'regularprice',
        'saleprice',
        'category',
        'description',
        'galleryImages',
        'thumbnailImages',
        'productstatus',
    ];
}
