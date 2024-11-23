<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureTokenIsValid
{
    /**
     * Manejar una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario está autenticado y tiene rol de administrador
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Redirigir a la página de inicio si no es administrador
        return redirect('/home');
    }
}
