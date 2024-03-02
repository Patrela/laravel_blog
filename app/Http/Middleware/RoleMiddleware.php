<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $roles)
    {
        $user = Auth::user();

        // Verificar si el usuario tiene al menos uno de los roles requeridos
        $roles = explode('|', $roles);
        foreach ($roles as $role) {
            if ($user->hasRole($role)) {
                return $next($request);
            }
        }

        // Redireccionar o manejar la denegación de roles
        abort(403, 'Unauthorized action.');

        // Puedes personalizar la redirección o manejo de denegación según tus necesidades
    }
}
