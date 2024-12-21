<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class RegisterRateLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $key = 'register:' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 2)) {
            return back()->with('error', 'Too many registration attempts. Please try again later.');
        }

        RateLimiter::hit($key, 60 * 60 * 24); // 24 hour window
        
        return $next($request);
    }
}
