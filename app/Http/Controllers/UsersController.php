<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function customerregister(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'confirm_password' => 'required|min:6|confirmed',
        ]);

        // Create a new user
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'customer', // Default role for customer registration
        ]);

        // Redirect to a success page or wherever you want
        return redirect('/customer/registration');
    }

    public function adminregister(Request $request)
    {
        $request->validate([
            'adminname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'confirm_password' => 'required|min:6|confirmed',
        ]);

        // Create a new user
        User::create([
            'username' => $request->adminname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin', // Default role for customer registration
        ]);

        // Redirect to a success page or wherever you want
        return redirect('/admin/registration');
    }

    function customerregistration()
    {
        return view('customer.customerregistration');
    }

    function customerlogin()
    {
        return view('customer.customerlogin');
    }

    // function customerlogincheck(Request $request){
    //     $email = $request->email;
    //     $password = $request->password;

    //     $emailchecker = User::where("email", $email)->first();
    //     // dd($emailchecker->password);
    //     if ($emailchecker && Hash::check($password, $emailchecker->password)){
    //         return redirect('/customer/dashboard');
    //     }
    //     return view('customer.customerlogin');
    // }

    function customerlogincheck(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $email = $request->email;
        $password = $request->password;

        $user = User::where("email", $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            // Check the user's role
            if ($user->role === 'customer') {
                return redirect('/customer/dashboard');
            } elseif ($user->role === 'admin') {
                echo "<span style=\"color:red;\">not allowed!</span>";
            }
        } else {
            echo "<span style=\"color:red;\">data not found!</span>";
        }

        // session()->flash('error','data not found!');
        // If email or password doesn't match, return to the login view
        return view('customer.customerlogin');
        // return redirect()->back()->withInput();
    }

    function adminregistration()
    {
        return view('admin.adminregistration');
    }

    function adminlogin()
    {
        return view('admin.adminlogin');
    }

    function adminlogincheck(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $email = $request->email;
        $password = $request->password;

        $user = User::where("email", $email)->first();
        // dd($user);

        if ($user && Hash::check($password, $user->password)) {
            // Check the user's role
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($user->role === 'customer') {
                echo "not allowed!";
            }
        } else {
            echo "<span style=\"color:red;\">data not found!</span>";
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
