<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('student')->name('student.')->group(function(){
    Route::middleware('isStudent')->group(function(){
        Route::view('index','student.index')->name('index');
    });

    require __DIR__.'/student_auth.php';
});


