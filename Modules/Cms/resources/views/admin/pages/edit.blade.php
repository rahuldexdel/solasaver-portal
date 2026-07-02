<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.cms.pages.index') }}"
                   class="inline-flex items-center justify-center w-8 h-8 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 transition" title="Back to all pages">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </a>
                <div>
                    <h1 class="font-bold text-lg text-gray-900 tracking-tight">{{ $page->title }}</h1>
                    <p class="text-xs text-gray-400">/{{ $page->slug }}</p>
                </div>
            </div>
            <a href="/{{ $page->slug }}" target="_blank"
               class="inline-flex items-center gap-1.5 text-xs font-semibold text-gray-600 border border-gray-300 hover:bg-gray-100 px-4 py-2 rounded-lg transition">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                View live page
            </a>
        </div>
    </x-slot>

    <div class="w-full pb-28">

        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg px-4 py-3 mb-4 text-sm flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-blue-50 border border-blue-200 text-blue-800 rounded-lg px-4 py-3 mb-6 text-sm flex items-start gap-2">
            <svg class="w-4 h-4 mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span>
                <strong>Quick tip:</strong> wrap words in
                <code class="bg-white px-1.5 py-0.5 rounded text-emerald-700 border border-blue-200">[[ ]]</code>
                to highlight them green, e.g. <code class="bg-white px-1.5 py-0.5 rounded text-emerald-700 border border-blue-200">How [[SolaSaver]] Works</code>.
                In body text, press Enter twice to start a new paragraph.
            </span>
        </div>

        {{-- ===== MAIN UPDATE FORM ===== --}}
        <form action="{{ route('admin.cms.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            {{-- Page settings --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-5">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <h2 class="text-sm font-semibold text-gray-900">Page settings</h2>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Page title</label>
                            <input type="text" name="title" value="{{ old('title', $page->title) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Template <span class="text-gray-400 font-normal">— controls the page layout</span></label>
                            <select name="template" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                            @foreach(\Modules\Cms\Models\Page::templates() as $key => $label)
                                <option value="{{ $key }}" {{ old('template', $page->template) === $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Meta title <span class="text-gray-400 font-normal">(browser tab / Google)</span></label>
                            <input type="text" name="meta_title" value="{{ old('meta_title', $page->meta_title) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Visibility</label>
                            <label class="flex items-center gap-2 text-sm text-gray-700 border border-gray-300 rounded-lg px-3 py-2.5 cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" {{ $page->is_active ? 'checked' : '' }} class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                                Page is visible on the site
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1.5">Meta description <span class="text-gray-400 font-normal">(search engine snippet)</span></label>
                        <textarea name="meta_description" rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none resize-none">{{ old('meta_description', $page->meta_description) }}</textarea>
                    </div>
                </div>
            </div>

            {{-- ===== SECTIONS ===== --}}
            <div class="flex items-center justify-between mt-6 mb-3">
                <h2 class="text-sm font-bold text-gray-700 uppercase tracking-wider">Page sections</h2>
                <button type="button" onclick="cmsExpandAll()" class="text-xs font-semibold text-emerald-700 hover:underline">Expand / collapse all</button>
            </div>

            @forelse($page->sections as $section)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-3 overflow-hidden" data-cms-section>
                <div class="flex items-center justify-between px-5 py-3 {{ $section->is_active ? '' : 'bg-gray-50' }}">
                    <button type="button" onclick="cmsToggle({{ $section->id }})" class="flex items-center gap-3 text-left flex-1 min-w-0">
                        <svg id="cms-chev-{{ $section->id }}" class="w-4 h-4 text-gray-400 shrink-0 transition-transform {{ $loop->first ? 'rotate-180' : '' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                        <span class="min-w-0">
                            <span class="block text-sm font-semibold text-gray-900 truncate">
                                {{ $section->name }}
                                @unless($section->is_active)<span class="text-xs font-normal text-gray-400">(hidden)</span>@endunless
                            </span>
                            <span class="block text-xs text-gray-400 truncate">{{ Str::limit(strip_tags($section->heading ?: $section->body), 70) ?: 'No heading — click to edit' }}</span>
                        </span>
                    </button>
                    <button type="submit" form="del-section-{{ $section->id }}" onclick="event.stopPropagation(); return confirm('Delete this entire section?')" class="ml-3 shrink-0 text-xs font-medium text-red-600 hover:text-white hover:bg-red-600 border border-red-200 hover:border-red-600 rounded-lg px-3 py-1.5 transition">Delete</button>
                </div>

                <div id="cms-body-{{ $section->id }}" class="border-t border-gray-100 p-5 {{ $loop->first ? '' : 'hidden' }}">

                    <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider mb-2">Content</p>

                    <label class="block text-xs font-semibold text-gray-500 mb-1">Heading</label>
                    <input type="text" name="sections[{{ $section->id }}][heading]" value="{{ $section->heading }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm mb-3 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">

                    <label class="block text-xs font-semibold text-gray-500 mb-1">Subheading</label>
                    <input type="text" name="sections[{{ $section->id }}][subheading]" value="{{ $section->subheading }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm mb-3 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">

                    <label class="block text-xs font-semibold text-gray-500 mb-1">Body text</label>
                    <textarea name="sections[{{ $section->id }}][body]" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm mb-4 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none resize-none">{{ $section->body }}</textarea>

                    <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider mb-2">Buttons <span class="normal-case font-normal">(leave blank to hide)</span></p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                        <div class="border border-gray-200 rounded-lg p-3 bg-gray-50">
                            <label class="block text-xs font-semibold text-gray-500 mb-1">Button 1 label</label>
                            <input type="text" name="sections[{{ $section->id }}][button_text]" value="{{ $section->button_text }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm mb-2 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                            <label class="block text-xs font-semibold text-gray-500 mb-1">Button 1 link</label>
                            <input type="text" name="sections[{{ $section->id }}][button_url]" value="{{ $section->button_url }}" placeholder="/where-to-buy or #" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                        </div>
                        <div class="border border-gray-200 rounded-lg p-3 bg-gray-50">
                            <label class="block text-xs font-semibold text-gray-500 mb-1">Button 2 label</label>
                            <input type="text" name="sections[{{ $section->id }}][button_text2]" value="{{ $section->button_text2 }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm mb-2 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                            <label class="block text-xs font-semibold text-gray-500 mb-1">Button 2 link</label>
                            <input type="text" name="sections[{{ $section->id }}][button_url2]" value="{{ $section->button_url2 }}" placeholder="/compatibility or #" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                        </div>
                    </div>

                    <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider mb-2">Image</p>
                    <div class="flex items-center gap-4 mb-4">
                        @if($section->image_url)
                            <img src="{{ $section->image_url }}" class="w-24 h-24 object-cover rounded-lg border border-gray-200">
                        @else
                            <div class="w-24 h-24 rounded-lg border border-dashed border-gray-300 flex items-center justify-center text-gray-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                        @endif
                        <input type="file" name="sections[{{ $section->id }}][image]" class="flex-1 text-sm text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                    </div>

                    <label class="inline-flex items-center gap-2 text-sm text-gray-600">
                        <input type="checkbox" name="sections[{{ $section->id }}][is_active]" value="1" {{ $section->is_active ? 'checked' : '' }} class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                        Show this section on the page
                    </label>

                    {{-- Items --}}
                    <div class="mt-5 pt-5 border-t border-gray-100">
                        <div class="flex items-center justify-between mb-3">
                            <p class="text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Repeatable items <span class="normal-case font-normal">({{ $section->items->count() }})</span></p>
                            <button type="submit" form="add-item-{{ $section->id }}" class="text-xs font-semibold text-emerald-700 border border-emerald-200 hover:bg-emerald-50 rounded-lg px-3 py-1.5 transition">+ Add item</button>
                        </div>
                        @forelse($section->items as $item)
                            @include('cms::admin.pages._item', ['item' => $item])
                        @empty
                            <p class="text-xs text-gray-400 italic">No items yet. Click "+ Add item" to create one (icon boxes, cards, list points, etc.).</p>
                        @endforelse
                    </div>
                </div>
            </div>
            @empty
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 mb-4 text-center">
                    <p class="text-sm text-gray-500">This page has no sections yet. Add your first one below.</p>
                </div>
            @endforelse

            {{-- Sticky save bar --}}
            <div class="sticky bottom-4 z-10 mt-6">
                <div class="bg-white shadow-lg border border-gray-200 rounded-xl px-5 py-3 flex items-center justify-between">
                    <span class="text-xs text-gray-500">Changes go live as soon as you save.</span>
                    <button type="submit" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-6 py-2.5 rounded-lg transition shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Save all changes
                    </button>
                </div>
            </div>
        </form>

        {{-- ===== ADD A NEW SECTION ===== --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mt-6">
            <h3 class="text-sm font-bold text-gray-900 mb-1">Add a new section</h3>
            <p class="text-xs text-gray-400 mb-3">On the <strong>Standard</strong> template, any section you add shows up automatically. On custom templates (like Home), a section only appears if the template is built to display it.</p>
            <form action="{{ route('admin.cms.sections.add', $page) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-3 items-end">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1">Section key <span class="text-gray-400 font-normal">(e.g. hero, features)</span></label>
                    <input type="text" name="section_key" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1">Display name</label>
                    <input type="text" name="name" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                </div>
                <div class="md:col-span-2">
                    <button class="text-xs font-semibold text-emerald-700 border border-emerald-200 hover:bg-emerald-50 rounded-lg px-3 py-1.5 transition">+ Add section</button>
                </div>
            </form>
        </div>

        {{-- ===== Out-of-form action forms ===== --}}
        @foreach($page->sections as $section)
            <form id="add-item-{{ $section->id }}" action="{{ route('admin.cms.items.add', $section) }}" method="POST" class="hidden">@csrf</form>
            <form id="del-section-{{ $section->id }}" action="{{ route('admin.cms.sections.destroy', $section) }}" method="POST" class="hidden">@csrf @method('DELETE')</form>
            @foreach($section->items as $item)
                <form id="del-item-{{ $item->id }}" action="{{ route('admin.cms.items.delete', $item) }}" method="POST" class="hidden">@csrf @method('DELETE')</form>
            @endforeach
        @endforeach
    </div>

    <script>
        function cmsToggle(id) {
            const body = document.getElementById('cms-body-' + id);
            const chev = document.getElementById('cms-chev-' + id);
            if (!body) return;
            body.classList.toggle('hidden');
            if (chev) chev.classList.toggle('rotate-180');
        }
        function cmsExpandAll() {
            const bodies = document.querySelectorAll('[id^="cms-body-"]');
            const anyHidden = Array.from(bodies).some(b => b.classList.contains('hidden'));
            bodies.forEach(b => b.classList.toggle('hidden', !anyHidden));
            document.querySelectorAll('[id^="cms-chev-"]').forEach(c => c.classList.toggle('rotate-180', anyHidden));
        }
    </script>
</x-app-layout>