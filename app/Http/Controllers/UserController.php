<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

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
        try {
            $userGoogle = Socialite::driver('google')->user();
        } catch (InvalidStateException $e) {
            $userGoogle = Socialite::driver('google')->stateless()->user();
        }

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
