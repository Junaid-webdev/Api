<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/test',function(){
    return["name"=>"junaid","Course"=>"BCA"];
});

Route::get('/student',[StudentController::class,'List']);

Route::post('create',[StudentController::class,'AddStudent']);

Route::put('/update',[StudentController::class,'updateStudent']);

Route::delete('/delete/{id}',[StudentController::class,"deleteStudent"]);