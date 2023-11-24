<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Include the Tailwind CSS stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">

    <!-- Navigation bar -->
    <nav class="bg-gray-800 p-4 text-white">
        <div class="flex justify-between items-center">
            <span class="text-lg font-bold">@yield('dashboard_title')</span>

            <!-- Logout button -->
            <button class="hover:text-red-500">@yield('logout_button')</button>
        </div>
    </nav>

    <div class="container mx-auto p-4">
        <!-- Content goes here -->
        @yield('content')
    </div>

</body>

</html>
