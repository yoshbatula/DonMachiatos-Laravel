<div class="mt-2 flex flex-row transform translate-x-[50px]">
    <div class="bg-white w-187 h-60 rounded-[40px] shadow-md">
        <div class="flex flex-row justify-between items-center justify-items-center p-5">
            <h1 class="text-[24px] font-medium">YOUR ORDER</h1>
            <button class="bg-black text-white rounded-[40px] w-37 h-9">VIEW CART</button>
        </div>
        <div class="w-full border-t border-gray-300"></div>
        <div class="overflow-y-scroll [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none] h-32">
            <div class="flex flex-row p-4 gap-3">
                <div class="bg-[#F4F1EE] w-30 h-25 rounded-2xl">
                    <img class="w-full h-full object-contain" src="{{ Vite::asset('resources/images/DonDarko.svg') }}" alt="Order Image">
                </div>
                <div class="flex flex-col flex-1">
                    <h1 class="font-semibold text-[20px]">DON DARKO</h1>
                    <div class="flex-row text-[13px] text-[#90571C]">
                        <span>SMALL |</span>
                        <span>ICED |</span>
                        <span>25% </span>
                    </div>
                    <div class="mt-2 flex flex-row justify-between">
                        <p class="font-semibold text-[20px]">x1</p>
                        <p class="font-bold text-[16px]">TOTAL: ₱39.00</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-row p-4 gap-3">
                <div class="bg-[#F4F1EE] w-30 h-25 rounded-2xl">
                    <img class="w-full h-full object-contain" src="{{ Vite::asset('resources/images/DonDarko.svg') }}" alt="Order Image">
                </div>
                <div class="flex flex-col flex-1">
                    <h1 class="font-semibold text-[20px]">DON DARKO</h1>
                    <div class="flex-row text-[13px] text-[#90571C]">
                        <span>SMALL |</span>
                        <span>ICED |</span>
                        <span>25% </span>
                    </div>
                    <div class="mt-2 flex flex-row justify-between">
                        <p class="font-semibold text-[20px]">x1</p>
                        <p class="font-bold text-[16px]">TOTAL: ₱39.00</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full border-t border-gray-300"></div>
        <div class="flex flex-row justify-center mt-2">
            <img src={{ Vite::asset('resources/images/ArrowDown.svg') }} alt="Arrow Down" class="w-5">
        </div>
    </div>
</div>