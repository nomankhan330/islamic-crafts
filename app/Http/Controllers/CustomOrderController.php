<?php

namespace App\Http\Controllers;

use App\Models\CustomOrderRequest;
use Illuminate\Http\Request;

class CustomOrderController extends Controller
{
    public function index()
    {
        return view('custom-orders');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:25',
            'email' => 'nullable|email',
            'category' => 'required|string',
            'description' => 'required|string|max:2000',
            'budget' => 'nullable|string|max:100',
            'reference_image' => 'nullable|image|max:5120',
        ]);

        $imagePath = null;
        if ($request->hasFile('reference_image')) {
            $imagePath = $request->file('reference_image')->store('custom-orders', 'public');
        }

        $inquiry = CustomOrderRequest::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'category' => $request->category,
            'description' => $request->description,
            'budget' => $request->budget,
            'reference_image' => $imagePath,
            'status' => 'new',
        ]);

        $waNumber = preg_replace('/[^0-9]/', '', env('WHATSAPP_NUMBER', '923001234567'));
        $message = "✨ *Assalam-o-Alaikum! New Custom Order Inquiry* ✨\n\n";
        $message .= "👤 *Name:* {$request->name}\n";
        $message .= "📱 *WhatsApp:* {$request->phone}\n";
        $message .= "🛍️ *Collection:* {$request->category}\n";
        if (!empty($request->budget)) {
            $message .= "💰 *Estimated Budget:* {$request->budget}\n";
        }
        $message .= "\n📝 *Custom Requirements:*\n{$request->description}\n\n";
        $message .= "_Please let me know how soon we can discuss and finalize this!_";

        $waUrl = 'https://wa.me/' . $waNumber . '?text=' . urlencode($message);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'JazakAllah Khair! Aapki custom inquiry receive ho gayi hai ♡',
                'whatsapp_url' => $waUrl,
                'inquiry' => [
                    'id' => $inquiry->id,
                    'name' => $inquiry->name,
                    'category' => $inquiry->category,
                ],
            ]);
        }

        return redirect()->away($waUrl);
    }
}
