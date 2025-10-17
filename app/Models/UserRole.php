<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $primaryKey = 'role_id';

    protected $fillable = [
        'role_name'
    ];
    
     protected $hidden = [
        'created_at',
        'updated_at'
    ];


    public function permissions()
    {
        return $this->hasMany(Permission::class, 'role_id', 'role_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role_assignments', 'role_id', 'user_id');
    }
}
