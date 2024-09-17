<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'user') {
            // User is authenticated, continue with the request
            return $next($request);
        }

        // User is not authenticated, redirect to login or handle accordingly
        return redirect()->route('auth.login');
    }
}

