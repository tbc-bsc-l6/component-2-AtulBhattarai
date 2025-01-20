@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <!-- Image Slider Section -->
    <div class="relative mb-8">
        <div class="carousel-container overflow-hidden rounded-xl shadow-xl">
            <div class="carousel relative w-full h-96 sm:h-[500px] md:h-[550px]">
                <div class="carousel-slide flex transition-all duration-700 ease-in-out">
                    <img src="{{ asset('images/slider1.jpg') }}" alt="Slider 1" class="w-full h-full object-cover object-center rounded-xl">
                    <img src="{{ asset('images/slider2.jpg') }}" alt="Slider 2" class="w-full h-full object-cover object-center rounded-xl">
                    <img src="{{ asset('images/slider3.jpg') }}" alt="Slider 3" class="w-full h-full object-cover object-center rounded-xl">
                </div>
            </div>
            <!-- Removed Carousel Controls (Prev & Next buttons) -->
        </div>
    </div>

    <!-- Featured Medicines Section -->
    <div class="feature my-5">
        <h2 class="text-3xl font-semibold text-indigo-700 mb-8 text-center">Featured Medicines</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @if ($featured_medicine->isNotEmpty())
                @foreach ($featured_medicine as $medicine)
                <div class="bg-white rounded-xl shadow-xl overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:border-t-4 hover:border-indigo-600 flex flex-col">
                    <!-- Image Section -->
                    <div class="relative w-full h-80 sm:h-96 md:h-96">
                        <img src="{{ asset('product/' . $medicine->img) }}" alt="{{ $medicine->title }}" class="absolute inset-0 w-full h-full object-cover object-center">
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-semibold text-gray-900 truncate">{{ $medicine->title }}</h3>
                        <p class="text-gray-600 text-sm line-clamp-3">{{ Str::limit($medicine->description, 120) }}</p>
                        <div class="text-gray-800 text-sm mt-auto">
                            <p><strong>Brand:</strong> {{ $medicine->brand->name }}</p>
                            <p><strong>Category:</strong> {{ $medicine->category->name }}</p>
                            <p><strong>Price:</strong> ${{ number_format($medicine->price, 2) }}</p>
                        </div>
                        <!-- Fixed Button Alignment -->
                        <div class="flex gap-4 justify-center items-center mt-4">
                            <a href="{{ route('medicine.show', $medicine->id) }}" class="bg-indigo-500 text-white py-2 px-4 rounded-lg text-sm hover:bg-indigo-600 transition duration-300 transform hover:scale-105">View Details</a>
                            <a href="{{ route('addtocart', $medicine->id) }}" class="bg-green-500 text-white py-2 px-4 rounded-lg text-sm hover:bg-green-600 transition duration-300 transform hover:scale-105">Add to Cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p class="col-span-4 text-gray-500 text-center">No featured medicines available.</p>
            @endif
        </div>
    </div>

    <!-- Latest Medicines Section -->
    <div class="feature my-16">
        <h2 class="text-3xl font-semibold text-indigo-700 mb-8 text-center">Latest Medicines</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @if ($latest_medicine->isNotEmpty())
                @foreach ($latest_medicine as $medicine)
                <div class="bg-white rounded-xl shadow-xl overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:border-t-4 hover:border-indigo-600 flex flex-col">
                    <!-- Image Section -->
                    <div class="relative w-full h-80 sm:h-96 md:h-96">
                        <img src="{{ asset('product/' . $medicine->img) }}" alt="{{ $medicine->title }}" class="absolute inset-0 w-full h-full object-cover object-center">
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-semibold text-gray-900 truncate">{{ $medicine->title }}</h3>
                        <p class="text-gray-600 text-sm line-clamp-3">{{ Str::limit($medicine->description, 120) }}</p>
                        <div class="text-gray-800 text-sm mt-auto">
                            <p><strong>Brand:</strong> {{ $medicine->brand->name }}</p>
                            <p><strong>Category:</strong> {{ $medicine->category->name }}</p>
                            <p><strong>Price:</strong> ${{ number_format($medicine->price, 2) }}</p>
                        </div>
                        <!-- Fixed Button Alignment -->
                        <div class="flex gap-4 justify-center items-center mt-4">
                            <a href="{{ route('medicine.show', $medicine->id) }}" class="bg-indigo-500 text-white py-2 px-4 rounded-lg text-sm hover:bg-indigo-600 transition duration-300 transform hover:scale-105">View Details</a>
                            <a href="{{ route('addtocart', $medicine->id) }}" class="bg-green-500 text-white py-2 px-4 rounded-lg text-sm hover:bg-green-600 transition duration-300 transform hover:scale-105">Add to Cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p class="col-span-4 text-gray-500 text-center">No latest medicines available.</p>
            @endif
        </div>
    </div>
</div>

<!-- Carousel JS -->
<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide img');
    const totalSlides = slides.length;

    function moveSlide(direction) {
        currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
        document.querySelector('.carousel-slide').style.transform = `translateX(-${currentSlide * 100}%)`;
    }

    // Auto slide feature
    setInterval(() => {
        moveSlide(1);
    }, 5000); // Change slide every 5 seconds
</script>
@endsection
