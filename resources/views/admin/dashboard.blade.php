<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-lg text-gray-900 tracking-tight">System Monitoring Center</h1>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Revenue</p>
                <h3 class="text-2xl font-bold text-gray-900 mt-1">${{ number_format($stats['revenue'] ?? 0, 2) }}</h3>
            </div>
            <div class="p-3 rounded-xl bg-gray-100 text-gray-600 text-lg">💰</div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Orders</p>
                <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['orders_count'] ?? 0 }}</h3>
            </div>
            <div class="p-3 rounded-xl bg-gray-100 text-gray-600 text-lg">📋</div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Active Items</p>
                <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['products_count'] ?? 0 }} items</h3>
            </div>
            <div class="p-3 rounded-xl bg-gray-100 text-gray-600 text-lg">📦</div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">System Users</p>
                <h3 class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['users_count'] ?? 1 }} users</h3>
            </div>
            <div class="p-3 rounded-xl bg-gray-100 text-gray-600 text-lg">👥</div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h2 class="text-base font-bold text-gray-900 mb-1">Welcome Back, Operational Director!</h2>
        <p class="text-gray-500 text-sm leading-relaxed">The solar infrastructure system framework is live. Use the new slate-gray left sidebar to adjust system assets, process hardware fulfillment pipelines, or control technician assignments.</p>
    </div>
</x-app-layout>