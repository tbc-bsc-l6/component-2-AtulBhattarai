@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 my-8">
    <h1 class="text-3xl font-semibold text-indigo-700 mb-8 text-center">Products</h1>

    <!-- Search and Filters -->
    <form method="GET" action="{{ route('medicine.index') }}" class="my-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Search Input -->
            <div class="relative">
                <input type="text" name="search_term" class="form-input w-full border border-indigo-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-indigo-500 transition duration-300 transform hover:scale-105 placeholder-gray-400 text-gray-900 bg-gradient-to-r from-indigo-100 to-indigo-200" placeholder="Search..." value="{{ old('search_term', $searchTerm) }}">
            </div>
            <!-- Category Select -->
            <div class="relative">
                <select name="category_id" class="form-select w-full border border-indigo-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-indigo-500 transition duration-300 transform hover:scale-105 text-gray-900 bg-gradient-to-r from-indigo-100 to-indigo-200">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id', $categoryId) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Brand Select -->
            <div class="relative">
                <select name="brand_id" class="form-select w-full border border-indigo-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-4 focus:ring-indigo-500 transition duration-300 transform hover:scale-105 text-gray-900 bg-gradient-to-r from-indigo-100 to-indigo-200">
                    <option value="">Select Brand</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $brand->id == old('brand_id', $brandId) ? 'selected' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Search Button -->
            <div class="relative flex justify-center items-center">
                <button type="submit" class="w-full bg-gradient-to-r from-indigo-500 to-indigo-600 text-white py-3 px-4 rounded-xl text-lg font-semibold shadow-xl hover:from-indigo-600 hover:to-indigo-700 transition duration-300 transform hover:scale-105">
                    <span class="text-sm">Search</span>
                </button>
            </div>
        </div>
    </form>

    <!-- Products Section -->
    @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($products as $product)
            <div class="bg-white rounded-xl shadow-xl overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:border-t-4 hover:border-indigo-600 flex flex-col">
                <!-- Image Section -->
                <div class="relative w-full h-80 sm:h-96 md:h-96">
                    <img src="{{ asset('product/' . $product->img) }}" alt="{{ $product->title }}" class="absolute inset-0 w-full h-full object-cover object-center">
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <h3 class="text-xl font-semibold text-gray-900 truncate">{{ $product->title }}</h3>
                    <p class="text-gray-600 text-sm line-clamp-3">{{ Str::limit($product->description, 120) }}</p>
                    <div class="text-gray-800 text-sm mt-auto">
                        <p><strong>Brand:</strong> {{ $product->brand->name }}</p>
                        <p><strong>Category:</strong> {{ $product->category->name }}</p>
                        <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                    </div>
                    <!-- Action Buttons -->
                    <div class="flex gap-4 justify-center items-center mt-4">
                        <a href="{{ route('medicine.show', $product->id) }}" class="bg-indigo-500 text-white py-2 px-4 rounded-lg text-sm hover:bg-indigo-600 transition duration-300 transform hover:scale-105">View Medicine</a>
                        <a href="{{ route('addtocart', $product->id) }}" class="bg-green-500 text-white py-2 px-4 rounded-lg text-sm hover:bg-green-600 transition duration-300 transform hover:scale-105">Add to Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Modern Pagination Section -->
        <div class="mt-8">
            <!-- Pagination -->
            @if ($products->hasPages())
            <div class="flex justify-center space-x-2">
                {{-- Previous Page Link --}}
                @if ($products->onFirstPage())
                    <span class="px-4 py-2 text-gray-300 cursor-not-allowed">«</span>
                @else
                    <a href="{{ $products->previousPageUrl() }}" class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 transition-all duration-300">«</a>
                @endif

                {{-- Page Number Links --}}
                @foreach ($products->links() as $page => $url)
                    @if ($page == $products->currentPage())
                        <span class="px-4 py-2 bg-indigo-600 text-white rounded-md">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 text-indigo-600 rounded-md hover:bg-indigo-200 transition-all duration-300">{{ $page }}</a>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}" class="px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 transition-all duration-300">»</a>
                @else
                    <span class="px-4 py-2 text-gray-300 cursor-not-allowed">»</span>
                @endif
            </div>
            @endif
        </div>
    @else
        <p class="text-gray-500 text-center">No products found matching your criteria.</p>
    @endif
</div>
@endsection
