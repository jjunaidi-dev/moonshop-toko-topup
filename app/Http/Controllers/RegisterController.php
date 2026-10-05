<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:customers',
            'password'   => 'required|string|min:8',
            'terms'      => 'accepted',
        ], [
            'terms.accepted' => 'Anda harus menyetujui Syarat & Ketentuan.',
        ]);

        $customer = Customer::create([
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'email'      => $validated['email'],
            'password'   => $validated['password'],
        ]);

        // Login otomatis setelah registrasi (opsional)
        Auth::guard('customer')->login($customer);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}