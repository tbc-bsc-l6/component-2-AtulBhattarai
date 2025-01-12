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
    <footer class="bg-indigo-800 text-white py-10 px-4">
        <div class="flex flex-wrap justify-between gap-8">
            <!-- About Section -->
            <div class="flex-1 mb-6">
                <h3 class="text-xl font-cursive mb-4">About MedicaCare</h3>
                <p class="text-sm leading-relaxed text-indigo-200 mb-4">
                    MedicaCare offers a comprehensive range of high-quality medical products and services, designed to improve health and well-being. We are committed to providing trusted, effective solutions for every stage of life, with a focus on quality, safety, and customer care.
                </p>
            </div>
    
            <!-- Product Categories Section -->
            <div class="flex-1 mb-6">
                <h3 class="text-xl font-cursive mb-4">Shop Medical Products</h3>
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
                <h3 class="text-xl font-cursive mb-4">Shop With Confidence</h3>
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
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
