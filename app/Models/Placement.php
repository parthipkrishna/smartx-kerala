<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'location',
        'address',
        'district',
        'description',
        'link',
        'status',
        'image',
    ];

    protected $table = 'placements';
 
    protected $primaryKey = 'placement_id';
}
