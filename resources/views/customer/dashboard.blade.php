<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-lg text-gray-900 tracking-tight">Customer Portal</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-6">
        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
            <h2 class="text-base font-bold text-gray-900">Welcome Back, {{ auth()->user()->name }}!</h2>
            <p class="text-sm text-gray-500 mt-1">Monitor your purchased solar hardware components, fulfillment updates, and professional field technician installation schedules.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Your Orders</span>
                    <span class="text-2xl font-bold text-gray-900 mt-1 block">{{ $stats['orders_count'] }} Packages</span>
                </div>
                <div class="p-3 bg-gray-50 border border-gray-100 rounded-xl text-xl">📦</div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Active Setup Jobs</span>
                    <span class="text-2xl font-bold text-gray-900 mt-1 block">{{ $stats['pending_installations'] }} Active</span>
                </div>
                <div class="p-3 bg-gray-50 border border-gray-100 rounded-xl text-xl">🛠️</div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden md:col-span-2 flex flex-col justify-between">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider">Account Services</h3>
                </div>
                <div class="divide-y divide-gray-100 text-sm h-full flex flex-col justify-center">
                    <a href="{{ route('shop') }}" class="flex items-center justify-between px-6 py-4 hover:bg-gray-50 transition-all">
                        <span class="text-gray-700 font-medium">🛒 Open Hardware Shop Catalog</span>
                        <span class="text-gray-400 text-xs">Browse ➔</span>
                    </a>
                    <div class="px-6 py-4 flex items-center justify-between text-gray-400 italic text-xs bg-gray-50/20">
                        <span>Fulfillment tracking status sync active via live relational databases.</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col justify-between">
                <div>
                    <h2 class="text-base font-bold text-gray-900 mb-1">Account & Security</h2>
                    <p class="text-gray-500 text-xs leading-relaxed">Manage your personal operator specifications, alter credentials, or terminate sessions.</p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('profile.edit') }}" class="w-full text-center inline-block bg-slate-900 hover:bg-slate-800 text-white text-xs font-semibold py-2.5 px-4 rounded-xl transition shadow-sm">
                        Edit Profile Details
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>