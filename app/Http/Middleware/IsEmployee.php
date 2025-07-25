<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsEmployee
{
    public function handle($request, Closure $next)
    {
        // Si l'utilisateur est un employé (pas admin)
        if (Auth::check() && !Auth::user()->is_admin) {
            return $next($request);
        }

        // Sinon on le redirige (par exemple vers l'accueil admin)
        return redirect()->route('admin.dashboard')->with('error', 'Accès non autorisé.');
    }
}
