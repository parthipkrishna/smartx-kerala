<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Batch;
use App\Models\CourseDetail;
use App\Models\CourseBatch;
use App\Models\Certificate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class AdminCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses= Course::all();
        $categories=Category::all();
        $batches=batch::all();

        $course_main=[];
        foreach ($courses as $course) {
            $category=Category::where('category_id',$course->category_id )->first();
            $course_detail=CourseDetail::where('course_id',$course->course_id )->first();
            $course_batch=CourseBatch::where('course_id',$course->course_id )->get();

            $course_main[]=[

                'course_id'=> $course->course_id,
                'code'=> $course->code ?:NULL,
                'name'=> $course->name ?:NULL,
                'category' => $category ? $category->name :NULL,
                'description'=> $course->description ?:NULL,
                'shortdescription'=> $course->shortdescription ?:NULL,
                'image'=>$course->image ?:NULL,
                'status'=> $course->status ?:0,

                'featured'=> $course_detail->featured ?:0,
                'syllabus'=> $course_detail->syllabus ?:NULL,
                'duration'=> $course_detail->duration ?:NULL,
                'registration_fee'=> $course_detail->registration_fee ?:NULL,
                'practical_exam_fee'=> $course_detail->practical_exam_fee ?:NULL,
                'written_exam_fee'=> $course_detail->written_exam_fee ?:NULL,
                'bank_fee'=> $course_detail->bank_fee ?:NULL,
                'service_fee'=> $course_detail->service_fee ?:NULL,
                'total_fee'=> $course_detail->total_fee ?:NULL,

                'batch_id'=> $course_batch->whereNotNull('batch_id')->pluck('batch_id')->toArray(),
                'holiday_batch_id'=> $course_batch->whereNotNull('holiday_batch_id')->pluck('holiday_batch_id')->toArray(),

            ];
        }
        return view('dashboard.course.index')->with(compact('course_main','categories','batches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        $batches=Batch::all();
        return view('dashboard.course.add')->with(compact('categories','batches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'code' => 'required',
           'syllabus' => 'required',
           'duration' => 'required',
           'registration_fee' => 'required',
           'practical_exam_fee' => 'required',
           'written_exam_fee' => 'required',
           'featured' => 'required',
            'status' => 'required',
            'batch' => 'required|array', 
            'holiday_batch' => 'nullable|array', 
            'image' => 'nullable|mimes:jpg,jpeg,png,svg,gif|max:2048',

        ]);

        $data = $request->all();

        $thumbnailImagePath = null;
        if ($request->hasFile('image')) {
            $thumbnailImagePath = $request->file('image')->store('uploads/images/Courses', 'public');
        }

        $courseId = DB::table('courses')->insertGetId([
            'code' => $data['code'],
            'name' => $data['name'] ? : NULL,
            'category_id' => $data['category_id'],
            'status'=>$data['status'] ? 1 : 0,
            'description' => $data['description']? : NULL,
            'shortdescription' => $data['shortdescription']? : NULL,
            'image' => $thumbnailImagePath ?? NULL,
        ]);

        $course= new CourseDetail();
        $course->course_id = $courseId;
        $course->syllabus = $request->input('syllabus')? : NULL;
        $course->duration = $request->input('duration')? : NULL;
        $course->registration_fee = $request->input('registration_fee');
        $course->practical_exam_fee = $request->input('practical_exam_fee');
        $course->written_exam_fee = $request->input('written_exam_fee');
        $course->bank_fee = $request->input('bank_fee') ? : NULL;
        $course->service_fee = $request->input('service_fee') ? : NULL;
        
        $total_fee = $request->input('registration_fee') + $request->input('practical_exam_fee') + $request->input('written_exam_fee');
        $course->total_fee = $total_fee;
        $course->status =  $request->has('status') ? 1 : 0;
        $course->featured =  $request->has('featured') ? 1 : 0;

        $success = $course->save();
        if ($success) {
            $courseBatchData = [];

            foreach ($request->input('batch') as $batch_id) {
                $courseBatchData[] = [
                    'course_id' => $courseId,
                    'batch_id' => $batch_id,
                    'holiday_batch_id' => null, 
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            foreach (optional($request->input('holiday_batch')) as $holiday_batch_id) {
                $courseBatchData[] = [
                    'course_id' => $courseId,
                    'batch_id' => null, 
                    'holiday_batch_id' => $holiday_batch_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            DB::table('course_batches')->insert($courseBatchData);

            $message = 'Course added successfully';
            return redirect()->back()->with(compact('message'));
        } else {
            $message = 'Failed to add course. Please try again.';
            return redirect()->back()->withErrors(compact('message'))->withInput($request->input());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $course = Course::findOrFail($id);  

        if ($request->hasFile('image')) {
            if (!empty($course->image)) {
                $existing_image_path = base_path($course->image);
                if (File::exists($existing_image_path)) {
                    File::delete($existing_image_path);
                }
            }
            $file = $request->file('image');
           $thumbnailImagePath = $request->file('image')->store('uploads/images/Courses', 'public');
        }

        if ($request->input('name')) {  
            Certificate::where('course_name', $course->name)->update(['course_name' => $request->input('name')]);
        }
        
        $course->code = $request->input('code') ? $request->input('code') : $course->code;
        $course->name = $request->input('name') ? $request->input('name') : $course->name;
        $course->category_id = $request->input('category_id') ? $request->input('category_id') : $course->category_id;
        $course->status = $request->has('status') ? $request->input('status') : $course->status;
        $course->description = $request->input('description') ? $request->input('description') : $course->description;
        $course->shortdescription = $request->input('shortdescription') ? $request->input('shortdescription') : $course->shortdescription;  
        $course->image = $request->file('image') ? $thumbnailImagePath : $course->image;

        $course->save(); 

        $courseDetail = CourseDetail::where('course_id', $id)->first();
        if (!$courseDetail) {
            $courseDetail = new CourseDetail();
            $courseDetail->course_id = $id;
        }
        $courseDetail->syllabus = $request->input('syllabus') ? $request->input('syllabus') : $courseDetail->syllabus;
        $courseDetail->duration = $request->input('duration') ? $request->input('duration') : $courseDetail->duration;
        $courseDetail->registration_fee = $request->input('registration_fee') ? $request->input('registration_fee') : $courseDetail->registration_fee;
        $courseDetail->practical_exam_fee = $request->input('practical_exam_fee') ? $request->input('practical_exam_fee') : $courseDetail->practical_exam_fee;
        $courseDetail->written_exam_fee = $request->input('written_exam_fee') ? $request->input('written_exam_fee') : $courseDetail->written_exam_fee;
        $courseDetail->bank_fee = $request->input('bank_fee') ? $request->input('bank_fee') : $courseDetail->bank_fee;
        $courseDetail->service_fee = $request->input('service_fee') ? $request->input('service_fee') : $courseDetail->service_fee;  

        $registration_fee = $request->input('registration_fee') ?? $courseDetail->registration_fee; 
        $practical_exam_fee = $request->input('practical_exam_fee') ?? $courseDetail->practical_exam_fee;
        $written_exam_fee = $request->input('written_exam_fee') ?? $courseDetail->written_exam_fee;
        $total_fee = $registration_fee + $practical_exam_fee + $written_exam_fee;

        $courseDetail->total_fee = $total_fee;
        $courseDetail->status = $request->has('status') ? $request->input('status') : $courseDetail->status;
        $courseDetail->featured =$request->has('featured') ? $request->input('featured') : $courseDetail->featured; 
        $courseDetail->save(); 
 
        $existingBatchIds = CourseBatch::where('course_id', $id)->whereNotNull('batch_id')->pluck('batch_id')->toArray();
        $existingHolidayBatchIds = CourseBatch::where('course_id', $id)->whereNotNull('holiday_batch_id')->pluck('holiday_batch_id')->toArray();    

        if ($request->has('batch')) {
            $newBatchIds = $request->input('batch');    
            $batchesToAdd = array_diff($newBatchIds, $existingBatchIds);
            foreach ($batchesToAdd as $batch_id) {
                CourseBatch::insert([
                    'course_id' => $id,
                    'batch_id' => $batch_id,
                    'holiday_batch_id' => null,
                ]);
            }   
        }   

        if ($request->has('holiday_batch')) {
            $newHolidayBatchIds = $request->input('holiday_batch'); 
            $holidayBatchesToAdd = array_diff($newHolidayBatchIds, $existingHolidayBatchIds);
            foreach ($holidayBatchesToAdd as $holiday_batch_id) {
                CourseBatch::insert([
                    'course_id' => $id,
                    'batch_id' => null,
                    'holiday_batch_id' => $holiday_batch_id,
                ]);
            }   
        } 

        return redirect()->back()->with(['message' => 'Course updated successfully']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('course_batches')->where('course_id', $id)->delete();   
        DB::table('course_details')->where('course_id', $id)->delete(); 
        $success = Course::where('course_id', $id)->delete();   
        if ($success) {
            return redirect()->back()->with(['message' => 'Course and its related data deleted successfully']);
        } else {
            return redirect()->back()->with(['error' => 'Error deleting the course']);
        }
    }

}
