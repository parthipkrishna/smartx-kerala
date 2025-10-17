<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'course_detail_id';

    protected $fillable = [
        'course_id',
        'batch',
        'holiday_batch',
        'syllabus',
        // 'career_opportunity',
        // 'additional_info',
        'duration',
        'registration_fee',
        'practical_exam_fee',
        'written_exam_fee',
        'bank_fee',
        'service_fee',
        'total_fee',
        'status',
        'featured',
    ];

    protected $casts = [
        'batch' => 'array', 
        'holiday_batch' => 'array',
    ];

     // One course detail belongs to one course
     public function course()
     {
         return $this->belongsTo(Course::class, 'course_id');
     }
 
     // One course detail can have many course batches (regular batches and holiday batches)
     public function courseBatches()
     {
         return $this->hasMany(CourseBatch::class, 'course_id');
     }
 
     // One course detail can have many regular batches through the CourseBatch pivot
     public function batches()
     {
         return $this->belongsToMany(Batch::class, 'course_batch', 'course_id', 'batch_id');
     }
 
     // One course detail can have many holiday batches through the CourseBatch pivot
     public function holidayBatches()
     {
         return $this->belongsToMany(Batch::class, 'course_batch', 'course_id', 'holiday_batch_id');
     }


    
}
