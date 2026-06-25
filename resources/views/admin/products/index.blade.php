<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between w-full">
            <div>
                <h1 class="font-bold text-lg text-gray-900 tracking-tight">Manage Products</h1>
                <p class="text-xs text-gray-400 mt-0.5">Add solar panels, batteries, and accessories to your inventory.</p>
            </div>
        </div>
    </x-slot>

    <div class="w-full">

        @if(session('success'))
            <div class="flex items-center gap-2 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg px-4 py-3 mb-5 text-sm">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- Summary stats --}}
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm px-5 py-4">
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wider">Total Products</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ method_exists($products, 'total') ? $products->total() : $products->count() }}</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm px-5 py-4">
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wider">Total Stock (this page)</p>
                <p class="text-2xl font-bold text-emerald-600 mt-1">{{ number_format($products->sum('stock')) }}</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm px-5 py-4">
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wider">Low Stock (&lt; 10)</p>
                <p class="text-2xl font-bold text-amber-500 mt-1">{{ $products->where('stock', '<', 10)->count() }}</p>
            </div>
        </div>

        {{-- Toolbar: search (left) + Add Product (right) --}}
        <div class="flex items-center justify-between gap-3 mb-4">
            <div class="relative flex-1 max-w-xs">
                <svg class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"/></svg>
                <input type="text" id="productSearch" placeholder="Search products or SKU…"
                       class="w-full pl-9 pr-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
            </div>
            <a href="{{ route('admin.products.create') }}"
               class="inline-flex items-center gap-1.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold px-4 py-2.5 rounded-lg shadow-sm hover:shadow transition shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                Add Product
            </a>
        </div>

        {{-- Table --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <table class="w-full text-sm" id="productsTable">
                <thead class="bg-gray-50/80 text-gray-400 uppercase text-xs tracking-wider border-b border-gray-100">
                    <tr>
                        <th class="text-left px-6 py-3.5 font-semibold">Product</th>
                        <th class="text-left px-6 py-3.5 font-semibold">SKU</th>
                        <th class="text-left px-6 py-3.5 font-semibold">Stock</th>
                        <th class="text-left px-6 py-3.5 font-semibold">Retail Price</th>
                        <th class="text-left px-6 py-3.5 font-semibold">Trade Price</th>
                        <th class="px-6 py-3.5 text-right font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($products as $product)
                    <tr class="hover:bg-gray-50/70 transition" data-search="{{ Str::lower($product->name . ' ' . $product->sku) }}">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                </div>
                                <span class="font-semibold text-gray-900">{{ $product->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-500 font-mono text-xs">{{ $product->sku ?? '—' }}</td>
                        <td class="px-6 py-4">
                            @if($product->stock < 10)
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 text-amber-700 px-2.5 py-1 text-xs font-medium">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>{{ $product->stock }} units
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 text-emerald-700 px-2.5 py-1 text-xs font-medium">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>{{ $product->stock }} units
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-bold text-gray-900">${{ number_format($product->price, 2) }}</td>
                        <td class="px-6 py-4 font-bold text-emerald-600">${{ number_format($product->installer_price, 2) }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-1.5">
                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                   class="inline-flex items-center gap-1.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold px-3.5 py-2 rounded-lg transition">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    Edit
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to remove this product?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="inline-flex items-center justify-center text-red-600 hover:text-white hover:bg-red-600 border border-red-200 hover:border-red-600 p-2 rounded-lg transition" title="Delete product">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center mb-3">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                </div>
                                <p class="text-gray-500 font-medium">No products registered yet</p>
                                <p class="text-gray-400 text-xs mt-1 mb-4">Click “Add Product” above to populate your inventory.</p>
                                <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-1.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold px-4 py-2 rounded-lg transition">+ Add Product</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            @if($products->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">{{ $products->links() }}</div>
            @endif
        </div>
    </div>

    <script>
        document.getElementById('productSearch')?.addEventListener('input', function (e) {
            const q = e.target.value.toLowerCase().trim();
            document.querySelectorAll('#productsTable tbody tr[data-search]').forEach(row => {
                row.style.display = row.dataset.search.includes(q) ? '' : 'none';
            });
        });
    </script>
</x-app-layout>