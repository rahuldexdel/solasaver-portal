<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Product Inventory') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 p-4 bg-emerald-100 text-emerald-800 rounded-lg shadow-sm font-medium">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-6 flex justify-between items-center bg-white p-4 rounded-lg shadow-sm">
                <span class="text-gray-600 text-sm font-medium">Add solar panels, batteries, and accessories here.</span>
                <a href="{{ route('admin.products.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition text-sm shadow-sm">
                    ＋ Add New Product
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Details</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKU</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Retail Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trade Price</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Management Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($products as $product)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div class="font-semibold text-gray-900">{{ $product->name }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $product->sku ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $product->stock }} units</td>
                                <td class="px-6 py-4 text-sm text-gray-900 font-bold">${{ number_format($product->price, 2) }}</td>
                                <td class="px-6 py-4 text-sm text-emerald-600 font-bold">${{ number_format($product->installer_price, 2) }}</td>
                                <td class="px-6 py-4 text-right text-sm font-medium space-x-2">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 px-3 py-1 rounded transition">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to remove this product?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-rose-600 hover:text-rose-900 bg-rose-50 px-3 py-1 rounded transition">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-500 bg-white">
                                    <p class="text-lg font-medium text-gray-600 mb-1">No products registered yet.</p>
                                    <p class="text-sm text-gray-400">Click the "Add New Product" button above to populate your inventory.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @if($products->hasPages())
                    <div class="p-4 border-t border-gray-100 bg-gray-50">{{ $products->links() }}</div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>