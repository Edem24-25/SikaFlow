<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsurePhoneIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            $request->user() &&
            !$request->user()->isAdmin() &&
            !$request->user()->telephone_verified_at &&
            !$request->routeIs('verification.*') &&
            !$request->routeIs('logout')
        ) {
            return redirect()->route('verification.notice');
        }

        return $next($request);
    }
}
