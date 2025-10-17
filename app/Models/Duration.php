<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'months',
        'days'
    ];

    protected $casts = [
        'months' => 'integer',
        'days' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
