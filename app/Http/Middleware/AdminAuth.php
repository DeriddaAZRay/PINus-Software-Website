<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('admin_user')) {
            return redirect()->route('login')->withErrors(['auth' => 'Please login as admin.']);
        }

        return $next($request);
    }
}

