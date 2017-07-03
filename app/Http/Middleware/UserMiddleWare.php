<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Redirect;

class UserMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user() !== null && Auth::user()->role === 'admin')
            return $next($request);
        return Redirect::route('home');
    }
}
