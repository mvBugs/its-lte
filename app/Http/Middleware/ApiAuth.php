<?php

namespace App\Http\Middleware;

use App\Driver;
use Closure;
use Illuminate\Support\Facades\Log;

class ApiAuth
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
        if ($token = $request->header('accept-token')) {
            $driver = Driver::where('api_token', $token)->first();
            if ($driver) {
                return $next($request);
            }
        }

//        Log::info($request->header('accept-token'));

        return response()->json([
            'data' => [
                'message' => trans('auth.failed'),
                'accept-token' => $request->header('accept-token')
            ]
        ]);
    }
}
