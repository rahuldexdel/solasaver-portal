<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-lg text-gray-900 tracking-tight">Site Deployment Assignments</h1>
    </x-slot>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-3.5 text-left">Deployment Token</th>
                    <th class="px-6 py-3.5 text-left">Customer</th>
                    <th class="px-6 py-3.5 text-left">Target Window Date</th>
                    <th class="px-6 py-3.5 text-left">Deployment Status</th>
                    <th class="px-6 py-3.5 text-right">Management</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
                @forelse($installations as $job)
                    <tr class="hover:bg-gray-50/50 transition-all">
                        <td class="px-6 py-4 font-mono text-gray-900 font-semibold">JOB-{{ $job->id }}</td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-900">{{ $job->order->user->name ?? 'N/A' }}</div>
                        </td>
                        <td class="px-6 py-4 text-gray-500 text-xs">
                            {{ $job->scheduled_at ? $job->scheduled_at->format('M d, Y') : 'Unassigned' }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-lg bg-gray-100 text-gray-700 uppercase tracking-wider">
                                {{ $job->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="text-gray-600 bg-gray-100 hover:bg-gray-200 px-2.5 py-1.5 rounded-lg text-xs font-medium transition-all">Assign Specialist</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                            <span class="block text-2xl mb-2">🛠️</span>
                            <p class="text-sm font-medium text-gray-500">No installation tasks currently scheduled.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>