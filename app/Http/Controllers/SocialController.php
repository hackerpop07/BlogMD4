<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        $userSocial = Socialite::driver($provider)->stateless()->user();
        $users = User::where(['email' => $userSocial->getEmail()])->first();
        if ($users) {
            Auth::login($users);
            return redirect('/');
        } else {
            $users = $this->createUser($userSocial, $provider);
            return redirect()->route('page.index');
        }
    }

    public function createUser($userSocial, $provider)
    {
        return User::create([
            'name' => $userSocial->getName(),
            'email' => $userSocial->getEmail(),
            'image' => $userSocial->getAvatar(),
            'password' => bcrypt('123'),
            'provider_id' => $userSocial->getId(),
            'provider' => $provider,
        ]);
    }
}
