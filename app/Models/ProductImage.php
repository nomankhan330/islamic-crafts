<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    protected $fillable = ['product_id', 'image_path', 'is_primary', 'sort_order'];
    protected $casts = ['is_primary' => 'boolean'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getUrlAttribute(): string
    {
        if (str_starts_with($this->image_path, 'images/') || str_starts_with($this->image_path, 'http')) {
            return asset($this->image_path);
        }
        return asset('storage/' . $this->image_path);
    }

    public function getImageUrlAttribute(): string
    {
        return $this->url;
    }
}
