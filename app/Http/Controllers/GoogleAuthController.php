<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback() {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('provider_id', $googleUser->id)->first();

            if ($user) {
                Auth::login($user);

                return redirect()->intended('home');
            } else {
                $newUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'provider_id' => $googleUser->id
                ]);

                Auth::login($newUser);
                return redirect()->intended('home');
            }
        } catch (\Throwable $th) {
            dd('Error Occured: '.$th->getMessage());
        }
    }
}
