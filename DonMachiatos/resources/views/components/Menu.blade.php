@props(['products' => []])

<div class="flex flex-col gap-2" x-data="{ 
    showModal: false, 
    selectedProduct: null,
    selectedMood: null,
    selectedSize: null,
    selectedSugar: null,
    selectProduct(product) {
        this.selectedProduct = product;
        this.showModal = true;
        this.selectedMood = null;
        this.selectedSize = null;
        this.selectedSugar = null;
    }
}">
{{-- Menu Navigation --}}
    <div class="flex flex-row gap-8 px-[50px]">
        {{-- Sidebar --}}
        <div class="mt-5 grid grid-cols-1 bg-white rounded-[40px] shadow-md h-180 w-50 overflow-hidden">
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
        {{-- Products Section --}}
        <div class="flex flex-col bg-white rounded-[40px] h-180 w-200 shadow-md p-6 overflow-hidden transform translate-y-[19px]">
            {{-- Menu Items Cards --}}
            <div class="grid grid-cols-2 gap-6 overflow-y-scroll [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none] flex-1 content-start pr-2">
                    @foreach ($products as $product)
                    <button class="hover:cursor-pointer" 
                        @click="selectProduct({
                            id: {{ $product->productID }},
                            name: '{{ addslashes($product->ProductName) }}',
                            description: '{{ addslashes($product->ProductDescription) }}',
                            price: {{ $product->ProductPrice }},
                            image: '{{ $product->ProductImage }}'
                        })">
                        <div class="flex flex-row bg-[#F4F4F4] rounded-[40px] h-48 w-full p-3">
                            <img src="{{ asset('images/products/' . $product->ProductImage) }}" alt="Coffee Image"
                            class="w-24 h-auto object-contain -ml-2"/>
                            <div class="flex flex-col justify-center text-start ml-1 flex-1 min-w-0">
                                <h1 class="font-bold text-[16px] leading-tight uppercase">{{ $product->ProductName }}</h1>
                                <span class="text-[#929292] text-[13px] leading-tight mt-1">{{ $product->ProductDescription }}</span>
                                <span class="text-[22px] font-bold mt-1">₱{{ number_format($product->ProductPrice, 2) }}</span>
                            </div>
                        </div>
                    </button>
                    @endforeach
            </div>
            <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 pointer-events-none">
                <img class="w-6" src={{ Vite::asset('resources/images/ArrowDown.svg') }} alt="Scroll Indicator">
            </div>
        </div>
    </div>

    <x-Card />
</div>