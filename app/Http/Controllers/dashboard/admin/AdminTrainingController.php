<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\TrainingCenter;
use Illuminate\Support\Facades\File;

class AdminTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $categories = Category::all();
        $training_centers = TrainingCenter::all();
        return view('dashboard.trainingcenter.index')->with(compact('training_centers','categories'));
    }

    public function addIndex() {
        $categories = Category::all();
        return view('dashboard.trainingcenter.add',compact('categories'));
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
        $request->validate([
            'center_name' => 'required',
            'phone_number' => 'nullable',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'address' => 'required',
            'district' => 'required',
            'pin_code' => 'nullable',
            'contact_person' => 'nullable',
            'gst_number' => 'nullable',
            'category'=>'required',
        ]);
        
        try {
            $file = $request->file('image');   
            // if($file){   
            //     $file_name = $file->getClientOriginalName();
            //     $image_path = $file->storeAs('public/uploads/images/TrainingCenter', $file_name , 'public_folder');   
            // }
             //try {
            $thumbnailImagePath = null;
            if ($request->hasFile('image')) {
                // Store the image in the 'public/live/thumbnails' directory
                $thumbnailImagePath = $request->file('image')->store('uploads/images/TrainingCenter', 'public');
            }

            $training = new TrainingCenter();
            $training->center_name = $request->input('center_name');
            $training->contact_person = $request->input('contact_person') ?? null;
            $training->phone_number = $request->input('phone_number') ?? null;
            $training->status = $request->has('status') ? 1 : 0;
            $training->address = $request->input('address');
            $training->gst_number = $request->input('gst_number') ?? null;
            $training->course = $request->input('category');
            $training->district = $request->input('district');
            $training->pin_code = $request->input('pin_code') ?? null;
            $training->image = $thumbnailImagePath;
            $success = $training->save();
            if($success){
                $message ='Training center added successfully ';
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
        $trainingCenter = TrainingCenter::findOrFail($id);
        $existing_image = base_path($trainingCenter->image);

        if($request->file('image')){
            if(File::exists($existing_image)){
                File::delete($existing_image);
            }
            $file = $request->file('image');
            //$file_name = $file->getClientOriginalName();
            $image_path = $request->file('image')->store('uploads/images/TrainingCenter', 'public');
        }   
        $updated = $trainingCenter->update([
            'center_name' => $request->input('center_name')?: $trainingCenter->center_name,
            'address' => $request->input('address')?: $trainingCenter->address,
            'pin_code' => $request->input('pin_code')?: $trainingCenter->pin_code,
            'phone_number' => $request->input('phone_number')?: $trainingCenter->phone_number,
            'gst_number' => $request->input('gst_number')?: $trainingCenter->gst_number,
            'contact_person' => $request->input('contact_person')?: $trainingCenter->contact_person,
            'district' => $request->input('district')?: $trainingCenter->district,
            'status' => $request->has('status') ? $request->input('status') : $trainingCenter->status,
            'image' => $request->file('image')?$image_path:$trainingCenter->image,
            'course' => $request->input('category')?: $trainingCenter->course,
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
        $success = TrainingCenter::where('id',$id)->delete();
        if($success){
            return redirect()->back()->with(['message'=>'delete success']);
        }
    }
}
