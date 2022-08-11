<?php

namespace App\Http\Controllers\AdminAuth;

use App\Models\User;
use App\Models\StudentExam;
use App\Models\Student;
use App\Models\Governorate;
use App\Models\ExamTrack;
use App\Models\Advertisement;
use App\Models\Exam;


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
        // $response = Http::get('http://exam.mimenu-iq.com/api/syncup');
        // $jsonData = $response->json();

        // foreach ($jsonData['student'] as $row) {
        //     $student = Student::updateOrCreate(['id'=> $row['id'] ], [ 
        //         "id" =>$row['id'],
        //         "name" =>$row['name'],
        //         "email" =>$row['email'],
        //         "email_verified_at" =>$row['email_verified_at'],
        //         "mobile_number" =>$row['mobile_number'],
        //         "mobile_verified_at" =>$row['mobile_verified_at'],
        //         "mobile_attempts_left" =>$row['mobile_attempts_left'],
        //         "mobile_last_attempt_date" =>$row['mobile_last_attempt_date'],
        //         "mobile_verify_code_sent_at" =>$row['mobile_verify_code_sent_at'],
        //         "password" =>$row['password'],
        //         "governorate" =>$row['governorate'],
        //         "status" =>$row['status'],
        //         "certificate" =>$row['certificate'],
        //         "code" =>$row['code'],
        //         "online" =>$row['online'],
        //         "approve" =>$row['approve'],
        //     ]);
        // }
        // foreach ($jsonData['user'] as $row) {
        //     $user = User::updateOrCreate(['id'=> $row['id'] ], [ 
        //         "id" =>$row['id'],
        //         "name" =>$row['name'],
        //         "email" =>$row['email'],
        //         "email_verified_at" =>$row['email_verified_at'],
        //         "phone" =>$row['phone'],
        //         "password" =>$row['password'],
        //         "governorate" =>$row['governorate'],
        //     ]);
        // }
        // foreach ($jsonData['studentExam'] as $row) {
        //     $user = StudentExam::updateOrCreate(['id'=> $row['id'] ], [ 
        //         "id" =>$row['id'],
        //         "user_id" =>$row['user_id'],
        //         "exam_id" =>$row['exam_id'],
        //         "degree" =>$row['degree'],
        //         "status" =>$row['status'],
        //     ]);
        // }
        // foreach ($jsonData['governorate'] as $row) {
        //     $user = Governorate::updateOrCreate(['id'=> $row['id'] ], [ 
        //         "id" =>$row['id'],
        //         "governorate" =>$row['governorate'],
        //     ]);
        // }
        // foreach ($jsonData['advertisement'] as $row) {
        //     $user = Advertisement::updateOrCreate(['id'=> $row['id'] ], [ 
        //         "id" =>$row['id'],
        //         "title" =>$row['title'],
        //         "content" =>$row['content'],
        //         "date" =>$row['date'],
        //         "status" =>$row['status'],
        //         "admin_id" =>$row['admin_id'],

        //     ]);
        // }
        // foreach ($jsonData['exam'] as $row) {
        //     $user = Exam::updateOrCreate(['id'=> $row['id'] ], [ 
        //         "id" =>$row['id'],
        //         "title" =>$row['title'],
        //         "admin_id" =>$row['admin_id'],
        //         "date" =>$row['date'],
        //         "status" =>$row['status'],
        //     ]);
        // }
        return view('admin.login');
    }
    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate('admin');


        $request->session()->regenerate();

        return redirect()->route('admin.index');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.index');
    }

    
}
