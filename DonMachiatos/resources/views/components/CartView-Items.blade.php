@props(['carts' => []])
<div class="mt-5 flex flex-col items-center">
    @if(session('success'))
            <div x-show="showSuccess" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform -translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform -translate-y-2"
                 class="mx-[50px] mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
                 <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif
    <div class="bg-white w-full max-w-2xl rounded-[40px] shadow-md p-6">
        <div class="flex flex-row items-center justify-between mb-4">
            <h1 class="text-[24px] font-medium">Your Cart</h1>
            <div class="flex flex-row gap-2">
                <a href="{{ route('dinein') }}" class="bg-gray-200 text-black rounded-[10px] px-6 py-2 text-md font-medium hover:bg-gray-300 transition">Back</a>
                <button class="bg-black text-white text-md font-medium rounded-[10px] px-6 py-2 hover:cursor-pointer hover:bg-gray-800 transition" @click="showCartCancelModal = true"
                >Clear</button>
            </div>
        </div>
        <div>
        @if(count($carts) > 0)
            @foreach($carts as $cart)
            <div class="flex flex-row items-center justify-between mb-4 border border-gray-300 rounded-2xl shadow-md bg-white p-4">
                <div class="flex flex-row items-center gap-4">
                    <img src="{{ asset('images/products/' . $cart->productImage) }}" alt="Product Image" class="w-20 h-20 object-cover rounded-2xl bg-gray-200" />
                    <div class="flex flex-col">
                        <div class="font-bold text-lg">{{ $cart->productName }}</div>
                        <div class="text-xs text-[#90571C] mt-1">
                            <span>{{ $cart->productSize }}</span> |
                            <span>{{ $cart->productMood }}</span> |
                            <span>{{ $cart->productSugar }}</span>
                        </div>
                        <div class="text-sm text-gray-500 mt-1">x{{ $cart->productQuantity }}</div>
                    </div>
                </div>
                <div class="flex flex-row items-center gap-4">
                    <div class="font-bold text-lg">₱{{ $cart->productPrice }}</div>
                    <button 
                        type="button"
                        class="bg-gray-200 text-black px-3 py-1 rounded hover:cursor-pointer"
                        @click="
                        showCardUpdateModal = true;
                        selectedProduct = {
                            id: {{ $cart->productID }},
                            name: {{ Js::from($cart->productName) }},
                            price: {{ $cart->productPrice }},
                            image: {{ Js::from($cart->productImage) }},
                            description: {{ Js::from($cart->product->ProductDescription ?? 'No description available') }},
                        };
                        selectedMood = {{ Js::from($cart->productMood) }};
                        selectedSize = {{ Js::from($cart->productSize) }};
                        selectedSugar = {{ Js::from($cart->productSugar) }};
                        quantity = {{ $cart->productQuantity }};
                        currentPrice = {{ $cart->productPrice }};
                    "
                    >
                        Edit
                    </button>
                    
                    <form action="{{ route('cart.delete', $cart->CartID) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-black text-white px-3 py-1 rounded-[10px] hover:cursor-pointer">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        @else
            <div class="text-center text-gray-500 py-8">Your cart is empty.</div>
        @endif
        </div>
        <div class="w-full flex justify-between items-center mt-6">
            <div class="font-bold text-xl">Total: ₱{{ number_format($carts->sum(fn($cart) => $cart->productPrice * $cart->productQuantity), 2) }}</div>
            @if(count($carts) > 0)
                <a href="{{ route('paymentoptions') }}" class="bg-black text-white rounded-[10px] px-8 py-3 text-lg font-semibold hover:bg-gray-800 transition">Proceed to Checkout</a>
            @else
                <button class="bg-gray-400 text-white rounded-[10px] px-8 py-3 text-lg font-semibold cursor-not-allowed" disabled title="Add items to cart to proceed">Proceed to Checkout</button>
            @endif
        </div>

        <x-CartCancelModal />
        <x-CardModalUpdate
    </div>
</div>
