<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-lg text-gray-900 tracking-tight">Assignment Specs — Job #JOB-{{ $installation->id }}</h1>
            <a href="{{ route('installer.dashboard') }}" class="text-xs text-gray-500 hover:text-gray-700">← Back to Dashboard</a>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm rounded-xl font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
        <div class="lg:col-span-2 space-y-6">
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-4">
                <h3 class="font-bold text-gray-900 border-b border-gray-100 pb-2">Site Overview</h3>
                <div class="space-y-3 text-sm">
                    <div>
                        <span class="text-xs text-gray-400 font-semibold uppercase tracking-wider block">End-User Customer</span>
                        <p class="text-gray-900 font-bold mt-0.5 text-base">{{ $installation->customer->name ?? 'System Customer' }}</p>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400 font-semibold uppercase tracking-wider block">Target Physical Location Address</span>
                        <p class="text-gray-900 mt-0.5 font-medium text-slate-700 bg-slate-50 p-3 rounded-lg border border-slate-100">
                            {{ $installation->order->shipping_address ?? 'No Address Specified' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="font-bold text-gray-900">Equipment Manifest</h3>
                </div>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-400 font-mono text-[10px] uppercase border-b border-gray-100">
                            <th class="px-6 py-3">Solar Hardware Component</th>
                            <th class="px-6 py-3 text-center">Unit Volume Count</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @if($installation->order && $installation->order->orderItems)
                            @foreach($installation->order->orderItems as $item)
                                <tr>
                                    <td class="px-6 py-4 font-bold text-gray-900 capitalize">
                                        {{ $item->product->name ?? 'Hardware Module' }}
                                    </td>
                                    <td class="px-6 py-4 text-center font-black text-emerald-600">
                                        x {{ $item->quantity }}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2" class="p-6 text-center text-gray-400 text-xs">No equipment logs tied to reference node item keys.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 h-fit space-y-4">
            <h3 class="font-bold text-gray-900 border-b border-gray-100 pb-2">Deployment State Control</h3>
            
            <div class="text-sm space-y-3">
                <div>
                    <span class="text-xs text-gray-400 block font-semibold uppercase">Scheduled Execution Date:</span>
                    <p class="text-gray-900 font-bold mt-0.5 text-sm">
                        {{ $installation->scheduled_date ? $installation->scheduled_date->format('F d, Y') : 'TBD' }}
                    </p>
                </div>
                <div>
                    <span class="text-xs text-gray-400 block font-semibold uppercase">Ops Coordinator Instructions:</span>
                    <p class="text-gray-600 text-xs mt-1 bg-amber-50/60 text-amber-900 border border-amber-100 p-3 rounded-lg italic">
                        {{ $installation->notes ?? 'No explicit instructions provided by dispatch manager.' }}
                    </p>
                </div>
            </div>

            @if($installation->status !== 'completed')
                <form action="{{ route('installer.jobs.status', $installation->id) }}" method="POST" class="pt-4 border-t border-gray-100 space-y-4">
                    @csrf
                    @method('PATCH')
                    
                    <div>
                        <label for="status" class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Update On-Site Status</label>
                        <select name="status" id="status" class="w-full text-sm rounded-lg border-gray-300 shadow-sm focus:ring-slate-900 focus:border-slate-900">
                            <option value="assigned" {{ $installation->status === 'assigned' ? 'selected' : '' }}>Assigned (En Route)</option>
                            <option value="scheduled" {{ $installation->status === 'scheduled' ? 'selected' : '' }}>Installation Started</option>
                            <option value="completed" {{ $installation->status === 'completed' ? 'selected' : '' }}>Work Completed ✓</option>
                            <option value="cancelled" {{ $installation->status === 'cancelled' ? 'selected' : '' }}>Cancelled / Delayed</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full text-center bg-slate-900 hover:bg-slate-800 text-white text-sm font-semibold py-2.5 px-4 rounded-xl transition shadow-sm">
                        Save Status Progress
                    </button>
                </form>
            @else
                <div class="mt-4 p-3 bg-emerald-50 border border-emerald-100 text-emerald-800 text-xs font-bold rounded-xl text-center uppercase tracking-wide">
                    ✓ Job Finished on {{ $installation->completed_at ? $installation->completed_at->format('M d, Y @ h:i A') : now()->format('M d, Y') }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>