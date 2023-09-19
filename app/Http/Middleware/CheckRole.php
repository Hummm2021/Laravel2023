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
    public function handle($request, Closure $next, $profile)
    {
    if (!auth()->check() || auth()->user()->profile !== $profile) {
        return redirect()->route('home')->withErrors('Accès refusé.');
    }

    return $next($request);
    }


}
