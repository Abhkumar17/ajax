<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StutudentController;


Route::get('/', [StutudentController::class, 'index']);
Route::post('student', [StutudentController::class,'addstudent'])->name('student');


