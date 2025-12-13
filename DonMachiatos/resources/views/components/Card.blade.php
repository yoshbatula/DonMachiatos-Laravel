<div x-show="showModal === true" 
     x-cloak
     x-init="$watch('showModal', value => { if(value) quantity = 1 })"
     class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-xs bg-white/5"
     @click.self="showModal = false">
    <div class="bg-[#F4F4F4] rounded-[40px] shadow-lg p-8 w-[500px] h-[600px] overflow-hidden">
        <div class="flex flex-col" x-show="selectedProduct">
            <div class="flex flex-row">
                <img :src="selectedProduct ? '/images/products/' + selectedProduct.image : ''" alt="Coffee Image" class="w-50 transform translate-x-[-30px]">
                <div class="flex flex-col">
                    <h1 class="text-[24px] font-semibold uppercase" x-text="selectedProduct?.name"></h1>
                    <div class="text-[#929292]">
                        <span x-text="selectedProduct?.description"></span>
                    </div>
                    <div class="mt-2">
                        <h1 class="font-bold text-[36px]">₱<span x-text="selectedProduct ? selectedProduct.price.toFixed(2) : '0.00'"></span></h1>
                    </div>
                </div>
            </div>

            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="productID" :value="selectedProduct?.id">
                <input type="hidden" name="productName" :value="selectedProduct?.name">
                <input type="hidden" name="productPrice" :value="selectedProduct?.price">
                <input type="hidden" name="productImage" :value="selectedProduct?.image">
                <input type="hidden" name="productMood" x-model="selectedMood">
                <input type="hidden" name="productSize" x-model="selectedSize">
                <input type="hidden" name="productSugar" x-model="selectedSugar">
                <input type="hidden" name="productQuantity" x-model="quantity">
                
                    <div class="flex flex-row justify-between items-start">
                    <div class="mt-4 flex flex-col">
                        <h1 class="text-[24px] font-bold">Mood</h1> 
                        <div class="flex flex-row gap-2">
                            <div class="mt-2 rounded-[40px] w-13 h-10 flex items-center justify-center transition-colors"
                                 :class="selectedMood === 'Hot' ? 'bg-red-200' : 'bg-[#D9D9D9]'">
                                <button type="button" @click="selectedMood = 'Hot'" class="hover:cursor-pointer text-red-800">HOT</button>
                            </div>
                            <div class="mt-2 rounded-[40px] w-13 h-10 flex items-center justify-center transition-colors"
                                 :class="selectedMood === 'Iced' ? 'bg-blue-200' : 'bg-[#D9D9D9]'">
                                <button type="button" @click="selectedMood = 'Iced'" class="hover:cursor-pointer text-black">COLD</button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 flex flex-col">
                        <h1 class="text-[24px] font-bold">Size</h1>
                        <div class="flex flex-row gap-4">
                            <div class="mt-2 flex flex-col">
                                <button type="button" @click="selectedSize = 'Small'" 
                                        class="rounded-[40px] w-13 h-10 flex items-center justify-center font-semibold hover:cursor-pointer transition-colors"
                                        :class="selectedSize === 'Small' ? 'bg-black text-white' : 'bg-[#D9D9D9]'">S</button>
                                <p class="mt-1 font-bold text-[14px] text-center">₱39</p>
                            </div>
                            <div class="mt-2 flex flex-col">
                                <button type="button" @click="selectedSize = 'Medium'" 
                                        class="rounded-[40px] w-13 h-10 flex items-center justify-center font-semibold hover:cursor-pointer transition-colors"
                                        :class="selectedSize === 'Medium' ? 'bg-black text-white' : 'bg-[#D9D9D9]'">M</button>
                                <p class="mt-1 font-bold text-[14px] text-center">₱69</p>
                            </div>
                            <div class="mt-2 flex flex-col">
                                <button type="button" @click="selectedSize = 'Large'" 
                                        class="rounded-[40px] w-13 h-10 flex items-center justify-center font-semibold hover:cursor-pointer transition-colors"
                                        :class="selectedSize === 'Large' ? 'bg-black text-white' : 'bg-[#D9D9D9]'">L</button>
                                <p class="mt-1 font-bold text-[14px] text-center">₱99</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row justify-between items-start">
                    <div class="mt-4 flex flex-col">
                        <h1 class="text-[24px] font-bold">Sugar</h1>
                        <div class="flex flex-row gap-2">
                            <div class="mt-2 rounded-[40px] w-13 h-10 flex items-center justify-center transition-colors"
                                 :class="selectedSugar === '25%' ? 'bg-orange-200' : 'bg-[#D9D9D9]'">
                                <button type="button" @click="selectedSugar = '25%'" class="hover:cursor-pointer font-semibold text-[14px] text-[#FF8000]">25%</button>
                            </div>
                            <div class="mt-2 rounded-[40px] w-13 h-10 flex items-center justify-center transition-colors"
                                 :class="selectedSugar === '50%' ? 'bg-orange-200' : 'bg-[#D9D9D9]'">
                                <button type="button" @click="selectedSugar = '50%'" class="hover:cursor-pointer font-semibold text-[14px] text-[#603000]">50%</button>
                            </div>
                            <div class="mt-2 rounded-[40px] w-13 h-10 flex items-center justify-center transition-colors"
                                 :class="selectedSugar === '75%' ? 'bg-orange-200' : 'bg-[#D9D9D9]'">
                                <button type="button" @click="selectedSugar = '75%'" class="hover:cursor-pointer font-semibold text-[14px] text-[#FF0000]">75%</button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 flex flex-col transform translate-x-[-77px]">
                        <h1 class="text-[24px] font-bold">Quantity</h1>
                        <div class="mt-2 bg-[#D9D9D9] rounded-[40px] w-28 h-10 flex flex-row items-center justify-between px-3">
                            <button type="button" @click="if(quantity > 1) quantity--" class="hover:cursor-pointer font-bold text-[20px] text-gray-600 hover:text-black">-</button>
                            <span x-text="quantity" class="font-semibold text-[16px] w-10 text-center"></span>
                            <button type="button" @click="quantity++" class="hover:cursor-pointer font-bold text-[20px] text-gray-600 hover:text-black">+</button>
                        </div>
                    </div>
                </div>
                <div class="mt-5 p-4 flex flex-row gap-3">
                    <div class="bg-white border border-black flex items-center justify-center rounded-2xl w-40 h-16">
                        <button type="button" @click="showModal = false" class="font-semibold text-[16px] hover:cursor-pointer">Cancel</button>
                    </div>
                    <div class="bg-black text-white flex items-center justify-center rounded-2xl w-60 h-16">
                        <button type="submit" class="font-semibold text-[16px] hover:cursor-pointer">Add to Cart</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>