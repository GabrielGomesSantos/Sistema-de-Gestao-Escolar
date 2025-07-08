<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->funcao === $role) {
            return $next($request);
        }

        abort(403, 'Acesso negado. Você não tem permissão para acessar esta área.');
    }
}
