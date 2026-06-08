<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold tracking-tight text-gray-950">Field Deployment Hub</h1>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Assigned Workorders</span>
                <span class="text-3xl font-bold text-gray-900 mt-1 block">3</span>
            </div>
            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-xl">
                🛠️
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Awaiting Parts / Action</span>
                <span class="text-3xl font-bold text-gray-900 mt-1 block">1</span>
            </div>
            <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center text-xl">
                ⏳
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Completed This Month</span>
                <span class="text-3xl font-bold text-gray-900 mt-1 block">12</span>
            </div>
            <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center text-xl">
                ✅
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
            <div>
                <h3 class="text-sm font-bold text-gray-900">Your Scheduled Field Installations</h3>
                <p class="text-xs text-gray-400 mt-0.5">Review system compatibility sheets and coordinate client job site parameters.</p>
            </div>
            <a href="{{ route('installer.jobs.index') }}" class="text-xs bg-gray-900 hover:bg-gray-800 text-white font-medium px-4 py-2 rounded-xl transition-all shadow-sm">
                View Workorder Pipeline
            </a>
        </div>

        <div class="divide-y divide-gray-100">
            <div class="p-6 flex flex-col sm:flex-row justify-between sm:items-center gap-4 hover:bg-gray-50/30 transition-all">
                <div class="flex items-start gap-4">
                    <span class="mt-1 p-2 bg-gray-50 rounded-lg text-sm">🏡</span>
                    <div>
                        <div class="flex items-center gap-2">
                            <h4 class="text-sm font-semibold text-gray-900">Residential Solar Saver Setup</h4>
                            <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded bg-blue-50 text-blue-700">Priority</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Client Contact: John Doe • 123 Eco Way, Metroville</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 self-end sm:self-auto">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs font-medium text-gray-900">Scheduled Time</p>
                        <p class="text-[11px] text-gray-400 mt-0.5">Tomorrow at 09:00 AM</p>
                    </div>
                    <a href="#" class="p-2 text-gray-400 hover:text-gray-900 bg-gray-50 rounded-xl hover:bg-gray-100 transition-all text-xs font-medium">
                        Open Map Details ➔
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>