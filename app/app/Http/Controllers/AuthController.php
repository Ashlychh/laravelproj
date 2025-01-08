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
            "name" => $request -> name,
            "password" => Hash::make($request -> password),
        ])
        Auth::login($user);

    //return to homepage/dashboard
        return redirect()-> route("home");
    }

    public function logIn(request $request){
        $user = $validation::make($request->all(),
        [
            "email"-> $request -> email,
            "password" -> required,
        ]);


        if ($validator -> fails()){
            return redirect() -> route('logIn')
            ->withErrors($validator)
            ->withInput();

        }

    }
}
