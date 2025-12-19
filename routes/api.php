<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
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
    Route::resource('member', MemberController::class);
    Route::post('/logout', [UserAuthController::class, 'logout']);
});
Route::get('/login', [UserAuthController::class, 'login'])->name('login');
