<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ActiveUser
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->status==0) {
            $user = auth()->user();
            auth()->logout();
            return redirect()->route('login')->withError('Your account was blocked at ');
        }
        return $next($request);
    }
}
