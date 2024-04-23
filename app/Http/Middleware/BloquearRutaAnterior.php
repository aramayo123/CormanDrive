<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BloquearRutaAnterior
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
        // Tu lógica para bloquear la ruta anterior aquí
        if ($request->session()->has('exito')) {
            // Redirigir al usuario a una ruta segura
            return redirect()->route('index');
        }

        return $next($request);
    }
}
