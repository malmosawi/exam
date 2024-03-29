<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentIndex;
use App\Http\Controllers\Student\StudentPrpfile;



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
Route::middleware(['isStudent', 'verify.mobile'])->group(function(){

    Route::get('/', [StudentIndex::class, 'create']);
});
// Route::get('/', function () {
//     return view('student.index');
// });
Route::get('/demo', function () {
    return view('demo');
});

// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
require __DIR__.'/student.php';
require __DIR__.'/admin.php';
