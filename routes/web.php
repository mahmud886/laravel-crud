<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::get('/crud', [StudentController::class, 'gotoCrudPage']);
Route::post('/student/store', [StudentController::class, 'store']);
Route::get('/student/edit/{student_id}', [StudentController::class, 'edit']);
Route::post('/student/update/{student_id}', [StudentController::class, 'update']);
Route::get('/student/destroy/{student_id}', [StudentController::class, 'destroy']);
