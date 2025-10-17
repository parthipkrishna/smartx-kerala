<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkList extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'register_no',
        'issued_date',
        'institute',
        'theory_mark',
        'practcal_mark',
        'max_mark',
        'total',
        'percentage',
        'grade'
    ];
}
