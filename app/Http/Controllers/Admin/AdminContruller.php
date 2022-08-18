<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Student;
use App\Models\StudentExam;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;



class AdminContruller extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create()
    {
       
        $Governorate = Governorate::all();

        $Admins = User::join('governorate','governorate.id','users.governorate')
                        ->get(['users.*','governorate.governorate as governoratename','governorate.id as governorateid']);

        return view('admin.admins', ['Admins' => $Admins, 'governorate'=>$Governorate] )->with('error', 0);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_number' => ['required', 'string', 'digits:11', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'governorate'=> ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'password' => Hash::make($request->password),
            'governorate'=> $request->governorate,
            'type'=> 1,
        ]);

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'mobile_number' => ['required', 'string', 'digits:11'],
            'governorate'=> ['required'],
        ]);
        $id = $request->id;
        $user = User::find($id);
        if(!($user->email == $request->email)){
            $request->validate(['email' => ['unique:users'],]);
        }
        if(!($user->mobile_number == $request->mobile_number)){
            $request->validate(['mobile_number' => ['unique:users'],]);
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile_number =$request->mobile_number;
        $user->governorate =$request->governorate;
        $user->save();
        

        return redirect()->back();
    }

    public function destroy(User $exam)
    {
        $exam->delete();
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


}
