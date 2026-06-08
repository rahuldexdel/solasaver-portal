<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-lg text-gray-900 tracking-tight">Hardware Catalog</h1>
    </x-slot>

    <div class="max-w-7xl mx-auto">
        <div class="mb-8">
            <p class="text-sm text-gray-500">Premium commercial-grade smart solar diverters, system splitters, and components.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($products as $product)
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 flex flex-col justify-between hover:border-gray-300 transition-all">
                    <div>
                        <div class="h-40 bg-gray-50 rounded-lg mb-4 flex items-center justify-center text-4xl select-none">
                            📟
                        </div>
                        <span class="text-[10px] font-mono bg-gray-100 text-gray-600 px-2 py-1 rounded font-bold uppercase tracking-wider">
                            {{ $product->sku }}
                        </span>
                        <h3 class="text-base font-bold text-gray-900 mt-2.5">{{ $product->name }}</h3>
                        <p class="text-gray-500 text-xs mt-1 mb-4 leading-relaxed line-clamp-3">
                            {{ $product->description ?? 'No product details provided.' }}
                        </p>
                    </div>
                    
                    <div class="flex items-center justify-between border-t border-gray-100 pt-4 mt-2">
                        <div class="flex flex-col">
                            <span class="text-xs text-gray-400 font-medium">Retail Price</span>
                            <span class="text-xl font-bold text-gray-900">${{ number_format($product->retail_price, 2) }}</span>
                        </div>
                        <button class="bg-gray-900 hover:bg-gray-800 text-white font-medium text-xs px-4 py-2.5 rounded-xl transition-all shadow-sm">
                            Add to Cart
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-3 bg-white border border-gray-200 rounded-xl p-12 text-center text-gray-400">
                    <span class="block text-3xl mb-2">🛒</span>
                    <p class="text-sm font-medium text-gray-500">The catalog is currently undergoing maintenance. Check back shortly!</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>