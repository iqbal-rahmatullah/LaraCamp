<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.user.login');
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $userGoogle = Socialite::driver('google')->user();

        $user = [
            'name' => $userGoogle->name,
            'email' => $userGoogle->email,
            'avatar' => $userGoogle->avatar,
            'email_verified_at' => date('Y-m-d H:i:s', time())
        ];

        $data = User::updateOrCreate([
            'email' => $user['email'],
        ], $user);

        Auth::login($data, true);
        return redirect(route('dashboard'));
    }
}
