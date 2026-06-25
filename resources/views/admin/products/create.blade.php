<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3 w-full">
            <a href="{{ route('admin.products.index') }}"
               class="inline-flex items-center justify-center w-8 h-8 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 hover:text-gray-700 transition" title="Back to products">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h1 class="font-bold text-lg text-gray-900 tracking-tight">Add Product</h1>
                <p class="text-xs text-gray-400 mt-0.5">Register a new item in your catalog.</p>
            </div>
        </div>
    </x-slot>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="w-full">
        @csrf

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg px-4 py-3 mb-5 text-sm">
                <p class="font-semibold mb-1">Please fix the following:</p>
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

            {{-- Left: main content --}}
            <div class="lg:col-span-2 space-y-5">

                {{-- Product details --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100">
                        <h2 class="text-sm font-semibold text-gray-900">Product Details</h2>
                        <p class="text-xs text-gray-400 mt-0.5">Basic information about this product.</p>
                    </div>
                    <div class="p-6 space-y-5">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Product Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. SolaSaver Diverter"
                                   class="w-full border @error('name') border-red-300 @else border-gray-300 @enderror rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                            @error('name')<p class="text-red-600 text-xs mt-1.5">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Description</label>
                            <textarea name="description" rows="4" placeholder="Short product description shown to customers."
                                      class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition resize-none">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Pricing & inventory --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100">
                        <h2 class="text-sm font-semibold text-gray-900">Pricing &amp; Inventory</h2>
                        <p class="text-xs text-gray-400 mt-0.5">Set prices and available stock.</p>
                    </div>
                    <div class="p-6 space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Retail Price ($) <span class="text-red-500">*</span></label>
                                <div class="flex items-center rounded-lg border @error('price') border-red-300 @else border-gray-300 @enderror focus-within:ring-2 focus-within:ring-emerald-500 focus-within:border-emerald-500 transition overflow-hidden">
                                    <span class="px-3 py-2.5 bg-gray-50 text-gray-400 text-sm border-r border-gray-200">$</span>
                                    <input type="number" step="0.01" name="price" value="{{ old('price') }}" required placeholder="0.00" class="flex-1 px-3 py-2.5 text-sm outline-none">
                                </div>
                                @error('price')<p class="text-red-600 text-xs mt-1.5">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Trade Installer Price ($)</label>
                                <div class="flex items-center rounded-lg border border-gray-300 focus-within:ring-2 focus-within:ring-emerald-500 focus-within:border-emerald-500 transition overflow-hidden">
                                    <span class="px-3 py-2.5 bg-gray-50 text-gray-400 text-sm border-r border-gray-200">$</span>
                                    <input type="number" step="0.01" name="installer_price" value="{{ old('installer_price') }}" placeholder="0.00" class="flex-1 px-3 py-2.5 text-sm outline-none">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Available Stock <span class="text-red-500">*</span></label>
                                <input type="number" name="stock" value="{{ old('stock') }}" required placeholder="0"
                                       class="w-full border @error('stock') border-red-300 @else border-gray-300 @enderror rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                                @error('stock')<p class="text-red-600 text-xs mt-1.5">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1.5">SKU Code</label>
                                <input type="text" name="sku" value="{{ old('sku') }}" placeholder="e.g. SOLSAVE1001"
                                       class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm font-mono focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: sidebar --}}
            <div class="space-y-5">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100">
                        <h2 class="text-sm font-semibold text-gray-900">Product Image</h2>
                    </div>
                    <div class="p-6">
                        <label class="flex flex-col items-center justify-center w-full border-2 border-dashed border-gray-300 rounded-lg py-8 cursor-pointer hover:bg-gray-50 transition">
                            <svg class="w-8 h-8 text-gray-300 mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="text-xs text-gray-500">Click to upload an image</span>
                            <input type="file" name="image" accept="image/*" class="hidden">
                        </label>
                        <p class="text-xs text-gray-400 mt-2">JPG, PNG or WebP. Optional.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-3">
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-6 py-2.5 rounded-lg transition shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Save Product
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="w-full inline-flex items-center justify-center text-sm font-medium text-gray-500 hover:text-gray-700 px-6 py-2.5 rounded-lg border border-gray-200 hover:bg-gray-50 transition">Cancel</a>
                </div>
            </div>

        </div>
    </form>

</x-app-layout>