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

            <div class="flex flex-col h-[70vh] flex flex-col justify-center items-center">
                <div>
                    <h1 class="text-[40px] font-bold">SELECT YOUR PAYMENT OPTION</h1>
                </div>

                <div class="flex flex-row mt-9 gap-5">
                    <form method="POST" action="{{ route('payment.success') }}">
                        @csrf
                        <button type="submit" class="bg-white w-70 h-70 rounded-2xl shadow-md flex flex-col justify-center items-center hover:cursor-pointer focus:outline-none">
                            <h1 class="text-[40px] font-bold">Cashier</h1>
                        </button>
                    </form>
                </div>
            </div>
    </body>
</html>