@extends('admin.layouts.app')

@section('title', 'Flexon - Dashboard')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-center mt-10">
        <div class="w-full max-w-2xl">
            <div class="bg-white shadow-lg rounded-lg">
                <div class="bg-gray-800 text-white text-lg font-semibold py-4 px-6 rounded-t-lg">
                    Update Profile
                </div>
                <div class="p-6">
                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" 
                                class="mt-1 block w-full h-12 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('name') border-red-500 @enderror" 
                                placeholder="Enter your name" required>
                            @error('name')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" 
                                class="mt-1 block w-full h-12 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('email') border-red-500 @enderror" 
                                placeholder="Enter your email" disabled required>
                            @error('email')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password (to change password)</label>
                            <input type="password" id="current_password" name="current_password" 
                                class="mt-1 block w-full h-12 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('current_password') border-red-500 @enderror" 
                                placeholder="Enter current password">
                            @error('current_password')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                            <input type="password" id="new_password" name="new_password" 
                                class="mt-1 block w-full h-12 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('new_password') border-red-500 @enderror" 
                                placeholder="Enter new password">
                            @error('new_password')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" 
                                class="mt-1 block w-full h-12 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('new_password_confirmation') border-red-500 @enderror" 
                                placeholder="Confirm new password">
                            @error('new_password_confirmation')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
