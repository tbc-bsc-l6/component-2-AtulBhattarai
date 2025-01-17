@extends('admin.layouts.app')

@section('title', 'List Brand - Shoes World Dashboard')

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
            <h4 class="mb-0"><i class="fas fa-list mr-2"></i> List of Brands</h4>
            <a href="{{ route('brand.create') }}" class="btn btn-light btn-sm text-blue-500 font-semibold hover:text-white hover:bg-blue-600 transition duration-200">
                <i class="fas fa-plus-circle me-2"></i> Create Brand
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3"> Name</th>
                            <th class="px-4 py-3"> Description</th>
                            <th class="px-4 py-3"> Status</th>
                            <th class="px-4 py-3"> Created At</th>
                            <th class="text-end px-4 py-3"> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($brands->isNotEmpty())
                            @foreach ($brands as $brand)
                                <tr>
                                    <td class="px-4 py-3">{{ $brand->id }}</td>
                                    <td class="px-4 py-3">{{ $brand->name }}</td>
                                    <td class="px-4 py-3" style="white-space: normal;">{{ $brand->description }}</td>
                                    <td class="px-4 py-3">
                                        <span class="badge {{ $brand->status === 'Active' ? 'bg-success' : 'bg-secondary' }} py-2 px-3 rounded">
                                            {{ $brand->status }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">{{ \Carbon\Carbon::parse($brand->created_at)->format('d M, Y') }}</td>
                                    <td class="text-end px-4 py-3">
                                        <div class="d-inline-flex gap-3">
                                            <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-sm btn-outline-primary d-flex align-items-center">
                                                <i class="fas fa-edit me-1"></i> Edit
                                            </a>
                                            <button class="btn btn-sm btn-outline-danger d-flex align-items-center" onclick="deleteBrand({{ $brand->id }})">
                                                <i class="fas fa-trash-alt me-1"></i> Delete
                                            </button>
                                        </div>
                                        <form id="delete-brand-form-{{ $brand->id }}" action="{{ route('brand.destroy', $brand->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No brands found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-4">
                {{ $brands->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<script>
    function deleteBrand(id) {
        if (confirm('Are you sure you want to delete this brand?')) {
            document.getElementById('delete-brand-form-' + id).submit();
        }
    }
</script>

@endsection
