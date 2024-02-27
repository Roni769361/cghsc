<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdminOrSubAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user is an admin or a sub-admin
            if (Auth::user()->type == 1 || Auth::user()->type == 2) {
                return $next($request);
            }
        }

        // Redirect or handle unauthorized access
        abort(403, 'Unauthorized');
    }
}
