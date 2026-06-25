<?php

namespace Modules\Cms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    protected $fillable = ['title', 'slug', 'template', 'meta_title', 'meta_description', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];

    public function sections(): HasMany
    {
        return $this->hasMany(PageSection::class)->orderBy('sort_order');
    }

    // Fetch one section by key: $page->section('hero')
    public function section(string $key): ?PageSection
    {
        return $this->sections->firstWhere('section_key', $key);
    }

    public static function templates(): array
    {
        return [
            'standard'   => 'Standard page (auto-renders all sections)',
            'home'       => 'Home page (custom design)',
            'landing'    => 'Landing page',
            'full_width' => 'Full-width page',
        ];
    }
}