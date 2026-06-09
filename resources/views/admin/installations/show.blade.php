<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-lg text-gray-900 tracking-tight">Dispatch Management — Job #JOB-{{ $installation->id }}</h1>
            <a href="{{ route('admin.installations.index') }}" class="text-xs text-gray-500 hover:text-gray-700">← Back to Schedule</a>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm rounded-xl font-medium">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-4">
                <h3 class="font-bold text-gray-900 border-b border-gray-100 pb-2">Client Assignment Profile</h3>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-xs text-gray-400 block font-medium">Customer Name</span>
                        <p class="text-gray-900 font-semibold mt-0.5">{{ $installation->customer->name ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400 block font-medium">Fulfillment Location Address</span>
                        <p class="text-gray-900 mt-0.5">{{ $installation->order->shipping_address ?? 'N/A' }}</p>
                    </div>
                </div>
                
                @if($installation->notes)
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <span class="text-xs text-gray-400 block font-medium">Dispatch Operations Notes</span>
                        <p class="text-gray-700 text-sm mt-1 bg-gray-50 p-3 rounded-lg border border-gray-100">{{ $installation->notes }}</p>
                    </div>
                @endif
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="font-bold text-gray-900">Equipment Manifest</h3>
                </div>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-400 font-mono text-[10px] uppercase border-b border-gray-100">
                            <th class="px-6 py-3">Hardware Component</th>
                            <th class="px-6 py-3 text-center">Quantity</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @if($installation->order && $installation->order->orderItems)
                            @foreach($installation->order->orderItems as $item)
                                <tr>
                                    <td class="px-6 py-4 font-semibold text-gray-900 capitalize">
                                        {{ $item->product->name ?? 'Hardware Component' }}
                                    </td>
                                    <td class="px-6 py-4 text-center font-bold text-gray-600">
                                        {{ $item->quantity }}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 h-fit space-y-4">
            <h3 class="font-bold text-gray-900 border-b border-gray-100 pb-2">Technician Assignment Portal</h3>
            
            <form action="{{ route('admin.installations.assign', $installation->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PATCH')
                
                <div>
                    <label for="installer_id" class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Select Certified Installer</label>
                    <select name="installer_id" id="installer_id" class="w-full text-sm rounded-lg border-gray-300 shadow-sm" required>
                        <option value="">-- Choose Field Personnel --</option>
                        @foreach($installers as $installer)
                            <option value="{{ $installer->id }}" {{ $installation->installer_id == $installer->id ? 'selected' : '' }}>
                                {{ $installer->name }} ({{ $installer->email }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="scheduled_date" class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Target Deployment Date</label>
                    <input type="date" name="scheduled_date" id="scheduled_date" 
                           value="{{ $installation->scheduled_date ? $installation->scheduled_date->format('Y-m-d') : '' }}"
                           class="w-full text-sm rounded-lg border-gray-300 shadow-sm" required>
                </div>

                <div>
                    <label for="notes" class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Special Site Instructions</label>
                    <textarea name="notes" id="notes" rows="4" placeholder="Add custom gate access instructions, rooftop details, or hardware handling notes..." class="w-full text-sm rounded-lg border-gray-300 shadow-sm">{{ $installation->notes }}</textarea>
                </div>

                <button type="submit" class="w-full text-center bg-slate-900 hover:bg-slate-800 text-white text-sm font-semibold py-2.5 px-4 rounded-xl transition shadow-sm">
                    Dispatch Field Operations
                </button>
            </form>
        </div>
    </div>
</x-app-layout>