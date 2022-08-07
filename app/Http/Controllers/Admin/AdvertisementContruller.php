<?php

namespace App\Http\Controllers\Admin;

use App\Models\Advertisement;
use App\Models\Student;
use App\Models\StudentExam;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdvertisementContruller extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create()
    {
        $advertisement=Advertisement::get();

        // $governorate=Auth::guard('admin')->user()->governorate;
        // $Student = Student::where('governorate',$governorate)
        // ->where('certificate', null)
        // ->get();

        return view('admin.advertisement', ['Advertisement'=> $advertisement] )->with('error', 0);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'date' => ['required', 'date'],
        ]);
        if (isset($request->status)){
            $request->status = 1;
        }else{
            $request->status = 0;
        }
        $exam = Advertisement::create([
            'title' => $request->title,
            'content' =>$request->content,
            'date' => $request->date,
            'status' => $request->status,
            'admin_id' => Auth::guard('admin')->user()->id,
        ]);

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'date' => ['required', 'date'],
        ]);
        if (isset($request->status)){
            $request->status = 1;
        }else{
            $request->status = 0;
        }
        $id = $request->id;

        $exam = Advertisement::find($id);
        
        $exam->title = $request->title;
        $exam->content = $request->content;
        $exam->date = $request->date;
        $exam->status =$request->status;
        $exam->save();
        

        return redirect()->back();
    }

    public function destroy( $id)
    {
        $advertisement = Advertisement::find($id);
        $advertisement->delete();
        return redirect()->back();
    }


    public function studentinexam(Request $request)
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
        $response['data']=StudentExam::join('students','students.id','user_id')
                                    ->where('exam_id',$request->exam_id)
                                    ->get();

        return response()->json($response);
    }


}
