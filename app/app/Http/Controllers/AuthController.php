<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Hash;
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

        Auth::login($user);

        // Return to homepage/dashboard
        return redirect()->route('employee.login');
    }

    //read
    public function show(User $user)
    {
        return view("employee.attendance.show",compact("employee.attendance"));

    }

    //edit
    public function edit(User $user)
    {
        return view('employee.attendance.edit',compact('employee.attendance'));
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(),
        [ 
            'email' => 'required|string|max:255',
            'name' => 'required|email|unique:user,email',$user->id,
            'password' => 'nullabele|min6|confirmed',
            
        ]);
        
        if ($validator->fails()) {
            return redirect()->route('login')
             ->withErrors($validator)
             ->withInput();
                    }
            
        $user -> update([
            'email'=> $request-> email,
            'name'=> $request->name,
            'password' => Hash::make($request->password),
        ]);
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('employee.attendance.index');
    }
}



//     public function 
//     // Handle login form submission
//     public function logIn(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'email' => 'required|email',
//             'password' => 'required',
//         ]);

//         if ($validator->fails()) {
//             return redirect()->route('login')
//                              ->withErrors($validator)
//                              ->withInput();
//         }

//         if (Auth::attempt($request->only('email', 'password'))) {
//             // If successfully login, redirect to dashboard.
//             return redirect()->route('home');
//         }

//         return redirect()->route('login')->withErrors(['email' => 'Invalid credentials.']);
//     }

//     // Handle logout
//     public function logOut(Request $request)
//     {
//         Auth::logout();
//         return redirect()->route('login');
//     }
// }
