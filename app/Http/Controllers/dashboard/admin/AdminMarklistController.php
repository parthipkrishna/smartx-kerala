<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MarkList;
use App\Models\Course;
use App\Models\Student;
use App\Models\CourseDetail;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;

class AdminMarklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $courses = Course::all();

        $marklist_main = [];
        foreach ($students as $list) {
            $marklist = MarkList::where('student_id', $list->student_id)->first();

            if (!$marklist) {
                continue; 
            }

        $course = Course::where('course_id', $list->course_id)->first();

        $marklist_main[] = [
            'student_id' => $list->student_id,
            'name' => $list->name ?: NULL,
            'student_id_no' => $list->student_id_no ?: NULL,
            'joined_date' => $list->joined_date ?: NULL,
            'dob' => $list->dob ?: NULL,
            'email' => $list->email ?: NULL,
            'phone' => $list->phone ?: NULL,
            'image' => $list->image ?: NULL,
            'course' => $course->name ?? NULL,
            'register_no' => $marklist->register_no ?: NULL,
            'issued_date' => $marklist->issued_date ?: NULL,
            'institute' => $marklist->institute ?: NULL,
            'theory_mark' => $marklist->theory_mark ?: NULL,
            'practcal_mark' => $marklist->practcal_mark ?: NULL,
            'max_mark' => $marklist->max_mark ?: NULL,
            'total' => $marklist->total ?: NULL,
            'percentage' => $marklist->percentage ?: NULL,
            'grade' => $marklist->grade ?: NULL,
        ];
    }

    return view('dashboard.marklist.index')->with(compact('marklist_main', 'courses'));
    }


    public function view($id){
        $student= Student::where('student_id',$id)->first(); 
        if($student){

            $marklist_main=[];
            $course=Course::where('course_id',$student->course_id )->first();
            $courseDetail = CourseDetail::where('course_id',$course->course_id )->first();
            $marklist=MarkList::where('student_id',$student->student_id )->first();
            $category = Category::where('category_id', $course->category_id)->first();

            $marklist_main = [
                'student_id' => $student->student_id ?? NULL,
                'name' => $student->name ?? NULL,
                'register_no' => $student->register_no ?? NULL,
                'course' => $course->name ?? NULL,
                'duration' => $courseDetail->duration ?? NULL,
                'issued_date' => $marklist->issued_date ?? NULL,
                'institute' => $marklist->institute ?? NULL,
                'syllabus' => $courseDetail->syllabus ?? NULL,
                'theory_mark' => $marklist->theory_mark ?? 0,
                'practcal_mark' => $marklist->practcal_mark ?? 0,
                'total' => $marklist->total ?? 0,
                'percentage' => $marklist->percentage ?? 0,
                'grade' => $marklist->grade ?? NULL,
            ];
            if ($category->name === 'Computer Courses') {
                return view('dashboard.marklist.view_it', compact('marklist_main'));
            } 
            elseif ($category->name === 'Fashion Designing Courses') {
                return view('dashboard.marklist.view_fashion', compact('marklist_main'));
            } 
            else {
                return view('student-dashboard.marklist.view', compact('marklist_main'));
            }
        }
        return redirect()->back()->withErrors(['message' => 'Student not found']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::all();
        return view('dashboard.marklist.add')->with(compact('courses'));
       
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
            'register_no'=>'required',
            'student_id_no' => 'required',
            'course_id' => 'required',
            'theory_mark' => 'required',
            'practical_mark' => 'required',
            'percentage' => 'required',
            'grade' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);
        try{
            $data = $request->all();

            $thumbnailImagePath = null;
            if ($request->hasFile('image')) {
                // Store the image in the 'public/live/thumbnails' directory
                $thumbnailImagePath = $request->file('image')->store('uploads/images/students', 'public');
            }
            $studentId = DB::table('students')->insertGetId([
                'name' => $data['name']? : NULL,
                'course_id' => $data['course_id'],
                'student_id_no' => $data['student_id_no'],
                'register_no' => $data['register_no'],
                'joined_date' => $data['joined_date']? : NULL,
                'dob' => $data['dob']? : NULL,
                'email' => $data['email']? : NULL,
                'phone' => $data['phone']? : NULL,
                'image'=> $request->file('image')? $thumbnailImagePath :NULL,
            ]);
            $marklist= new MarkList();
            $marklist->student_id = $studentId;
            $marklist->course_id = $request->input('course_id')? : NULL;
            $marklist->register_no = $request->input('register_no')? : NULL;
            $marklist->issued_date = $request->input('issued_date')? : NULL;
            $marklist->institute = $request->input('institute')? : NULL;
            $marklist->theory_mark = $request->input('theory_mark');
            $marklist->practcal_mark = $request->input('practical_mark');
            $marklist->max_mark = 200;

            $total = $request->input('theory_mark') + $request->input('practical_mark');
            $marklist->total = $total;
            $marklist->percentage =  $request->input('percentage');
            $marklist->grade =  $request->input('grade');

            $success = $marklist->save();
            if ($success) {
                $message = 'MarkList added successfully';
                return redirect()->back()->with(compact('message'));
            } else {
                $message = 'Failed to add MarkList. Please try again.';
                return redirect()->back()->withErrors(compact('message'));
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
        $student = Student::where('student_id',$id)->first(); 
        if (!$student) {
            return redirect()->back()->withErrors(['message' => 'Student not found.']);
        }
        if($request->file('image')){
            $existing_image = base_path($student->image);
            if(File::exists($existing_image)){
                File::delete($existing_image);
            }
            $file = $request->file('image');
           $thumbnailImagePath = $request->file('image')->store('uploads/images/students', 'public');
        } 
        else {
            $thumbnailImagePath = $student->image;
        }  
        $student->name = $request->input('name') ? $request->input('name') : $student->name;
        $student->course_id = $request->input('course_id') ? $request->input('course_id') : $student->course_id;
        $student->student_id_no = $request->input('student_id_no') ? $request->input('student_id_no') : $student->student_id_no;
        $student->register_no = $request->input('register_no') ? $request->input('register_no') : $student->register_no;
        $student->joined_date = $request->input('joined_date') ? $request->input('joined_date') : $student->joined_date; 
        $student->email = $request->input('email') ? $request->input('email') : $student->email; 
        $student->phone = $request->input('phone') ? $request->input('phone') : $student->phone;   
        $student->image =$thumbnailImagePath;
        $student->save(); 

        $marklist = MarkList::where('student_id', $id)->first();
        if (!$marklist) {
            $marklist = new MarkList();
            $marklist->course_id = $id;
        }
        $marklist->course_id = $request->input('course_id') ? $request->input('course_id') : $marklist->course_id;
        $marklist->register_no = $request->input('register_no') ? $request->input('register_no') : $marklist->register_no;
        $marklist->issued_date = $request->input('issued_date') ? $request->input('issued_date') : $marklist->issued_date;
        $marklist->institute = $request->input('institute') ? $request->input('institute') : $marklist->institute;
        $marklist->theory_mark = $request->input('theory_mark') ? $request->input('theory_mark') : $marklist->theory_mark;
        $marklist->practcal_mark = $request->input('practcal_mark') ? $request->input('practcal_mark') : $marklist->practcal_mark;
        $marklist->max_mark = $request->input('max_mark') ? $request->input('max_mark') : $marklist->max_mark;  

        $theory_mark = $request->input('theory_mark') ?? $marklist->theory_mark; 
        $practcal_mark = $request->input('practcal_mark') ?? $marklist->practcal_mark;
        $total = $theory_mark + $practcal_mark;

        $marklist->total = $total;
        $marklist->percentage = $request->input('percentage') ? $request->input('percentage') : $marklist->percentage;
        $marklist->grade = $request->input('grade') ? $request->input('grade') : $marklist->grade;  

        $success = $marklist->save();
        if ($success) {
            $message = 'MarkList updated successfully';
            return redirect()->back()->with(compact('message'));
        } else {
            $message = 'Failed to update MarkList. Please try again.';
            return redirect()->back()->withErrors(compact('message'));
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
        DB::table('mark_lists')->where('student_id', $id)->delete(); 
        $success = Student::where('student_id', $id)->delete();   
        if ($success) {
            return redirect()->back()->with(['message' => 'Student and its related data deleted successfully']);
        } else {
            return redirect()->back()->with(['error' => 'Error deleting the course']);
        }
    }

    public function theme() {
        return view('dashboard.marklist.theme');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|max:5000', 
        ]);
        try {
            Excel::import(new StudentsImport, $request->file('file'));
            return back()->with('status', 'Students and Marklists imported successfully');
        } catch (\Exception $e) {
            Log::error("Error during import: " . $e->getMessage());
            dd($e);
            return back()->withErrors(['error' => 'Failed to import data. Please check the file format and try again.']);
        }
    }
}
