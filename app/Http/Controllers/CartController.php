<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(private CartService $cartService) {}

    public function index()
    {
        $cart = $this->cartService->getCart();
        $total = $this->cartService->getTotal();
        $recommendedProducts = Product::active()->with('category')->take(4)->get();
        return view('cart.index', compact('cart', 'total', 'recommendedProducts'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1|max:99',
            'customization' => 'nullable|string|max:500',
        ]);

        $quantity = (int) ($request->quantity ?? 1);
        $success = $this->cartService->addItem(
            (int) $request->product_id,
            $quantity,
            $request->customization
        );

        $product = Product::with('category')->find($request->product_id);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => $success,
                'count' => $this->cartService->getCount(),
                'total' => $this->cartService->getTotal(),
                'formatted_total' => 'Rs. ' . number_format($this->cartService->getTotal(), 0),
                'message' => $success ? 'Item successfully added to your bag! ♡' : 'Out of stock!',
                'product' => [
                    'id' => $product?->id,
                    'name' => $product?->name,
                    'price' => $product ? $product->current_price : 0,
                    'formatted_price' => $product ? 'Rs. ' . number_format($product->current_price, 0) : 'Rs. 0',
                    'image' => $product?->primary_image_url,
                    'category' => $product?->category?->name ?? 'Handcrafted Art',
                    'quantity' => $quantity,
                ]
            ]);
        }

        return redirect()->back()->with('success', 'Item cart mein add ho gaya! ✨');
    }

    public function update(Request $request, string $key)
    {
        $quantity = (int) $request->quantity;
        $this->cartService->updateItem($key, $quantity);

        if ($request->wantsJson() || $request->ajax()) {
            $cart = $this->cartService->getCart();
            $item = $cart[$key] ?? null;
            $itemSubtotal = $item ? ($item['price'] * $item['quantity']) : 0;

            return response()->json([
                'success' => true,
                'count' => $this->cartService->getCount(),
                'total' => $this->cartService->getTotal(),
                'formatted_total' => 'Rs. ' . number_format($this->cartService->getTotal(), 0),
                'item_subtotal' => 'Rs. ' . number_format($itemSubtotal, 0),
                'item_quantity' => $item ? $item['quantity'] : 0,
                'cart_empty' => empty($cart),
            ]);
        }

        return back()->with('success', 'Cart update ho gaya!');
    }

    public function remove(Request $request, string $key)
    {
        $this->cartService->removeItem($key);

        if ($request->wantsJson() || $request->ajax()) {
            $cart = $this->cartService->getCart();
            return response()->json([
                'success' => true,
                'count' => $this->cartService->getCount(),
                'total' => $this->cartService->getTotal(),
                'formatted_total' => 'Rs. ' . number_format($this->cartService->getTotal(), 0),
                'cart_empty' => empty($cart),
            ]);
        }

        return back()->with('success', 'Item cart se remove kar diya gaya.');
    }

    public function count()
    {
        return response()->json([
            'count' => $this->cartService->getCount(),
            'total' => $this->cartService->getTotal(),
        ]);
    }
}
