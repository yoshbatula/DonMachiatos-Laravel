<div x-show="showDeleteModal === true" 
     x-cloak
     class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-xs bg-white/5"
     @click.self="showDeleteModal = false">
    <div class="bg-[#F4F4F4] rounded-[20px] shadow-lg p-8 w-[500px] h-[200px] overflow-hidden">
        <div class="flex flex-col justify-center items-center">
            <h1 class="font-bold text-[24px]">Are you sure you want to delete this Item?</h1>
            <div class="flex flex-row gap-3 mt-6">
                <button @click="showDeleteModal = false" class="bg-white border border-gray-300 text-black font-semibold w-32 h-12 rounded-[10px] shadow-2xl hover:bg-gray-100 transition">No</button>
                <form :action="'{{ url('cart/delete') }}/' + selectedCartID" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-black text-white font-semibold w-32 h-12 rounded-[10px] shadow-2xl hover:bg-gray-800 transition">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>