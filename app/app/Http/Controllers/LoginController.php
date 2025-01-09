<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class LoginController extends Controller
    {
        // Show login form
        public function showLoginForm()
        {
            return view('employee.login'); // Ensure this view exists in resources/views/employee/login.blade.php
        }

        // Handle login logic
        public function login(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            // Attempt to log the user in
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                // Authentication was successful, redirect to the intended page or dashboard
                return redirect()->intended(route('employee.attendance.add'));
            } else {
                // Authentication failed
                return back()->withErrors([
                    'email' => 'These credentials do not match our records.',
                ]);
            }
        }
    }
