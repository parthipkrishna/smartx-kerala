<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\CourseDetail;
use App\Models\MarkList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function index()
    {
        return view('auth.student-login');
    }

    public function studentLogin(Request $request)
    {
        $request->validate([
            'register_no' => 'required',
            'dob' => 'required',
        ]);
        $register_no = $request->input('register_no');
        $dob = $request->input('dob');
        $student = Student::where('register_no', $register_no)->first();
        if ($student) {
            if($student->dob ==$dob) {
                Session::put('student_id', $student->student_id);
                return redirect()->route('student-dashboard');
            }
            else{
                return redirect()->back()->withErrors(['message' => 'Date of birth is incorrect'])->withInput();
            }
        } else {
            return redirect()->back()->withErrors(['message' => 'Invalid credentials. Please check your register no and dob.'])->withInput();
        }
    }

    public function studentDashboard() {
        if (!Session::has('student_id')) {
            return redirect('student-login');
        }
        else {
            return redirect('student-home');
        }
    }

    public function studentHome() {
        return view('student-dashboard.home.home');
    }

    public function show($student_id)
    {
        $student = Student::where('student_id', $student_id)->first();    

        if (!$student) {
            return redirect()->back()->withErrors(['message' => 'Student not found']);
        }

        $course = Course::where('course_id', $student->course_id)->first();

        if (!$course) {
            return redirect()->back()->withErrors(['message' => 'Course not found']);
        }
        $category = Category::where('category_id', $course->category_id)->first();

        if (!$category) {
            return redirect()->back()->withErrors(['message' => 'Category not found']);
        }

        $certificate = Certificate::where('register_no', $student->register_no)->first();    

        if (!$certificate) {
            return view('student-dashboard.certificate.no_certificate', [
                'message' => 'No certificates found. Contact your institute.'
            ]);
        }
        if ($category->name === 'Computer Courses') {
            return view('student-dashboard.certificate.preview_it', compact('certificate','course'));
        } 
        elseif ($category->name === 'Fashion Designing Courses') {
            return view('student-dashboard.certificate.preview_fashion', compact('certificate','course'));
        } 
        else {
            return view('student-dashboard.certificate.preview', compact('certificate','course'));
        }
    }

    public function showMarklist($student_id)
    {
        $student = Student::where('student_id', $student_id)->first();

        if (!$student) {
            return redirect()->back()->withErrors(['message' => 'Student not found']);
        }

        $course = Course::where('course_id', $student->course_id)->first();
        if (!$course) {
            return redirect()->back()->withErrors(['message' => 'Course not found']);
        }

        $courseDetail = CourseDetail::where('course_id', $course->course_id)->first();
        $category = Category::where('category_id', $course->category_id)->first();
        if (!$category) {
            return redirect()->back()->withErrors(['message' => 'Category not found']);
        }

        $marklist = MarkList::where('student_id', $student->student_id)->first();

        if (!$marklist) {
            return view('student-dashboard.marklist.no_marklist');
        }

        $marklist_main = [
            'student_id' => $student->student_id,
            'name' => $student->name ?: null,
            'register_no' => $student->register_no ?: null,
            'course' => $course->name ?: null,
            'duration' => $courseDetail->duration ?: null,
            'issued_date' => $marklist->issued_date ?: null,
            'institute' => $marklist->institute ?: null,
            'syllabus' => $courseDetail->syllabus ?: null,
            'theory_mark' => $marklist->theory_mark ?: null,
            'practcal_mark' => $marklist->practcal_mark ?: null,
            'total' => $marklist->total ?: null,
            'percentage' => $marklist->percentage ?: null,
            'grade' => $marklist->grade ?: null,
        ];
        
        if ($category->name === 'Computer Courses') {
            return view('student-dashboard.marklist.view_it', compact('marklist_main'));
        } 
        elseif ($category->name === 'Fashion Designing Courses') {
            return view('student-dashboard.marklist.view_fashion', compact('marklist_main'));
        } 
        else {
            return view('student-dashboard.marklist.view', compact('marklist_main'));
        }
    }

    public function profile($student_id) {
        $student= Student::where('student_id',$student_id)->first(); 
        $course=Course::where('course_id',$student->course_id )->first();
        $marklist=MarkList::where('student_id',$student->student_id )->first();

        $profile=[];
        $profile[]=[

            'student_id'=> $student->student_id,
            'name'=> $student->name ?:NULL,
            'register_no'=> $student->register_no ?:NULL,
            'student_id_no'=> $student->student_id_no ?:NULL,
            'joined_date'=> $student->joined_date ?:NULL,
            'dob'=> $student->dob ?:NULL,
            'email'=> $student->email ?:NULL,
            'phone'=> $student->phone ?:NULL,
            'image'=> $student->image ?:NULL,
            'course'=> $course->name ?:NULL,
            'institute'=> $marklist->institute ?:NULL,
        ];
        return view('student-dashboard.home.profile')->with(compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $certificate=Certificate::where('register_no',$student->register_no)->first();
        $existing_image = base_path($student->image);

        if($request->file('image')){
            if(File::exists($existing_image)){
                File::delete($existing_image);
            }
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $image_path = $file->storeAs('public/uploads/images/Students', $file_name, 'public_folder'); 
        }  
        $update=$certificate->update([
            'student_name'=>$request->input('name')?: $student->name,
        ]); 
        $updated = $student->update([
            'name' => $request->input('name')?: $student->name,
            'email' => $request->input('email')?: $student->email,
            'phone' => $request->input('phone')?: $student->phone,
            'dob' => $request->input('dob')?: $student->dob,
            'image' => $request->file('image')?$image_path:$student->image,
        ]);
        if($updated){
            return redirect()->back()->with(['message' => 'Successfully updated']);
        }
    }


    public function logout()
    {
        Session::forget(['student_id', 'name', 'profile_image']); 
        return redirect('student-login');
    }



}
