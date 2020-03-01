<?php

namespace App\Http\Middleware;

use Closure;

class hasPermissin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

//        if (!auth('admin')->user()->hasPermissionTo($role)) {
////            return abort(401);
//        }
        return $next($request);
    }
}
