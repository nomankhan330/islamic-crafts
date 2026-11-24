<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\StoreSetting;
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

    public function applyCoupon(Request $request)
    {
        $request->validate(['code' => 'required|string|max:50']);
        $code = strtoupper(trim($request->code));
        $subtotal = (float) $this->cartService->getTotal();

        $coupon = Coupon::where('code', $code)->first();
        if (!$coupon) {
            return response()->json([
                'success' => false,
                'message' => "Promo code '{$code}' is not valid.",
            ], 422);
        }

        $result = $coupon->validateForSubtotal($subtotal);
        if (!$result['valid']) {
            return response()->json([
                'success' => false,
                'message' => $result['message'],
            ], 422);
        }

        $discount = $result['discount'];
        $finalTotal = max(0, $subtotal - $discount);

        return response()->json([
            'success' => true,
            'code' => $coupon->code,
            'discount' => $discount,
            'final_total' => $finalTotal,
            'message' => $result['message'],
        ]);
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
            'coupon_code' => 'nullable|string|max:50',
        ]);

        $cart = $this->cartService->getCart();
        if (empty($cart)) {
            return redirect()->route('cart.index');
        }

        $subtotal = (float) $this->cartService->getTotal();
        $appliedCouponCode = null;
        $discountAmount = 0;

        if ($request->filled('coupon_code')) {
            $coupon = Coupon::where('code', strtoupper(trim($request->coupon_code)))->first();
            if ($coupon) {
                $check = $coupon->validateForSubtotal($subtotal);
                if ($check['valid']) {
                    $appliedCouponCode = $coupon->code;
                    $discountAmount = $check['discount'];
                    $coupon->increment('used_count');
                }
            }
        }

        $finalTotal = max(0, $subtotal - $discountAmount);

        $paymentMethod = $request->input('payment_method', 'cod');
        $notes = $request->notes;
        $paymentLabel = match ($paymentMethod) {
            'bank' => 'Bank Transfer / Raast / JazzCash',
            'whatsapp' => 'WhatsApp Guided Order',
            default => 'Cash on Delivery (COD)'
        };
        $notes = ($notes ? $notes . ' | ' : '') . 'Payment Method: ' . $paymentLabel;
        if ($appliedCouponCode) {
            $notes .= " | Promo: {$appliedCouponCode} (-Rs. " . number_format($discountAmount, 0) . ')';
        }

        $order = Order::create([
            'customer_name' => $request->name,
            'customer_phone' => $request->phone,
            'customer_email' => $request->email,
            'customer_address' => $request->address,
            'city' => $request->city,
            'total_amount' => $finalTotal,
            'coupon_code' => $appliedCouponCode,
            'discount_amount' => $discountAmount,
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
        $waNumber = StoreSetting::getValue('whatsapp_number', env('WHATSAPP_NUMBER', '923001234567'));
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

    public function track(Request $request)
    {
        $order = null;
        $searched = false;
        $error = null;

        $orderNumber = trim((string) $request->get('order_number', ''));
        $phone = trim((string) $request->get('phone', ''));

        if ($orderNumber !== '') {
            $searched = true;
            $cleanNum = ltrim($orderNumber, '#');
            $query = Order::with('items.product')->where('order_number', $cleanNum);

            if ($phone !== '') {
                $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
                $lastDigits = substr($cleanPhone, -7);
                $candidate = $query->first();
                if ($candidate) {
                    $orderPhone = preg_replace('/[^0-9]/', '', $candidate->customer_phone);
                    if ($lastDigits === '' || str_ends_with($orderPhone, $lastDigits)) {
                        $order = $candidate;
                    } else {
                        $error = 'Phone number does not match this order number. Please double-check and try again.';
                    }
                } else {
                    $error = "Order #{$cleanNum} was not found. Please check your order number.";
                }
            } else {
                $order = $query->first();
                if (!$order) {
                    $error = "Order #{$cleanNum} was not found. Please check your order number.";
                }
            }
        }

        return view('orders.track', compact('order', 'searched', 'error', 'orderNumber', 'phone'));
    }
}
