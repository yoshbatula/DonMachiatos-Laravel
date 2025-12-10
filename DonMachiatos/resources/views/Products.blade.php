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
    <body class="flex flex-col justify-center items-center h-[100vh]">
        <h1 class="text-[48px]">Product page</h1>
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <form action="{{ route('products.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-3">
                    <input type="text" name="ProductName" class="border p-2 w-60" placeholder="ProductName" required>
                    <input type="text" name="ProductDescription" class="border p-2 w-60" placeholder="ProductDescription" required>
                    <input type="number" name="ProductPrice" step="0.01" class="border p-2 w-60" placeholder="ProductPrice" required>
                    <input type="text" name="productType" class="border p-2 w-60" placeholder="ProductType" required>
                    <input type="number" name="StockQuantity" class="border p-2 w-60" placeholder="StockQuantity" required>
                    <input type="file" name="ProductImage" class="border p-2 w-60" accept="image/*,.svg">
                    <button type="submit" class="bg-black text-white p-2 rounded-md mt-4 hover:bg-gray-800">Add Product</button>
                </div>
            </form>
    </body>
</html>
