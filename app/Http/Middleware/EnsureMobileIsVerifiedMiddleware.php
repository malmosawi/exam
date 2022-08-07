<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Interfaces\MustVerifyMobile;
use Illuminate\Support\Facades\Redirect;

class EnsureMobileIsVerifiedMiddleware
{
    public function handle(Request $request, Closure $next, $redirectToRoute = null)
    {
        if (! $request->user('student') ||
            ($request->user('student') instanceof MustVerifyMobile &&
            ! $request->user('student')->hasVerifiedMobile())) {
            return $request->expectsJson()
                    ? abort(403, 'Your mobile number is not verified.')
                    : Redirect::guest(URL::route($redirectToRoute ?: 'student.verification-mobile.notice'));
        }

        return $next($request);
    }
}
