@extends('admin.layouts.app')

@section('title', 'Create Category - EMeds Dashboard')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-lg rounded-4" style="background: linear-gradient(135deg, #f9f9f9, #e0e0e0);">
                    <div class="card-header bg-transparent border-bottom-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-primary">
                                <i class="fas fa-tag me-2"></i> Create Category
                            </h4>
                            <a href="{{ route('category.index') }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-arrow-left me-1"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="form-label text-dark fs-5">Category Name</label>
                                <input type="text" value="{{ old('name') }}" class="form-control shadow-sm @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter category name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="description" class="form-label text-dark fs-5">Description</label>
                                <textarea class="form-control shadow-sm @error('description') is-invalid @enderror" id="description" name="description" placeholder="Enter category description" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="status" class="form-label text-dark fs-5">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="status" name="status" value="active" {{ old('status') == 'active' ? 'checked' : '' }}>
                                    <label class="form-check-label text-dark" for="status">
                                        Active
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-plus-circle me-2"></i> Create Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
