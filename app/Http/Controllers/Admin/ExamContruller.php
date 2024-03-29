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


class ExamContruller extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create()
    {
        $exam=Exam::join('users','users.id','exam.admin_id')
                    ->join('governorate','users.governorate','governorate.id');
        if (Auth::guard('admin')->user()->type != 0) {
            $admin_id=Auth::guard('admin')->user()->id;
            $exam=$exam->where('exam.admin_id',$admin_id);
        }
        $exam=$exam->orderBy('status')->get(['exam.*','exam.id as exid','governorate.governorate as examcenter']);


        $sinex=StudentExam::join('students','students.id','user_id')
        // ->where('degree','!=',null)
        ->get()->toArray();


        // $sinex=$studentinexamlist->toArray();
        $sinex = array_column($sinex, 'id');

        $governorate=Auth::guard('admin')->user()->governorate;
        $Student = Student::where('governorate',$governorate)
                            ->where('approve', 1)
                            ->where('certificate', null)
                            ->where('mobile_verified_at','!=' ,null)
                            ->whereNotIn('id', $sinex)
                            ->get();
        return view('admin.exam', ['Exam'=> $exam, 'Student' => $Student] );
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'degree' => ['required'],
            'date' => ['required', 'date'],
        ]);
        if (isset($request->status)){
            $request->status = 0;
        }else{
            $request->status = 1;
        }
        $exam = Exam::create([
            'title' => $request->title,
            'degree' => $request->degree,
            'date' => $request->date,
            'status' =>$request->status,
            'admin_id' => Auth::guard('admin')->user()->id,
        ]);

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'degree' => ['required'],
            'date' => ['required', 'date'],
        ]);
        if (isset($request->status)){
            $request->status = 0;
        }else{
            $request->status = 1;
        }
        $id = $request->id;

        $exam = Exam::find($id);
        
        $exam->title = $request->title;
        $exam->degree = $request->degree;
        $exam->date = $request->date;
        $exam->status =$request->status;
        $exam->save();
        

        return redirect()->back();
    }

    public function destroy($id)
    {
        $exam = Exam::find($id);
        $exam->delete();

        return redirect()->back();

    }


    public function studentinexam(Request $request)
    {
        // dd($request->all());
        foreach ($request->student as $row) {
            if ( isset($row['user_id'])){
                $studentexam = StudentExam::create([
                    'user_id' => $row['user_id'],
                    'exam_id' => $row['exam_id'],
                ]);
            }
        }
        return redirect()->back();
    }

    public function editstudentinexam(Request $request)
    {
        
        foreach ($request->student as $row) {
            $studentexam = StudentExam::create([
                'user_id' => $row['user_id'],
                'exam_id' => $row['exam_id'],
            ]);
        }
        return redirect()->back();
    }


    public function getstudentinexam(Request $request)
    {
        if($request->method == 1){
            $response['data']=StudentExam::join('students','students.id','user_id')
            ->where('exam_id',$request->exam_id)
            ->get();
        }else{
            $governorate=Auth::guard('admin')->user()->governorate;
            $response['data'] = Student::where('governorate',$governorate)
                                ->where('approve', 1)
                                ->where('certificate', null)
                                ->get();
    
        }

        return response()->json($response);
    }
    public function getstudentinexam2($id)
    {
        
            $studentExam=StudentExam::join('students','students.id','user_id')
            ->where('exam_id',$id)
            ->get(['student_exam.*','students.*','students.id as stid']);


            $sinex=StudentExam::join('students','students.id','user_id')
            // ->where('degree','!=',null)
            ->get()->toArray();


            // $sinex=$studentinexamlist->toArray();
            $sinex = array_column($sinex, 'id');

            $governorate=Auth::guard('admin')->user()->governorate;

            $students = Student::where('governorate',$governorate)
                                ->where('approve', 1)
                                ->where('certificate', null)
                                ->whereNotIn('id', $sinex)
                                ->get();


        return view('admin.studentinexam', ['StudentExam'=> $studentExam, 'Students'=>$students] );
    }


}
