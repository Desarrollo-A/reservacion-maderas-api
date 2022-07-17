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
    public function handle(Request $request, Closure $next, string $roleName)
    {
        if (auth()->user()->role->name !== $roleName) {
            throw new AuthorizationException();
        }

        return $next($request);
    }
}
