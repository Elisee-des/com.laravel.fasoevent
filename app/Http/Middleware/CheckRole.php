<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Vérifie si l'utilisateur a le rôle nécessaire
        if ($request->user() && $request->user()->role === $role) {
            return $next($request);
        }

        // Redirige l'utilisateur s'il n'a pas le rôle nécessaire
        return redirect('/')->with('error', 'Accès non autorisé.');
    }
}
