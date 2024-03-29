<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\StudentExam;
use App\Models\Exam;
use App\Models\Governorate;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminIndexContruller extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create()
    {
        // $governorate=Auth::guard('admin')->user()->governorate;
        $Student = Student::join('governorate','students.governorate','governorate.id')
                            ->where('approve', NULL)
                            ->where('mobile_verified_at','!=' ,NULL);

    if (Auth::guard('admin')->user()->type != 0) {
        $governorate=Auth::guard('admin')->user()->governorate;
        $Student=$Student->where('students.governorate',$governorate);
    }
                
        $Student=$Student->get(['students.*','students.id as stid','governorate.governorate as examcenter']);
        $governorate=Governorate::all();              
      
        return view('admin.index', ['Student' => $Student, 'governorate'=>$governorate])->with('error', 0);
    }

    public function approved(Request $request)
    {
        $user = $request->user_id;
        $profile = Student::find($user);
        if (isset($request->approve)){
            $profile->approve = $request->approve;        
        }
        if(isset($request->governorate)){
            $profile->governorate = $request->governorate;     
        }
        $profile->save();
        if($request->method()=='GET' ){
            return response()->json($profile);
        }else{
            return redirect()->back();
        }

    }

    public function offlinecreate( )
    {
        $exam= Exam::All();
        $id=Auth::guard('admin')->user()->id;
        $Student = StudentExam::select("*","student_exam.id as seid")
                                ->join('students','students.id','user_id')
                                ->join('exam','exam.id','exam_id')
                                ->where('exam.admin_id',$id)
                                ->where('exam.status',1)
                                ->get();
                                // dd($Student);
      
        return view('admin.offlineindex', ['Student' => $Student, 'Exam'=>$exam])->with('error', 0);
    }

    public function getstudent($approve = 1)
    {
        if(($approve == 1) || ($approve == -1)){
            $Student = Student::join('governorate','students.governorate','governorate.id')
                                ->where('students.certificate', null)
                                ->where('approve', $approve);
            if (Auth::guard('admin')->user()->type != 0) {
                $governorate=Auth::guard('admin')->user()->governorate;
                $Student=$Student->where('students.governorate',$governorate);
            }
            $Student=$Student->get(['students.*','students.id as stid','governorate.governorate as examcenter']);

            return view('admin.student', ['Student' => $Student])->with('error', 0);

        }else{
            abort(404);
        }
        // $governorate=Auth::guard('admin')->user()->governorate;

        // dd('dfdsf'. $Student);

       //jklgkl 

    }
    public function studentpass()
    {
       
        $Student = Student::join('student_exam','student_exam.user_id','students.id')
                            ->join('exam','exam.id','student_exam.exam_id')
                            ->join('users','users.id','exam.admin_id')
                            ->join('governorate','users.governorate','governorate.id');
                if (Auth::guard('admin')->user()->type != 0) {
                    $governorate=Auth::guard('admin')->user()->governorate;
                    $Student=$Student->where('students.governorate',$governorate);
                }
                                // 
        $Student=$Student->where('approve', 1)
                                ->where('certificate','!=', null)
                                ->get(['students.*','students.id as stid','exam.title','exam.date','student_exam.degree','governorate.governorate as examcenter']);
        return view('admin.studentpass', ['Student' => $Student])->with('error', 0);

                            // dd($Student);
        // $governorate=Auth::guard('admin')->user()->governorate;


    }


    public function examtrack()
    {
        $id=Auth::guard('admin')->user()->id;
        $Student['data'] = StudentExam::select("*","student_exam.id as seid")
                                ->join('students','students.id','user_id')
                                ->join('exam','exam.id','exam_id')
                                ->where('exam.admin_id',$id)
                                ->where('exam.status',1)
                                ->get();
        return response()->json($Student['data']);
    }




}
