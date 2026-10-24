<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        // Se non è specificata alcuna guardia, usa la guardia predefinita (web)
        if (empty($guards)) {
            $guards = [null];
        }

        // Verifica l'autenticazione per ogni guardia specificata
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Se l'utente è autenticato, procedi con la richiesta
                return $next($request);
            }
        }

        // Se l'utente non è autenticato, reindirizza al login
        return redirect()->route('login')->withErrors([
            'error' => 'Devi effettuare l\'accesso per accedere a questa pagina.',
        ]);
    }
}