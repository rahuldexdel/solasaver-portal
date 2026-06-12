<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SolaSaver - Hardware Catalog</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased">

@include('layouts.public-header')

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-10 text-center max-w-xl mx-auto">
            <h1 class="text-3xl font-black text-slate-950 tracking-tight sm:text-4xl">Hardware & Solar Diverters</h1>
            <p class="text-sm text-slate-500 mt-2">Premium commercial-grade smart solar diverters, system splitters, and home integration hardware panels.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($products as $product)
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
                    <div>
                        <div class="w-full bg-slate-50 rounded-xl py-12 flex items-center justify-center text-5xl border border-slate-100 mb-4">
                          @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="150"><br><br>
                        @else
                            <p>No image uploaded.</p>
                        @endif
                        </div>
                        <span class="text-[10px] font-mono tracking-widest uppercase bg-slate-100 text-slate-600 px-2 py-0.5 rounded font-bold">
                            {{ $product->sku ?? 'SOLASAVE1001' }}
                        </span>
                        <h2 class="text-xl font-bold text-slate-900 mt-2 capitalize hover:text-emerald-600">
                            <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                        </h2>
                        <p class="text-sm text-slate-500 mt-1 line-clamp-2">{{ $product->description }}</p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <span class="text-xs text-slate-400 block font-medium">Retail Price</span>
                            <span class="text-xl font-black text-slate-900">${{ number_format($product->price, 2) }}</span>
                        </div>
                        
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition shadow-sm">
                                Add To Cart
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white border border-slate-200 rounded-2xl p-12 text-center text-slate-400">
                    No hardware assets available in stock right now.
                </div>
            @endforelse
        </div>
    </main>

</body>
</html>