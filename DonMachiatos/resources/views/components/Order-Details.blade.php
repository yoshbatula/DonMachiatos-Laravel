@props(['carts' => []])
<div class="mt-5 flex flex-row transform translate-x-[50px]">
    <div class="bg-white w-187 h-60 rounded-[40px] shadow-md">
            <div class="flex flex-row justify-between items-center justify-items-center p-5">
                <h1 class="text-[24px] font-medium">YOUR ORDER</h1>
                <a href="{{ route('viewcart') }}" class="bg-black text-white rounded-[40px] w-37 h-9 hover:cursor-pointer flex items-center justify-center">
                VIEW CART
                </a>
            </div>
        <div class="w-full border-t border-gray-300"></div>
        <div class="overflow-y-scroll [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none] h-32">
            @foreach ($carts as $cart)
                <div class="flex flex-row p-4 gap-3">
                <div class="bg-[#F4F1EE] w-30 h-25 rounded-2xl">
                    <img class="w-full h-full object-contain" src="{{ asset('images/products/' . $cart->productImage) }}" alt="Order Image">
                </div>
                <div class="flex flex-col flex-1">
                    <h1 class="font-semibold text-[20px]">{{ $cart->productName }}</h1>
                    <div class="flex-row text-[13px] text-[#90571C]">
                        <span>{{$cart->productSize}} |</span>
                        <span>{{$cart->productMood}} |</span>
                        <span>{{$cart->productSugar}}</span>
                    </div>
                    <div class="mt-2 flex flex-row justify-between">
                        <p class="font-semibold text-[20px]">{{$cart->productQuantity}}</p>
                        <p class="font-bold text-[16px]">TOTAL: ₱{{$cart->productPrice}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="w-full border-t border-gray-300"></div>
        <div class="flex flex-row justify-center mt-2">
            <img src={{ Vite::asset('resources/images/ArrowDown.svg') }} alt="Arrow Down" class="w-5">
        </div>
    </div>
</div>