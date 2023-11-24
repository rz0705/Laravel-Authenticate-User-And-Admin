<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Customer Login</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white p-8 border rounded-md shadow-md">
            <h2 class="text-2xl font-semibold mb-6">Customer Login</h2>

            @if ($errors->any())
                <div class="text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('customerlogin') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="@error('email') is-invalid @enderror block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input type="email" id="email" name="email" class="w-full p-2 border rounded-md">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                    <input type="password" id="password" name="password" class="w-full p-2 border rounded-md">
                </div>

                <div class="flex items-center">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
