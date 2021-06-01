<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ((Auth::user()->role_id == 1 || Auth::user()->role_id == 2) ||  Auth::user() == $request->user) {
            return $next($request);
        } else {
            return redirect()->route('dashboard')->with('error', 'Erreur inconnue.. tu fais quoi ? wtf?');
        }
    }
}
