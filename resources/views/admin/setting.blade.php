@extends('admin.layouts.app')

@section('title', 'Flexon - Dashboard')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="flex justify-center">
        <div class="w-full max-w-2xl">
            <div class="bg-gradient-to-r from-blue-500 to-teal-500 text-white rounded-lg shadow-lg">
                <div class="bg-transparent text-3xl font-semibold py-6 px-8">
                    <i class="fas fa-user-edit mr-3"></i> Update Profile
                </div>
                <div class="p-8 bg-white rounded-b-lg">
                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="relative">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <div class="flex items-center border-b-2 border-gray-300 mt-2">
                                <i class="fas fa-user text-gray-500 mr-3"></i>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" 
                                    class="w-full py-3 pl-12 pr-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('name') border-red-500 @enderror text-gray-900" 
                                    placeholder="Enter your name" required>
                            </div>
                            @error('name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="relative">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="flex items-center border-b-2 border-gray-300 mt-2">
                                <i class="fas fa-envelope text-gray-500 mr-3"></i>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" 
                                    class="w-full py-3 pl-12 pr-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-gray-900" 
                                    placeholder="Enter your email" disabled required>
                            </div>
                            @error('email')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Current Password -->
                        <div class="relative">
                            <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                            <div class="flex items-center border-b-2 border-gray-300 mt-2">
                                <i class="fas fa-lock text-gray-500 mr-3"></i>
                                <input type="password" id="current_password" name="current_password" 
                                    class="w-full py-3 pl-12 pr-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('current_password') border-red-500 @enderror text-gray-900" 
                                    placeholder="Enter current password">
                            </div>
                            @error('current_password')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="relative">
                            <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                            <div class="flex items-center border-b-2 border-gray-300 mt-2">
                                <i class="fas fa-lock text-gray-500 mr-3"></i>
                                <input type="password" id="new_password" name="new_password" 
                                    class="w-full py-3 pl-12 pr-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('new_password') border-red-500 @enderror text-gray-900" 
                                    placeholder="Enter new password">
                            </div>
                            @error('new_password')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm New Password -->
                        <div class="relative">
                            <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                            <div class="flex items-center border-b-2 border-gray-300 mt-2">
                                <i class="fas fa-lock text-gray-500 mr-3"></i>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation" 
                                    class="w-full py-3 pl-12 pr-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('new_password_confirmation') border-red-500 @enderror text-gray-900" 
                                    placeholder="Confirm new password">
                            </div>
                            @error('new_password_confirmation')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                                <i class="fas fa-save mr-2"></i> Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
