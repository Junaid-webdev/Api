<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    function List()
    {
        return Student::all();
    }


    function AddStudent(Request $request)
     {
            $rules = array(
                "name" => "required|min:2|max:10",
                "email" => "email|required",
                "country" =>"required"
            );
            $validation = Validator::make($request->all(), $rules);

            if ($validation->fails()) {
                return $validation->errors();
            } else {
                $student = new Student();
                $student->name = $request->name;
                $student->email = $request->email;
                $student->country = $request->country;
                if ($student->save()) {
                    return ["result" => "Student Added"];
                } else {
                    return ["result" => "opration failed"];
                }
            }
        }
    }

    // Update student //

    function updateStudent(Request $request)
    {
        $student =  Student::find($request->id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->country = $request->country;

        if ($student->save()) {
            return ["result" => "Student Updated"];
        } else {
            return ["result" => "opration failed"];
        }
    }

    // delete student //

    function deleteStudent($id)
    {
        $student = Student::destroy($id);
        if ($student) {
            return ["result" => "student recorded deleted successfully"];
        } else {
            return ["result" => "opration failed"];
        }
    }

    function searchStudent($name)
    {
        $student = Student::where('name', 'like', "%$name%")->get();
        if ($student) {
            return ['result' => $student];
        } else {
            return ["result" => "no record found"];
        }
    }

