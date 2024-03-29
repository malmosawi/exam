<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentIndex;
use App\Http\Controllers\Student\StudentPrpfile;
use App\Http\Controllers\Student\ForgotPassword;

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
    Route::middleware(['isStudent', 'verify.mobile'])->group(function(){
            Route::get('index', [StudentIndex::class, 'create'])->name('index');
            Route::get('profile', [StudentPrpfile::class, 'profile'])->name('proflile');
            Route::post('profile', [StudentPrpfile::class, 'updateprofile'])->name('updateprofile');
            Route::post('updatepassword', [StudentPrpfile::class, 'updatepassword'])->name('updatepassword');
            Route::get('offlineindex', [StudentIndex::class, 'offlinecreate'])->name('offlineindex');
            Route::post('save', [StudentIndex::class, 'save'])->name('save');

            
        });
        Route::get('forgotpassword', [ForgotPassword::class, 'create'])->name('forgotpassword');
        Route::post('sendforgotcode', [ForgotPassword::class, 'store'])->name('sendforgotcode');
        Route::get('forgotcode', [ForgotPassword::class, 'forgotcode'])->name('forgotcode');
        Route::get('newpassword', [ForgotPassword::class, 'verifyforgotcode'])->name('newpassword');
        Route::post('savepassword', [ForgotPassword::class, 'newpassword'])->name('savepassword');

        Route::get('printCertificate/{id}', [StudentIndex::class, 'printCertificate'])->name('printCertificate');

    require __DIR__.'/student_auth.php';
});



