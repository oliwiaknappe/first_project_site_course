<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'phone_number' => $validated['phone_number'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Log them in
        Auth::login($user);

        // Redirect to home
        return redirect('/')->with('success', 'Welcome to Chirper!');
    }
}
