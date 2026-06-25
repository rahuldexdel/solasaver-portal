<?php

namespace Modules\Cms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SectionItem extends Model
{
    protected $fillable = [
        'page_section_id', 'icon', 'image', 'heading', 'subheading',
        'body', 'link_text', 'link_url', 'sort_order', 'is_active',
    ];
    protected $casts = ['is_active' => 'boolean'];

    public function section(): BelongsTo
    {
        return $this->belongsTo(PageSection::class, 'page_section_id');
    }

    public function getIconUrlAttribute(): ?string
    {
        if (! $this->icon) return null;
        return str_starts_with($this->icon, 'img/')
            ? asset($this->icon)
            : asset('storage/' . $this->icon);
    }

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) return null;
        return str_starts_with($this->image, 'img/')
            ? asset($this->image)
            : asset('storage/' . $this->image);
    }
}