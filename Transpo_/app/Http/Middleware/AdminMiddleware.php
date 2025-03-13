<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\UserRole; // Import UserRole Enum if used

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || Auth::user()->role !== UserRole::ADMIN) {
            return abort(403, 'Unauthorized'); // Return 403 if not an admin
        }

        return $next($request);
    }
}
