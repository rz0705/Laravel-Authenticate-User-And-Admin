@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('dashboard_title', 'Admin Dashboard')

@section('logout_button', 'Logout')

@section('content')
    @if (Session::has('success'))
        <div class="bg-green-200 p-4 mb-4 rounded-md">
            {{ Session::get('success') }}
        </div>
    @endif

    <p>Welcome Admin</p>
    <!-- Additional content for the admin dashboard goes here -->
    <!-- ... -->
@endsection
