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
            return "Student Add";
        }else{
            return "Opration failed";
        }
    }
}
