<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebMaster
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
        if ((Auth::user()->role_id == 1 || Auth::user()->role_id == 2)) {
            return $next($request);
        } else {
            return redirect()->route('dashboard')->with('error', 'Erreur inconnue.. tu fais quoi ? wtf?');
        }
    }
}
