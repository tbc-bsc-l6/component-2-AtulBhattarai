<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Flexon Nepal</title>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-md sticky top-0 z-50 px-10">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <!-- Logo -->
                <a href="/" class="text-xl font-bold text-gray-800 flex items-center">
                    <img src="{{ asset('Flexon_Logo.png') }}" alt="Logo" class="h-10 w-10 mr-2 rounded-full">
                    Flexon Nepal
                </a>
                <!-- Menu -->
                <div class="hidden md:flex space-x-6">
                    <a href="/" class="text-gray-600 hover:text-blue-500 font-medium">Home</a>
                    <a href="#" class="text-gray-600 hover:text-blue-500 font-medium">Features</a>
                    <a href="#" class="text-gray-600 hover:text-blue-500 font-medium">Pricing</a>
                    @if (Auth::check())
                        <a href="{{ route('account.logout') }}" class="text-gray-600 hover:text-blue-500 font-medium">Logout</a>
                    @else
                        <a href="{{ route('account.login') }}" class="text-gray-600 hover:text-blue-500 font-medium">Login</a>
                    @endif
                    <a href="{{ route('account.register') }}" class="text-gray-600 hover:text-blue-500 font-medium">Register</a>
                </div>
                <!-- Mobile Menu Button -->
                <button class="md:hidden text-gray-600 focus:outline-none" id="mobile-menu-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
            <!-- Mobile Menu -->
            <div class="hidden md:hidden" id="mobile-menu">
                <div class="flex flex-col space-y-4 mt-2">
                    <a href="/" class="text-gray-600 hover:text-blue-500 font-medium">Home</a>
                    <a href="#" class="text-gray-600 hover:text-blue-500 font-medium">Features</a>
                    <a href="#" class="text-gray-600 hover:text-blue-500 font-medium">Pricing</a>
                    @if (Auth::check())
                        <a href="{{ route('account.logout') }}" class="text-gray-600 hover:text-blue-500 font-medium">Logout</a>
                    @else
                        <a href="{{ route('account.login') }}" class="text-gray-600 hover:text-blue-500 font-medium">Login</a>
                    @endif
                    <a href="{{ route('account.register') }}" class="text-gray-600 hover:text-blue-500 font-medium">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto py-10">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <p class="text-center">©2025 Flexon Nepal. All rights reserved.</p>
    </footer>

    <!-- Script for Mobile Menu -->
    <script>
        const mobileMenuButton = document.getElementById("mobile-menu-button");
        const mobileMenu = document.getElementById("mobile-menu");
        mobileMenuButton.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });
    </script>
</body>

</html>
