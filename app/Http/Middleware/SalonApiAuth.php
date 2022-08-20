<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SalonApiAuth
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
        if (
            rand(0, 100) <= 20 ||
            !password_verify($request->getUser(), Hash::make(env('SALON_API_LOGIN'))) ||
            !password_verify($request->getPassword(), Hash::make(env('SALON_API_PASSWORD')))
        ) {
            return response()->json(['success' => false], 401);
        }

        return $next($request);
    }
}
