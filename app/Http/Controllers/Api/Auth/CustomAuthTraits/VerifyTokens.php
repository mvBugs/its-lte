<?php
namespace App\Http\Controllers\Api\Auth\CustomAuthTraits;

use App\Models\User;
use App\Mail\HtmlMail;

trait VerifyTokens
{
    public function makeAndSendPhoneToken($user, $newPhone = '')
    {
        $user = $this->randomToken($user, $newPhone);

        if (app()->environment() !== 'production') {
            \Log::info("Auth SMS code: ". $user->verified_token);
        } else {
            $user->notify(new \App\Notifications\PhoneVerify($user->verified_token));
        }
        session()->put('token_sent_date', time());
    }

    public function makeAndSendEmailToken($user, $newEmail = '')
    {
        $user = $this->randomToken($user, $newEmail);

        if (app()->environment() !== 'production') {
            \Log::info("Auth EMAIL code: ". $user->verified_token);
        } else {
            \Mail::to($user)->send(new HtmlMail("Введите код подтверждения, чтобы подтвердить Ваш Email : $user->verified_token"));
        }

    }

    public function randomToken($user, $newPhone = '', $newEmail = '')
    {
        $token = rand(1000, 9999);

        $userHasRandomToken = User::where('verified_token', $token)->first();
        if ($userHasRandomToken) {
            $userHasRandomToken->verified_token = null;
            $userHasRandomToken->save();
        }

        $user->verified_token = $token;
        $user->phone = $newPhone ?: $user->phone;
        $user->email = $newEmail ?: $user->email;
        $user->save();

        return $user;
    }
}