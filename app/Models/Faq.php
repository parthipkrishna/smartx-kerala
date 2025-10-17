<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [ 'is_enable', 'question', 'answer'];

    // Hidden fields
    protected $hidden = ['created_at', 'updated_at'];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
