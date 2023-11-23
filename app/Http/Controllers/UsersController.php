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

    function customerlogincheck(Request $request){
        $email = $request->email;
        // dd($email);
        $password = $request->password;
        // dd($password);

        $emailchecker = User::where("email", $email)->first();
        // dd($emailchecker->password);
        if ($emailchecker && Hash::check($password, $emailchecker->password)){
            return redirect('/customer/dashboard');
        }
        return view('customer.customerlogin');
    }

    function customerdashboard() {
        return view('customer.customerdashboard');
    }

    function adminregistration() {
        return view('admin.adminregistration');
    }

    function adminlogin() {
        return view('admin.adminlogin');
    }
}
