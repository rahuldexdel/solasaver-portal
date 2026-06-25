<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3 w-full">
            <a href="{{ route('admin.cms.pages.index') }}"
               class="inline-flex items-center justify-center w-8 h-8 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 hover:text-gray-700 transition" title="Back to pages">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h1 class="font-bold text-lg text-gray-900 tracking-tight">Create Page</h1>
                <p class="text-xs text-gray-400 mt-0.5">Add a new content page to your site.</p>
            </div>
        </div>
    </x-slot>

    <form action="{{ route('admin.cms.pages.store') }}" method="POST" class="w-full">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

            {{-- Left: main content --}}
            <div class="lg:col-span-2 space-y-5">

                {{-- Page details --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100">
                        <h2 class="text-sm font-semibold text-gray-900">Page Details</h2>
                        <p class="text-xs text-gray-400 mt-0.5">Basic information about this page.</p>
                    </div>
                    <div class="p-6 space-y-5">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Title <span class="text-red-500">*</span></label>
                            <input type="text" name="title" value="{{ old('title') }}" placeholder="e.g. About Us"
                                   class="w-full border @error('title') border-red-300 @else border-gray-300 @enderror rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                            @error('title')<p class="text-red-600 text-xs mt-1.5">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">
                                Slug <span class="font-normal text-gray-400">— leave blank to auto-generate</span>
                            </label>
                            <div class="flex items-center rounded-lg border @error('slug') border-red-300 @else border-gray-300 @enderror focus-within:ring-2 focus-within:ring-emerald-500 focus-within:border-emerald-500 transition overflow-hidden">
                                <span class="px-3 py-2.5 bg-gray-50 text-gray-400 text-sm border-r border-gray-200 select-none">/</span>
                                <input type="text" name="slug" value="{{ old('slug') }}" placeholder="about-us"
                                       class="flex-1 px-3 py-2.5 text-sm font-mono outline-none">
                            </div>
                            @error('slug')<p class="text-red-600 text-xs mt-1.5">{{ $message }}</p>@enderror
                        </div>

                        {{-- TEMPLATE (this was missing) --}}
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">
                                Template <span class="font-normal text-gray-400">— controls the page layout</span>
                            </label>
                            <select name="template"
                                    class="w-full border @error('template') border-red-300 @else border-gray-300 @enderror rounded-lg px-3 py-2.5 text-sm bg-white focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                                @foreach(\Modules\Cms\Models\Page::templates() as $key => $label)
                                    <option value="{{ $key }}" {{ old('template', 'standard') === $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('template')<p class="text-red-600 text-xs mt-1.5">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                {{-- SEO --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100">
                        <h2 class="text-sm font-semibold text-gray-900">SEO Settings</h2>
                        <p class="text-xs text-gray-400 mt-0.5">Optional metadata for search engines.</p>
                    </div>
                    <div class="p-6 space-y-5">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Meta Title</label>
                            <input type="text" name="meta_title" value="{{ old('meta_title') }}" placeholder="Title shown in search results"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Meta Description</label>
                            <textarea name="meta_description" rows="3" placeholder="A short summary for search engines (around 150–160 characters)."
                                      class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition resize-none">{{ old('meta_description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: sidebar --}}
            <div class="space-y-5">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100">
                        <h2 class="text-sm font-semibold text-gray-900">Visibility</h2>
                    </div>
                    <div class="p-6">
                        <label class="flex items-start gap-3 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                   class="mt-0.5 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500 w-4 h-4">
                            <span>
                                <span class="block text-sm font-medium text-gray-700">Page visible</span>
                                <span class="block text-xs text-gray-400 mt-0.5">When enabled, this page is live and accessible to visitors.</span>
                            </span>
                        </label>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-3">
                    <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-6 py-2.5 rounded-lg transition shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Create Page
                    </button>
                    <a href="{{ route('admin.cms.pages.index') }}"
                       class="w-full inline-flex items-center justify-center text-sm font-medium text-gray-500 hover:text-gray-700 px-6 py-2.5 rounded-lg border border-gray-200 hover:bg-gray-50 transition">
                        Cancel
                    </a>
                </div>
            </div>

        </div>
    </form>

</x-app-layout>