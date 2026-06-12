<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Pipeline Cart - SolaSaver</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased">

@include('layouts.public-header')

    <main class="max-w-5xl mx-auto px-4 py-12">
        <h1 class="text-3xl font-black text-slate-950 tracking-tight mb-8">System Hardware Cart</h1>

        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-medium rounded-xl">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 text-sm font-medium rounded-xl">{{ session('error') }}</div>
        @endif

        @if(count($cart) > 0)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-4">
                    @foreach($cart as $id => $item)
                        <div class="bg-white border border-slate-200 rounded-2xl p-5 flex items-center justify-between shadow-sm">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 bg-slate-100 border border-slate-200 rounded-xl flex items-center justify-center text-2xl">
                                      @if($item['image'])
                                        <img src="{{ asset('storage/' . $item['image']) }}" alt="Product Image" width="150"><br><br>
                                    @else
                                        <p>No image uploaded.</p>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-900 capitalize">{{ $item['name'] }}</h3>
                                    <p class="text-xs font-mono text-slate-400 mt-0.5">{{ $item['sku'] ?? 'SOLASAVE1001' }}</p>                                    <p class="text-sm font-semibold text-emerald-600 mt-1">${{ number_format($item['price'], 2) }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-6">
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 rounded-lg border-slate-200 text-center text-sm p-1">
                                    <button type="submit" class="text-xs bg-slate-100 hover:bg-slate-200 px-2.5 py-1.5 rounded-md font-semibold transition">Update</button>
                                </form>

                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-500 hover:text-rose-700 text-sm font-medium">Remove</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-md h-fit space-y-6">
                    <h3 class="font-bold text-lg text-slate-900">Allocation Summary</h3>
                    <div class="flex justify-between items-center text-sm text-slate-500 border-b border-slate-100 pb-4">
                        <span>Items Subtotal</span>
                        <span class="font-bold text-slate-900">${{ number_format($total, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-base font-bold text-slate-900">Total Valuation</span>
                        <span class="text-2xl font-black text-emerald-600">${{ number_format($total, 2) }}</span>
                    </div>

                    <a href="{{ route('checkout') }}" class="w-full text-center block bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-3 rounded-xl shadow-md transition">
                        Proceed To Checkout →
                    </a>
                </div>
            </div>
        @else
            <div class="bg-white border border-slate-200 rounded-2xl p-12 text-center text-slate-400">
                <span class="text-4xl block mb-2">🛒</span> Your order pipeline is empty. <a href="{{ route('shop') }}" class="text-emerald-500 font-bold ml-1 hover:underline">Browse Products</a>
            </div>
        @endif
    </main>
</body>
</html>