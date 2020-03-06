<?php

namespace App\Http\Controllers\Api\Auth\CustomAuthTraits;

use Illuminate\Foundation\Auth\AuthenticatesUsers as LaravelAuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

trait AuthenticatesUsers
{
    use LaravelAuthenticatesUsers;

    public function login(Request $request)
    {
        $this->validateLogin($request);
        $login = $request->login;
        /*$field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'login' : 'phone';

        if ($field == 'phone') {
            $login = clear_phone($login);
        }*/

//        unset($request->login);
//        $request->merge([$field => $login]);
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'login' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function username()
    {
        return 'login';
    }

    protected function authenticated(Request $request, $user)
    {
        if (!$user->actived) {
            if (!empty($user->verified_token) && !empty($user->email) && config('common.registration.email.need_verify')) {
                $userId = $user->id;
                Auth::logout();
                return array('message' => trans('notifications.verification.email.check.verify'), 'sign_in' => false, 'user_id' => $userId, 'verify_method' => 'email');
            } elseif (!empty($user->verified_token) && !empty($user->phone) && config('common.registration.phone.need_verify')) {
                $userId = $user->id;
                Auth::logout();
                return array('message' => trans('notifications.verification.phone.check.verify'), 'sign_in' => false, 'user_id' => $userId, 'verify_method' => 'phone');
            }
        }

        $user->update([
            'last_activity_at' => \Carbon\Carbon::now(),
            'last_login_ip' => $request->getClientIp()
        ]);

        return array('sign_in' => true);
    }

    protected function credentials(Request $request)
    {
        $login = $request->email ?? $request->phone ?? $request->login;
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        return $request->only($field, 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return response()->json([
            'data' => $this->authenticated($request, $this->guard()->user()),
        ])->setStatusCode(200);
    }


    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        return response()->json([
            'message' => trans('auth.logout'),
            'redirect' => route('home'),
        ])->setStatusCode(200);
    }
}
