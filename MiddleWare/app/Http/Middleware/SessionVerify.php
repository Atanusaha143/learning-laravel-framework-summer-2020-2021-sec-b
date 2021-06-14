<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SessionVerify
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
        $check = $request->session()->has('login'); // get session value
        if($check) // if session exists
        {
            return $next($request);
        }
        else // otherwise
        {
            return redirect('/login'); // redirect to login
        }
    }
}
