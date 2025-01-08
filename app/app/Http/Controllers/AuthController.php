<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //show signup from 
    public function showSignUpForm()
    {
      return view (".signup");
    }


    //handle signup form submission 
    public function signUp(request $request)
    {
        $user = User::create([
            "email" => $request -> email,
            ""
        ])
    }
}
