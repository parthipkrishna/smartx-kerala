<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'media_type',
        'youtube',
        'video',
        'status',
        'image',
    ];
    protected $table = 'galleries';

    protected $primaryKey = 'gallery_id';
}
