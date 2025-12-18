<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/test',function(){
    return["name"=>"junaid","Course"=>"BCA"];
});

Route::get('/student',[StudentController::class,'List']);

Route::post('add-student',[StudentController::class,'AddStudent']);