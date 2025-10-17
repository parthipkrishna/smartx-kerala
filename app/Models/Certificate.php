<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $primaryKey = 'certificate_id';

    protected $fillable = [
        'student_name',
        'register_no',
        'duration',
        'performance',
        'course_name',
        'issued_date',
        'location',
        'institute'
    ];
}
