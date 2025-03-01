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
        'google_id',
        'user_type',
        'name',
        'mobile',
        'email',
        'password',
        'verification_status',
        'company_name',
        'company_document',
        'profile_photo_path',
    ];
}
