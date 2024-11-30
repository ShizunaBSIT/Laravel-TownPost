<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Get the login credentials from the request
        $credentials = $request->only('email', 'password');

        // Find the user by email
        $user = Users::where('email', $credentials['email'])->first();

        // Check if the user exists and if the password matches
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Login the user
            Auth::login($user);

            // Redirect to the intended page or to a default landing page
            return redirect()->intended('/landing')->with('success', 'Logged in successfully!');
        }

        // If login fails, return back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged out successfully!');
    }
}