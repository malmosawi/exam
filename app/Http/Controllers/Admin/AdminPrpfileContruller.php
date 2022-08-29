<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
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



class AdminPrpfileContruller extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function profile()
    {
        $Governorate = Governorate::all();

        $user = Auth::guard('admin')->user()->id;
        $profile = User::find($user);
        return view('admin.profile',['profile' => $profile, 'governorate'=>$Governorate])->with('error',0);
    }
    
    
    public function updateprofile(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            // 'phone' => ['required', 'string', 'digits:11'],
            // 'governorate'=> ['required'],
        ]);

        $user = Auth::guard('admin')->user()->id;

        $profile = User::find($user);
        
        $profile->name = $request->name;        
        $profile->email = $request->email;        
        // $profile->phone = $request->phone;
        // $profile->governorate = $request->governorate;    
        $profile->save();
        
        $Governorate = Governorate::all();

        return view('admin.profile',['profile' => $profile, 'governorate'=>$Governorate])->with('error',0);
    }
    public function updatepassword(Request $request)
    {

        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Auth::guard('admin')->user()->id;

        $profile = User::find($user);
        
        $profile->password = Hash::make($request->password);
        $profile->save();
        
        $Governorate = Governorate::all();

        return view('admin.profile',['profile' => $profile, 'governorate'=>$Governorate])->with('error',0);
    }

}
