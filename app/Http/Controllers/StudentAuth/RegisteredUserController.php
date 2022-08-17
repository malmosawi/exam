<?php

namespace App\Http\Controllers\StudentAuth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Governorate;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Http;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // $response = Http::get('mydomain.com/api/sync-data?ee=1', [
        //     // 'data' => Data::all(),
        //     // 'newdata' => NewData::all(),
        // ]);
        // dd($response);

        $Governorate = Governorate::all();

        return view('student.register',['governorate'=>$Governorate]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'mobile_number' => ['required', 'string', 'digits:11', 'unique:students'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'governorate'=> ['required'],
        ]);
        $c=random_int(111111, 999999);
        $code='Your IPLS verification code is '.$c;
        $user = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'password' => Hash::make($request->password),
            'governorate'=> $request->governorate,
            'mobile_verify_code' => $c,

        ]);
        $response = Http::get('http://wa.aljthoor.com:89/api/send.php?token=3802&no='. $request->mobile_number.'&text='. $code);


        // http://wa.aljthoor.com:89/api/send.php?token=3802&no=9647707300031&text=text-only

        // $response = Http::get('http://wa.aljthoor.com:89/api/send.php?token=3802&no=07811741775&text=test');
// dd($response);



        
        event(new Registered($user));

        Auth::guard('student')->login($user);

        return redirect()->route('student.index');
    }
}
