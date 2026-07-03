<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-lg text-gray-900 tracking-tight">My Orders</h1>
    </x-slot>

   <div class="w-full space-y-6">
        <div class="mb-6 flex items-center justify-between">
            <p class="text-sm text-gray-500">Track your orders, payments and delivery status.</p>
            <span class="text-xs font-medium text-gray-400">{{ $orders->count() }} {{ Str::plural('order', $orders->count()) }}</span>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden divide-y divide-gray-100">
            @forelse($orders as $order)
                @php
                    $statusStyles = [
                        'pending'    => 'bg-amber-50 text-amber-700 ring-amber-200',
                        'processing' => 'bg-blue-50 text-blue-700 ring-blue-200',
                        'completed'  => 'bg-green-50 text-green-700 ring-green-200',
                        'cancelled'  => 'bg-red-50 text-red-600 ring-red-200',
                    ];
                    $paymentStyles = [
                        'unpaid' => 'bg-red-50 text-red-600',
                        'paid'   => 'bg-green-50 text-green-700',
                    ];
                @endphp

                <a href="{{ route('customer.orders.show', $order) }}"
                   class="p-6 flex justify-between items-center hover:bg-gray-50/50 transition-all group">
                    <div class="flex items-start gap-4">
                        {{-- Icon --}}
                        <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h4 class="text-sm font-bold text-gray-900">Order #SLS-{{ $order->id }}</h4>
                                <span class="inline-block text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider ring-1 ring-inset {{ $statusStyles[$order->status] ?? 'bg-gray-100 text-gray-600 ring-gray-200' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                            <p class="text-xs text-gray-400 mt-1">
                                Placed {{ $order->created_at->format('M d, Y') }}
                                &middot; {{ $order->items_count }} {{ Str::plural('item', $order->items_count) }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-5">
                        <div class="text-right">
                            <p class="text-sm font-bold text-gray-900">₹{{ number_format($order->total_amount, 2) }}</p>
                            <span class="inline-block text-[10px] font-bold px-2 py-0.5 rounded-md uppercase tracking-wider mt-1 {{ $paymentStyles[$order->payment_status] ?? 'bg-gray-100 text-gray-600' }}">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </div>
                        <svg class="w-4 h-4 text-gray-300 group-hover:text-gray-600 group-hover:translate-x-0.5 transition-all" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </a>
            @empty
                <div class="p-12 text-center">
                    <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <p class="text-sm font-medium text-gray-600">No orders yet</p>
                    <p class="text-xs text-gray-400 mt-1 mb-4">When you place an order, it will show up here.</p>
                    <a href="{{ url('/') }}" class="inline-block text-xs font-bold text-white bg-gray-900 px-4 py-2 rounded-lg hover:bg-gray-700 transition-all">
                        Browse Products
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>