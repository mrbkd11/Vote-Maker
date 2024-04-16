<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    
    public function handle(Request $request, Closure $next)
{
    // Check if user is an admin
    if (Auth::check() && Auth::user()->isAdmin()) {
        // User is an admin, allow request to proceed
        return $next($request);
    }

    // User is not an admin, return an error response
    return response()->json(['error' => 'Unauthorized'], 401);
}
}
