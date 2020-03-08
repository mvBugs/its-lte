<?php

namespace App\Http\Controllers\Api;

use App\Driver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * @bodyParam login int required The id of the user. Example: 9
     * @bodyParam password string The id of the room.
     *
     * @response 200 {
     *    "access_token": 'string',
     *    "balance": 123,
     * }
     *
     * @response 404 {
     *  "message": "Неверный логин/пароль"
     * }
     */
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string'
        ]);

        $login = $request->login;

        $driver = Driver::where(function ($query) use ($login) {
            $query->where('login', $login)->orWhere('phone', $login);
        })->where('password', $request->password)->first();

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
     * @response {
     *  "message": "Successfully logged out"
     * }
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
        if ($token = $request->header('accept-token')) {
            $driver = Driver::where('api_token', $token)->first();
            if ($driver) {
                return response()->json([
                    'data' => [
                        'balance' => $driver->balance
                    ]
                ]);
            }
        }

        return response()->json([
            'data' => ['message' => 'Неверный токен'],
            'error_code' => 5
        ]);
    }
}
