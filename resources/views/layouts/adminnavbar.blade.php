<!-- Navigation bar -->
<nav class="bg-gray-800 p-4 text-white">
    <div class="flex justify-between items-center">
        <span class="text-lg font-bold">@yield('dashboard_title')</span>
        <!-- Logout button -->
        <a href="{{ route('adminlogout') }}">
            <button class="hover:text-red-500">Logout</button>
        </a>
    </div>
</nav>
