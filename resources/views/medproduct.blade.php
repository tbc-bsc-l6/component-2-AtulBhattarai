@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
        <!-- Product Image Section -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <img 
                src="{{ asset('product/' . $product->img) }}" 
                alt="{{ $product->title }}" 
                class="w-full h-auto object-cover rounded-lg transition-transform duration-300 transform hover:scale-105"
            >
            <a 
                href="{{ route('addtocart', $product->id) }}" 
                class="block mt-4 bg-green-500 text-white text-center py-2 rounded-md hover:bg-green-600 transition duration-300 transform hover:scale-105">
                Add to Cart
            </a>
        </div>

        <!-- Product Details Section -->
        <div class="space-y-6 bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold text-indigo-700">{{ $product->title }}</h1>
            
            <!-- Description -->
            <p class="text-gray-600 text-lg leading-relaxed">
                <strong class="text-indigo-600">Description:</strong> {{ $product->description }}
            </p>

            <!-- Category Section -->
            <div>
                <h4 class="text-xl font-semibold text-gray-800"><strong>Category:</strong> {{ $product->category->name }}</h4>
                <p class="text-gray-600">{{ $product->category->description }}</p>
            </div>

            <!-- Brand Section -->
            <div>
                <h4 class="text-xl font-semibold text-gray-800"><strong>Brand:</strong> {{ $product->brand->name }}</h4>
                <p class="text-gray-600"><strong>Bio:</strong><br>{{ $product->brand->description }}</p>
            </div>

            <!-- Price -->
            <div class="bg-gray-100 p-4 rounded-lg">
                <h5 class="text-2xl font-bold text-green-600">
                    <strong>Price:</strong> ${{ number_format($product->price, 2) }}
                </h5>
            </div>

            <!-- Call-to-Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4">
                <a 
                    href="{{ route('addtocart', $product->id) }}" 
                    class="bg-green-500 text-white py-3 px-6 rounded-lg text-center text-lg font-semibold hover:bg-green-600 transition duration-300 transform hover:scale-105">
                    Add to Cart
                </a>
                <a 
                    href="{{ route('medicine.index') }}" 
                    class="bg-indigo-500 text-white py-3 px-6 rounded-lg text-center text-lg font-semibold hover:bg-indigo-600 transition duration-300 transform hover:scale-105">
                    Back to Products
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
