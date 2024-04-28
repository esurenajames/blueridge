<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRoles // Renamed to CheckRoles
{
    public function handle($request, Closure $next, $role_id)
    {
        // Check if the authenticated user's role ID matches the required role ID
        if (Auth::check() && Auth::user()->role_id == $role_id) {
            return $next($request);
        }

        // If the user's role ID does not match, redirect them or return an unauthorized response
        return redirect()->route('login')->with('error', 'Unauthorized');
    }
}

