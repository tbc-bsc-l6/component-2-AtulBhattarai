@extends('admin.layouts.app')

@section('title', 'List Product - EMeds Dashboard')

@section('content')
<div class="container py-6">
    @if (Session::has('success'))
        <div class="alert alert-success my-3 alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-header bg-gradient-to-r from-blue-500 to-teal-500 text-white d-flex justify-content-between align-items-center rounded-t-lg">
            <h4 class="mb-0"><i class="fas fa-box mr-2"></i> List of Products</h4>
            <a href="{{ route('product.create') }}" class="btn btn-light btn-sm text-blue-500 font-semibold hover:text-white hover:bg-blue-600 transition duration-200">
                <i class="fas fa-plus-circle me-2"></i> Create Product
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3" style="width: 5%;">#</th>
                            <th class="px-4 py-3" style="width: 10%;">Image</th>
                            <th class="px-4 py-3" style="width: 15%;">Title</th>
                            <th class="px-4 py-3" style="width: 15%;">Category</th>
                            <th class="px-4 py-3" style="width: 15%;">Brand</th>
                            <th class="px-4 py-3" style="width: 10%;">Price</th>
                            <th class="px-4 py-3" style="width: 10%;">Featured</th>
                            <th class="px-4 py-3" style="width: 10%;">Status</th>
                            <th class="text-end px-4 py-3" style="width: 15%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->isNotEmpty())
                            @foreach ($products as $product)
                                <tr>
                                    <td class="px-4 py-3">{{ $product->id }}</td>
                                    <td class="px-4 py-3">
                                        @if ($product->img)
                                            <img src="{{ asset('product/' . $product->img) }}" alt="{{ $product->title }}" class="img-thumbnail" style="max-width: 100px;">
                                        @else
                                            <span>No Image</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">{{ $product->title }}</td>
                                    <td class="px-4 py-3">{{ $product->category->name }}</td>
                                    <td class="px-4 py-3">{{ $product->brand->name }}</td>
                                    <td class="px-4 py-3">${{ number_format($product->price, 2) }}</td>
                                    <td class="px-4 py-3">{{ $product->featured ? 'Yes' : 'No' }}</td>
                                    <td class="px-4 py-3">
                                        <span class="badge {{ $product->status === 'active' ? 'bg-success' : 'bg-secondary' }} py-2 px-3 rounded">
                                            {{ ucfirst($product->status) }}
                                        </span>
                                    </td>
                                    <td class="text-end px-4 py-3">
                                        <div class="d-inline-flex gap-3">
                                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-outline-primary d-flex align-items-center">
                                                <i class="bi bi-pencil-square me-1"></i> Edit
                                            </a>
                                            <button class="btn btn-sm btn-outline-danger d-flex align-items-center" onclick="deleteProduct({{ $product->id }})">
                                                <i class="bi bi-trash me-1"></i> Delete
                                            </button>
                                        </div>
                                        <form id="delete-product-form-{{ $product->id }}" action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">No products found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<script>
    function deleteProduct(id) {
        if (confirm('Are you sure you want to delete this product?')) {
            document.getElementById("delete-product-form-" + id).submit();
        }
    }
</script>
@endsection
