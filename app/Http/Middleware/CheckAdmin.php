<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            if (
                Auth::guard($guard)->user()->role != 'admin' &&
                Auth::guard($guard)->user()->role != 'broker' &&
                Auth::guard($guard)->user()->role != 'moderator'
            ) {
                abort(403, 'Нет доступа к административной панели');
            }
        }
        return $next($request);
    }
}
