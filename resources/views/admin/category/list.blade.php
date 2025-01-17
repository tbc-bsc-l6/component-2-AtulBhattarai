@extends('admin.layouts.app')

@section('title', 'List Category - EMeds Dashboard')

@section('content')
    <div class="container mx-auto py-12 px-6">
        @if (Session::has('success'))
            <div class="alert alert-success my-3 text-green-700 bg-green-100 p-4 rounded-lg shadow-md">
                {{ Session::get('success') }}
            </div>
        @endif
        
        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="flex justify-between items-center border-b pb-4 mb-4">
                <h3 class="text-xl font-semibold text-gray-700">List of Categories:</h3>
                <a href="{{ route('category.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300 no-underline">Create Category</a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg">
                    <thead>
                        <tr class="border-b">
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">ID</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Name</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Description</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Status</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Created At</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($categories->isNotEmpty())
                            @foreach ($categories as $category)
                                <tr class="border-b hover:bg-gray-100">
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ $category->id }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ $category->name }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ $category->description }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ $category->status }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ \Carbon\Carbon::parse($category->created_at)->format('d M, Y') }}</td>
                                    <td class="px-4 py-3 text-sm flex items-center space-x-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('category.edit', $category->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300 no-underline">Edit</a>

                                        <!-- Delete Button -->
                                        <a href="#" onclick="deleteCategory({{ $category->id }});" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300 no-underline">Delete</a>
                                        <form id="delete-category-form-{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="px-4 py-3 text-center text-gray-700">No categories found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="mt-4 flex justify-center">
                    {{ $categories->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteCategory(id) {
            if (confirm('Are you sure you want to delete this category?')) {
                document.getElementById("delete-category-form-" + id).submit();
            }
        }
    </script>
@endsection
