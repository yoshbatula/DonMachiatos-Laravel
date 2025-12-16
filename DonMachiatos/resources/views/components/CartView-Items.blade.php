@props(['carts' => []])
<div class="mt-5 flex flex-col items-center">
    <div class="bg-white w-full max-w-2xl rounded-[40px] shadow-md p-6">
        <div class="flex flex-row items-center justify-between mb-4">
            <h1 class="text-[24px] font-medium">Your Cart</h1>
            <div class="flex flex-row gap-2">
                <a href="{{ route('dinein') }}" class="bg-gray-200 text-black rounded-[10px] px-6 py-2 text-md font-medium hover:bg-gray-300 transition">Back</a>
                <form action="{{ route('cart.deleteAll') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-black text-white rounded-[10px] px-6 py-2 text-md font-medium hover:bg-red-600 transition">Clear Cart</button>
                </form>
            </div>
        </div>
        @if(count($carts) > 0)
            <div class="divide-y divide-gray-200 px-4 py-2">
                @foreach ($carts as $cart)
                    <div class="flex flex-row items-center py-4 gap-4 border border-gray-200 rounded-2xl shadow-sm bg-white mb-3">
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
                            <div class="mt-2 text-[15px] font-semibold">x{{ $cart->productQuantity }}</div>
                        </div>
                        <div class="flex flex-row items-center gap-4">
                            <div class="font-bold text-lg">₱{{ $cart->productPrice }}</div>
                            <form action="{{ route('cart.update', $cart->CartID) }}" method="POST" class="flex flex-row items-center gap-2">
                                @csrf
                                @method('PUT')
                                <button type="submit" class= "bg-gray-200 text-black px-3 py-1 rounded-[10px] hover:cursor-pointer">Edit</button>
                            </form>
                            <form action="{{ route('cart.delete', $cart->CartID) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-black text-white px-3 py-1 rounded-[10px] hover:cursor-pointer">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-gray-500 py-8">Your cart is empty.</div>
        @endif
        <div class="w-full flex justify-between items-center mt-6">
            <div class="font-bold text-xl">Total: ₱{{ number_format($carts->sum(fn($cart) => $cart->productPrice * $cart->productQuantity), 2) }}</div>
            @if(count($carts) > 0)
                <a href="{{ route('paymentoptions') }}" class="bg-black text-white rounded-[10px] px-8 py-3 text-lg font-semibold hover:bg-gray-800 transition">Proceed to Checkout</a>
            @else
                <button class="bg-gray-400 text-white rounded-[10px] px-8 py-3 text-lg font-semibold cursor-not-allowed" disabled title="Add items to cart to proceed">Proceed to Checkout</button>
            @endif
        </div>
    </div>
</div>
