<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LookbookItem extends Model
{
    protected $fillable = [
        'caption',
        'image_path',
        'link_url',
        'handle',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getImageUrlAttribute(): string
    {
        $path = $this->image_path ?? '';
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }
        if (str_starts_with($path, 'images/') || str_starts_with($path, 'storage/')) {
            return asset($path);
        }
        return asset('storage/' . ltrim($path, '/'));
    }
}
