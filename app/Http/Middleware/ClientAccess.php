<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClientAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado e autorizado a acessar métodos específicos
        if(auth()->check() AND auth()->user()->client){
            return $next($request);
        }

        dd('Acesso negado, not client');
    }
}
