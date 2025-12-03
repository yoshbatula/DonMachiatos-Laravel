<div x-show="showModal === true" 
     x-cloak
     x-init="$watch('showModal', value => { if(value) quantity = 1 })"
     class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-xs bg-white/5"
     @click.self="showModal = false">
    <div class="bg-[#F4F4F4] rounded-[40px] shadow-lg p-8 w-[500px] h-[600px] overflow-hidden">
        <div class="flex flex-col">
            <div class="flex flex-row">
                <img src={{ Vite::asset('resources/images/DonDarko.svg') }} alt="Coffee Image" class="w-50 transform translate-x-[-30px]">
                <div class="flex flex-col">
                    <h1 class="text-[24px] font-semibold">DON DARKO</h1>
                    <div class="text-[#929292]">
                        <span>High-quality dark</span>
                        <span>chocolate, chocolate syrup</span>
                    </div>
                    <div class="mt-2">
                        <h1 class="font-bold text-[36px]">₱69</h1>
                    </div>
                </div>
            </div>
            <div class="flex flex-row justify-between items-start">
                <div class="mt-4 flex flex-col">
                    <h1 class="text-[24px] font-bold">Mood</h1>
                    <div class="flex flex-row gap-2">
                        <div class="mt-2 bg-[#D9D9D9] rounded-[40px] w-13 h-10 flex items-center justify-center">
                            <button class="hover:cursor-pointer"><img src={{ Vite::asset('resources/images/FireLogo.svg') }} alt="Fire Logo"></button>
                        </div>
                        <div class="mt-2 bg-[#D9D9D9] rounded-[40px] w-13 h-10 flex items-center justify-center">
                            <button class="hover:cursor-pointer"><img src={{ Vite::asset('resources/images/IceLogo.svg') }} alt="Ice Logo"></button>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex flex-col">
                    <h1 class="text-[24px] font-bold">Size</h1>
                    <div class="flex flex-row gap-4">
                        <div class="mt-2 flex flex-col">
                            <button class="bg-[#D9D9D9] rounded-[40px] w-13 h-10 flex items-center justify-center font-semibold hover:cursor-pointer">S</button>
                            <p class="mt-1 font-bold text-[14px] text-center">₱39</p>
                        </div>
                        <div class="mt-2 flex flex-col">
                            <button class="bg-[#D9D9D9] rounded-[40px] w-13 h-10 flex items-center justify-center font-semibold hover:cursor-pointer">M</button>
                            <p class="mt-1 font-bold text-[14px] text-center">₱69</p>
                        </div>
                        <div class="mt-2 flex flex-col">
                            <button class="bg-[#D9D9D9] rounded-[40px] w-13 h-10 flex items-center justify-center font-semibold hover:cursor-pointer">L</button>
                            <p class="mt-1 font-bold text-[14px] text-center">₱99</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-row justify-between items-start">
                <div class="mt-4 flex flex-col">
                    <h1 class="text-[24px] font-bold">Sugar</h1>
                    <div class="flex flex-row gap-2">
                        <div class="mt-2 bg-[#D9D9D9] rounded-[40px] w-13 h-10 flex items-center justify-center">
                            <button class="hover:cursor-pointer font-semibold text-[14px] text-[#FF8000]">25%</button>
                        </div>
                        <div class="mt-2 bg-[#D9D9D9] rounded-[40px] w-13 h-10 flex items-center justify-center">
                            <button class="hover:cursor-pointer font-semibold text-[14px] text-[#603000]">50%</button>
                        </div>
                        <div class="mt-2 bg-[#D9D9D9] rounded-[40px] w-13 h-10 flex items-center justify-center">
                            <button class="hover:cursor-pointer font-semibold text-[14px] text-[#FF0000]">75%</button>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex flex-col transform translate-x-[-77px]">
                    <h1 class="text-[24px] font-bold">Quantity</h1>
                    <div class="mt-2 bg-[#D9D9D9] rounded-[40px] w-28 h-10 flex flex-row items-center justify-between px-3">
                        <button @click="if(quantity > 1) quantity--" class="hover:cursor-pointer font-bold text-[20px] text-gray-600 hover:text-black">-</button>
                        <input type="number" x-model="quantity" class="bg-transparent w-10 text-center outline-none font-semibold [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" min="1">
                        <button @click="quantity++" class="hover:cursor-pointer font-bold text-[20px] text-gray-600 hover:text-black">+</button>
                    </div>
                </div>
            </div>
        </div>    
        <div class="mt-5 p-4 flex flex-row gap-3">
            <div class="bg-white border border-black flex items-center justify-center rounded-2xl w-40 h-16">
                <button class="font-semibold text-[16px] hover:cursor-pointer">Cancel</button>
            </div>
            <div class="bg-black text-white flex items-center justify-center rounded-2xl w-60 h-16">
                <button class="font-semibold text-[16px] hover:cursor-pointer">Add to Cart</button>
            </div>
        </div>
    </div>
</div>