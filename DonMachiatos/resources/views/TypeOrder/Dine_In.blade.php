<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Don Machos</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="icon" href="{{ Vite::asset('resources/images/DonMachos-Logo1.svg') }}" type="image/svg+xml">
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/htmx.org@2.0.8/dist/htmx.min.js" integrity="sha384-/TgkGk7p307TH7EXJDuUlgG3Ce1UVolAOFopFekQkkXihi5u/6OCvVKyz1W+idaz" crossorigin="anonymous"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <style>
            [x-cloak] { display: none !important; }
        </style>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
            </style>
        @endif
    </head>
    <body class="bg-[#F4F4F4]" x-data="{ showModal: false, quantity: 1 }">
        <div class="min-h-screen bg-[#F4F4F4]">
            {{-- Header --}}
            <x-header />

            <div class="mt-12 px-[50px]">
                <h1 class="font-bold text-[37px]">DON MACHOS MENU</h1>
            </div>

            {{-- Menu --}}
            <x-Menu />

            {{-- Order Details --}}
            <x-Order-Details />

            {{-- Buttons --}}
            <div class="mt-3 flex flex-row gap-6 transform translate-x-[60px]">
                <div class="bg-white border border-black w-50 h-20 flex items-center justify-center rounded-2xl">
                    <button class="text-[20px] font-bold hover:cursor-pointer">CANCEL</button>
                </div>
                <div class="bg-black text-white w-70 h-20 flex items-center justify-center rounded-2xl">
                    <button class="font-bold text-[20px] hover:cursor-pointer">PROCEED TO CHECKOUT</button>
                </div>
                <div class="bg-white border border-black flex flex-col w-50 h-20 items-center justify-center rounded-2xl">
                    <p class="font-medium text-[14px]">ORDER TOTAL</p>
                    <h1 class="font-bold text-[24px]">₱39.00</h1>
                </div>
            </div>
        </div>
    </body>
</html>
