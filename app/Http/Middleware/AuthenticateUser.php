<?php

// app/Http/Middleware/AuthenticateUser.php
// app/Http/Middleware/AuthenticateUser.php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthenticateUser
{
    public function handle(Request $request, Closure $next)
    {
        Log::info('AuthenticateUser middleware processing...');
        if (!Auth::check()) {
            return redirect()->route('auth/login');
        }

        return $next($request);
    }
}

