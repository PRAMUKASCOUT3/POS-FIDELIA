<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmin
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
        if (Auth::user() &&  Auth::user()->isAdmin == 1) {
            return $next($request);
       }elseif(Auth::user() &&  Auth::user()->isAdmin == 2) {
           return $next($request);
       } 


       return redirect()->route('dashboard');
    }
}