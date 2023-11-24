@extends('layouts.login')

@section('title', 'Customer Login')

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
    </script>
    <h2 class="text-2xl font-semibold mb-6">Customer Login</h2>

    <form action="{{ route('customerlogin') }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="email"
                class="@error('email') is-invalid @enderror block text-gray-700 text-sm font-bold mb-2">Email:</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}"
                class="w-full p-2 border rounded-md">
            @error('email')
                <div class="text-red-500 text-xs">{{ $message }}</div>
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

</html>
