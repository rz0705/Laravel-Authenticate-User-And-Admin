@extends('layouts.registration')

@section('title', 'Admin Registration')

@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Prevent the default form submission
                    document.getElementById('registerButton').click(); // Trigger the button click
                }
            });
        });
    </script>
    <h2 class="text-2xl font-semibold mb-6">Admin Registration</h2>

    {{-- @if ($errors->any())
            <div class="mb-4">
                <ul class="text-red-500">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif --}}

    <form action="{{ route('adminregister') }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="adminname" class="block text-gray-700 text-sm font-bold mb-2">Admin Name:</label>
            <input type="text" id="adminname" name="adminname" value="{{ old('adminname') }}"
                class="w-full p-2 border rounded-md">
            @error('adminname')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </div>

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

        <div class="mb-6">
            <label for="confirm_password" class="block text-gray-700 text-sm font-bold mb-2">Confirm
                Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" class="w-full p-2 border rounded-md">
            @error('confirm_password')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center">
            <button type="submit" id="registerButton" class="bg-blue-500 text-white px-4 py-2 rounded-md">Register</button>
        </div>
    </form>
@endsection

</html>
