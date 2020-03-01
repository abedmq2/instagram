<?php

namespace App\Http\Middleware;

use Closure;

class CheckLang
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
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

        $acceptLang = ['ar', 'en'];
        $lang = in_array($lang, $acceptLang) ? $lang : 'en';
        app()->setLocale($lang);
        return $next($request);
    }
}
