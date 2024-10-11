<?php
// app/Http/Controllers/Auth/SocialController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocialController extends Controller
{
    // Redirect the user to the OAuth provider
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Handle the provider callback
    public function handleProviderCallback($provider)
    {
        try {
            $userSocial = Socialite::driver($provider)->stateless()->user();

            // Find or create user
            $user = User::where('email', $userSocial->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $userSocial->getName(),
                    'email' => $userSocial->getEmail(),
                    'password' => Hash::make(uniqid()), // Create random password
                ]);
            }

            // Log the user in
            Auth::login($user, true);

            return redirect()->route('home'); // Redirect to home page or another page
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors('Something went wrong with the social login.');
        }
    }
}
