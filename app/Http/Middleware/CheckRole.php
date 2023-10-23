<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if ($role == 'patient' && auth()->user()->role != 'patient' ) {
            abort(403);
        }
        if ($role == 'doctor' && auth()->user()->role != 'doctor' ) {
            abort(403);
        }
       
        return $next($request);
    }
}
