<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'course_id';

    protected $fillable = [
        'category_id', 
        'code', 
        'name', 
        'description', 
        'shortdescription', 
        'status',
        'image' 
    ];

    // One course can belong to many batches (regular batches)
    public function batches()
    {
        return $this->belongsToMany(Batch::class, 'course_batch', 'course_id', 'batch_id');
    }

    // One course can belong to many holiday batches
    public function holidayBatches()
    {
        return $this->belongsToMany(Batch::class, 'course_batch', 'course_id', 'holiday_batch_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
}
