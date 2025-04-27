<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GuestOnlyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role !== 'guest') {
            abort(403, 'Unauthorized.');
        }
        return $next($request);
    }
}