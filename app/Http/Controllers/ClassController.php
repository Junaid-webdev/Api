<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;

class ClassController extends Controller
{
    public function listClasses()
    {
        return ClassModel::all();
    }

    public function AddClass(Request $request)
    {
        $class = new ClassModel();
        $class->class_name = $request->class_name;
        $class->subject = $request->subject;
        $class->save();

        return response()->json([
            'message' => 'Class added successfully',
            'data' => $class
        ]);
    }

    public function updateClass(Request $request, $id)
    {
        $class = ClassModel::find($id);

        if (!$class) {
            return ["result" => "Class not found"];
        }

        $class->class_name = $request->class_name;
        $class->subject = $request->subject;
        $class->save();

        return ["result" => "Class Updated Successfully"];
    }

    public function deleteClass($id)
    {
        if (ClassModel::destroy($id)) {
            return ["result" => "Class deleted successfully"];
        }

        return ["result" => "Operation failed"];
    }
}
