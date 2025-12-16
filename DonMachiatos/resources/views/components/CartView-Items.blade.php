@props(['carts' => []])
<div class="mt-5 flex flex-col items-center">
    <div class="w-full max-w-2xl flex justify-start mb-4">
        <a href="{{ route('dinein') }}" class="bg-gray-200 text-black rounded-[40px] px-6 py-2 text-md font-medium hover:bg-gray-300 transition">&larr; Back to Dine-In</a>
    </div>
    <div class="bg-white w-full max-w-2xl rounded-[40px] shadow-md p-6">
        <h1 class="text-[24px] font-medium mb-4">Your Cart</h1>
        @if(count($carts) > 0)
            <div class="divide-y divide-gray-200">
                @foreach ($carts as $cart)
                    <div class="flex flex-row items-center py-4 gap-4">
                        <div class="bg-[#F4F1EE] w-24 h-24 rounded-2xl flex items-center justify-center">
                            <img class="w-20 h-20 object-contain" src="{{ asset('images/products/' . $cart->productImage) }}" alt="Order Image">
                        </div>
                        <div class="flex flex-col flex-1">
                            <h2 class="font-semibold text-lg">{{ $cart->productName }}</h2>
                            <div class="flex flex-row text-sm text-[#90571C] gap-2">
                                <span>{{ $cart->productSize }}</span>
                                <span>|</span>
                                <span>{{ $cart->productMood }}</span>
                                <span>|</span>
                                <span>{{ $cart->productSugar }}</span>
                            </div>
                            <div class="flex flex-row items-center mt-2 gap-2">
                                <form action="{{ route('cart.update', $cart->CartID) }}" method="POST" class="flex flex-row items-center gap-2">
                                @csrf
                                @method('PUT')
                                <input type="number" name="productQuantity" value="{{ $cart->productQuantity }}" min="1" class="w-16 border rounded px-2 py-1 text-center" />
                                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Update</button>
                                </form>
                                <form action="{{ route('cart.delete', $cart->CartID) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                                </form>
                            </div>
                        </div>
                        <div class="font-bold text-lg">₱{{ $cart->productPrice }}</div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-gray-500 py-8">Your cart is empty.</div>
        @endif
    </div>
    <div class="w-full max-w-2xl flex justify-end mt-6">
        @if(count($carts) > 0)
            <a href="{{ route('paymentoptions') }}" class="bg-black text-white rounded-[40px] px-8 py-3 text-lg font-semibold hover:bg-gray-800 transition">Proceed to Checkout</a>
        @else
            <button class="bg-gray-400 text-white rounded-[40px] px-8 py-3 text-lg font-semibold cursor-not-allowed" disabled title="Add items to cart to proceed">Proceed to Checkout</button>
        @endif
    </div>
</div>
