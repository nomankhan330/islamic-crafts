<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomOrderRequest extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'category', 'description', 'budget', 'reference_image', 'status'];

    public function getReferenceImageUrlAttribute(): ?string
    {
        if (!$this->reference_image) {
            return null;
        }
        if (str_starts_with($this->reference_image, 'http') || str_starts_with($this->reference_image, 'images/')) {
            return asset($this->reference_image);
        }
        return asset('storage/' . $this->reference_image);
    }
}

