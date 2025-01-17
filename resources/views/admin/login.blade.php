<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Page</title>
</head>

<body class="relative min-h-screen flex items-center justify-center bg-gray-100">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{ asset('Medicine_Background.jpg') }}" 
             alt="Background Image" 
             class="w-full h-full object-cover filter blur-md">
    </div>
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <!-- Login Card -->
    <div class="relative z-10 max-w-md w-11/12 sm:w-10/12 md:w-8/12 lg:w-6/12 xl:w-4/12 bg-white shadow-xl rounded-lg p-6 md:p-8">
        <!-- Decorative Elements -->
        <div class="absolute -top-10 -left-10 w-24 h-24 md:w-32 md:h-32 bg-purple-300 rounded-full blur-2xl opacity-50"></div>
        <div class="absolute -bottom-10 -right-10 w-24 h-24 md:w-32 md:h-32 bg-pink-300 rounded-full blur-2xl opacity-50"></div>

        <!-- Form Content -->
        <div class="relative z-20">
            <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-800 mb-4">Welcome Admin!</h2>
            <p class="text-center text-sm md:text-base text-gray-500 mb-6">Please log in to continue</p>

            <!-- Success/Error Alerts -->
            @if (Session::has('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 border border-green-300 rounded">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="mb-4 p-3 bg-red-100 text-red-800 border border-red-300 rounded">
                    {{ Session::get('error') }}
                </div>
            @endif

            <form action="{{ route('admin.authenticate') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2 mt-1 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none @error('email') border-red-500 @enderror"
                        placeholder="name@example.com">
                    @error('email')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-2 mt-1 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none @error('password') border-red-500 @enderror"
                        placeholder="Password">
                    @error('password')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full py-3 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold rounded-lg shadow-lg hover:opacity-90 transition duration-300">
                        Log In
                    </button>
                </div>

                <!-- Login As Customer Link -->
                <div class="mt-6">
                    <p class="text-center text-gray-500 mt-4">
                        <a href="{{ route('account.login') }}" class="text-blue-500 hover:underline flex items-center justify-center space-x-2">
                            <i class="fas fa-user"></i>
                            <span>Login As Customer</span>
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
