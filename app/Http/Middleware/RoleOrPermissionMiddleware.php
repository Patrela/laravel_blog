<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleOrPermissionMiddleware
{
    public function handle($request, Closure $next, $rolesOrPermissions)
    {
        $user = Auth::user();

        // Verificar si el usuario tiene al menos uno de los roles o permisos requeridos
        $rolesOrPermissions = explode('|', $rolesOrPermissions);
        foreach ($rolesOrPermissions as $roleOrPermission) {
            if ($user->hasRole($roleOrPermission) || $user->hasPermissionTo($roleOrPermission)) {
                return $next($request);
            }
        }

        // Redireccionar o manejar la denegación de roles o permisos
        abort(403, 'Unauthorized action.');

        // Puedes personalizar la redirección o manejo de denegación según tus necesidades
    }
}
