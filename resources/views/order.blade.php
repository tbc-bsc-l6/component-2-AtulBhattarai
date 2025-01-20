@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-lg">
        <!-- Header Section -->
        <div class="bg-gray-100 px-6 py-4 rounded-t-lg">
            <h3 class="text-2xl font-semibold text-indigo-700 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0H4" />
                </svg>
                Order Products
            </h3>
        </div>


        <!-- Table Section -->
        <div class="overflow-x-auto" id="orders-table">
            <table class="min-w-full table-auto border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">ID</th>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">Image</th>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">Product Name</th>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">Qty</th>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">Price</th>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">Total Price</th>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($orders->isNotEmpty())
                        @foreach ($orders as $order)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-6 py-4 text-gray-700">{{ $order->id }}</td>
                                <td class="px-6 py-4">
                                    @if ($order->product->img)
                                        <img src="{{ asset('product/' . $order->product->img) }}" alt="{{ $order->product->title }}" class="h-16 w-16 object-cover rounded-md shadow-md">
                                    @else
                                        <span class="text-gray-500">No Image</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-gray-700 font-semibold">{{ $order->product->title }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $order->qty }}</td>
                                <td class="px-6 py-4 text-gray-700">${{ number_format($order->product->price, 2) }}</td>
                                <td class="px-6 py-4 text-gray-700 font-semibold">${{ number_format($order->qty * $order->product->price, 2) }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center py-6 text-gray-500">No products found in your orders.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <!-- Print Button -->
        <div class="px-6 py-4 flex justify-end">
            <button onclick="printOrders()" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Print Orders
            </button>
        </div>

        <!-- Pagination Section -->
        <div class="px-6 py-4 bg-gray-50 rounded-b-lg">
            <div class="flex justify-center">
                {{ $orders->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<script>
    function printOrders() {
        var printContents = document.getElementById('orders-table').innerHTML;
        var originalContents = document.body.innerHTML;
        
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endsection
