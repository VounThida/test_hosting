<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('Auth.login'); // This corresponds to login.blade.php
    }

    // Handle login
    public function login(Request $request)
    {
        // Validate login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // If successful, redirect to the home page
            return redirect()->route('categories.index')->with('success', 'You are now logged in!');
        }

        // If authentication fails, redirect back with error message
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
