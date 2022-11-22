<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StutudentController;



Route::controller(StutudentController::class)->group(function(){
    Route::get('/', 'index');
    Route::post('student', 'addstudent')->name('student');

    Route::get('demo-search', 'home');
    Route::get('autocomplete', 'autocomplete')->name('autocomplete');
});
