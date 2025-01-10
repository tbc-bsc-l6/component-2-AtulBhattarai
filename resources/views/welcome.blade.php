@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4">
    <!-- Featured Medicines Section -->
    <div class="feature my-10">
        <h2 class="text-2xl font-semibold text-blue-700 mb-6">Featured Medicines</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @if ($featured_medicine->isNotEmpty())
                @foreach ($featured_medicine as $medicine)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transform transition-transform duration-300 hover:scale-105">
                    <img src="{{ asset('product/' . $medicine->img) }}" alt="{{ $medicine->title }}" class="h-48 w-full object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $medicine->title }}</h3>
                        <p class="text-gray-600 text-sm mt-2">{{ Str::limit($medicine->description, 100) }}</p>
                        <p class="text-gray-800 text-sm mt-2"><strong>Brand:</strong> {{ $medicine->brand->name }}</p>
                        <p class="text-gray-800 text-sm"><strong>Category:</strong> {{ $medicine->category->name }}</p>
                        <p class="text-gray-800 text-sm"><strong>Price:</strong> ${{ $medicine->price }}</p>
                        <p class="text-gray-500 text-sm"><strong>Published on:</strong> {{ $medicine->published_at }}</p>
                        <a href="{{ route('medicine.show', $medicine->id) }}" class="block mt-4 bg-green-500 text-white text-center py-2 rounded-md hover:bg-green-600">View</a>
                    </div>
                </div>
                @endforeach
            @else
                <p class="col-span-4 text-gray-500">No featured medicines available.</p>
            @endif
        </div>
    </div>

    <!-- Latest Medicines Section -->
    <div class="feature my-10">
        <h2 class="text-2xl font-semibold text-blue-700 mb-6">Latest Medicines</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @if ($latest_medicine->isNotEmpty())
                @foreach ($latest_medicine as $medicine)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transform transition-transform duration-300 hover:scale-105">
                    <img src="{{ asset('product/' . $medicine->img) }}" alt="{{ $medicine->title }}" class="h-48 w-full object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $medicine->title }}</h3>
                        <p class="text-gray-600 text-sm mt-2">{{ Str::limit($medicine->description, 100) }}</p>
                        <p class="text-gray-800 text-sm mt-2"><strong>Brand:</strong> {{ $medicine->brand->name }}</p>
                        <p class="text-gray-800 text-sm"><strong>Category:</strong> {{ $medicine->category->name }}</p>
                        <p class="text-gray-800 text-sm"><strong>Price:</strong> ${{ $medicine->price }}</p>
                        <p class="text-gray-500 text-sm"><strong>Published on:</strong> {{ $medicine->published_at }}</p>
                        <a href="{{ route('medicine.show', $medicine->id) }}" class="block mt-4 bg-green-500 text-white text-center py-2 rounded-md hover:bg-green-600">View</a>
                    </div>
                </div>
                @endforeach
            @else
                <p class="col-span-4 text-gray-500">No latest medicines available.</p>
            @endif
        </div>
    </div>
</div>
@endsection
