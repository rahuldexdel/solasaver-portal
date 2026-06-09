<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-lg text-gray-900 tracking-tight">Fulfillment Pipeline Ledger</h1>
    </x-slot>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-base font-bold text-gray-900">Incoming System Orders</h2>
            <p class="text-gray-500 text-xs mt-0.5">Manage user purchase items, deploy technician assignments, or approve pipeline changes.</p>
        </div>

        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-400 font-mono text-[10px] uppercase tracking-wider border-b border-gray-100">
                    <th class="px-6 py-3">Order Ref</th>
                    <th class="px-6 py-3">Customer</th>
                    <th class="px-6 py-3">Total Amount</th>
                    <th class="px-6 py-3">Current Status</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                @forelse($orders as $order)
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4 font-mono font-bold text-gray-900">
                            #SLS-{{ $order->id }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-900">{{ $order->user->name ?? 'Guest User' }}</div>
                            <div class="text-xs text-gray-400">{{ $order->user->email ?? '' }}</div>
                        </td>
                        <td class="px-6 py-4 font-bold text-gray-900">
                            ${{ number_format($order->total_amount, 2) }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-0.5 text-xs font-bold uppercase rounded-full tracking-wider {{ $order->status === 'pending' ? 'bg-amber-100 text-amber-800' : 'bg-emerald-100 text-emerald-800' }}">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="text-xs font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 px-3 py-1.5 rounded-lg transition">
                                Process Order →
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-400">No transactions recorded yet in database logs.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>