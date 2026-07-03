<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-lg text-gray-900 tracking-tight">Dashboard</h1>
    </x-slot>

    @php
        $statusStyles = [
            'pending'    => 'bg-amber-50 text-amber-700 ring-amber-200',
            'processing' => 'bg-blue-50 text-blue-700 ring-blue-200',
            'completed'  => 'bg-green-50 text-green-700 ring-green-200',
            'cancelled'  => 'bg-red-50 text-red-600 ring-red-200',
        ];
    @endphp

 <div class="w-full space-y-6">


        {{-- Welcome --}}
        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex items-center justify-between">
            <div>
                <h2 class="text-base font-bold text-gray-900">Welcome back, {{ auth()->user()->name }} 👋</h2>
                <p class="text-sm text-gray-500 mt-1">Here's an overview of your orders and installations.</p>
            </div>
            <a href="{{ route('shop') }}" class="hidden sm:inline-flex items-center gap-2 bg-gray-900 hover:bg-gray-700 text-white text-xs font-bold px-4 py-2.5 rounded-lg transition-all shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.3 4.6a1 1 0 00.9 1.4h12M16 21a1 1 0 100-2 1 1 0 000 2zm-8 0a1 1 0 100-2 1 1 0 000 2z"/>
                </svg>
                Shop Products
            </a>
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <a href="{{ route('customer.orders.index') }}" class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex items-center justify-between hover:border-gray-300 hover:shadow transition-all group">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Total Orders</span>
                    <span class="text-2xl font-bold text-gray-900 mt-1 block">{{ $stats['orders_count'] }}</span>
                </div>
                <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </a>

            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Active Installations</span>
                    <span class="text-2xl font-bold text-gray-900 mt-1 block">{{ $stats['pending_installations'] }}</span>
                </div>
                <div class="w-11 h-11 bg-amber-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.65 2.65 0 1021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085"/>
                    </svg>
                </div>
            </div>

            <a href="{{ route('customer.orders.index') }}" class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex items-center justify-between hover:border-gray-300 hover:shadow transition-all group">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Unpaid Orders</span>
                    <span class="text-2xl font-bold {{ $stats['unpaid_count'] > 0 ? 'text-red-600' : 'text-gray-900' }} mt-1 block">{{ $stats['unpaid_count'] }}</span>
                </div>
                <div class="w-11 h-11 bg-red-50 rounded-xl flex items-center justify-center group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"/>
                    </svg>
                </div>
            </a>
        </div>

        {{-- Recent orders + Account --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden md:col-span-2">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="text-sm font-bold text-gray-900">Recent Orders</h3>
                    <a href="{{ route('customer.orders.index') }}" class="text-xs font-semibold text-gray-400 hover:text-gray-900 transition-all">View all →</a>
                </div>
                <div class="divide-y divide-gray-100">
                    @forelse($recentOrders as $order)
                        <a href="{{ route('customer.orders.show', $order) }}" class="px-6 py-4 flex items-center justify-between hover:bg-gray-50/50 transition-all">
                            <div>
                                <div class="flex items-center gap-2">
                                    <p class="text-sm font-semibold text-gray-900">#SLS-{{ $order->id }}</p>
                                    <span class="inline-block text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider ring-1 ring-inset {{ $statusStyles[$order->status] ?? 'bg-gray-100 text-gray-600 ring-gray-200' }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                                <p class="text-xs text-gray-400 mt-0.5">{{ $order->created_at->format('M d, Y') }}</p>
                            </div>
                            <p class="text-sm font-bold text-gray-900">₹{{ number_format($order->total_amount, 2) }}</p>
                        </a>
                    @empty
                        <div class="px-6 py-10 text-center">
                            <p class="text-sm text-gray-500 font-medium">No orders yet</p>
                            <a href="{{ route('shop') }}" class="text-xs font-bold text-gray-900 underline mt-1 inline-block">Browse products</a>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col justify-between">
                <div>
                    <h2 class="text-sm font-bold text-gray-900 mb-1">Account Settings</h2>
                    <p class="text-gray-500 text-xs leading-relaxed">Update your name, email, password and contact details.</p>
                </div>
                <a href="{{ route('profile.edit') }}" class="mt-4 w-full text-center inline-block bg-gray-900 hover:bg-gray-700 text-white text-xs font-bold py-2.5 px-4 rounded-lg transition-all">
                    Edit Profile
                </a>
            </div>
        </div>
    </div>
</x-app-layout>