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
        $governorate=Auth::guard('admin')->user()->governorate;
        $Student = Student::where('governorate',$governorate)
                            ->where('approve', NULL)
                            // ->where('certificate', NULL)
                            ->where('mobile_verified_at','!=' ,NULL)
                            ->get();
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
// dd($request->method());
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
        $governorate=Auth::guard('admin')->user()->governorate;
        if(($approve == 1) || ($approve == -1)){
            $Student = Student::where('governorate',$governorate)
                    ->where('approve', $approve)
                    ->where('certificate', null)
                    ->get();
            return view('admin.student', ['Student' => $Student])->with('error', 0);

        }else{
            abort(404);
        }
                            // dd($Student);
        // $governorate=Auth::guard('admin')->user()->governorate;


    }
    public function studentpass()
    {
        $governorate=Auth::guard('admin')->user()->governorate;
        $Student = Student::join('student_exam','student_exam.user_id','students.id')
                                ->join('exam','exam.id','student_exam.exam_id')
                                ->where('governorate',$governorate)
                                ->where('approve', 1)
                                ->where('certificate','!=', null)
                                ->get(['students.*','exam.title','exam.date','student_exam.degree']);
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
