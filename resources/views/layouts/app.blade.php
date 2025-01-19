<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Flexon Nepal</title>
</head>

<body class="bg-gray-50">

    <!-- Navbar -->
    <nav class="bg-white shadow-md sticky top-0 z-50 px-6 py-4">
        <div class="container mx-auto flex items-center justify-between">
            <!-- Logo -->
            <a href="/" class="text-2xl font-semibold text-gray-800 flex items-center space-x-2 hover:text-indigo-600 transition duration-300">
                <img src="{{ asset('2.png') }}" alt="Logo" class="h-10 rounded-full">
                <span>Flexon Nepal</span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-gray-800 text-lg hover:text-indigo-600 transition duration-300">Home</a>
                <a href="/allMedicines" class="text-gray-800 text-lg hover:text-indigo-600 transition duration-300">Medicines</a>
                @if (Auth::check())
                    <a href="{{ route('cartproducts') }}" class="text-gray-800 text-lg hover:text-indigo-600 transition duration-300">View Cart</a>
                    <a href="{{ route('order.view') }}" class="text-gray-800 text-lg hover:text-indigo-600 transition duration-300">View Order</a>
                    <a href="{{ route('userprofile.edit') }}" class="text-gray-800 text-lg hover:text-indigo-600 transition duration-300">Change Password</a>
                    <a href="{{ route('account.logout') }}" class="text-gray-800 text-lg hover:text-indigo-600 transition duration-300">Logout</a>
                @else
                    <a href="{{ route('account.login') }}" class="text-gray-800 text-lg hover:text-indigo-600 transition duration-300">Login</a>
                    <a href="{{ route('account.register') }}" class="text-gray-800 text-lg hover:text-indigo-600 transition duration-300">Register</a>
                @endif
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden text-gray-800 focus:outline-none" id="mobile-menu-button">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="flex flex-col space-y-6 mt-4 px-4">
                <a href="/" class="text-gray-800 text-lg hover:text-indigo-600 transition duration-300">Home</a>
                <a href="/allMedicines" class="text-gray-800 text-lg hover:text-indigo-600 transition duration-300">Medicines</a>
                @if (Auth::check())
                    <a href="{{ route('cartproducts') }}" class="text-gray-800 text-lg hover:text-indigo-600 transition duration-300">View Cart</a>
                    <a href="{{ route('order.view') }}" class="text-gray-800 text-lg hover:text-indigo-600 transition duration-300">View Order</a>
                    <a href="{{ route('userprofile.edit') }}" class="text-gray-800 text-lg hover:text-indigo-600 transition duration-300">Change Password</a>
                    <a href="{{ route('account.logout') }}" class="text-gray-800 text-lg hover:text-indigo-600 transition duration-300">Logout</a>
                @else
                    <a href="{{ route('account.login') }}" class="text-gray-800 text-lg hover:text-indigo-600 transition duration-300">Login</a>
                    <a href="{{ route('account.register') }}" class="text-gray-800 text-lg hover:text-indigo-600 transition duration-300">Register</a>
                @endif
            </div>
        </div>
    </nav>

    @if (Session::has('success'))
        <div class="alert alert-success" id="successMessage">{{ Session::get('success') }}</div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger" id="errorMessage">{{ Session::get('error') }}</div>
    @endif

    <!-- Main Content -->
    <div class="container mx-auto py-10">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-10 px-4">
        <div class="flex flex-wrap justify-between gap-8">
            <!-- About Section -->
            <div class="flex-1 mb-6">
                <h3 class="text-xl font-semibold mb-4">About MedicaCare</h3>
                <p class="text-sm leading-relaxed text-gray-400 mb-4">
                    MedicaCare offers a comprehensive range of high-quality medical products and services, designed to improve health and well-being.
                </p>
            </div>

            <!-- Product Categories Section -->
            <div class="flex-1 mb-6">
                <h3 class="text-xl font-semibold mb-4">Shop Medical Products</h3>
                <ul class="list-none p-0">
                    <li><a href="#" class="text-sm text-white hover:text-pink-500 transition">Health Supplements</a></li>
                    <li><a href="#" class="text-sm text-white hover:text-pink-500 transition">Wellness Products</a></li>
                    <li><a href="#" class="text-sm text-white hover:text-pink-500 transition">Medical Equipment</a></li>
                    <li><a href="#" class="text-sm text-white hover:text-pink-500 transition">Personal Care</a></li>
                    <li><a href="#" class="text-sm text-white hover:text-pink-500 transition">Prescription Medications</a></li>
                </ul>
                <div class="flex gap-4 mt-4">
                    <a href="https://www.instagram.com/" class="text-white text-2xl hover:text-pink-500 transition"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/" class="text-white text-2xl hover:text-pink-500 transition"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://github.com/" class="text-white text-2xl hover:text-pink-500 transition"><i class="fab fa-github"></i></a>
                </div>
            </div>

            <!-- Customer Service Section -->
            <div class="flex-1 mb-6">
                <h3 class="text-xl font-semibold mb-4">Shop With Confidence</h3>
                <ul class="list-none p-0">
                    <li><a href="#" class="text-sm text-white hover:text-pink-500 transition">Shipping Information</a></li>
                    <li><a href="#" class="text-sm text-white hover:text-pink-500 transition">Return Policy</a></li>
                    <li><a href="#" class="text-sm text-white hover:text-pink-500 transition">Product Disclaimer</a></li>
                    <li><a href="#" class="text-sm text-white hover:text-pink-500 transition">Terms & Conditions</a></li>
                    <li><a href="#" class="text-sm text-white hover:text-pink-500 transition">Privacy & Cookie Policies</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script>
        setTimeout(function() {
            const successMessage = document.getElementById('successMessage');
            const errorMessage = document.getElementById('errorMessage');
    
            if (successMessage) {
                successMessage.style.display = 'none';
            }
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 5000);
    </script>

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
