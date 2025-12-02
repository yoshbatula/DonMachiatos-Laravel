<div x-show="showModal" 
     x-cloak
     class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-xs bg-white/5"
     @click.self="showModal = false">
    <div class="bg-white rounded-[40px] shadow-lg p-8 w-[500px] h-[600px] overflow-y-auto">
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
            <div class="mt-4 flex flex-col">
                <h1 class="text-[24px] font-bold">Mood</h1>
                <div class="mt-3 bg-[#D9D9D9] rounded-[40px] w-13 h-10 flex items-center justify-center">
                    <button><img src={{ Vite::asset('resources/images/FireLogo.svg') }} alt=""></button>
                </div>
            </div>
        </div>    
    </div>
</div>