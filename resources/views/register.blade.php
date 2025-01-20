<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register Page</title>
</head>

<body class="relative min-h-screen flex items-center justify-center bg-gray-100">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{ asset('Medicine_Background2.jpg') }}" 
             alt="Background Image" 
             class="w-full h-full object-cover filter blur-sm">
    </div>
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <!-- Registration Card -->
    <div class="relative z-10 max-w-lg w-full bg-white shadow-xl rounded-lg p-8">
        <!-- Decorative Elements -->
        <div class="absolute -top-10 -left-10 w-32 h-32 bg-blue-300 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-pink-300 rounded-full blur-3xl opacity-50"></div>

        <!-- Form Content -->
        <div class="relative z-20">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-4">Register Here</h2>
            <p class="text-center text-gray-500 mb-1">Fill in your details to create an account</p>
            <p class="text-center text-red-500 mb-6">Please take your time</p>

            <form action="{{ route('account.processRegister') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="w-full px-4 py-2 mt-1 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none @error('name') border-red-500 @enderror"
                        placeholder="Your Name">
                    @error('name')
                        <div class="mt-2 flex items-center bg-red-50 border-l-4 border-red-600 p-2 rounded-lg shadow-xl">
                            <i class="fas fa-exclamation-circle text-red-600 mr-2"></i>
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        </div>
                    @enderror
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2 mt-1 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none @error('email') border-red-500 @enderror"
                        placeholder="name@example.com">
                    @error('email')
                        <div class="mt-2 flex items-center bg-red-50 border-l-4 border-red-600 p-2 rounded-lg shadow-xl">
                            <i class="fas fa-exclamation-circle text-red-600 mr-2"></i>
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        </div>
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-2 mt-1 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none @error('password') border-red-500 @enderror"
                        placeholder="Password">
                    @error('password')
                        <div class="mt-2 flex items-center bg-red-50 border-l-4 border-red-600 p-2 rounded-lg shadow-xl">
                            <i class="fas fa-exclamation-circle text-red-600 mr-2"></i>
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        </div>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-600">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="confirm_password"
                        class="w-full px-4 py-2 mt-1 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full py-3 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold rounded-lg shadow-lg hover:opacity-90 transition duration-300">
                        Register Now
                    </button>
                </div>
            </form>

            <!-- Footer Links -->
            <div class="mt-6">
                <hr class="border-gray-300">
                <p class="text-center text-gray-500 mt-4">
                    Already have an account? <a href="{{ route('account.login') }}" class="text-blue-500 hover:underline">Login here</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
