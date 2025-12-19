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

    public function AddTeacher(Request $request)
    {
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->subject = $request->subject;
        $teacher->experience = $request->experience;
        $teacher->email = $request->email;
        if($teacher->save()){
            return ["result"=>"Teacher Added"];
        }else{
            return ["result"=>"Opration failed"];
        }
    }
}
