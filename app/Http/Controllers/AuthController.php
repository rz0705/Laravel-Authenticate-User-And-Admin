<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // public function customerLogin(Request $request)
    // {
    //     // Validate the request data
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     // Attempt to authenticate the user
    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //         // Authentication passed
    //         return redirect()->intended('/dashboard'); // Redirect to the intended page after login
    //     }

    //     // Authentication failed
    //     return back()->withErrors(['email' => 'Invalid email or password']);
    // }
}
