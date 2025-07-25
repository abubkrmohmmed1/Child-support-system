<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccountantOnly
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->email === 'abdalmoaen@gmail.com') {
            return $next($request);
        }
        abort(403, 'Unauthorized');
    }
}