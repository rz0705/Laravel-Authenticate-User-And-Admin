<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Admin Registration</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white p-8 border rounded-md shadow-md">
            <h2 class="text-2xl font-semibold mb-6">Admin Registration</h2>

            <form action="{{ route('adminregister') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="adminname" class="block text-gray-700 text-sm font-bold mb-2">Admin Name:</label>
                    <input type="text" id="adminname" name="adminname" class="w-full p-2 border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input type="email" id="email" name="email" class="w-full p-2 border rounded-md">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                    <input type="password" id="password" name="password" class="w-full p-2 border rounded-md">
                </div>

                <div class="mb-6">
                    <label for="confirm_password" class="block text-gray-700 text-sm font-bold mb-2">Confirm
                        Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password"
                        class="w-full p-2 border rounded-md">
                </div>

                <div class="flex items-center">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
