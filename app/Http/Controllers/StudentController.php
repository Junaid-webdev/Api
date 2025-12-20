<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    // List students
    public function List()
    {
        return Student::all();
    }

    // Add student
    public function AddStudent(Request $request)
    {
        $rules = [
            "name" => "required|min:2|max:50",
            "class_id" => "required|integer",
            "dob" => "required|date",
            "father_name" => "required",
            "mother_name" => "nullable",
            "number" => "required",
            "address" => "required",
        ];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $student = new Student();
        $student->name = $request->name;
        $student->class_id = $request->class_id;
        $student->dob = $request->dob;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->number = $request->number;
        $student->address = $request->address;
        $student->save();

        return ["result" => "Student Added Successfully"];
    }

    // Update student
    public function updateStudent(Request $request)
    {
        $student = Student::find($request->id);

        if (!$student) {
            return ["result" => "Student not found"];
        }

        $student->name = $request->name;
        $student->class_id = $request->class_id;
        $student->dob = $request->dob;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->number = $request->number;
        $student->address = $request->address;
        $student->save();

        return ["result" => "Student Updated Successfully"];
    }

    // Delete student
    public function deleteStudent($id)
    {
        if (Student::destroy($id)) {
            return ["result" => "Student deleted successfully"];
        }

        return ["result" => "Operation failed"];
    }

    // Search student
    public function searchStudent($name)
    {
        $student = Student::where('name', 'like', "%$name%")->get();

        if ($student->count() > 0) {
            return ['result' => $student];
        }

        return ["result" => "No record found"];
    }
}
