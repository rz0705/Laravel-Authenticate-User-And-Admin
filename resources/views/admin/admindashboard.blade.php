@extends('layouts.dashboard')
@extends('layouts.adminnavbar')

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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Prevent the default form submission
                document.getElementById('loginButton').click(); // Trigger the button click
            }
        });
    });

    function loginsuccess() {
        // Get the reference to the div
        var divToRemove = document.getElementById("admin-register-message");

        // Check if the div exists before trying to remove it
        if (divToRemove) {
            // Remove the div
            divToRemove.remove();
        }
    }
</script>

@php
    $admin = session('admin');
@endphp

<h1>Welcome, {{ $admin->username }}</h1>
<!-- Additional content for the customer dashboard goes here -->
<!-- ... -->
@endsection