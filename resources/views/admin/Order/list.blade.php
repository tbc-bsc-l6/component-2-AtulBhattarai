@extends('admin.layouts.app')

@section('title', 'List Product - EMeds Dashboard')

@section('content')
    <div class="container py-6">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header bg-gradient-to-r from-indigo-500 to-teal-500 text-white text-lg font-semibold py-4 px-6 rounded-t-lg">
                <i class="fas fa-box-open mr-3"></i> List of Order Products
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="bg-gray-100">
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Product Title</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total Price</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($orders->isNotEmpty())
                                @foreach ($orders as $order)
                                    <tr class="hover:bg-gray-50">
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->user->email }}</td>
                                        <td>{{ $order->product->title }}</td>
                                        <td>{{ $order->qty }}</td>
                                        <td>$ {{ number_format($order->product->price, 2) }}</td>
                                        <td>$ {{ number_format($order->qty * $order->product->price, 2) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center py-4">No products found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $orders->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
