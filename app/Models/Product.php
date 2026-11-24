<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'slug', 'description', 'short_description',
        'price', 'sale_price', 'sku', 'stock', 'is_featured',
        'is_customizable', 'customization_note', 'is_active'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_customizable' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class)->where('is_approved', true);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function resolveRouteBinding($value, $field = null)
    {
        if (is_numeric($value)) {
            return $this->where('id', (int) $value)->firstOrFail();
        }

        return $this->where($field ?? 'slug', $value)
                    ->orWhere('id', $value)
                    ->firstOrFail();
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getCurrentPriceAttribute(): float
    {
        return (float) ($this->sale_price ?? $this->price);
    }

    public function getAverageRatingAttribute(): float
    {
        return (float) ($this->reviews()->avg('rating') ?? 5);
    }

    public function getPrimaryImageUrlAttribute(): string
    {
        $image = $this->images()->where('is_primary', true)->first()
            ?? $this->images()->first();
        if (!$image) return '';
        if (str_starts_with($image->image_path, 'images/') || str_starts_with($image->image_path, 'http')) {
            return asset($image->image_path);
        }
        return asset('storage/' . $image->image_path);
    }
}
