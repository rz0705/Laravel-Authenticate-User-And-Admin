<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckCustomerLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and is an user
        if (session::has("user")) {
            return $next($request);
        } else {
            // If neither user nor admin is authenticated, redirect to the customer login page
            return redirect('/customer/login')->with('error', 'Please log in as a customer.');
        }
    }
}
