<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-lg text-gray-900 tracking-tight">Customer Portal</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-8">
        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
            <h2 class="text-base font-bold text-gray-900">Welcome Back, {{ auth()->user()->name }}!</h2>
            <p class="text-sm text-gray-500 mt-1">Monitor your purchased solar hardware components, fulfillment updates, and professional field technician installation schedules.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Your Orders</span>
                    <span class="text-2xl font-bold text-gray-900 mt-1 block">{{ $stats['orders_count'] ?? 0 }} Packages</span>
                </div>
                <div class="p-3 bg-gray-50 border border-gray-100 rounded-xl text-xl">📦</div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Active Setup Jobs</span>
                    <span class="text-2xl font-bold text-gray-900 mt-1 block">{{ $stats['pending_installations'] ?? 0 }} Pending</span>
                </div>
                <div class="p-3 bg-gray-50 border border-gray-100 rounded-xl text-xl">🛠️</div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider">Account Services</h3>
            </div>
            <div class="divide-y divide-gray-100 text-sm">
                <a href="{{ route('customer.orders.index') }}" class="flex items-center justify-between px-6 py-4 hover:bg-gray-50 transition-all">
                    <span class="text-gray-700 font-medium">📋 View Order History & Invoices</span>
                    <span class="text-gray-400 text-xs">Browse ➔</span>
                </a>
                <a href="/" class="flex items-center justify-between px-6 py-4 hover:bg-gray-50 transition-all">
                    <span class="text-gray-700 font-medium">🛒 Open Hardware Shop Catalog</span>
                    <span class="text-gray-400 text-xs">Browse ➔</span>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>