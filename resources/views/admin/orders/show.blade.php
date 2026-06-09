<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-lg text-gray-900 tracking-tight">Process Order #SLS-{{ $order->id }}</h1>
            <a href="{{ route('admin.orders.index') }}" class="text-xs text-gray-500 hover:text-gray-700">← Back to Ledger</a>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm rounded-xl font-medium">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-4">
                <h3 class="font-bold text-gray-900 border-b border-gray-100 pb-2">Shipping Information</h3>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-xs text-gray-400 block font-medium">Destination Address</span>
                        <p class="text-gray-900 mt-1 font-medium">{{ $order->shipping_address }}</p>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400 block font-medium">Contact Phone</span>
                        <p class="text-gray-900 mt-1 font-mono font-medium">{{ $order->contact_phone }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 h-fit space-y-4">
            <h3 class="font-bold text-gray-900 border-b border-gray-100 pb-2">Execution Actions</h3>
            
            <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PATCH')
                
                <div>
                    <label for="status" class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Update Workflow State</label>
                    <select name="status" id="status" class="w-full text-sm rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending Approval</option>
                        <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing / Sent to Installer</option>
                        <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Deployment Completed</option>
                        <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <button type="submit" class="w-full text-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded-lg transition shadow-sm">
                    Commit Status Change
                </button>
            </form>
        </div>
    </div>
</x-app-layout>