@extends('admin.layouts.app')

@section('title', 'Edit Brand - EMeds Dashboard')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-lg rounded-4" style="background: linear-gradient(135deg, #f9f9f9, #e0e0e0);">
                    <div class="card-header bg-transparent border-bottom-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-primary fw-bold">Edit Brand</h4>
                            <a href="{{ route('brand.index') }}" class="btn btn-outline-primary btn-sm">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('brand.update', $brand->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="name" class="form-label text-dark fs-5 fw-bold">Brand Name</label>
                                <input type="text" value="{{ old('name', $brand->name) }}" class="form-control shadow-sm @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter brand name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="description" class="form-label text-dark fs-5 fw-bold">Description</label>
                                <textarea class="form-control shadow-sm @error('description') is-invalid @enderror" id="description" name="description" placeholder="Enter brand description" required>{{ old('description', $brand->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="status" class="form-label text-dark fs-5 fw-bold">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="status" name="status" value="active" {{ old('status', $brand->status) == 'active' ? 'checked' : '' }}>
                                    <label class="form-check-label text-dark" for="status">
                                        Active
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill">Update Brand</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
