<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    private const SESSION_KEY = 'cart';

    public function getCart(): array
    {
        return Session::get(self::SESSION_KEY, []);
    }

    public function addItem(int $productId, int $quantity = 1, ?string $customization = null): bool
    {
        $product = Product::active()->find($productId);
        if (!$product) return false;

        $cart = $this->getCart();
        $key = $productId . ($customization ? '_' . md5($customization) : '');

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += $quantity;
        } else {
            $cart[$key] = [
                'product_id' => $productId,
                'name' => $product->name,
                'price' => $product->current_price,
                'quantity' => $quantity,
                'image' => $product->primary_image_url,
                'icon' => $product->category->icon ?? '✨',
                'category' => $product->category->name ?? '',
                'slug' => $product->slug,
                'customization' => $customization,
            ];
        }

        Session::put(self::SESSION_KEY, $cart);
        return true;
    }

    public function updateItem(string $key, int $quantity): void
    {
        $cart = $this->getCart();
        if (isset($cart[$key])) {
            if ($quantity <= 0) {
                unset($cart[$key]);
            } else {
                $cart[$key]['quantity'] = $quantity;
            }
            Session::put(self::SESSION_KEY, $cart);
        }
    }

    public function removeItem(string $key): void
    {
        $cart = $this->getCart();
        unset($cart[$key]);
        Session::put(self::SESSION_KEY, $cart);
    }

    public function clear(): void
    {
        Session::forget(self::SESSION_KEY);
    }

    public function getTotal(): float
    {
        return (float) array_reduce($this->getCart(), fn($carry, $item) => $carry + ($item['price'] * $item['quantity']), 0);
    }

    public function getCount(): int
    {
        return (int) array_reduce($this->getCart(), fn($carry, $item) => $carry + $item['quantity'], 0);
    }

    public function generateWhatsAppMessage(array $orderData): string
    {
        $cart = $this->getCart();
        $message = "✨ *Assalam-o-Alaikum! Islamic Crafts Order* ✨\n\n";
        if (!empty($orderData['order_number'])) {
            $message .= "🔖 *Order #:* {$orderData['order_number']}\n";
        }
        $message .= "👤 *Customer Name:* {$orderData['name']}\n";
        $message .= "📱 *Phone:* {$orderData['phone']}\n";
        $message .= "📍 *Delivery Address:* {$orderData['address']}, {$orderData['city']}\n";
        if (!empty($orderData['email'])) {
            $message .= "📧 *Email:* {$orderData['email']}\n";
        }
        if (!empty($orderData['payment_method'])) {
            $message .= "💳 *Payment:* {$orderData['payment_method']}\n";
        }
        $message .= "\n🛍️ *Selected Items:*\n";

        foreach ($cart as $item) {
            $itemTotal = number_format($item['price'] * $item['quantity'], 0);
            $message .= "• *{$item['name']}* (Qty: {$item['quantity']}) — Rs. {$itemTotal}\n";
            if (!empty($item['customization'])) {
                $message .= "  ↳ 🎨 *Custom Details:* {$item['customization']}\n";
            }
        }

        $grandTotal = number_format($this->getTotal(), 0);
        $message .= "\n━━━━━━━━━━━━━━━━━━\n";
        $message .= "💰 *Subtotal:* Rs. {$grandTotal}\n";
        $message .= "🚚 *Delivery:* (Standard nationwide delivery)\n";

        if (!empty($orderData['notes'])) {
            $message .= "📝 *Special Instructions:* {$orderData['notes']}\n";
        }

        $message .= "\n_Please confirm my order and share payment details (EasyPaisa/JazzCash/Bank Transfer). JazakAllah Khair!_";

        return $message;
    }
}
