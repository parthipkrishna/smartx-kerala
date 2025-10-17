<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseBatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id', 
        'batch_id', 
        'holiday_batch_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

    public function holidayBatch()
    {
        return $this->belongsTo(Batch::class, 'holiday_batch_id');
    }

}
