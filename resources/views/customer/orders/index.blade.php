<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-lg text-gray-900 tracking-tight">Your Purchase Ledger</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="mb-6">
            <p class="text-sm text-gray-500">Track your active hardware fulfillment shipments and order receipt documentation.</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden divide-y divide-gray-100">
            @forelse($orders as $order)
                <div class="p-6 flex justify-between items-center hover:bg-gray-50/50 transition-all">
                    <div>
                        <span class="text-xs font-mono font-bold text-gray-400">#SLS-{{ $order->id }}</span>
                        <h4 class="text-sm font-bold text-gray-900 mt-1">Hardware Order Package</h4>
                        <p class="text-xs text-gray-400 mt-0.5">Purchased on {{ $order->created_at->format('M d, Y') }}</p>
                    </div>
                    <div class="text-right flex items-center gap-6">
                        <div>
                            <p class="text-sm font-bold text-gray-900">${{ number_format($order->total_amount, 2) }}</p>
                            <span class="inline-block text-[10px] bg-gray-100 text-gray-700 font-bold px-2 py-0.5 rounded-md uppercase tracking-wider mt-1">
                                {{ $order->payment_status }}
                            </span>
                        </div>
                        <a href="#" class="text-gray-400 hover:text-gray-900 p-2 rounded-lg bg-gray-50 hover:bg-gray-100 transition-all" title="View Details">
                            📄
                        </a>
                    </div>
                </div>
            @empty
                <div class="p-12 text-center text-gray-400">
                    <span class="block text-2xl mb-2">📦</span>
                    <p class="text-sm font-medium text-gray-500">You haven't placed any hardware product orders yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>