<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCenter extends Model
{
    use HasFactory;

    protected $fillable = [

        'center_name',
        'address', 
        'pin_code', 
        'phone_number', 
        'gst_number', 
        'contact_person', 
        'image', 
        'status',
        'district',
        'course'  
    ];

    protected $casts = [
        
        'status' => 'boolean', 
    ];

}
