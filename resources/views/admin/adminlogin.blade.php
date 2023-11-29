@extends('layouts.login')

@section('title', 'Admin Login')

@if (Session('success'))
    <div id="admin-register-message"
        class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <span class="font-medium">{{ session('success') }}</span><a onclick = "adminregister()" href=""
            id="dismiss" class="absolute top-0 right-0 px-3 py-1 cursor-pointer pt-2 text-xl">x</a>
    </div>
@endif

@if (Session('warning'))
    <div id="admin-register-message"
        class="p-4 mb-4 text-sm text-white rounded-lg bg-red-600 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">{{ session('warning') }}</span><a onclick = "adminregister()" href=""
            id="dismiss" class="absolute top-0 right-0 px-3 py-1 cursor-pointer pt-2 text-xl">x</a>
    </div>
@endif

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

        function adminregister() {
            // Get the reference to the div
            var divToRemove = document.getElementById("admin-register-message");

            // Check if the div exists before trying to remove it
            if (divToRemove) {
                // Remove the div
                divToRemove.remove();
            }
        }
    </script>
    <h2 class="text-2xl font-semibold mb-6">Admin Login</h2>

    {{-- @if ($errors->any())
                <div class="text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

    <form action="{{ route('adminlogin') }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}"
                class="w-full p-2 border rounded-md">
            @error('email')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
            <input type="password" id="password" name="password" class="w-full p-2 border rounded-md">
            @error('password')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center">
            <button type="submit" id="loginButton" class="bg-blue-500 text-white px-4 py-2 rounded-md">Login</button>
        </div>
    </form>
@endsection
