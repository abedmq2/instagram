<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

//
    function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
//            dd(auth('admin')->user()->is_blocked);
            if (auth('admin')->user()->is_blocked) {
                auth('admin')->logout();
                if ($request->ajax())
                    return response(['status' => 'fail', 'msg' => 'تم حظر الحساب']);
                return redirect()->back()->with('error','تم حظر حسابك');
            }
            if ($request->ajax())
                return response(['status' => 'success', 'msg' => __('auth.success'), 'redirectTo' => $this->redirectTo]);
            return redirect($this->redirectTo);
        } else {
            if ($request->ajax())
                return response(['status' => 'fail', 'msg' => __('auth.failed'), 'csrf' => csrf_token()]);
            return redirect()->back()->with('error', __('auth.failed'));
        }
    }
}
