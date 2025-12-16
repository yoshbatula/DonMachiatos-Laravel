
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Don Machos</title>
        <meta http-equiv="refresh" content="10;url={{ route('starting.page') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/htmx.org@2.0.8/dist/htmx.min.js" integrity="sha384-/TgkGk7p307TH7EXJDuUlgG3Ce1UVolAOFopFekQkkXihi5u/6OCvVKyz1W+idaz" crossorigin="anonymous"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
            </style>
        @endif
    </head>                               
    <body class="bg-[#F4F4F4]">

            {{-- Header --}}
            <x-header/>
            {{-- Thankkyouuuuu --}}
            <div class="flex flex-col h-[80vh] flex flex-col justify-center items-center">
                <div>
                    <h1 class="text-[40px] font-bold">Your order was successful.</h1>
                </div>
                <div class="bg-white mt-9 w-140 h-60 rounded-2xl shadow-2xl flex justify-center items-center">
                    <div>
                        <p class="text-[48px] font-extrabold">Your order number:</p>
                            <h1 class="text-[80px] font-extrabold text-center">
                                #{{ session('order') ? session('order')->OrderNumber : 'N/A' }}
                            </h1>
                    </div>
                </div>
                <div class="mt-5">
                    <p class="text-[28px] font-medium">Please get your receipt and present it to the cashier</p>
                </div>
            </div>
    </body>
</html>
