<?php

namespace Modules\Cms\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Cms\Models\Page;
use Modules\Cms\Models\PageSection;
use Modules\Cms\Models\SectionItem;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('title')->get();
        return view('cms::admin.pages.index', compact('pages'));
    }

    public function create()
    {
        $templates = Page::templates();
        return view('cms::admin.pages.create', compact('templates'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'nullable|string|max:255|unique:pages,slug',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
           'template' => ['required', \Illuminate\Validation\Rule::in(array_keys(Page::templates()))],
        ]);

      
        $data['slug']      = Str::slug($data['slug'] ?: $data['title']);
        $data['is_active'] = $request->boolean('is_active');

        $page = Page::create($data);

       

        return redirect()->route('admin.cms.pages.edit', $page)
            ->with('success', 'Page created — add sections and content below.');
    }

public function edit(Page $page)
{
    $page->load('sections.items');
    $templates = Page::templates();
    return view('cms::admin.pages.edit', compact('page', 'templates'));
}

  public function update(Request $request, Page $page)
{
    $request->validate([
        'title'            => 'required|string|max:255',
        'meta_title'       => 'nullable|string|max:255',
        'meta_description' => 'nullable|string|max:1000',
     'template' => ['required', \Illuminate\Validation\Rule::in(array_keys(Page::templates()))],
    ]);

    //dd($request->template);

    $page->update([
        'title'            => $request->title,
        'template'         => $request->template,   // <-- this line was missing
        'meta_title'       => $request->meta_title,
        'meta_description' => $request->meta_description,
        'is_active'        => $request->boolean('is_active'),
    ]);

    // --- Sections ---
    foreach ($request->input('sections', []) as $sid => $f) {
        $section = $page->sections()->find($sid);
        if (! $section) continue;

        $section->fill([
            'heading'      => $f['heading'] ?? null,
            'subheading'   => $f['subheading'] ?? null,
            'body'         => $f['body'] ?? null,
            'button_text'  => $f['button_text'] ?? null,
            'button_url'   => $f['button_url'] ?? null,
            'button_text2' => $f['button_text2'] ?? null,
            'button_url2'  => $f['button_url2'] ?? null,
            'is_active'    => isset($f['is_active']),
        ]);

        if ($request->hasFile("sections.$sid.image")) {
            $section->image = $request->file("sections.$sid.image")->store('cms/sections', 'public');
        }
        $section->save();
    }

    // --- Items ---
    foreach ($request->input('items', []) as $iid => $f) {
        $item = SectionItem::find($iid);
        if (! $item || $item->section->page_id !== $page->id) continue;

        $item->fill([
            'heading'    => $f['heading'] ?? null,
            'subheading' => $f['subheading'] ?? null,
            'body'       => $f['body'] ?? null,
            'link_text'  => $f['link_text'] ?? null,
            'link_url'   => $f['link_url'] ?? null,
            'is_active'  => isset($f['is_active']),
        ]);

        if ($request->hasFile("items.$iid.icon")) {
            $item->icon = $request->file("items.$iid.icon")->store('cms/icons', 'public');
        }
        if ($request->hasFile("items.$iid.image")) {
            $item->image = $request->file("items.$iid.image")->store('cms/items', 'public');
        }
        $item->save();
    }

    return back()->with('success', 'Page content updated successfully.');
}

    public function destroy(Page $page)
    {
        $page->delete();   // cascades to sections + items
        return redirect()->route('admin.cms.pages.index')->with('success', 'Page deleted.');
    }

    // --- Sections ---
    public function addSection(Request $request, Page $page)
    {
        $request->validate([
            'section_key' => 'required|string|max:100',
            'name'        => 'required|string|max:255',
        ]);

        $page->sections()->create([
            'section_key' => Str::slug($request->section_key, '_'),
            'name'        => $request->name,
            'sort_order'  => ($page->sections()->max('sort_order') ?? 0) + 1,
        ]);

        return back()->with('success', 'Section added — fill it in and save.');
    }

    public function deleteSection(PageSection $section)
    {
        $section->delete();   // cascades to items
        return back()->with('success', 'Section deleted.');
    }

    // --- Items ---
    public function addItem(PageSection $section)
    {
        $section->items()->create([
            'heading'    => 'New item',
            'sort_order' => ($section->items()->max('sort_order') ?? 0) + 1,
        ]);
        return back()->with('success', 'Item added — fill it in and save.');
    }

    public function deleteItem(SectionItem $item)
    {
        $item->delete();
        return back()->with('success', 'Item deleted.');
    }

    public function show(string $slug)
    {
        $page = Page::where('slug', $slug)
            ->where('is_active', true)
            ->with([
                'sections' => fn($q) => $q->where('is_active', true)->orderBy('sort_order'),
                'sections.items' => fn($q) => $q->where('is_active', true)->orderBy('sort_order'),
            ])
            ->firstOrFail();

        // Resolve "public.templates.{template}", fall back to standard
        $view = "public.templates.{$page->template}";
        if (! view()->exists($view)) {
            $view = 'public.templates.standard';
        }

        return view($view, compact('page'));
    }
}