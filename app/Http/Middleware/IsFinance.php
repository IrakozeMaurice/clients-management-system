<?php

namespace App\Http\Middleware;

use Closure;

class IsFinance
{

    public function handle($request, Closure $next)
    {
        if (auth()->user()->is_admin == 1 || auth()->user()->is_finance == 1) {
            return $next($request);
        }
        return back()->with('error', "You don't have finance role");
    }
}
