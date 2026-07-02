<?php

namespace App\Http\Controllers\Panel\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Validation\ValidationException;
use Validator;

class LoginController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'panel';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }


    public function showLoginForm()
    {
        return view('panel.auth.login');
    }

    public function login(Request $request)
    {
        $validator = $this->validateLogin($request);

        if ($validator->fails()) {

            return response()->json([
                'msg'   => $validator->errors()->first()
            ] , 422);
        }

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    protected function validateLogin(Request $request)
    {
        $niceNames = [
            $this->username() => 'البريد الإلكتروني',
            'password' => 'كلمة المرور',
        ];
        $validator = \Validator::make($request->all(), [
            $this->username() => 'required|exists:admins,email',
            'password' => 'required|min:6'
        ]);
        $validator->setAttributeNames($niceNames);

        return $validator;
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if (!$this->authenticated($request, $this->guard()->user())) {
            return response()->json([
                'status'    => 200,
                'redirectUrl' => url($this->redirectTo)
            ], 200);
        } else {
            return response()->json([
                'msg' => trans('auth.failed')
            ], 422);
        }
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return response()->json([
            'msg' => trans('auth.failed')
        ], 422);
    }


    public function username()
    {
        return 'email';
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }


    protected function loggedOut(Request $request)
    {
        //
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    protected function authenticated(Request $request, $user)
    {
        //
    }

    protected function hasTooManyLoginAttempts(Request $request)
    {
        return RateLimiter::tooManyAttempts(
            $this->throttleKey($request), $this->maxAttempts()
        );
    }

    protected function incrementLoginAttempts(Request $request)
    {
        RateLimiter::hit(
            $this->throttleKey($request), $this->decayMinutes() * 60
        );
    }

    protected function clearLoginAttempts(Request $request)
    {
        RateLimiter::clear($this->throttleKey($request));
    }

    protected function fireLockoutEvent(Request $request)
    {
        event(new Lockout($request));
    }

    protected function sendLockoutResponse(Request $request)
    {
        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        return response()->json([
            'msg' => trans('auth.throttle', ['seconds' => $seconds])
        ], 423);
    }

    public function throttleKey(Request $request)
    {
        return Str::lower($request->input($this->username())).'|'.$request->ip();
    }

    protected function maxAttempts()
    {
        return 5;
    }

    protected function decayMinutes()
    {
        return 1;
    }

}
