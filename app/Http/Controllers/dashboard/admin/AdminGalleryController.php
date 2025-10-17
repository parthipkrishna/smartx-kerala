<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;

class AdminGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::all();
        return view('dashboard.gallery.index')->with(compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.gallery.add');
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
            'media_type' => 'required|in:IMAGE,VIDEO,YOUTUBE',
            'image' => 'nullable|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'video' => 'nullable|mimes:mp4|max:10240',
            'youtube' => 'nullable|string|url', 
        ]);
        try {
            $video_path = null;
            $thumbnailImagePath = null;
            if ($request->hasFile('image')) {
                $thumbnailImagePath = $request->file('image')->store('uploads/images/Gallery/images', 'public');
            }
            
            $videoPath = null;
            if ($request->hasFile('video')) {
                $videoPath = $request->file('video')->store('uploads/images/Gallery/videos', 'public');
            }
            
            $gallery = new Gallery();
            $gallery->title = $request->input('title') ?: null;
            $gallery->subtitle = $request->input('subtitle') ?: null;
            $gallery->status = $request->has('status') ? 1 : 0;
            $gallery->media_type = $request->input('media_type');
            $gallery->youtube = $request->input('youtube') ?: null;
            $gallery->image = $thumbnailImagePath; 
            $gallery->video = $videoPath; 

            if ($gallery->save()) {
                return redirect()->back()->with('message', 'Gallery item added successfully');
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
        //dump($request->all());
        $gallery = Gallery::where('gallery_id', $id)->firstOrFail(); 
        //dump($gallery);
        $image_path = null;
        $video_path = null;
        
        if ($request->hasFile('image')) {
            if($request->image != 'NULL') {
                $existing_image = base_path($gallery->image);
                if(File::exists($existing_image)){
                    File::delete($existing_image);
                }
            }
            $file = $request->file('image');
            // $file_name = $file->getClientOriginalName();
            $image_path = $request->file('image')->store('uploads/images/Gallery/images', 'public');
        }
        
        if ($request->hasFile('video')) {
            if($request->video != 'NULL') {
                $existing_video = base_path($gallery->video);
                if(File::exists($existing_video)){
                    File::delete($existing_video);
                }
            }
            $video_file = $request->file('video');
            $video_path =$request->file('video')->store('uploads/images/Gallery/videos', 'public');
        }
    
        $updated = $gallery->update([
            'title' => $request->input('title')?:$gallery->title,
            'subtitle' => $request->input('subtitle')?:$gallery->subtitle,
            'media_type' => $request->input('media_type')?:$gallery->media_type,
            'youtube' => $request->input('youtube')?:$gallery->youtube,
            'image' => $request->file('image')?$image_path:$gallery->image,
            'video' => $request->file('video')?$video_path:$gallery->video,
            'status' => $request->has('status') ? $request->input('status') : $gallery->status,
        ]);
    
        if($updated){
            return redirect()->back()->with(['message' => 'Successfully Updated']);
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
        $success = Gallery::where('gallery_id',$id)->delete();
        if($success){
            return redirect()->back()->with(['message'=>'delete success']);
        }
    }
}
