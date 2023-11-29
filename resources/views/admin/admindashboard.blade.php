@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@if (Session('success'))
<div id="admin-register-message"
    class="p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">Admin LoggedIn Successfully!!</span><a onclick = "loginsuccess()" href=""
        id="dismiss" class="absolute top-0 right-0 px-3 py-1 cursor-pointer pt-2 text-xl">x</a>
</div>
@endif

@section('dashboard_title', 'Admin Dashboard')

@section('logout_button', 'Logout')

@section('content')

    <p>Welcome Admin</p>
    <!-- Additional content for the admin dashboard goes here -->
    <!-- ... -->
@endsection
