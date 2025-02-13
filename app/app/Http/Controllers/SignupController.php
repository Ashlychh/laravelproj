<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    // Show the signup form
    public function showForm()
    {
        return view('employee.signup');  // Ensure this view exists
    }

    // Handle the form submission and store the user in the database
    

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // `confirmed` expects a password_confirmation field in the form
        ]);
    
        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Create a new user record
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // Hash the password before storing it
        ]);
    
        // Log the user in automatically
        Auth::login($user);
    
        return redirect()->route('employee.login')->with('success', 'Account created successfully! Please log in.');
    }
}