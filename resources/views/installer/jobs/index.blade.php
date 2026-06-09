<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-lg text-gray-900 tracking-tight">Assigned Installation Tasks</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="mb-6">
            <span class="text-xs font-bold tracking-widest text-gray-400 uppercase">Field Specialist Workframe</span>
        </div>

        <div class="space-y-4">
            @forelse($jobs as $job)
                <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm space-y-4 hover:border-gray-300 transition-all">
                    <div class="flex justify-between items-start">
                        <div>
                            <span class="text-xs font-mono bg-gray-100 text-gray-700 font-bold px-2.5 py-1 rounded">
                                📅 Scheduled: {{ $job->scheduled_date ? $job->scheduled_date->format('M d, Y') : 'TBD' }}
                            </span>
                            <h3 class="text-sm font-bold text-gray-900 mt-3.5">Deployment Token: JOB-{{ $job->id }}</h3>
                        </div>
                        <span class="bg-slate-900 text-white text-[10px] tracking-wider font-bold px-2.5 py-1 rounded-md uppercase">
                            {{ $job->status }}
                        </span>
                    </div>
                    
                    <div class="text-xs border-t border-b border-gray-100 py-3 text-gray-600 space-y-1">
                        <p><strong class="text-gray-900">Target Destination Client:</strong> {{ $job->customer->name ?? 'System Customer' }}</p>
                        <p><strong class="text-gray-900">Shipping Address:</strong> {{ $job->order->shipping_address ?? 'Not Specified' }}</p>
                        <p><strong class="text-gray-900">Assigned Node Reference:</strong> System Fulfillment Package (#SLS-{{ $job->order_id }})</p>
                    </div>
                    
                    <div class="flex justify-end gap-2.5 pt-2">
                        <a href="{{ route('installer.jobs.show', $job->id) }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-medium px-4 py-2 rounded-xl transition-all block">
                            View Blueprint
                        </a>

                        @if($job->status !== 'completed')
                            <form action="{{ route('installer.jobs.status', $job->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="completed">
                                <button type="submit" onclick="return confirm('Mark this setup payload execution finalized?')" class="bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-medium px-4 py-2 rounded-xl transition-all shadow-sm">
                                    Mark as Installed
                                </button>
                            </form>
                        @else
                            <button disabled class="bg-emerald-50 text-emerald-700 text-xs font-bold px-4 py-2 rounded-xl cursor-not-allowed">
                                ✓ Deployed
                            </button>
                        @endif
                    </div>
                </div>
            @empty
                <div class="bg-white border border-gray-200 rounded-xl p-12 text-center text-gray-400">
                    <span class="block text-2xl mb-2">🛠️</span>
                    <p class="text-sm font-medium text-gray-500">No dispatched technical field assignments on your log right now.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>