<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, $next)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        return $next($request);
    }


    // protected function redirectTo($request)
    // {
    //     error_log($request);
    //     error_log($request->expectsJson());
    //     if (! $request->expectsJson()) {
    //         return route('login');
    //     }
    // }
}
