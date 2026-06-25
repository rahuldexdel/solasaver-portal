<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between w-full">
            <div>
                <h1 class="font-bold text-lg text-gray-900 tracking-tight">Manage Pages</h1>
                <p class="text-xs text-gray-400 mt-0.5">Create, edit and organize your site content pages.</p>
            </div>
        </div>
    </x-slot>

    <div class="w-full">

        @if(session('success'))
            <div class="flex items-center gap-2 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg px-4 py-3 mb-5 text-sm">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- Summary stats --}}
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm px-5 py-4">
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wider">Total Pages</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $pages->count() }}</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm px-5 py-4">
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wider">Active</p>
                <p class="text-2xl font-bold text-emerald-600 mt-1">{{ $pages->where('is_active', true)->count() }}</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm px-5 py-4">
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wider">Hidden</p>
                <p class="text-2xl font-bold text-gray-400 mt-1">{{ $pages->where('is_active', false)->count() }}</p>
            </div>
        </div>

        {{-- Toolbar: search (left) + New Page button (right) --}}
        <div class="flex items-center justify-between gap-3 mb-4">
            <div class="relative flex-1 max-w-xs">
                <svg class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"/>
                </svg>
                <input type="text" id="pageSearch" placeholder="Search pages or slugs…"
                       class="w-full pl-9 pr-3 py-2 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
            </div>
            <a href="{{ route('admin.cms.pages.create') }}"
               class="inline-flex items-center gap-1.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold px-4 py-2.5 rounded-lg shadow-sm hover:shadow transition shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                New Page
            </a>
        </div>

        {{-- Table --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <table class="w-full text-sm" id="pagesTable">
                <thead class="bg-gray-50/80 text-gray-400 uppercase text-xs tracking-wider border-b border-gray-100">
                    <tr>
                        <th class="text-left px-6 py-3.5 font-semibold">Page</th>
                        <th class="text-left px-6 py-3.5 font-semibold">Status</th>
                        <th class="px-6 py-3.5 text-right font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($pages as $page)
                    <tr class="hover:bg-gray-50/70 transition group" data-search="{{ Str::lower($page->title . ' ' . $page->slug) }}">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="font-semibold text-gray-900 truncate">{{ $page->title }}</p>
                                    <p class="text-xs text-gray-400 font-mono truncate">/{{ $page->slug }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if($page->is_active)
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 text-emerald-700 px-2.5 py-1 text-xs font-medium">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Active
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 text-gray-500 px-2.5 py-1 text-xs font-medium">
                                    <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>Hidden
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-1.5">
                                <a href="{{ route('admin.cms.pages.edit', $page) }}"
                                   class="inline-flex items-center gap-1.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold px-3.5 py-2 rounded-lg transition">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('admin.cms.pages.destroy', $page) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Delete this page and all its content?')">
                                    @csrf @method('DELETE')
                                    <button class="inline-flex items-center justify-center text-red-600 hover:text-white hover:bg-red-600 border border-red-200 hover:border-red-600 p-2 rounded-lg transition" title="Delete page">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                                <a href="/{{ $page->slug }}" target="_blank"
                                class="inline-flex items-center gap-1.5 text-gray-600 hover:text-gray-900 border border-gray-200 hover:bg-gray-50 text-xs font-semibold px-3 py-2 rounded-lg transition">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    View
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center mb-3">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <p class="text-gray-500 font-medium">No pages yet</p>
                                <p class="text-gray-400 text-xs mt-1 mb-4">Get started by creating your first content page.</p>
                                <a href="{{ route('admin.cms.pages.create') }}" class="inline-flex items-center gap-1.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold px-4 py-2 rounded-lg transition">+ New Page</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Lightweight client-side search --}}
    <script>
        document.getElementById('pageSearch')?.addEventListener('input', function (e) {
            const q = e.target.value.toLowerCase().trim();
            document.querySelectorAll('#pagesTable tbody tr[data-search]').forEach(row => {
                row.style.display = row.dataset.search.includes(q) ? '' : 'none';
            });
        });
    </script>

</x-app-layout>