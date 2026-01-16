<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !Auth::user() || (int)Auth::user()->is_admin !== 1) {
            return redirect()->route('login.admin');

        }

        return $next($request);
    }
}
