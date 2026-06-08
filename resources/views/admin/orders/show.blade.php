<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-xl text-gray-800 tracking-tight">Order Record #SOLA-{{ $order->id }}</h1>
            <a href="{{ route('admin.orders.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">← Back to Logs</a>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-base font-bold text-gray-900 mb-4">Line Items Summary</h3>
                <div class="divide-y divide-gray-100">
                    @foreach($order->items as $item)
                        <div class="py-4 flex justify-between items-center">
                            <div>
                                <p class="font-semibold text-gray-900">{{ $item->product->name }}</p>
                                <p class="text-xs text-gray-400">Quantity Ordered: {{ $item->quantity }} units</p>
                            </div>
                            <p class="font-bold text-gray-900">${{ number_format($item->price * $item->quantity, 2) }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="border-t border-gray-100 pt-4 mt-4 flex justify-between font-bold text-lg text-gray-900">
                    <span>Total Remitted</span>
                    <span>${{ number_format($order->total_amount, 2) }}</span>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-base font-bold text-gray-900 mb-4">Fulfillment Controls</h3>
                <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" class="space-y-4">
                    @csrf @method('PATCH')
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Update Order Status</label>
                        <select name="status" class="w-full rounded-lg border-gray-200 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending Processing</option>
                            <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing Hardware</option>
                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Dispatched / Completed</option>
                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg text-sm transition shadow-sm">
                        Apply Stage Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>