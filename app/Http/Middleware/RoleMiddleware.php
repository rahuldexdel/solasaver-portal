<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Ensure the user is logged in
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // 2. Check if the logged-in user possesses the required security clearance level
        if (!auth()->user()->hasRole($role)) {
            abort(403, 'Unauthorized action. You do not have the required dashboard clearance.');
        }

        return $next($request);
    }
}