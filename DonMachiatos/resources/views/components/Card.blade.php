<div x-show="showModal" 
     x-cloak
     class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-xs bg-white/5"
     @click.self="showModal = false">
     <div class="bg-white rounded-[40px] shadow-lg p-8 w-[600px] max-h-[80vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-[28px] font-bold">CARAMEL MACCHIATOS</h2>
            <button @click="showModal = false" class="text-gray-500 hover:text-black text-3xl">&times;</button>
        </div>
            
        <div class="flex flex-col gap-4">
            <img src={{ Vite::asset('resources/images/Coffee.svg') }} alt="Coffee Image" class="w-48 h-48 object-contain mx-auto"/>
                
            <p class="text-gray-600 text-[16px]">Chilled milk, espresso, and caramel syrup.</p>
                
            <div class="text-[32px] font-bold">₱39.00</div>
                
            <div class="flex gap-4 mt-4">
                <button @click="showModal = false" class="flex-1 bg-gray-200 text-black rounded-[40px] py-3 text-[18px] font-semibold hover:bg-gray-300">Cancel</button>
                <button class="flex-1 bg-black text-white rounded-[40px] py-3 text-[18px] font-semibold hover:bg-gray-800">Add to Order</button>
            </div>
        </div>
     </div>
</div>