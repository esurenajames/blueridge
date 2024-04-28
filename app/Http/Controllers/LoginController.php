<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('/main');
        }

        // Authentication failed
        return redirect()->route('login')->with('error', 'Incorrect username or password. Please try again.');
    }



    public function logout(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Logout the user and invalidate the session
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect the user to the desired page after logout
        return redirect('/login');
    }

}
