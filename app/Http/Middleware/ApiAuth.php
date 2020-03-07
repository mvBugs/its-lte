<?php

namespace App\Http\Middleware;

use App\Driver;
use Closure;

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

        return response()->json([
            'data' => [
                'message' => trans('auth.failed')
            ]
        ]);
    }
}
