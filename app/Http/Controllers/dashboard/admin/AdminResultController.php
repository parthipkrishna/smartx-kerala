<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Course;

class AdminResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Result::all();
        $courses = Course::all();
        return view('dashboard.result.index')->with(compact('results','courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('dashboard.result.add')->with(compact('courses'));
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
            'title'=>'required',
            'subtitle' => 'required',
            'status' => 'required',
            'description'=>'required',
            'posted_date'=>'required',
            'course'=>'required',

        ]);
        try {
            $result= new Result();
            $result->title = $request->input('title');
            $result->subtitle = $request->input('subtitle');
            $result->link = env('APP_URL') . '/student-login?course_id=' . $request->input('course');
            // $result->link = 'http://127.0.0.1:8000/student-login?course_id=' . $request->input('course');
            $result->status =  $request->has('status') ? 1 : 0;
            $result->code = $request->input('code')? $request->input('code') :NULL;
            $result->description = $request->input('description');
            $result->posted_date = $request->input('posted_date');
            $result->course_id = $request->input('course');

            $success = $result->save();
            if($success){
                $message ='Result added successfully ';
                return redirect()->back()->with(compact('message'));
            } 
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong. Please try again.'])->withInput($request->input());
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
        $result = Result::where('result_id', $id)->firstOrFail();             
        $updated = $result->update([
            'course_id' => $request->input('course_id')?:$result->course_id,
            'code' => $request->input('code')?:$result->code,
            'title' => $request->input('title')?:$result->title,
            'subtitle' => $request->input('subtitle')?:$result->subtitle,
            'description' => $request->input('description')?:$result->description,
            'posted_date' => $request->input('posted_date')?:$result->posted_date,
            'status' => $request->has('status') ? $request->input('status') : $result->status,
            'link' => $request->input('link')? : $result->link,
        ]);
        if($updated){
            return redirect()->back()->with(['message' => 'Successfully updated']);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $success = Result::where('result_id',$id)->delete();
        if($success){
            return redirect()->back()->with(['message'=>'delete success']);
        }
    }
}
