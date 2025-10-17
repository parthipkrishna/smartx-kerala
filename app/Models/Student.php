<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_id';

    protected $fillable = [
        'name',
        'course_id',
        'student_id_no',
        'register_no',
        'joined_date',
        'dob',
        'email',
        'phone',
        'image'
    ];
}
