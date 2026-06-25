<?php

namespace Modules\Cms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PageSection extends Model
{
    protected $fillable = [
        'page_id', 'section_key', 'name', 'heading', 'subheading', 'body',
        'image', 'button_text', 'button_url', 'button_text2', 'button_url2',
        'sort_order', 'is_active',
    ];
    protected $casts = ['is_active' => 'boolean'];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(SectionItem::class)->orderBy('sort_order');
    }

    // "How [[SolaSaver]] Works"  ->  "How <span class='htext'>SolaSaver</span> Works"
    public function getFormattedHeadingAttribute(): string
    {
        return preg_replace('/\[\[(.+?)\]\]/', '<span class="htext">$1</span>', e($this->heading));
    }

    // Supports seeded static images (img/...) AND admin uploads (storage)
    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) return null;
        return str_starts_with($this->image, 'img/')
            ? asset($this->image)
            : asset('storage/' . $this->image);
    }
}