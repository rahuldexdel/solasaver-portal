<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-lg text-gray-900 tracking-tight">Deployments & Installations</h1>
    </x-slot>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-base font-bold text-gray-900">Deployment Schedule Matrix</h2>
            <p class="text-gray-500 text-xs mt-0.5">Assign certified hardware technicians to pending customer orders.</p>
        </div>

        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-400 font-mono text-[10px] uppercase border-b border-gray-100">
                    <th class="px-6 py-3">Job ID</th>
                    <th class="px-6 py-3">Order Ref</th>
                    <th class="px-6 py-3">Customer</th>
                    <th class="px-6 py-3">Assigned Installer</th>
                    <th class="px-6 py-3">Scheduled Date</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                @forelse($installations as $job)
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4 font-mono text-gray-500">#JOB-{{ $job->id }}</td>
                        <td class="px-6 py-4 font-mono font-bold text-gray-900">#SLS-{{ $job->order_id }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $job->customer->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4">
                            @if($job->installer)
                                <div class="font-semibold text-gray-900">{{ $job->installer->name }}</div>
                            @else
                                <span class="text-xs text-rose-600 bg-rose-50 px-2 py-0.5 rounded font-medium animate-pulse">Unassigned</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            {{ $job->scheduled_date ? $job->scheduled_date->format('M d, Y') : 'Pending Schedule' }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-0.5 text-xs font-bold uppercase rounded-full tracking-wider {{ $job->status === 'pending' ? 'bg-amber-100 text-amber-800' : 'bg-blue-100 text-blue-800' }}">
                                {{ $job->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.installations.show', $job->id) }}" class="text-xs font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 px-3 py-1.5 rounded-lg transition">
                                Manage Dispatch →
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-400">No hardware deployment records found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>