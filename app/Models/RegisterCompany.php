<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterCompany extends Model
{
    protected $fillable = [
        'userid',
        'companyname',
        'companylogo',
        'city',
        'state',
        'country',
        'pincode',
        'contactnumber',
        'email',
        'officeaddress',
        'registrationimage',
        'pancardimage',
    ];
}
