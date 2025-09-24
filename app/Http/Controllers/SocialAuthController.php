<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            // Handle errors, e.g. user denied, network issue
            return redirect()->route('login')->with('error', 'Social login failed.');
        }

        // Find or create the user
        $user = User::where('provider_id', $socialUser->getId())
            ->where('provider_name', $provider)
            ->first();

        if (!$user) {
            // Optionally, find by email if you want to merge accounts
            $user = User::updateOrCreate([
                'email' => $socialUser->getEmail(),
            ], [
                'name' => $socialUser->getName() ?: $socialUser->getNickname(),
                'provider_id' => $socialUser->getId(),
                'provider_name' => $provider,
                'avatar_url' => $socialUser->getAvatar(),
                // you may set password to null or random if your users also use email/password login
            ]);
        }

        Auth::login($user, true);

        return redirect()->intended('/');
    }
}
