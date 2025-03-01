<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyListing extends Model
{
    protected $fillable = [
        'usertype',
        'roleid',
        'property_name',
        'approxrentalincome',
        'discription',
        'price',
        'pricehistory',
        'squarefoot',
        'bedroom',
        'bathroom',
        'floor',
        'city',
        'address',
        'thumbnail',
        'masterplandoc',
        'maplocations',
        'category',
        'gallery',
        'documents',
        'amenties',
        'videos',
        'status',
    ];
}
