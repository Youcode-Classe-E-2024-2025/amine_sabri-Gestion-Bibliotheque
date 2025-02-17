<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }


    // public function handle(Request $request, Closure $next, $role)
    // {
    //     // Vérifie si l'utilisateur est connecté et a le rôle demandé
    //     if (auth()->check() && auth()->user()->role === $role) {
    //         return $next($request);
    //     }

    //     // Si l'utilisateur n'a pas le rôle, redirige-le ailleurs (par exemple vers la page d'accueil)
    //     return redirect('/home'); // Remplace '/home' par la route vers laquelle tu veux rediriger
    // }
}


