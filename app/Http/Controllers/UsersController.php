<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function customerregister(Request $request)
    {
        $request->validate([
            'customername' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
        ]);

        // Create a new user
        User::create([
            'username' => $request->customername,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'customer', // Default role for customer registration
        ]);

        // Redirect to a success page or wherever you want
        // return redirect('/customer/registration');
        return redirect('customer/login')->with('success', 'Customer registered successfully!');
    }

    public function adminregister(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'adminname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
        ]);

        // Create a new admin
        User::create([
            'username' => $request->adminname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin', // Default role for admin registration
        ]);

        // Redirect to a success page or wherever you want
        return redirect('admin/login')->with('success', 'Admin registered successfully!');
    }

    function customerregistration()
    {
        return view('customer.customerregistration');
    }

    function customerlogin()
    {
        return view('customer.customerlogin');
    }

    function customerlogout()
    {
        // dd('customer');
        // dd(Auth::user());
        Auth::logout();
        $user = Auth::user();
        session()->forget('user');

        // if($user->role === 'customer'){

        // }

        return redirect('/customer/login')->with('success', 'Logout successful!');
    }

    function customerlogincheck(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
            if ($user->role === 'customer') {
                // Store user information in the session
                $request->session()->put('user', $user);
                return redirect('/customer/dashboard')->with('success', 'Login successful!');
            } elseif ($user->role === 'admin') {
                Auth::logout(); // Log out admin users
                return redirect()->back()->with('warning', 'Not Allowed!');
            }
        } else {
            return redirect()->back()->with('warning', 'Invalid credentials!');
        }
    }

    function adminregistration()
    {
        return view('admin.adminregistration');
    }

    function adminlogin()
    {
        return view('admin.adminlogin');
    }

    function adminlogout()
    {
        // dd('admin');
        Auth::logout();
        session()->forget('admin');
        return redirect('/admin/login')->with('success', 'Logout successful!');
    }

    function adminlogincheck(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $email = $request->email;
        $password = $request->password;

        $user = User::where("email", $email)->first();
        // dd($user);

        if ($user && Hash::check($password, $user->password)) {
            // Check the user's role
            if ($user->role === 'admin') {
                // Store user information in the session
                $request->session()->put('admin', $user);
                return redirect('/admin/dashboard')->with('success', 'Login successfull!');
            } elseif ($user->role === 'customer') {
                // echo "<span style=\"color:red;padding-left:20px\">not allowed!</span>";
                return redirect()->back()->with('warning', 'Not Allowed!');
            }
        } else {
            return redirect()->back()->with('warning', 'Data not found!');
        }

        // If email or password doesn't match, return to the login view
        return view('admin.adminlogin');
        // return redirect()->back()->withInput();
    }

    function customerdashboard()
    {
        return view('customer.customerdashboard');
    }

    function admindashboard()
    {
        return view('admin.admindashboard');
    }
}
