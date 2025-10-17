<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\TrainingCenter;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    $query = TrainingCenter::query();
    $districts = TrainingCenter::select('district')->distinct()->orderBy('district', 'asc')->get();
    $courses = TrainingCenter::select('course')->whereNotNull('course')->distinct()->get();
    $lastDistrict = $districts->isNotEmpty() ? $districts->last()->district : null;
    $selectedDistrict = $request->input('district', $lastDistrict);
    $selectedCourse = $request->input('course', ''); // No default for course

    if (!empty($selectedDistrict)) {
        $query->where('district', $selectedDistrict);
    }
    if (!empty($selectedCourse)) {
        $query->where('course', $selectedCourse);
    }

    $training_centers = $query->paginate(10);

    return view('web.training', compact('training_centers', 'districts', 'courses', 'selectedDistrict', 'selectedCourse'));
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
