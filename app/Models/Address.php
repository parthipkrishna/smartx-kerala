<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',             // Added name
        'phone_number',     // Added phone number
        'street',
        'city',
        'state',
        'country',
        'zip_code',
        'pin_code',
        'latitude',
        'longitude',
        'altitude',
        'address_type',
        'is_active'         // Added is_active
    ];
    
    protected $casts = [
        'is_active' => 'boolean', // Cast is_active as boolean
        'latitude' => 'float', // Optional: cast latitude to float if needed
        'longitude' => 'float', // Optional: cast longitude to float if needed
        'altitude' => 'float', // Optional: cast altitude to float if needed
    ];
    
    protected $hidden = [
        'created_at',
        'updated_at',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toArray()
    {
        $array = parent::toArray();
        return array_filter($array, function ($value) {
            return !is_null($value);
        });
    }
}
