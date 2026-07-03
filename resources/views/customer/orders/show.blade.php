<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('customer.orders.index') }}" class="text-gray-400 hover:text-gray-900 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <h1 class="font-bold text-lg text-gray-900 tracking-tight">Order #SLS-{{ $order->id }}</h1>
        </div>
    </x-slot>

    @php
        $statusStyles = [
            'pending'    => 'bg-amber-50 text-amber-700 ring-amber-200',
            'processing' => 'bg-blue-50 text-blue-700 ring-blue-200',
            'completed'  => 'bg-green-50 text-green-700 ring-green-200',
            'cancelled'  => 'bg-red-50 text-red-600 ring-red-200',
        ];
        $steps = ['pending' => 1, 'processing' => 2, 'completed' => 3];
        $currentStep = $steps[$order->status] ?? 0;
    @endphp

    <div class="max-w-4xl mx-auto space-y-6">

        {{-- Status timeline (hide if cancelled) --}}
        @if($order->status !== 'cancelled')
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
            <div class="flex items-center">
                @foreach(['Pending', 'Processing', 'Completed'] as $i => $label)
                    @php $step = $i + 1; @endphp
                    <div class="flex items-center {{ $step < 3 ? 'flex-1' : '' }}">
                        <div class="flex flex-col items-center">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold
                                {{ $currentStep >= $step ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-400' }}">
                                @if($currentStep > $step || $currentStep == 3)
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                @else
                                    {{ $step }}
                                @endif
                            </div>
                            <span class="text-[11px] font-medium mt-1.5 {{ $currentStep >= $step ? 'text-gray-900' : 'text-gray-400' }}">{{ $label }}</span>
                        </div>
                        @if($step < 3)
                            <div class="flex-1 h-0.5 mx-3 mb-5 {{ $currentStep > $step ? 'bg-green-600' : 'bg-gray-200' }}"></div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="bg-red-50 border border-red-200 rounded-xl p-4 text-sm text-red-700 font-medium">
            This order was cancelled.
        </div>
        @endif

        <div class="grid md:grid-cols-3 gap-6">
            {{-- Order items --}}
            <div class="md:col-span-2 bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100">
                    <h3 class="text-sm font-bold text-gray-900">Order Items</h3>
                </div>
                <div class="divide-y divide-gray-100">
                    @foreach($order->items as $item)
                        <div class="px-6 py-4 flex justify-between items-center">
                            <div>
                                <p class="text-sm font-semibold text-gray-900">{{ $item->product->name ?? 'Product' }}</p>
                                <p class="text-xs text-gray-400 mt-0.5">Qty: {{ $item->quantity }} × ₹{{ number_format($item->price, 2) }}</p>
                            </div>
                            <p class="text-sm font-bold text-gray-900">₹{{ number_format($item->quantity * $item->price, 2) }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="px-6 py-4 bg-gray-50 flex justify-between items-center">
                    <span class="text-sm font-medium text-gray-500">Total</span>
                    <span class="text-base font-bold text-gray-900">₹{{ number_format($order->total_amount, 2) }}</span>
                </div>
            </div>

            {{-- Order info sidebar --}}
            <div class="space-y-6">
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                    <h3 class="text-sm font-bold text-gray-900 mb-4">Order Details</h3>
                    <dl class="space-y-3 text-sm">
                        <div>
                            <dt class="text-xs text-gray-400">Status</dt>
                            <dd class="mt-1">
                                <span class="inline-block text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider ring-1 ring-inset {{ $statusStyles[$order->status] ?? 'bg-gray-100 text-gray-600 ring-gray-200' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-xs text-gray-400">Payment</dt>
                            <dd class="font-semibold {{ $order->payment_status === 'paid' ? 'text-green-700' : 'text-red-600' }}">{{ ucfirst($order->payment_status) }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs text-gray-400">Placed on</dt>
                            <dd class="font-medium text-gray-900">{{ $order->created_at->format('M d, Y \a\t h:i A') }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs text-gray-400">Phone</dt>
                            <dd class="font-medium text-gray-900">{{ $order->phone }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs text-gray-400">Shipping Address</dt>
                            <dd class="font-medium text-gray-900">{{ $order->shipping_address }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>