<?php

namespace Database\Seeders;

use App\Models\Coupon;
use App\Models\StoreSetting;
use Illuminate\Database\Seeder;

class CouponsAndSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $coupons = [
            [
                'code' => 'CRAFTY10',
                'type' => 'percent',
                'value' => 10,
                'min_order_amount' => 0,
                'max_uses' => null,
                'is_active' => true,
            ],
            [
                'code' => 'EID200',
                'type' => 'fixed',
                'value' => 200,
                'min_order_amount' => 2000,
                'max_uses' => 100,
                'is_active' => true,
            ],
        ];

        foreach ($coupons as $c) {
            Coupon::firstOrCreate(['code' => $c['code']], $c);
        }

        $defaults = [
            'whatsapp_number' => env('WHATSAPP_NUMBER', '923001234567'),
            'instagram_url' => 'https://instagram.com',
            'instagram_handle' => '@islamiccrafts',
            'contact_email' => 'salam@islamiccrafts.com',
            'free_delivery_threshold' => '2500',
            'delivery_fee' => '250',
            'studio_hours' => 'Mon – Sat, 10 AM – 9 PM PKT',
            'announcement_text' => '✨ Free Nationwide Delivery on orders over Rs. 2,500 • Use code CRAFTY10 for 10% OFF!',
        ];

        foreach ($defaults as $key => $val) {
            StoreSetting::firstOrCreate(['key' => $key], ['value' => $val]);
        }
    }
}
