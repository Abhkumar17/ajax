<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StutudentController;


Route::get('/', [StutudentController::class, 'index']);
Route::post('student', [StutudentController::class,'addstudent'])->name('student');

Route::controller(StutudentController::class)->group(function(){
    Route::get('demo-search', 'home');
    Route::get('autocomplete', 'autocomplete')->name('autocomplete');
});
