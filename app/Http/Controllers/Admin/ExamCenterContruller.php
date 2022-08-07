<?php

namespace App\Http\Controllers\Admin;

use App\Models\Governorate;
use App\Models\Student;
use App\Models\StudentExam;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ExamCenterContruller extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create()
    {
        $governorate=Governorate::get();

        return view('admin.examcenter', ['Governorate'=> $governorate] )->with('error', 0);
    }

    public function store(Request $request)
    {
        // dd("sdfadsf");
        $request->validate([
            'governorate' => ['required', 'string', 'max:255'],
        ]);
        $examcenter = Governorate::create([
            'governorate' => $request->governorate,
        ]);

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'governorate' => ['required', 'string', 'max:255'],
        ]);
        $id = $request->id;

        $exam = Governorate::find($id);
        
        $exam->governorate = $request->governorate;
        $exam->save();
        

        return redirect()->back();
    }

    public function destroy($id)
    {
        $governorate=Governorate::find($id);
        $governorate->delete();
        return redirect()->back();

    }


    // public function studentinexam(Request $request)
    // {
    //     foreach ($request->student as $row) {
    //         $studentexam = StudentExam::create([
    //             'user_id' => $row['user_id'],
    //             'exam_id' => $row['exam_id'],
    //         ]);
    //     }
    //     return redirect()->back();
    // }


    // public function getstudentinexam(Request $request)
    // {
    //     $response['data']=StudentExam::join('students','students.id','user_id')
    //                                 ->where('exam_id',$request->exam_id)
    //                                 ->get();

    //     return response()->json($response);
    // }


}
