@extends('layouts.dashboard')

@section('title', 'Customer Dashboard')

@section('dashboard_title', 'Customer Dashboard')

@section('logout_button', 'Logout')

@section('content')
    @if (Session::has('success'))
        <div class="bg-green-200 p-4 mb-4 rounded-md">
            {{ Session::get('success') }}
        </div>
    @endif

    <p>Welcome Customer</p>
    <!-- Additional content for the customer dashboard goes here -->
    <!-- ... -->
@endsection
