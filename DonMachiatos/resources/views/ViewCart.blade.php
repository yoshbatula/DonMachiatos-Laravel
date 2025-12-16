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
    <body>
        <x-Header/>
        <div 
            x-data="{ 
                showModal: false, 
                showCartCancelModal: false,
                showCardUpdateModal: false,
                showDeleteModal: false,  
                selectedCartID: null, 
                showSuccess: {{ session('success') ? 'true' : 'false' }},
                selectedProduct: null, 
                selectedMood: null, 
                selectedSize: null, 
                selectedSugar: null, 
                quantity: 1, 
                currentPrice: 0 
            }"
            x-init="if(showSuccess){ setTimeout(() => showSuccess = false, 2000) }"
        >
            <x-CartView-Items :carts="$carts"/>
            <x-CartCancelModal />
            <x-Card />
            <x-CardModalUpdate />
            <x-DeleteModal />
            
        </div>
    </body>
</html>
