<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index() {
        $users=User::all();
        $roles=UserRole::all();

        $user_main=[];
        foreach ($users as $item) {
            $role=UserRole::where('role_id',$item->user_role )->first();
            $user_main[]=[
                'user_id'=>$item->user_id,
                'name'=>$item->name,
                'user_role' => $role ? $role->role_name : 'N/A',
                'phone_number'=>$item->phone_number,
                'email'=>$item->email,
                'profile_image'=>$item->profile_image,
                'status'=>$item->status,
            ];
        }
        //dump($user_main);
        return view('dashboard.user.index')->with(compact('user_main','roles'));
    }

    public function role() {
        return view('dashboard.user.roles');
    }

    public function create()
    {
        $roles=UserRole::all();
        return view('dashboard.user.add')->with(compact('roles'));
    } 

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
            'phone_number' => 'required|unique:users|min:10|max:15',
            'user_role'=>'required',
            'profile_image' => 'nullable|mimes:jpg,jpeg,png,svg,gif|max:2048',

        
        ]);

        try {
            // if ($request->hasFile('profile_image')) {
            //     $file = $request->file('profile_image');
            //     $file_name = $file->getClientOriginalName();
            //     $image_path = $file->storeAs('public/uploads/images/Users', $file_name, 'public_folder'); 
            // }
            $thumbnailImagePath = null;
            if ($request->hasFile('profile_image')) {
                // Store the image in the 'public/live/thumbnails' directory
                $thumbnailImagePath = $request->file('profile_image')->store('uploads/images/Users', 'public');
            }


            $user= new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));;
            $user->phone_number = $request->input('phone_number');
            $user->status =  $request->has('status') ? 1 : 0;
            $user->user_role = $request->input('user_role');
            $user->profile_image = $request->file('profile_image')? $thumbnailImagePath :NULL;
            
            $success = $user->save();
            if($success){
                $message ='User added successfully ';
                return redirect()->back()->with(compact('message'));
            } 
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong. Please try again.'])->withInput($request->input());
        }
    
    }  

    public function show($id)
    {
        // Code to display a specific resource
    }  

    public function edit($id)
    {
        // Code to show a form for editing a resource
    }  

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        // dump($user->status);
        // dump( $request->has('status'));
        $existing_image = base_path($user->profile_image);

        if($request->file('profile_image')){
            if(File::exists($existing_image)){
                File::delete($existing_image);
            }
            $file = $request->file('profile_image');
            // $file_name = $file->getClientOriginalName();
           $thumbnailImagePath = $request->file('profile_image')->store('uploads/images/Users', 'public');

        }   
        $updated = $user->update([
            'name' => $request->input('name')?: $user->name,
            'email' => $request->input('email')?: $user->email,
            'phone_number' => $request->input('phone_number')?: $user->phone_number,
            'user_role' => $request->input('user_role')?: $user->user_role,
            'status' =>  $status = $request->has('status') ? $request->input('status') : $user->status,
            'profile_image' => $request->file('profile_image')?$thumbnailImagePath:$user->profile_image,
        ]);
        if($updated){
            return redirect()->back()->with(['message' => 'Successfully updated']);
        }
    }
    
    public function destroy($id)
    {
        $success = user::where('user_id',$id)->delete();
        if($success){
            return redirect()->back()->with(['message'=>'delete success']);
        }
    }
}
