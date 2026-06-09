<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} - SolaSaver</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-slate-50 antialiased">

    <main class="max-w-5xl mx-auto px-4 py-16">
        <a href="{{ route('shop') }}" class="text-xs font-bold text-slate-400 hover:text-slate-900 tracking-wide uppercase mb-6 inline-block">← Back to Catalog</a>
        
        <div class="bg-white border border-slate-200 rounded-3xl p-8 lg:p-12 shadow-xl grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="bg-slate-50 border border-slate-100 rounded-2xl py-24 flex items-center justify-center text-8xl">
                📟
            </div>
            
            <div class="space-y-6">
                <span class="text-xs font-bold font-mono text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-md tracking-wider uppercase">In Stock ({{ $product->stock }} units)</span>
                <h1 class="text-3xl font-black text-slate-950 tracking-tight capitalize">{{ $product->name }}</h1>
                <p class="text-base text-slate-600 leading-relaxed">{{ $product->description }}</p>
                
                <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
                    <div>
                        <span class="text-xs text-slate-400 font-medium block">Total Investment</span>
                        <span class="text-3xl font-black text-slate-950">${{ number_format($product->price, 2) }}</span>
                    </div>
                    
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold px-8 py-4 rounded-xl transition shadow-md">
                            Add Hardware to Cart →
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>
</html>