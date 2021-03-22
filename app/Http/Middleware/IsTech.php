<?php

namespace App\Http\Middleware;

use Closure;

class IsTech
{

    public function handle($request, Closure $next)
    {
        if (auth()->user()->is_admin == 1 || auth()->user()->is_tech == 1) {
            return $next($request);
        }
        return back()->with('error', "You don't have tech role");
    }
}
