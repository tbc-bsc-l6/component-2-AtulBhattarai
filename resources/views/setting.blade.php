@extends('layouts.app')

@section('title', 'Flexon - Update Password')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <!-- Card Container -->
            <div class="bg-gradient-to-r from-purple-500 to-indigo-500 text-white rounded-lg shadow-lg">
                <!-- Header -->
                <div class="bg-transparent text-3xl font-semibold py-6 px-8">
                    <i class="fas fa-key mr-3"></i> Update Password
                </div>

                <!-- Form Section -->
                <div class="p-8 bg-white rounded-b-lg">
                    <form action="{{ route('userprofile.update') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Current Password -->
                        <div class="relative">
                            <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                            <div class="flex items-center border-b-2 border-gray-300 mt-2">
                                <i class="fas fa-lock text-gray-500 mr-3"></i>
                                <input type="password" id="current_password" name="current_password"
                                    class="w-full py-3 pl-12 pr-3 rounded-md focus:ring-2 focus:ring-purple-500 focus:border-purple-500 sm:text-sm @error('current_password') border-red-500 @enderror text-gray-900"
                                    placeholder="Enter your current password" required>
                            </div>
                            @error('current_password')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="relative">
                            <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                            <div class="flex items-center border-b-2 border-gray-300 mt-2">
                                <i class="fas fa-lock text-gray-500 mr-3"></i>
                                <input type="password" id="password" name="password"
                                    class="w-full py-3 pl-12 pr-3 rounded-md focus:ring-2 focus:ring-purple-500 focus:border-purple-500 sm:text-sm @error('password') border-red-500 @enderror text-gray-900"
                                    placeholder="Enter your new password" required>
                            </div>
                            @error('password')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm New Password -->
                        <div class="relative">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                            <div class="flex items-center border-b-2 border-gray-300 mt-2">
                                <i class="fas fa-lock text-gray-500 mr-3"></i>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="w-full py-3 pl-12 pr-3 rounded-md focus:ring-2 focus:ring-purple-500 focus:border-purple-500 sm:text-sm @error('password_confirmation') border-red-500 @enderror text-gray-900"
                                    placeholder="Confirm your new password" required>
                            </div>
                            @error('password_confirmation')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="w-full py-3 bg-purple-600 text-white rounded-md shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition duration-200">
                                <i class="fas fa-save mr-2"></i> Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
