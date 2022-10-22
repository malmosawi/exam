<?php

namespace App\Http\Controllers\StudentAuth;

use App\Models\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('student.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate('student');
      
        $request->session()->regenerate();


        $Student=Student::find(Auth::guard('student')->user()->id);

        // $Student->online = 1;
        $Student->save();
        

        return redirect()->route('student.index');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $Student=Student::find(Auth::guard('student')->user()->id);
        $Student->online = 0;
        $Student->save();

        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('student.login');
    }
}
