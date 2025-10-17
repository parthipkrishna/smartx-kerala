<?php

namespace App\Imports;

use App\Models\Course;
use App\Models\Student;
use App\Models\MarkList;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return new Student([   
        // ]);

        // Handling image upload
        $image_path = null;
        if (isset($row['image']) && file_exists($row['image'])) {
            $file_name = basename($row['image']);
            $image_path = Storage::putFileAs('public/uploads/images/Students', $row['image'], $file_name);
        }
        //dd($row);
          // Convert Excel serial date to MySQL date format
          $joined_date = isset($row['joined_date']) ? $this->transformDate($row['joined_date']) : null;
          $dob = isset($row['dob']) ? $this->transformDate($row['dob']) : null;
          $issued_date = isset($row['issued_date']) ? $this->transformDate($row['issued_date']) : null;

          $course = Course::where('name', $row['course_name'] ?? '')->first();
          $course_id = $course ? $course->course_id : null;
        $student = new Student([
            'name' => $row['name'] ?? null,
            'course_id' =>$course_id,
            'student_id_no' => $row['student_id_no'] ?? null,
            'register_no' => $row['register_no'] ?? null,
            'joined_date' => $joined_date,
            'dob' => $dob,            
            'email' => $row['email'] ?? null,
            'phone' => $row['phone'] ?? null,
            'image' => $image_path,
        ]);
        
        $student->save();
        
        $marklist = new MarkList([
            'student_id' => $student->student_id,
            'course_id' => $course_id,
            'register_no' => $row['register_no'] ?? null,
            'issued_date' => $issued_date,
            'institute' => $row['institute'] ?? null,
            'theory_mark' => $row['theory_mark'] ?? 0,
            'practcal_mark' => $row['practcal_mark'] ?? 0,
            'max_mark' => $row['max_mark'] ?? 0,
            'total' => ($row['theory_mark'] ?? 0) + ($row['practcal_mark'] ?? 0),
            'percentage' => $row['percentage'] ?? null,
            'grade' => $row['grade'] ?? null,
        ]);
        
        $marklist->save(); 
        
        return $student; 
        
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
