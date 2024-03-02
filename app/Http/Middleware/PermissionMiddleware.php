<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    public function handle($request, Closure $next, $permissions)
    {
        $user = Auth::user();

        // Verificar si el usuario tiene al menos uno de los permisos requeridos
        $permissions = explode('|', $permissions);
        foreach ($permissions as $permission) {
            if ($user->hasPermissionTo($permission)) {
                return $next($request);
            }
        }

        // Redireccionar o manejar la denegación de permisos
        abort(403, 'Unauthorized action.');

        // Puedes personalizar la redirección o manejo de denegación según tus necesidades
    }
}
