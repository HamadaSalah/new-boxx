<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            if(Auth::guard('admin')->check()) {

                return redirect(RouteServiceProvider::ADMIN);
            }
            elseif (Auth::guard('web')->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
    }

        // if (Auth::guard($guard)->check()) {
        //     dd(Auth::guard($guard));
        //     return redirect(RouteServiceProvider::HOME);
        // }

        return $next($request);
    }
}
