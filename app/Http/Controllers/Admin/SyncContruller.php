<?php

namespace App\Http\Controllers\Admin;

use App\Models\Exam;
use App\Models\Student;
use App\Models\StudentExam;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SyncContruller extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function create()
    // {
    //     $exam=Exam::get();
    //     $governorate=Auth::guard('admin')->user()->governorate;
    //     $student = Student::where('governorate',$governorate)
    //                         ->where('approve', 1)
    //                         ->where('certificate', null)
    //                         ->where('mobile_verified_at','!=' ,null)
    //                         ->get();
    //     return view('admin.exam', ['Exam'=> $exam, 'Student' => $student] );
    // }
    public function syncup()
    {
        $student= Student::all();

        $response = [
            'student' => $student,
            'status' => 'success'
        ];


        return response()->json($response);
    }

}
