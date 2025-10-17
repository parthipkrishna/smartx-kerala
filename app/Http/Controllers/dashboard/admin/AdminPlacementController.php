<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Placement;
use Illuminate\Support\Facades\File;

class AdminPlacementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $placement_cells = Placement::all();
        return view('dashboard.placement.index')->with(compact('placement_cells'));  
    }

    public function addIndex() {
        return view('dashboard.placement.add');
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
            'company_name'=>'required',
            'location'=>'required',
            'district'=>'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);
        try {
            $thumbnailImagePath = null;
            if ($request->hasFile('image')) {
                // Store the image in the 'public/live/thumbnails' directory
                $thumbnailImagePath = $request->file('image')->store('uploads/images/placements', 'public');
            }
            
            $cell = new Placement();
            $cell->company_name = $request->input('company_name') ?: null;
            $cell->location = $request->input('location') ?: null;
            $cell->district = $request->input('district') ?: null;
            $cell->address = $request->input('address') ?: null;
            $cell->description = $request->input('description') ?: null;
            $cell->link = $request->input('link') ?: null;
            $cell->status = $request->has('status') ? 1 : 0;
            $cell->image = $thumbnailImagePath; 

            $success = $cell->save();
            if($success){
                $message ='Placement Cell Added Successfully ';
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
        $placement = Placement::where('placement_id', $id)->firstOrFail(); 
        $existing_image = base_path($placement->image);
        
        if($request->file('image')){
            if(File::exists($existing_image)){
                File::delete($existing_image);
            }
            $file = $request->file('image');
            // $file_name = $file->getClientOriginalName();
           $thumbnailImagePath = $request->file('image')->store('uploads/images/placements', 'public');
        }   
    
        $updated = $placement->update([
            'company_name' => $request->input('company_name')?:$placement->company_name,
            'location' => $request->input('location')?:$placement->location,
            'address' => $request->input('address')?:$placement->address,
            'district' => $request->input('district')?:$placement->district,
            'description' => $request->input('description')?:$placement->description,
            'link' => $request->input('link')?:$placement->link,
            'status' => $request->has('status') ? $request->input('status') : $placement->status,
            'image' => $request->file('image')?$thumbnailImagePath: $placement->image,

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
        $success = Placement::where('placement_id',$id)->delete();
        if($success){
            return redirect()->back()->with(['message'=>'delete success']);
        }
    }
}
