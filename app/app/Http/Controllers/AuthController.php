<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use illuminate\support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Show signup form
    public function showSignUpForm()
    {
        return view('signup');
    }

    // Handle signup form submission
    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        // Return to homepage/dashboard
        return redirect()->route('home');
    }

    // Handle login form submission
    public function logIn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                             ->withErrors($validator)
                             ->withInput();
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            // If successfully login, redirect to dashboard.
            return redirect()->route('home');
        }

        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials.']);
    }

    // Handle logout
    public function logOut(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
