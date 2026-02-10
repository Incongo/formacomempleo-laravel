<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        // Si no hay usuario autenticado → 401
        if (!$user) {
            abort(401);
        }

        // Convertimos el Enum a string si es necesario
        $role = is_object($user->role)
            ? $user->role->value
            : $user->role;

        // Si el rol del usuario no está permitido → 403
        if (!in_array($role, $roles, true)) {
            abort(403);
        }

        return $next($request);
    }
}
