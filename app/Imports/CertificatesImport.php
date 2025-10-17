<?php

namespace App\Imports;

use App\Models\Certificate;
use App\Models\Student;
use App\Models\Marklist;
use App\Models\Course;
use App\Models\CourseDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class CertificatesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        $student = Student::where('register_no', $row['register_no'])->first();
        $marklist = Marklist::where('student_id', $student->student_id)->first();
        $course = Course::where('course_id', $student->course_id)->first();
        $course_detail = CourseDetail::where('course_id', $course->course_id)->first();
        $issued_date = isset($row['issued_date']) ? $this->transformDate($row['issued_date']) : null;
        // dd($row);
        return new Certificate([
            'student_name' => $row['student_name'] ?: $student->name,
            'register_no' => $row['register_no'] ?: $student->register_no,
            'duration' => $course_detail->duration,
            'performance' => $row['performance'] ?: null,
            'course_name' => $course->name,
            'issued_date' => $issued_date,
            'location' => $row['location'] ?: null,
            'institute' => $marklist->institute ?: null,
        ]);
        
    }

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            // Convert Excel serial date to DateTime and format it
            return Date::excelToDateTimeObject($value)->format($format);
        } catch (\Exception $e) {
            return null; // Return null if there's an error with the date
        }
    }
}
