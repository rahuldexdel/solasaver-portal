<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-lg text-gray-900 tracking-tight">System Security Profiles</h1>
    </x-slot>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-3.5 text-left">Profile Identity Details</th>
                    <th class="px-6 py-3.5 text-left">Registration Date</th>
                    <th class="px-6 py-3.5 text-left">Assigned Role</th>
                    <th class="px-6 py-3.5 text-right">Access Controls</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
                @foreach($users as $user)
                    <tr class="hover:bg-gray-50/50 transition-all">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-900">{{ $user->name }}</div>
                            <div class="text-xs text-gray-400">{{ $user->email }}</div>
                        </td>
                        <td class="px-6 py-4 text-gray-500 text-xs">
                            {{ $user->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 text-xs font-bold uppercase rounded tracking-wider bg-gray-100 text-gray-800">
                                {{ $user->role ?? 'Customer' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-gray-600 bg-gray-100 hover:bg-gray-200 px-3 py-1.5 rounded-lg text-xs font-medium transition-all">
                                Adjust Rights
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>