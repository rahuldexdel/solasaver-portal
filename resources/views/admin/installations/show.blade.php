<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-xl text-gray-800 tracking-tight">Dispatch Scheduler Node: JOB-ARR-{{ $installation->id }}</h1>
            <a href="{{ route('admin.installations.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">← Back to Registry</a>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-base font-bold text-gray-900 mb-4">Deployment Infrastructure Details</h3>
                <div class="space-y-4 text-sm">
                    <div>
                        <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wider">Site Mapping Target Destination Address</span>
                        <p class="mt-1 font-medium text-gray-900 bg-gray-50 p-3 rounded-lg border border-gray-100">{{ $installation->shipping_address }}</p>
                    </div>
                    <div>
                        <span class="block text-xs font-semibold text-gray-400 uppercase tracking-wider">Associated Customer Account Profile</span>
                        <p class="mt-1 font-medium text-gray-900">{{ $installation->order->user->name }} ({{ $installation->order->user->email }})</p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-base font-bold text-gray-900 mb-4">Technician Routing Controls</h3>
                <form action="{{ route('admin.installations.assign', $installation->id) }}" method="POST" class="space-y-4">
                    @csrf @method('PATCH')
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Assign Field Engineer</label>
                        <select name="installer_id" required class="w-full rounded-lg border-gray-200 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">-- Select Field Technician --</option>
                            @foreach($installers as $installer)
                                <option value="{{ $installer->id }}" {{ $installation->installer_id == $installer->id ? 'selected' : '' }}>{{ $installer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Target Operations Date</label>
                        <input type="date" name="scheduled_date" required value="{{ $installation->scheduled_date ? $installation->scheduled_date->format('Y-m-d') : '' }}" class="w-full rounded-lg border-gray-200 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg text-sm transition shadow-sm">
                        Dispatch Field Engineer
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>