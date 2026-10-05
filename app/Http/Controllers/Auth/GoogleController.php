<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $rawUser = $googleUser->getRaw();

            $firstName = $rawUser['given_name'] ?? $googleUser->getName();
            $lastName = $rawUser['family_name'] ?? '';

            $customer = Customer::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'first_name' => $firstName,
                    'last_name'  => $lastName,
                    'password'   => Hash::make(Str::random(24)),
                ]
            );

            // Login menggunakan guard customer
            Auth::guard('customer')->login($customer);

            return redirect()->intended('/dashboard');

        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Gagal login menggunakan Google.');
        }
    }
}