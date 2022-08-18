<?php

namespace App\Http\Controllers\StudentAuth;
use App\Models\Student;


use Carbon\Carbon;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Twilio\Exceptions\TwilioException;
use App\Providers\RouteServiceProvider;
use Twilio\Exceptions\ConfigurationException;
use Illuminate\Support\Facades\Http;


class VerifyMobileController extends Controller
{
    public function __invoke(Request $request)
    {
        //Redirect user to dashboard if mobile already verified
        if ($request->user('student')->hasVerifiedMobile()) return redirect()->route('student.index');

        $request->validate([
            'code' => ['required', 'numeric'],
        ]);

        // Code correct
        if ($request->code === auth('student')->user()->mobile_verify_code) {
            // check if code is still valide
            $secondsOfValidation = (int) config('mobile.seconds_of_validation');
            if ($secondsOfValidation > 0 &&  $request->user('student')->mobile_verify_code_sent_at->diffInSeconds() > $secondsOfValidation) {       
                $request->user('student')->sendMobileVerificationNotification(true);
                return back()->withErrors(['error' => __('mobile.expired')]);
            }else {
                $request->user('student')->markMobileAsVerified();
                return redirect()->route('student.index')->with(['message' => __('mobile.verified')]);
            }
        }

        // Max attempts feature
        if (config('mobile.max_attempts') > 0) {
            if ($request->user('student')->mobile_attempts_left <= 1) {
                if($request->user('student')->mobile_attempts_left == 1) $request->user('student')->decrement('mobile_attempts_left');

                //check how many seconds left to get unbanned after no more attempts left
                $seconds_left = (int) config('mobile.attempts_ban_seconds') - $request->user('student')->mobile_last_attempt_date->diffInSeconds();
                if ($seconds_left > 0) {
                    return back()->withErrors(['error' => __('mobile.error_wait', ['seconds' => $seconds_left])]);
                }

                //Send new code and set new attempts when user is no longer banned
                $request->user('student')->sendMobileVerificationNotification(true);
                return back()->withErrors(['error' => __('mobile.new_code')]);
            }

            $request->user('student')->decrement('mobile_attempts_left');
            $request->user('student')->update(['mobile_last_attempt_date' => now()]);
            return back('student')->withErrors(['error' => __('mobile.error_with_attempts', ['attempts' => $request->user('student')->mobile_attempts_left])]);
        }

        return back()->withErrors(['error' => __('mobile.error_code')]);

    }


    public function resendcreate()
    {
        return view('student.resend-mobile')->with('error', 0);
    }

    public function resend(Request $request )
    {
        $request->validate([
            'mobile_number' => ['required', 'numeric', 'digits:11'],
        ]);

        $user = Student::find(auth('student')->user()->id);
        if(!($user->mobile_number == $request->mobile_number)){
            $request->validate([
                'mobile_number' => ['unique:students'],
            ]);
        }
        $c=random_int(111111, 999999);
        $code='Your IPLS verification code is '.$c;

        $response = Http::get('http://wa.aljthoor.com:89/api/send.php?token=3802&no='. $request->mobile_number.'&text='. $code);
        
        $user->mobile_number =$request->mobile_number;
        $user->mobile_verify_code =$c;
        $user->save();


    }
}
