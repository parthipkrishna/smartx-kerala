<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $primaryKey = 'user_id';

    protected $hidden = [
        'password',
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'email', 
        'phone_number', 
        'user_role', 
        'name', 
        'password', 
        'status',
        'profile_image',
        'remember_token', 
    ];

   public function roles()
    {
        return $this->belongsTo(UserRole::class, 'user_role', 'role_id');
    }


    // Accessor for nullable attributes to avoid sending null values
    public function getEmailAttribute($value)
    {
        return $value ?: '';
    }

    public function getPhoneNumberAttribute($value)
    {
        return $value ?: '';
    }

    public function getProfileImageAttribute($value)
    {
        return $value ?: '';
    }

    public function getGenderAttribute($value)
    {
        return $value ?: '';
    }

    public function getAgeAttribute($value)
    {
        return $value ?: 0;
    }
}
