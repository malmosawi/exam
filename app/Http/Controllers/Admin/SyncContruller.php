<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\StudentExam;
use App\Models\Student;
use App\Models\Governorate;
use App\Models\ExamTrack;
use App\Models\Advertisement;
use App\Models\Exam;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;



class SyncContruller extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function syncup()
    {
        $User= User::All();
        $StudentExam= StudentExam::All();
        $Student= Student::All();
        $Governorate= Governorate::withTrashed()->get();
        $ExamTrack= ExamTrack::All();
        $Advertisement= Advertisement::All();
        $Exam= Exam::All();

        $response = [
            'user' => $User,
            'studentExam' => $StudentExam,
            'student' => $Student,
            'governorate' => $Governorate,
            'examTrack' => $ExamTrack,
            'advertisement' => $Advertisement,
            'exam' => $Exam,
            'status' => 'success'
        ];
        return response()->json($response);
    }

    public function syncdown(Request $request)
    {
        if (isset($request->StudentExam['id'])){
           $St[0]=$request->StudentExam;
        }else{
           $St=$request->StudentExam;
        }
        
        foreach ($St as $row) {
            $exam=Exam::find($row['exam_id']);

            $StudentExam= StudentExam::find($row['id']);
            if( $row['degree'] ==$exam->degree ){
                $StudentExam->degree = $row['degree'];
            }else{
                $StudentExam->degree = NUll;
            }
            $StudentExam->save();

            $Student= Student::find($row['user_id']);
            $Student->certificate = $row['user_id']. now()->getTimestamp().$row['exam_id'];
            $Student->save();

            $exam->status = 3;
            $exam->save();


        }

        return response()->json( $StudentExam);

    }


    function offlinesync()
    {
        $StudentExam= StudentExam::All();

        $response = Http::post('http://exam.mimenu-iq.com/api/syncdown', [
            'StudentExam' => $StudentExam,
            'role' => 'Network Administrator',
        ]);
        return response()->json($response->json());

    }
}