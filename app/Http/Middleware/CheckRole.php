<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Roles permitidos se pasan como argumento: role:Administrador
     * o multiples: role:Administrador,Desarrollador
     *
     * Reglas DECC:
     *  - Supervisor: solo GET (read-only)
     *  - Desarrollador: GET permitido, no puede acceder a historias_clinicas
     *  - Administrador: acceso total
     */
    public function handle(Request $request, Closure $next, string ...$roles): mixed
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['message' => 'No autenticado.'], 401);
        }

        $roleName = $user->role?->nombre;

        // Supervisor: solo puede leer
        if ($roleName === 'Supervisor' && !$request->isMethod('GET')) {
            return response()->json(['message' => 'Supervisor solo puede realizar consultas.'], 403);
        }

        // Desarrollador: sin acceso a historias clinicas
        if ($roleName === 'Desarrollador' && str_contains($request->path(), 'historias')) {
            return response()->json(['message' => 'Desarrollador no tiene acceso a historias clinicas.'], 403);
        }

        // Verificar si el rol del usuario esta en la lista permitida
        if (!empty($roles) && !in_array($roleName, $roles, true)) {
            return response()->json(['message' => 'No tiene permiso para esta accion.'], 403);
        }

        return $next($request);
    }
}
