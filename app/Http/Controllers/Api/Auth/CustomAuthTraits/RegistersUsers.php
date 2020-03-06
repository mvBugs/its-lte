<?php

namespace App\Http\Controllers\Api\Auth\CustomAuthTraits;

use App\Models\City;
use GuzzleHttp\Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers as LaravelRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

trait RegistersUsers
{
    use LaravelRegistersUsers,
        VerifyTokens;

    protected $redirectToLogin = '/';

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request)
    {
        $login = $request->login;
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        if ($field == 'phone') {
            $login = clear_phone($login);
            $request->login = $login;
            $rules = 'required|phone:RU|unique:users,phone';
        } else {
            $rules = 'required|string|email|max:255|unique:users,email';
        }

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'login' => $rules,
            'username' => 'sometimes|required|string|min:2|max:20|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'politics' =>'required|accepted',
        ]);

        $request->merge([$field => $login]);

        event(new Registered($user = $this->create($request->except('login'))));


        if (!$user->actived) {
            if (!empty($user->email) && !config('common.registration.email.need_verify') || !empty($user->phone) && !config('common.registration.phone.need_verify')) {
                $user->actived = true;
                $user->save();
                $this->guard()->login($user);
            }
        }

        return $this->registered($request, $user);
    }

    /**
     * Метод после успешной регистрации.
     *
     * @param \Illuminate\Http\Request $request
     * @param $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        $this->setUserCity($request, $user);

        $msg = '';
        $verify = '';

        if ($user->email && config('common.registration.email.need_verify')) {
            $this->makeAndSendEmailToken($user);
            $msg = trans('notifications.verification.email.send.success');
            $verify = 'email';
        } elseif ($user->phone && config('common.registration.phone.need_verify')) {
            $this->makeAndSendPhoneToken($user);
            $msg = trans('notifications.verification.phone.send.success');
            $verify = 'phone';
        }

        Log::info($msg);
        session()->put('flash_info', $msg);

        return response()->json([
            'user_id' => $user->id,
            'verify_method' => $verify,
            'message' => $msg,
            'redirect' => route('home'),
        ])->setStatusCode(200);
    }

    protected function setUserCity($request, $user)
    {

        $userIp = $request->ip(); //178.219.186.12 - moskva

        $httpClient = new Client();
        $response = $httpClient->request('GET', 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/iplocate/address?ip=' . $userIp, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Token ' . config('dadata.token'),
            ]
        ]);

        $dadata = json_decode($response->getBody()->getContents(), true);

        // если дадата определила город
        if ($dadata['location'] != null) {
            $cityName = $dadata['location']['data']['city'];
            $dadataCity = City::where('dadata_city', $cityName)->first();
            $user->city_id = $dadataCity->id;
            $user->save();
        }
    }
}
