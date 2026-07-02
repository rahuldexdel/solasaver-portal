<div class="border border-gray-200 rounded-lg p-4 mb-3 bg-gray-50/70">
    <div class="flex items-center justify-between mb-3">
        <strong class="text-sm text-gray-700">Item #{{ $loop->iteration }}</strong>
        <button type="submit" form="del-item-{{ $item->id }}" onclick="return confirm('Delete this item?')" class="text-xs font-medium text-red-600 hover:text-white hover:bg-red-600 border border-red-200 hover:border-red-600 rounded-lg px-3 py-1.5 transition">Remove</button>
    </div>

    <label class="block text-xs font-semibold text-gray-500 mb-1">Heading</label>
    <input type="text" name="items[{{ $item->id }}][heading]" value="{{ $item->heading }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm mb-2 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">

    <label class="block text-xs font-semibold text-gray-500 mb-1">Body</label>
    <textarea name="items[{{ $item->id }}][body]" rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm mb-2 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none resize-none">{{ $item->body }}</textarea>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
        <div>
            <label class="block text-xs font-semibold text-gray-500 mb-1">Link text (optional)</label>
            <input type="text" name="items[{{ $item->id }}][link_text]" value="{{ $item->link_text }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm mb-2 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-500 mb-1">Link URL (optional)</label>
            <input type="text" name="items[{{ $item->id }}][link_url]" value="{{ $item->link_url }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm mb-2 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
        <div>
            <label class="block text-xs font-semibold text-gray-500 mb-1">Icon</label>
            @if($item->icon_url)<img src="{{ $item->icon_url }}" class="w-12 h-12 object-contain rounded border border-gray-200 mb-1">@endif
            <input type="file" name="items[{{ $item->id }}][icon]" class="w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-700 mb-2">
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-500 mb-1">Image</label>
            @if($item->image_url)<img src="{{ $item->image_url }}" class="w-24 h-auto rounded border border-gray-200 mb-1">@endif
            <input type="file" name="items[{{ $item->id }}][image]" class="w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-700 mb-2">
        </div>
    </div>

    <label class="inline-flex items-center gap-2 text-sm text-gray-600 mt-1">
        <input type="checkbox" name="items[{{ $item->id }}][is_active]" value="1" {{ $item->is_active ? 'checked' : '' }} class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
        Show this item on the page
    </label>
</div>