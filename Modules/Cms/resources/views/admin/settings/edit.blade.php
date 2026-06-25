<x-app-layout>

    <x-slot name="header">
        <div class="w-full">
            <h1 class="font-bold text-lg text-gray-900 tracking-tight">Site Settings</h1>
            <p class="text-xs text-gray-400 mt-0.5">Manage your banner, contact details and social links.</p>
        </div>
    </x-slot>

    <div class="w-full pb-24">

        @if(session('success'))
            <div class="flex items-center gap-2 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg px-4 py-3 mb-5 text-sm">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.cms.settings.update') }}" method="POST">
            @csrf @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                {{-- Announcement banner --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden lg:col-span-2">
                    <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                        <div>
                            <h2 class="text-sm font-semibold text-gray-900">Announcement Banner</h2>
                            <p class="text-xs text-gray-400">Text shown across the top of every page.</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5">Top Banner</label>
                        <input type="text" name="settings[top_banner]" value="{{ setting('top_banner') }}" placeholder="e.g. FREE SHIPPING AUSTRALIA WIDE"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                    </div>
                </div>

                {{-- Contact details --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <h2 class="text-sm font-semibold text-gray-900">Contact Details</h2>
                    </div>
                    <div class="p-6 space-y-5">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Phone</label>
                            <input type="tel" name="settings[contact_phone]" value="{{ setting('contact_phone') }}" placeholder="+61 248 248 2481"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Email</label>
                            <input type="email" name="settings[contact_email]" value="{{ setting('contact_email') }}" placeholder="info@solasaver.com"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                        </div>
                    </div>
                </div>

                {{-- Social media --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                        <h2 class="text-sm font-semibold text-gray-900">Social Media</h2>
                    </div>
                    <div class="p-6 space-y-4">
                        @php
                            $socials = [
                                'facebook_url'  => ['label' => 'Facebook',  'icon' => 'M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z'],
                                'linkedin_url'  => ['label' => 'LinkedIn',  'icon' => 'M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z'],
                                'instagram_url' => ['label' => 'Instagram', 'icon' => 'M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z'],
                                'youtube_url'   => ['label' => 'YouTube',   'icon' => 'M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z'],
                            ];
                        @endphp
                        @foreach($socials as $key => $meta)
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 mb-1.5">{{ $meta['label'] }}</label>
                                <div class="flex items-center rounded-lg border border-gray-300 focus-within:ring-2 focus-within:ring-emerald-500 focus-within:border-emerald-500 transition overflow-hidden">
                                    <span class="px-3 py-2.5 bg-gray-50 text-gray-400 border-r border-gray-200">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="{{ $meta['icon'] }}"/></svg>
                                    </span>
                                    <input type="url" name="settings[{{ $key }}]" value="{{ setting($key) }}" placeholder="https://"
                                           class="flex-1 px-3 py-2.5 text-sm outline-none">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Sticky save bar --}}
            <div class="sticky bottom-4 z-10 mt-6">
                <div class="bg-white shadow-lg border border-gray-200 rounded-xl px-5 py-3 flex items-center justify-between">
                    <span class="text-xs text-gray-500">Changes apply across the whole site once saved.</span>
                    <button type="submit" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-6 py-2.5 rounded-lg transition shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Save Settings
                    </button>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>