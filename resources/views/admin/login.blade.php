<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div class="relative z-10 max-w-md w-full bg-white shadow-xl rounded-lg p-8">
        <!-- Decorative Elements -->
        <div class="absolute -top-10 -left-10 w-32 h-32 bg-purple-300 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-pink-300 rounded-full blur-3xl opacity-50"></div>

        <!-- Form Content -->
        <div class="relative z-20">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-4">Welcome Admin!</h2>
            <p class="text-center text-gray-500 mb-6">Please log in to continue</p>

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
            </form>

            <!-- Footer -->
            <p class="text-center text-gray-500 mt-6">
                Don't have an account? <a href="#" class="text-blue-500 hover:underline">Sign up</a>
            </p>
        </div>
    </div>
</body>

</html>
