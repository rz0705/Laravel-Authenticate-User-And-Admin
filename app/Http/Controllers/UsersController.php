<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function customerregister(Request $request)
    {
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

    function customerregistration() {
        return view('customer.customerregistration');
    }

    function customerlogin() {
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

    function customerlogincheck(Request $request) {
        $email = $request->email;
        $password = $request->password;
    
        $user = User::where("email", $email)->first();
    
        if ($user && Hash::check($password, $user->password)) {
            // Check the user's role
            if ($user->role === 'customer') {
                return redirect('/customer/dashboard');
            } elseif ($user->role === 'admin') {
                echo "not allowed!";
            }
            else{
                echo "data not found!";
            }
        }
        
    
        // If email or password doesn't match, return to the login view
        return view('customer.customerlogin');
    }

    function adminregistration() {
        return view('admin.adminregistration');
    }

    function adminlogin() {
        return view('admin.adminlogin');
    }

    function adminlogincheck(Request $request) {
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
        } else{
            echo "data not found!";

        }
        
    
        // If email or password doesn't match, return to the login view
        return view('admin.adminlogin');
    }

    function customerdashboard() {
        return view('customer.customerdashboard');
    }

    function admindashboard() {
        return view('admin.admindashboard');
    }
}
