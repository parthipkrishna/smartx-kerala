<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Student;
use App\Models\MarkList;
use App\Models\Course;
use App\Models\Category;
use App\Models\CourseDetail;
use App\Imports\CertificatesImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;

class AdminCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates= Certificate::all();
        return view('dashboard.certificate.index')->with(compact('certificates'));
    }

    public function theme() {
        return view('dashboard.certificate.theme');
    }

    public function view($id) {
        $certificate = Certificate::where('certificate_id',$id)->first(); 
        if (!$certificate) {
            return view('student-dashboard.certificate.no_certificate', [
                'message' => 'No certificates found. Contact your institute.'
            ]);
        }

        $student = Student::where('register_no', $certificate->register_no)->first(); 
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

        if ($category->name === 'Computer Courses') {
            return view('dashboard.certificate.preview_it', compact('certificate','course'));
        } 
        elseif ($category->name === 'Fashion Designing Courses') {
            return view('dashboard.certificate.preview_fashion', compact('certificate','course'));
        } 
        else {
            return view('student-dashboard.certificate.preview', compact('certificate','course'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.certificate.add');
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
            'student_name' => 'required',
            'performance' => 'required',
            'location' => 'required',
            'issued_date'=>'required'
        ]);
        try{
            $student=Student::where('register_no',$request->input('register_no'))->first();
            if( $student){
                $marklist=MarkList::where('student_id',$student->student_id)->first();
                $course= Course::where('course_id',$student->course_id)->first();
                $course_detail= CourseDetail::where('course_id',$course->course_id)->first();
                $certificate_main=[];
                $certificate= new Certificate();
                $certificate->student_name = $request->input('student_name')? :$student->name ;
                $certificate->register_no =$request->input('register_no')? :$student->register_no ;
                $certificate->duration =  $course_detail->duration;
                $certificate->performance = $request->input('performance')?:NULL;
                $certificate->course_name = $course->name;
                $certificate->issued_date =  $request->input('issued_date')?:NULL;
                $certificate->location = $request->input('location')?:NULL;
                $certificate->institute = $marklist->institute?:NULL;

                $success = $certificate->save();
                if ($success) {
                    $message = 'Certificate added successfully';
                    return redirect()->back()->with(compact('message'));
                } else {
                    $message = 'Failed to add Certificate. Please try again.';
                    return redirect()->back()->withErrors(compact('message'));
                }
            } else {
                return redirect()->back()->withErrors(['error' => 'Something went wrong. Please check the fields. '])->withInput($request->input());
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
        $certificate = Certificate::where('certificate_id', $id)->first();

        $certificate->performance = $request->input('performance', $certificate->performance);
        $certificate->issued_date = $request->input('issued_date', $certificate->issued_date);
        $certificate->location = $request->input('location', $certificate->location);
        $certificate->printed_status = (int) $request->input('printed_status', 0);
        $updated = $certificate->save(); // Force save
        return redirect()->back()->with(['message' => 'Successfully Updated']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $success = Certificate::where('certificate_id',$id)->delete();
        if($success){
            return redirect()->back()->with(['message'=>'delete success']);
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|max:5000', 
        ]); 

        try {
            Excel::import(new CertificatesImport, $request->file('file'));
            return back()->with('status', 'Certificate imported successfully');
        } catch (\Exception $e) {
            // Log the detailed error
            Log::error('Error during import: ' . $e->getMessage());

            // Provide a more user-friendly error message
            return back()->withErrors(['error' => 'Failed to import data. Please ensure the file is in the correct format and try again.']);
        }
    }

    public function print(Request $request)
    {
        $request->validate([
            'certificate_ids' => 'required|array',
            'certificate_ids.*' => 'exists:certificates,certificate_id'
        ]);
           
        $certificateIds = $request->certificate_ids;
        $certificates = Certificate::whereIn('certificate_id', $certificateIds)->get();
        if ($certificates->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'No certificates found.']);
        }
        $certificateData = [];

        foreach ($certificates as $certificate) {
            $student = Student::where('register_no', $certificate->register_no)->first();
            if (!$student) {
                continue; 
            }

            $course = Course::where('course_id', $student->course_id)->first();
            if (!$course) {
                continue; 
            }

            $category = Category::where('category_id', $course->category_id)->first();
            $certificateData[] = [
                'certificate' => $certificate,
                'student' => $student,
                'course' => $course,
                'category' => $category
            ];
        }

        return response()->json(['success' => true, 'certificates' => $certificateData]);
    }

    public function updatePrintedStatus(Request $request)
    {
        try {
            $certificateIds = $request->certificate_ids;
            Certificate::whereIn('certificate_id', $certificateIds)->update(['printed_status' => 1]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

}
