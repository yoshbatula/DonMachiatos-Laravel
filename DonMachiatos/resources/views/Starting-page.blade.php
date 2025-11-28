<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Don Machos</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/htmx.org@2.0.8/dist/htmx.min.js" integrity="sha384-/TgkGk7p307TH7EXJDuUlgG3Ce1UVolAOFopFekQkkXihi5u/6OCvVKyz1W+idaz" crossorigin="anonymous"></script>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
            </style>
        @endif
    </head>
    <body>
            <div class="flex items-center justify-center bg-[#F4F4F4] overflow-hidden">
                <button class="hover:cursor-pointer" hx-get="{{ route('dinein') }}" hx-trigger="click" hx-target="body" hx-swap="outerHTML" hx-push-url="true">
                <h1 class="text-black py-20 text-[48px] font-bold">ORDER AND PAY HERE</h1>
                <div class="mt-10 flex flex-row items-center w-[1080px] px-20">
                    {{-- Don Machos Logo --}}
                    <div class="max-w-sm transform translate-x-20">
                        <div class="transform translate-y-[150px]">
                            <img class="w-auto h-auto" src="{{ Vite::asset('resources/images/DonMachos-Logo.png') }}" alt="DonMachos Logo">
                            <h1 class="text-[26px] font-medium text-left mb-8">WELCOME TO DON MACHOS</h1>
                        </div>
                        
                        <div class="mb-5 flex flex-col text-left transform -translate-y-[-150px] space-y-1">
                            <h1 class="text-[60px] font-bold leading-tight">Your Cup of</h1>
                            <h1 class="text-[60px] font-bold leading-tight">Happiness</h1>
                        </div>
                        <div class="flex flex-col text-left space-y-1 transform -translate-y-[-160px]">
                            <p class="text-[20px] leading-snug">THE PERFECT CUP, THE PERFECT VIBE.</p>
                            <p class="text-[20px] leading-snug">COME EXPERIENCE THE DON MACHOS COMMUNITY.</p>
                        </div>
                    </div>
                    {{-- Hand Logo --}}
                    <div class="shrink-0 -translate-y-[10px]">
                        <img class="w-auto h-auto" src="{{ Vite::asset('resources/images/Hand.png') }}" alt="Hand Logo">
                    </div>
                </div>
                <div class="mt-85  bg-black flex flex-row text-center justify-center h-40 items-center w-[1080px]">
                    <h1 class="text-white text-[48px] font-bold">TAP ANYWHERE TO BEGIN</h1>
                </div>
              </button>
         </div>
    </body>
</html>
