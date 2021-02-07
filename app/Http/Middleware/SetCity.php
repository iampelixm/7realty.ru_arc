<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;

class SetCity
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
        $current_city = Cookie::get('current_city');
        $current_city_title = Cookie::get('current_city_title');
        if (!$current_city or !$current_city_title) {
            $minutes = 15;
            Cookie::queue('current_city', '2', $minutes);
            Cookie::queue('current_city_title', 'Сочи', $minutes);
        }

        return $next($request);
    }
}
