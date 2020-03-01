<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Authenticate
    {
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */


    public function handle($request, Closure $next, $guard = null)
    {


        if (!Auth::guard($guard)->check()) {
            if($request->is('admin/*','admin')){
                return redirect()->route('admin.login');
            }else if($guard=='api') {
                return response(['status'=>'unauthorized','msg'=>trans('api.unauthorized')],401);
            }else{
                return redirect()->guest(route('login'));
            }

        }

//
//        if(auth('admin')->user()){
////            dd(auth('admin')->user()->is_blocked);
//            if(auth('admin')->user()->is_blocked){
//                auth('admin')->logout();
//                return  redirect()->route('admin.login')->with('error','تم خظر الحساب');
//            }
//        }


        return $next($request);
    }


//    protected function redirectTo($request)
//    {
//        return route('login');
//    }
}
