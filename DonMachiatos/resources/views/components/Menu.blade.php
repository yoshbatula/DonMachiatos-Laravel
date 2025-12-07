@props(['products' => []])

<div class="flex flex-col gap-2" x-data="{ showModal: false }">
{{-- Menu Navigation --}}
    <div class="flex flex-row">
        <div class="mt-5 grid grid-cols-1 bg-white rounded-[40px] shadow-md h-180 w-50 transform translate-x-[50px] overflow-hidden">
        <div class="flex flex-col text-center gap-y-2">
            <div class="mt-8 px-[50px]">
                <h1 class="font-bold text-[24px]">Menu</h1>
            </div>
            <div class="w-full h-0.5 bg-gray-300 transform translate-y-[15px]"></div>
            <div class="flex flex-col items-center transform translate-y-[55px]">
                <button class="hover:cursor-pointer">
                    <img class="w-20" src={{ Vite::asset('resources/images/NewLogo.svg') }} alt="What's new">
                    <h1 class="text-sm font-medium mt-2">What's new</h1>
                </button>
            </div>
            <div class="flex flex-col items-center transform translate-y-[80px]">
                <button class="hover:cursor-pointer">
                    <img class="w-20" src={{ Vite::asset('resources/images/Coffee.svg') }} alt="What's new">
                    <h1 class="text-sm font-medium mt-2">Coffee</h1>
                </button>
            </div>
            <div class="flex flex-col items-center transform translate-y-[100px]">
                <button class="hover:cursor-pointer">
                    <img class="w-20" src={{ Vite::asset('resources/images/Coffee.svg') }} alt="What's new">
                    <h1 class="text-sm font-medium mt-2">Frappe</h1>
                </button>
            </div>
            <div class="flex flex-col items-center transform translate-y-[120px]">
                <button class="hover:cursor-pointer">
                    <img class="w-20" src={{ Vite::asset('resources/images/Coffee.svg') }} alt="What's new">
                    <h1 class="text-sm font-medium mt-2">Coolers</h1>
                </button>
            </div>
        </div>
    </div>
    {{-- Menu Selection --}}
    <div class="flex flex-col bg-white rounded-[40px] h-180 w-131 shadow-md translate-x-[70px] translate-y-[20px] p-6 overflow-hidden relative">
        {{-- Menu Items Cards --}}
        <div class="grid grid-cols-2 gap-x-5 gap-y-3 overflow-y-scroll transform translate-x-[-6px] [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none] flex-1 content-start">
                @foreach ($products as $product)
                <button class="hover:cursor-pointer" @click="showModal = true">
                    <div class="flex flex-row bg-[#F4F4F4] rounded-[40px] h-52 w-60 p-3">
                        <img src="{{ asset('images/products/' . $product->ProductImage) }}" alt="Coffee Image"
                        class="w-28 h-auto object-contain transform translate-x-[-20px]"/>
                        <div class="flex flex-col justify-center text-start -ml-3 flex-1 min-w-0">
                            <h1 class="font-bold text-[18px] leading-tight uppercase">{{ $product->ProductName }}</h1>
                            <span class="text-[#929292] text-[14px] leading-tight mt-1">{{ $product->ProductDescription }}</span>
                            <span class="text-[24px] font-bold mt-1">₱{{ number_format($product->ProductPrice, 2) }}</span>
                        </div>
                    </div>
                </button>
                @endforeach
        </div>
        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 pointer-events-none">
            <img class="w-6" src={{ Vite::asset('resources/images/ArrowDown.svg') }} alt="Scroll Indicator">
        </div>
    </div>    

    {{-- Modal --}}
    <x-Card :products  />
</div>