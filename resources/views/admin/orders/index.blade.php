<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-lg text-gray-900 tracking-tight">Fulfillment Orders Ledger</h1>
    </x-slot>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-3.5 text-left">Order ID</th>
                    <th class="px-6 py-3.5 text-left">Customer / Account</th>
                    <th class="px-6 py-3.5 text-left">Total Amount</th>
                    <th class="px-6 py-3.5 text-left">Payment Status</th>
                    <th class="px-6 py-3.5 text-left">Date Placed</th>
                    <th class="px-6 py-3.5 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
                @forelse($orders as $order)
                    <tr class="hover:bg-gray-50/50 transition-all">
                        <td class="px-6 py-4 font-mono font-semibold text-gray-900">#SLS-{{ $order->id }}</td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-900">{{ $order->user->name ?? 'Guest User' }}</div>
                            <div class="text-xs text-gray-400">{{ $order->user->email ?? 'N/A' }}</div>
                        </td>
                        <td class="px-6 py-4 font-bold text-gray-900">${{ number_format($order->total_amount, 2) }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-lg {{ $order->payment_status === 'paid' ? 'bg-gray-100 text-gray-800' : 'bg-amber-50 text-amber-700' }}">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500 text-xs">{{ $order->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="text-gray-600 bg-gray-100 hover:bg-gray-200 px-3 py-1.5 rounded-lg text-xs font-medium transition-all">Inspect</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                            <span class="block text-2xl mb-2">📋</span>
                            <p class="text-sm font-medium text-gray-500">No client orders recorded in the platform database.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>