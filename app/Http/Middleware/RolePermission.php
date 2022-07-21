<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class RolePermission
{
    /**
     * Handle an incoming request.
     * @throws AuthorizationException
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $hasPermission = false;
        foreach($roles as $rol) {
            if (auth()->user()->role->name === $rol) {
                $hasPermission = true;
                break;
            }
        }

        return ($hasPermission) ? $next($request) : throw new AuthorizationException();
    }
}
