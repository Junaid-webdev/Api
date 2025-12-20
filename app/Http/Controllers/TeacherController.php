<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function List()
    {
        return Teacher::all();
    }

    // Teacher Addd Method //
    
    public function AddTeacher(Request $request)
    {
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->subject = $request->subject;
        $teacher->dob = $request->dob;
        $teacher->address = $request->address;
        $teacher->number = $request->number;
        if($teacher->save()){
            return ["result"=>"Teacher Added"];
        }else{
            return ["result"=>"Opration failed"];
        }
    }

    // Teacher Update //

    public function updateTeacher(Request $request){
        $teacher = Teacher::find($request->id);
        $teacher->name = $request->name;
        $teacher->subject = $request->subject;
        $teacher->dob = $request->dob;
        $teacher->address = $request->address;
        $teacher->number = $request->number;
        if($teacher->save()){
            return ["result"=>"Teacher Updated Successfully!"];
        }else{
            return ["result"=>"Opration Failed"];
        }
    }

    // Delete Method //

   function deleteTeacher($id){
    $teacher = Teacher::destroy($id);
    if($teacher){
        return ["result"=>"Teacher has been deleted"];
    }else{
        return ["result"=>"Opration Failed"];
    }
   }

   // Search method //

   function searchTeacher($name){
    $teacher = Teacher::where("name","like","%$name%")->get();
    if($teacher){
        return ["result"=>$teacher];
    }else{
        return ["result"=>"record not found"];
    }
   }
    
}
