<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StoreSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'whatsapp_number' => StoreSetting::getValue('whatsapp_number', env('WHATSAPP_NUMBER', '923001234567')),
            'instagram_url' => StoreSetting::getValue('instagram_url', 'https://instagram.com'),
            'instagram_handle' => StoreSetting::getValue('instagram_handle', '@islamiccrafts'),
            'contact_email' => StoreSetting::getValue('contact_email', 'salam@islamiccrafts.com'),
            'free_delivery_threshold' => StoreSetting::getValue('free_delivery_threshold', '2500'),
            'delivery_fee' => StoreSetting::getValue('delivery_fee', '250'),
            'studio_hours' => StoreSetting::getValue('studio_hours', 'Mon – Sat, 10 AM – 9 PM PKT'),
            'announcement_text' => StoreSetting::getValue('announcement_text', '✨ Free Nationwide Delivery on orders over Rs. 2,500 • Use code CRAFTY10 for 10% OFF!'),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'whatsapp_number' => 'required|string|max:30',
            'instagram_url' => 'nullable|string|max:255',
            'instagram_handle' => 'nullable|string|max:60',
            'contact_email' => 'nullable|email|max:120',
            'free_delivery_threshold' => 'nullable|numeric|min:0',
            'delivery_fee' => 'nullable|numeric|min:0',
            'studio_hours' => 'nullable|string|max:120',
            'announcement_text' => 'nullable|string|max:255',
        ]);

        foreach ($validated as $key => $val) {
            StoreSetting::setValue($key, $val ?? '');
        }

        return back()->with('success', 'Storefront settings saved successfully! ⚙️✨');
    }
}
