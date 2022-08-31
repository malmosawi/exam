<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminIndexContruller;
use App\Http\Controllers\Admin\AdminPrpfileContruller;
use App\Http\Controllers\Admin\ExamContruller;
use App\Http\Controllers\Admin\AdvertisementContruller;
use App\Http\Controllers\Admin\AdminContruller;
use App\Http\Controllers\Admin\ExamCenterContruller;
use App\Http\Controllers\Admin\SyncContruller;


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

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware('isAdmin')->group(function(){
        Route::get('index', [AdminIndexContruller::class, 'create'])->name('index');
        Route::get('getstudent/{approve}', [AdminIndexContruller::class, 'getstudent'])->name('getstudent');
        Route::get('studentpass', [AdminIndexContruller::class, 'studentpass'])->name('studentpass');
        Route::get('profile', [AdminPrpfileContruller::class, 'profile'])->name('proflile');
        Route::post('profile', [AdminPrpfileContruller::class, 'updateprofile'])->name('updateprofile');
        Route::post('updatepassword', [AdminPrpfileContruller::class, 'updatepassword'])->name('updatepassword');
        Route::get('exam', [ExamContruller::class, 'create'])->name('exam');
        Route::post('exam', [ExamContruller::class, 'store']);
        Route::post('updateexam', [ExamContruller::class, 'update'])->name('updateexam');
        Route::post('studentinexam', [ExamContruller::class, 'studentinexam'])->name('studentinexam');
        Route::post('editstudentinexam', [ExamContruller::class, 'editstudentinexam'])->name('editstudentinexam');
        Route::post('getstudentinexam', [ExamContruller::class, 'getstudentinexam'])->name('getstudentinexam');
        Route::get('getstudentinexam2/{id}', [ExamContruller::class, 'getstudentinexam2'])->name('getstudentinexam');

        Route::delete('deleteexam/{id}/force_delete', [ExamContruller::class, 'destroy'])->name('deleteexam');
        // Route::resource('exam',ExamContruller::class);

        Route::get('advertisement', [AdvertisementContruller::class, 'create'])->name('advertisement');
        Route::post('advertisement', [AdvertisementContruller::class, 'store']);
        Route::post('updateadvertisement', [AdvertisementContruller::class, 'update'])->name('updateadvertisement');
        Route::delete('deleteadvertisement/{id}/force_delete', [AdvertisementContruller::class, 'destroy'])->name('deleteadvertisement');

        Route::get('examcenter', [ExamcenterContruller::class, 'create'])->name('examcenter');
        Route::post('examcenter', [ExamcenterContruller::class, 'store']);
        Route::post('updateexamcenter', [ExamcenterContruller::class, 'update'])->name('updateexamcenter');
        Route::delete('deleteexamcenter/{id}/force_delete', [ExamcenterContruller::class, 'destroy'])->name('deleteexamcenter');

        Route::post('approvedstudent', [AdminIndexContruller::class, 'approved'])->name('approvedstudent');
        Route::get('approvedstudent', [AdminIndexContruller::class, 'approved']);
        Route::get('admins', [AdminContruller::class, 'create'])->name('admins');
        Route::post('admins', [AdminContruller::class, 'store']);
        Route::post('updateadmins', [AdminContruller::class, 'update'])->name('updateadmins');
        Route::delete('deleteadmin/{id}/force_delete', [AdminContruller::class, 'destroy'])->name('deleteadmin');



        // offline

        Route::get('offlineindex', [AdminIndexContruller::class, 'offlinecreate'])->name('offlineindex');
        Route::get('examtrack', [AdminIndexContruller::class, 'examtrack'])->name('examtrack');
        Route::get('offlinesync', [SyncContruller::class, 'offlinesync'])->name('offlinesync');


    });

    require __DIR__.'/admin_auth.php';
});




