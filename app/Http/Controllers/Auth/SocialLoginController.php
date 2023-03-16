<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    // facebook
    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $this->_registerOrLogin($user, 'facebook');

        return redirect()->route('front.index');
    }

    // Google
    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLogin($user, 'google');

        return redirect()->route('front.index');
    }

    protected function _registerOrLogin($data, $provider)
    {
        $user = User::where(['provider_id' => $data->id, 'provider' => $provider])->first();

        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->provider = $provider;
            $user->save();

            UserInformation::create([
                'user_id' => $user->id,
            ]);

            $user->assignRole(1);
        }
        Auth::login($user);
    }
}
