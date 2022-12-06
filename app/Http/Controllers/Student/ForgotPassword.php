<?php

namespace App\Http\Controllers\Student;


use App\Models\Student;
use App\Models\Governorate;


use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Http;



class ForgotPassword extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    

    public function create(){
        return view('student.forgotpassword')->with('error',0);

    }
    public function store(Request $request){
        $request->validate([
            'mobile_number' => ['required', 'string', 'digits:11','exists:students'],
        ]);

        // dd($user);
        $c=random_int(111111, 999999);
        $code='Your IPLS verification code is '.$c;

        $user = Student::where('mobile_number', $request->mobile_number)
                        ->update(['mobile_verify_code'=>$c]);

        
        $response = Http::get('http://wa.aljthoor.com:89/api/send.php?token=3802&no='. $request->mobile_number.'&text='. $code);
        $request->session()->put('mobile_number', $request->mobile_number);
        return redirect()->route('student.forgotcode');

    }


    public function forgotcode(){
        return view('student.forgotcode')->with('error',0);

    }
    public function verifyforgotcode(Request $request){
        $request->validate([
            'mobile_verify_code' => ['required','exists:students'],
        ]);


        return view('student.newpassword')->with('error',0);

    }

    public function profile()
    {
        $Governorate = Governorate::all();

        $user = Auth::guard('student')->user()->id;
        $profile = Student::find($user);
        return view('student.profile',['profile' => $profile, 'governorate'=>$Governorate])->with('error',0);
    }
    
    
    public function updateprofile(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'governorate'=> ['required'],
        ]);

        $user = Auth::guard('student')->user()->id;

        $profile = Student::find($user);
        
        $profile->name = $request->name;        
        $profile->governorate = $request->governorate;    
        $profile->save();
        
        $Governorate = Governorate::all();

        return view('student.profile',['profile' => $profile, 'governorate'=>$Governorate])->with('error',0);
    }
    public function newpassword(Request $request)
    {
                // dd($request->session()->get('mobile_number'));

        $request->validate([
            'password' => ['required', Rules\Password::defaults()],
        ]);
        $user = Student::where('mobile_number', $request->session()->get('mobile_number'))
                    ->update(['password'=>Hash::make($request->password),'mobile_verify_code'=>NULL ]);

        return redirect()->route('student.login');
    }

}
