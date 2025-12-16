<div x-show="showCartCancelModal === true" 
     x-cloak
     class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-xs bg-white/5"
     @click.self="showCartCancelModal = false">
     {{-- Cancel Modals --}}
    <div class="bg-[#F4F4F4] rounded-[20px] shadow-lg p-8 w-[500px] h-[200px] overflow-hidden">
        <div class="flex flex-col justify-center items-center">
            <h1 class="font-bold text-[24px]">Are you sure you want to Cancel?</h1>
            <div class="flex flex-row gap-3 mt-6">
                <div class="bg-white flex justify-center items-center text-center w-50 h-12 rounded-[10px] shadow-2xl hover:cursor-pointer" @click="showCartCancelModal = false">
                    <button @click="showCartCancelModal = false" class="hover:cursor-pointer">No</button>
                </div>
                <form action="{{ route('allcart.delete') }}" method="POST">
                    @csrf
                    <div class="bg-black flex justify-center items-center text-center w-50 h-12 rounded-[10px] shadow-2xl hover:cursor-pointer text-white">
                        <button class="hover:cursor-pointer">Yes</button>
                    </div>                
                </form>
            </div>
        </div>
    </div>
</div>