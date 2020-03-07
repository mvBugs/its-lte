<?php

namespace App\Http\Controllers\Api;

use App\Driver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string'
        ]);

        $driver = Driver::where('login', $request->login)->where('password', $request->password)->first();

        if (!$driver) {
            return response()->json([
                'data' => ['message' => 'Неверный логин/пароль'],
                'error_code' => 3
            ]);
        }

        $token = Str::random(80);
        $driver->api_token = $token;

        $driver->save();

        return response()->json([
            'data' => [
                'access_token' => $token,
                'balance' => $driver->balance
            ]
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        if ($token = $request->header('accept-token')) {
            $driver = Driver::where('api_token', $token)->first();
            if ($driver) {
                $driver->token = null;
                $driver->save();
            }
        }
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
