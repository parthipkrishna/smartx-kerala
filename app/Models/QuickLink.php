<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'link',
        'status',
        'image'
    ];

    protected $table = 'quick_links';
    
    protected $primaryKey = 'quick_link_id';
}
