<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens; 
class RegisterUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'register_users';

    protected $fillable = [
        'name',
        'mobile',
        'email',
        'password',
        'sponserid',
        'verification_status',
        'company_name',
        'company_document',
        'userstatus',
        'profile_photo_path',
    ];
}
