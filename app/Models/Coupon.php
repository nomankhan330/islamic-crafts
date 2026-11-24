<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'code',
        'type',
        'value',
        'min_order_amount',
        'max_uses',
        'used_count',
        'expires_at',
        'is_active',
    ];

    protected $casts = [
        'value' => 'float',
        'min_order_amount' => 'float',
        'max_uses' => 'integer',
        'used_count' => 'integer',
        'expires_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function calculateDiscount(float $subtotal): float
    {
        if ($this->type === 'percent') {
            $discount = round($subtotal * ($this->value / 100));
        } else {
            $discount = $this->value;
        }

        return min($subtotal, max(0, (float) $discount));
    }

    public function validateForSubtotal(float $subtotal): array
    {
        if (!$this->is_active) {
            return ['valid' => false, 'message' => 'This promo code is currently inactive.', 'discount' => 0];
        }

        if ($this->expires_at && $this->expires_at->isPast()) {
            return ['valid' => false, 'message' => 'This promo code has expired.', 'discount' => 0];
        }

        if ($this->max_uses !== null && $this->used_count >= $this->max_uses) {
            return ['valid' => false, 'message' => 'This promo code has reached its usage limit.', 'discount' => 0];
        }

        if ($subtotal < $this->min_order_amount) {
            return [
                'valid' => false,
                'message' => 'Minimum order of Rs. ' . number_format($this->min_order_amount, 0) . ' required for this code.',
                'discount' => 0,
            ];
        }

        $discount = $this->calculateDiscount($subtotal);

        return [
            'valid' => true,
            'message' => "Promo code {$this->code} applied! You saved Rs. " . number_format($discount, 0) . '.',
            'discount' => $discount,
        ];
    }
}
