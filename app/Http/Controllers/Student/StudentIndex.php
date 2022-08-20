<?php

namespace App\Http\Controllers\Student;

use App\Models\Advertisement;
use App\Models\StudentExam;
use App\Models\Student;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentIndex extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create()
    {
        $user = Auth::guard('student')->user()->id;

        $Certificate=StudentExam::join('students','students.id','user_id')
                                ->where('user_id',$user)
                                ->orderBy('student_exam.id','desc')
                                // ->where('degree','>','19')
                                ->first();
                                // dd(var_dump($Certificate->user_id));

        $Advertisement = Advertisement::all();
        return view('student.index', ['advertisement' => $Advertisement,'certificate'=> $Certificate])->with('error', 0);

    }

    public function offlinecreate()
    {

        $user = Auth::guard('student')->user()->id;
        $StudentExam = StudentExam::find($user);
        $title=[   'Introduction',
                    'Pre-Course Test',
                    'Danger',
                    'Response',
                    'Send for Help',
                    'Airway',
                    'Breathing',
                    'Chest Compressions',
                    'Defibrillation',
                    'Shockable Rhythms',
                    'Non-shockable Rhythms',
                    'The Choking Child',
                    'Post-Course Test'];
        return view('student.offlineindex',['stage'=>$StudentExam->stage, 'title'=>$title])->with('error', 0);
    }


    public function save(Request $request)
    {
        $user=session('user');
        $StudentExam = StudentExam::find($user);


        $StudentExam->stage = 13;        
        $StudentExam->step = 5;        
        $StudentExam->save();


        return response($request->all())
                       ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                       ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }

    public function PrintCertificate($id)
    {
        $Certificate=StudentExam::join('students','students.id','user_id')
                                ->where('user_id',$id)
                                ->orderBy('student_exam.id','desc')
                                ->first();
        return view('student.printcertificate', ['certificate'=> $Certificate])->with('error', 0);
    }


}
