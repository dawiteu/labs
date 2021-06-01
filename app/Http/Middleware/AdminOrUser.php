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
        //dd(Auth::user()->id, $request->user->id);
        if ( (Auth::user()->id == $request->user->id) || (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)) {
            return $next($request);
        } else {
            return redirect()->route('dashboard')->with('error', 'Erreur inconnue.. tu fais quoi ? wtf?');
        }
    }
}
