<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next)
    {
        // If the user is authenticated and tries to access the login route, redirect them to the main route
        if (Auth::check() && $request->routeIs('login')) {
            return redirect()->route('main');
        }

        if (Auth::check() && $request->routeIs('create-account')) {
            return redirect()->route('main');
        }

        if (Auth::check() && $request->routeIs('forgot')) {
            return redirect()->route('main');
        }

        if (Auth::check() && $request->routeIs('verification')) {
            return redirect()->route('main');
        }

        if (Auth::check() && $request->routeIs('reset')) {
            return redirect()->route('main');
        }

        return $next($request);
    }
}
