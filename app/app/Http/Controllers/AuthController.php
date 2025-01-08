<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    // Show signup form
    public function create()
    {
        return view('employee.signup');
    }

    // Handle signup form submission
    public function store(Request $request)
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

        // Log in the user after registration
        auth()->login($user);

        // Redirect to the login page after successful signup
        return redirect()->route('employee.login');
    }

    // Read - Display a user's attendance (or other user details)
    public function show(User $user)
    {
        return view("employee.attendance.show", compact("user"));
    }

    // Edit - Show the edit form for a user's attendance or other details
    public function edit(User $user)
    {
        return view('employee.attendance.edit', compact('user'));
    }

    // Update user details
    public function update(Request $request, User $user)
    {
        $request->validate([ 
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed', // Password is optional when updating
        ]);

        // Update user details
        $user->update([
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password ? Hash::make($request->password) : $user->password, // Hash password if provided
        ]);

        // Redirect to the user's details page after update
        return redirect()->route('employee.attendance.show', $user->id);
    }

    // Delete a user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('employee.attendance.index');
    }

    // Handle login form submission
    public function logIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirect to dashboard if successful
            return redirect()->route('home');
        }

        // Redirect back with error message if credentials are invalid
        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials.']);
    }

    // Handle logout
    public function logOut(Request $request)
    {
        Auth::logout(); // Log out the current user
        return redirect()->route('login'); // Redirect to login page
    }
}
