<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student; 

class StudentController extends Controller
{
    function List(){
        return Student::all();
    }

    function AddStudent(Request $request){
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->country = $request->country;
        if($student->save()){
            return ["result"=>"Student Added"];
        }else{
            return ["result"=>"opration failed"];
        }
    }

    // Update student //

    function updateStudent(Request $request){
        $student =  Student::find($request->id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->country = $request->country;

        if($student->save()){
            return ["result"=>"Student Updated"];
        }else{
            return ["result"=>"opration failed"];
        }

    }

    // delete student //

    function deleteStudent($id){
        $student = Student::destroy($id);
        if($student){
            return ["result"=>"student recorded deleted successfully"];
        }else{
            return ["result"=>"opration failed"];
        }

    }

}
