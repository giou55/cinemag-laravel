<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class IsUserActivated
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
        // if(Auth::user()->is_activated == true){
        //     return $next($request);
        // }
        // return redirect('/');

        if (!$request->user()->is_activated) {
            return redirect('/'); // You can add a route of your choice
        }

        return $next($request);
    }
}
