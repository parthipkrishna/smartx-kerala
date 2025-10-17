<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $primaryKey = 'batch_id';

    protected $fillable = [

        'batch_type'  
    ];

      // One batch can belong to many courses (regular batches)
      public function courses()
      {
          return $this->belongsToMany(Course::class, 'course_batch', 'batch_id', 'course_id');
      }
  
      // One batch can belong to many holiday courses
      public function holidayCourses()
      {
          return $this->belongsToMany(Course::class, 'course_batch', 'batch_id', 'course_id');
      }
}
