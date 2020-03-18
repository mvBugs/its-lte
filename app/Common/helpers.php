<?php

if (! function_exists('auth_driver')) {

    function auth_driver()
    {
        $token = request()->header('accept-token');
        if ($token) {
            return \App\Driver::where('api_token', $token)->first();
        }
        return null;
    }
}
