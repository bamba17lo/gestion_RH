<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {
       
        foreach ($role as $rol) {
            if ($request->user()->profil === $rol) {
                return $next($request);
            }
        }

        abort(403,'Votre profil ne vous permet pas l\'acces sur ce page');
    }
}
