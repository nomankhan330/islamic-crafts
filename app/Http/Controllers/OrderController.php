<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Services\CartService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private CartService $cartService) {}

    public function checkout()
    {
        $cart = $this->cartService->getCart();
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Aapka cart khali hai. Pehle kuch add karain!');
        }
        $total = $this->cartService->getTotal();
        return view('checkout.index', compact('cart', 'total'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:25',
            'email' => 'nullable|email',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'notes' => 'nullable|string|max:500',
            'payment_method' => 'nullable|string|in:cod,bank,whatsapp',
        ]);

        $cart = $this->cartService->getCart();
        if (empty($cart)) {
            return redirect()->route('cart.index');
        }

        $paymentMethod = $request->input('payment_method', 'cod');
        $notes = $request->notes;
        $paymentLabel = match($paymentMethod) {
            'bank' => 'Bank Transfer / Raast / JazzCash',
            'whatsapp' => 'WhatsApp Guided Order',
            default => 'Cash on Delivery (COD)'
        };
        $notes = ($notes ? $notes . " | " : "") . "Payment Method: " . $paymentLabel;

        $order = Order::create([
            'customer_name' => $request->name,
            'customer_phone' => $request->phone,
            'customer_email' => $request->email,
            'customer_address' => $request->address,
            'city' => $request->city,
            'total_amount' => $this->cartService->getTotal(),
            'notes' => $notes,
            'status' => 'pending',
            'is_custom_order' => false,
        ]);

        foreach ($cart as $item) {
            $order->items()->create([
                'product_id' => $item['product_id'],
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'customization_details' => $item['customization'] ?? null,
            ]);
        }

        $orderData = $request->all();
        $orderData['order_number'] = $order->order_number;
        $orderData['payment_method'] = $paymentLabel;

        $waMessage = $this->cartService->generateWhatsAppMessage($orderData);
        $waNumber = env('WHATSAPP_NUMBER', '923001234567');
        $cleanWaNumber = preg_replace('/[^0-9]/', '', $waNumber);
        $waUrl = 'https://wa.me/' . $cleanWaNumber . '?text=' . urlencode($waMessage);

        $this->cartService->clear();

        if ($request->input('action') === 'whatsapp' || $paymentMethod === 'whatsapp') {
            return redirect()->away($waUrl);
        }

        return redirect()->route('order.success', $order->id)->with([
            'wa_url' => $waUrl,
            'success' => 'Shukriya! Aapka order kamyabi se record ho gaya hai. 🎉'
        ]);
    }

    public function success(Order $order)
    {
        $order->load('items.product');
        return view('checkout.success', compact('order'));
    }
}
