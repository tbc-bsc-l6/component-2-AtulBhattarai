@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg">
        <!-- Header Section -->
        <div class="bg-gray-100 px-6 py-4 rounded-t-lg">
            <h3 class="text-xl font-semibold text-indigo-700 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M9 9h6M4 21h16a2 2 0 002-2V7a2 2 0 00-2-2H4a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Products in Cart
            </h3>
        </div>

        <!-- Table Section -->
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-600">ID</th>
                        <th class="px-4 py-2 text-left text-gray-600">Image</th>
                        <th class="px-4 py-2 text-left text-gray-600">Product Name</th>
                        <th class="px-4 py-2 text-left text-gray-600">Qty</th>
                        <th class="px-4 py-2 text-left text-gray-600">Price</th>
                        <th class="px-4 py-2 text-left text-gray-600">Total Price</th>
                        <th class="px-4 py-2 text-left text-gray-600">Created At</th>
                        <th class="px-4 py-2 text-left text-gray-600">Updated At</th>
                        <th class="px-4 py-2 text-left text-gray-600">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($carts->isNotEmpty())
                        @foreach ($carts as $cart)
                            <tr class="border-t hover:bg-gray-100">
                                <td class="px-4 py-2">{{ $cart->id }}</td>
                                <td class="px-4 py-2">
                                    @if ($cart->product->img)
                                        <img src="{{ asset('product/' . $cart->product->img) }}" alt="{{ $cart->product->title }}" class="h-16 w-16 object-cover rounded-md shadow-md">
                                    @else
                                        <span class="text-gray-500">No Image</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 font-semibold text-gray-800">{{ $cart->product->title }}</td>
                                <td class="px-4 py-2">
                                    <form action="{{ route('cartupdate', $cart->id) }}" method="POST" class="flex items-center space-x-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="qty" value="{{ $cart->qty }}" min="1" max="{{ $cart->product->qty }}" class="w-16 text-center border border-gray-300 rounded-md shadow-sm">
                                        <button type="submit" class="text-white bg-indigo-500 px-3 py-1 rounded-md hover:bg-indigo-600 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                                <td class="px-4 py-2">${{ number_format($cart->product->price, 2) }}</td>
                                <td class="px-4 py-2">${{ number_format($cart->qty * $cart->product->price, 2) }}</td>
                                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($cart->created_at)->format('d M, Y') }}</td>
                                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($cart->updated_at)->format('d M, Y') }}</td>
                                <td class="px-4 py-2">
                                    <button onclick="deleteCartItem({{ $cart->id }});" class="text-white bg-red-500 px-3 py-1 rounded-md hover:bg-red-600 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                    <form id="delete-cart-{{ $cart->id }}" action="{{ route('cartdestroy', $cart->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9" class="text-center py-4 text-gray-500">No Products found in the cart.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Footer Section -->
        @if ($carts->isNotEmpty())
            <div class="p-6 border-t bg-gray-50">
                <div class="flex justify-between items-center">
                    <p class="text-lg font-semibold text-gray-700">Total Qty: {{ $totalQty }} | Total Price: ${{ number_format($totalPrice, 2) }}</p>
                    <form action="{{ route('cartcheckout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-green-500 text-white py-2 px-6 rounded-lg hover:bg-green-600 transition">
                            Checkout
                        </button>
                    </form>
                </div>
            </div>
        @endif

        <!-- Pagination -->
        <div class="p-6">
            <div class="flex justify-center">
                {{ $carts->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<script>
    function deleteCartItem(id) {
        if (confirm('Are you sure you want to delete this cart item?')) {
            document.getElementById('delete-cart-' + id).submit();
        }
    }
</script>
@endsection
