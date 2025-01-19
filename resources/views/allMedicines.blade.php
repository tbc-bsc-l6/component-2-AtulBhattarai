@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 my-8">
    <h1 class="text-3xl font-semibold text-indigo-700 mb-8 text-center">Products</h1>

    <!-- Search and Filters -->
    <form method="GET" action="{{ route('medicine.index') }}" class="my-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div>
                <input type="text" name="search_term" class="form-input w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Search..." value="{{ old('search_term', $searchTerm) }}">
            </div>
            <div>
                <select name="category_id" class="form-select w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id', $categoryId) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <select name="brand_id" class="form-select w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">Select Brand</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $brand->id == old('brand_id', $brandId) ? 'selected' : '' }}>{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex justify-center items-center">
                <button type="submit" class="w-full bg-indigo-500 text-white py-2 px-4 rounded-lg hover:bg-indigo-600 transition duration-300 transform hover:scale-105">Search</button>
            </div>
        </div>
    </form>

    <!-- Products Section -->
    @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($products as $product)
            <div class="bg-white rounded-xl shadow-xl overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:border-t-4 hover:border-indigo-600">
                <!-- Image Section -->
                <div class="relative w-full h-80 sm:h-96 md:h-96">
                    <img src="{{ asset('product/' . $product->img) }}" alt="{{ $product->title }}" class="absolute inset-0 w-full h-full object-cover object-center">
                </div>
                <div class="p-6 space-y-4">
                    <h3 class="text-xl font-semibold text-gray-900">{{ $product->title }}</h3>
                    <p class="text-gray-600 text-sm">{{ Str::limit($product->description, 120) }}</p>
                    <div class="text-gray-800 text-sm space-y-1">
                        <p><strong>Brand:</strong> {{ $product->brand->name }}</p>
                        <p><strong>Category:</strong> {{ $product->category->name }}</p>
                        <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                    </div>
                    <div class="flex gap-4 justify-center">
                        <a href="{{ route('medicine.show', $product->id) }}" class="bg-indigo-500 text-white py-2 px-4 rounded-lg text-sm hover:bg-indigo-600 transition duration-300 transform hover:scale-105">View Medicine</a>
                        <a href="{{ route('addtocart', $product->id) }}" class="bg-green-500 text-white py-2 px-4 rounded-lg text-sm hover:bg-green-600 transition duration-300 transform hover:scale-105">Add to Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
    @else
        <p class="text-gray-500 text-center">No products found matching your criteria.</p>
    @endif
</div>
@endsection
