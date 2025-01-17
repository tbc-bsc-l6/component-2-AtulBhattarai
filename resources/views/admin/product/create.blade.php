@extends('admin.layouts.app')

@section('title', 'Create Product - EMeds Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-12 mt-5">
            <div class="card shadow-lg rounded-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">
                        <i class="fas fa-plus-circle"></i> Create Product
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="form-label fs-5">Product Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Enter product title" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Category -->
                        <div class="mb-4">
                            <label for="category_id" class="form-label fs-5">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Brand -->
                        <div class="mb-4">
                            <label for="brand_id" class="form-label fs-5">Brand</label>
                            <select class="form-select @error('brand_id') is-invalid @enderror" id="brand_id" name="brand_id" required>
                                <option value="">Select Brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label fs-5">Product Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Enter product description" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Image -->
                        <div class="mb-4">
                            <label for="img" class="form-label fs-5">Product Image</label>
                            <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img" accept="image/*">
                            @error('img')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Price -->
                        <div class="mb-4">
                            <label for="price" class="form-label fs-5">Price</label>
                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" placeholder="Enter product price" required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Featured -->
                        <div class="mb-4">
                            <label for="featured" class="form-label fs-5">Featured</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="featured" name="featured" value="1" {{ old('featured') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="featured">Featured Product</label>
                            </div>
                            @error('featured')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Status -->
                        <div class="mb-4">
                            <label for="status" class="form-label fs-5">Status</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="status" name="status" value="active" {{ old('status') == 'active' ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Create Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
