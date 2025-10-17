<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuickLink;
use App\Models\Course;
use App\Models\Batch;
use App\Models\CourseDetail;
use App\Models\CourseBatch;
use App\Models\Category;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quicklinks = QuickLink::all();
        $courses=Course::latest()->take(7)->get();

        $course_main=[];
        foreach ($courses as $course) {
            $course_detail=CourseDetail::where('course_id',$course->course_id )->first();
            $course_batch=CourseBatch::where('course_id',$course->course_id )->get();
            $category=Category::where('category_id',$course->category_id )->first();
            $batch_main=[];
            $holiday_batch_main=[];

            $batch_ids = $course_batch->whereNotNull('batch_id')->pluck('batch_id')->toArray();
            foreach($batch_ids as $batch) {
                $batch_list=Batch::where('batch_id',$batch)->first();
                $batch_main[]=$batch_list->batch_type;
            }
            $holiday_batch_ids = $course_batch->whereNotNull('holiday_batch_id')->pluck('holiday_batch_id')->toArray();
            foreach($holiday_batch_ids as $batch) {
                $holiday_batch_list=Batch::where('batch_id',$batch)->first();
                $holiday_batch_main[]=$holiday_batch_list->batch_type;
            }

            $course_main[]=[

                'course_id'=> $course->course_id,
                'code'=> $course->code ?:NULL,
                'name'=> $course->name ?:NULL,
                'shortdescription'=> $course->shortdescription ?:NULL,
                'image'=>$course->image ?:NULL,
                'category'=> $category->link ?:NULL,

                'duration'=> $course_detail->duration ?:NULL,
                'bank_fee'=> $course_detail->bank_fee ?:NULL,
                'service_fee'=> $course_detail->service_fee ?:NULL,
                'total_fee'=> $course_detail->total_fee ?:NULL,

                'batches' => $batch_main, 
                'holiday_batches' => $holiday_batch_main,
            ];
        }
        //dump($course_main);
        return view('web.home')->with(compact('quicklinks','course_main'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
