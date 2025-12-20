<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;


// Student Profile
Route::post('/signup', [UserAuthController::class, 'signup']);
Route::post('/login', [UserAuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/student', [StudentController::class, 'List']);
    Route::post('create', [StudentController::class, 'AddStudent']);
    Route::put('/update', [StudentController::class, 'updateStudent']);
    Route::delete('/delete/{id}', [StudentController::class, "deleteStudent"]);
    Route::get('/search/{name}', [StudentController::class, 'searchStudent']);
    Route::post('/logout', [UserAuthController::class, 'logout']);
});
Route::get('/login', [UserAuthController::class, 'login'])->name('login');

// Teacher Profile//

Route::get('/list',[TeacherController::class,'List']);
Route::post('/teacher-Create',[TeacherController::class,'AddTeacher']);
Route::put("/teacher-updated/{id}",[TeacherController::class,"updateTeacher"]);
Route::delete('/teacher-delete/{id}',[TeacherController::class,"deleteTeacher"]);
Route::get('/search-teacher/{name}',[TeacherController::class,"searchTeacher"]);


// Classes Profile //

Route::get('/class',[ClassController::class,'listClasses']);
Route::post('/classadd',[ClassController::class,'AddClass']);  
Route::put('/classupdate',[ClassController::class,"updateClass"]);
Route::delete('classdelete',[ClassController::class,'deleteClass']); 