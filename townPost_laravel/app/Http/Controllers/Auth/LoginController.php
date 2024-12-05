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

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
    
        // Find the user by email
        $user = Users::where('email', $credentials['email'])->first();
    
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Store user ID in session
            $request->session()->put('user_ID', $user->id);
    
            return redirect()->intended('/showposts')->with('success', 'Logged in successfully!');
        }
    
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