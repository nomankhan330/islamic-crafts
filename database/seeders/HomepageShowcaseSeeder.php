<?php

namespace Database\Seeders;

use App\Models\LookbookItem;
use App\Models\Occasion;
use Illuminate\Database\Seeder;

class HomepageShowcaseSeeder extends Seeder
{
    public function run(): void
    {
        $occasions = [
            [
                'title' => 'Nikkah & Wedding',
                'icon' => '💍',
                'description' => 'Bespoke resin Nikkah platters, pen stands, and personalized guest favors.',
                'link_text' => 'Explore Nikkah',
                'link_url' => '/custom-orders?category=nikkah',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Eid & Ramadan',
                'icon' => '🌙',
                'description' => 'Curated festive gift boxes, Quran bookmarks & heartfelt Dua keepsakes.',
                'link_text' => 'Shop Festive Gifts',
                'link_url' => '/products',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Home Barakah',
                'icon' => '🕌',
                'description' => 'Sacred Bismillah & Ayatul Kursi trays, coasters, and gold-leaf wall art.',
                'link_text' => 'Decorate Home',
                'link_url' => '/category/resin-collection',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Everyday Keepsakes',
                'icon' => '🎀',
                'description' => 'Daisy crochet handbags, real-flower resin earrings & aesthetic keychains.',
                'link_text' => 'Browse Accessories',
                'link_url' => '/category/crochet-collection',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($occasions as $item) {
            Occasion::firstOrCreate(['title' => $item['title']], $item);
        }

        $lookbook = [
            [
                'caption' => 'Gold Leaf Nikkah Platter',
                'image_path' => 'images/product-nikkah-platter-hd.jpg',
                'link_url' => 'https://instagram.com',
                'handle' => '@islamiccrafts',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'caption' => 'Crystal Resin Serving Tray',
                'image_path' => 'images/luxury-resin-tray-hd.jpg',
                'link_url' => 'https://instagram.com',
                'handle' => '@islamiccrafts',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'caption' => 'Real Pressed Flower Earrings',
                'image_path' => 'images/product-resin-earrings-hd.jpg',
                'link_url' => 'https://instagram.com',
                'handle' => '@islamiccrafts',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'caption' => 'Daisy Bloom Crochet Tote',
                'image_path' => 'images/crochet-handbag-hd.jpg',
                'link_url' => 'https://instagram.com',
                'handle' => '@islamiccrafts',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'caption' => 'Everlasting Blush Bouquet',
                'image_path' => 'images/luxury-blush-bouquet-hd.jpg',
                'link_url' => 'https://instagram.com',
                'handle' => '@islamiccrafts',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'caption' => 'Custom Initial Keychains',
                'image_path' => 'images/product-resin-keychains-hd.jpg',
                'link_url' => 'https://instagram.com',
                'handle' => '@islamiccrafts',
                'sort_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($lookbook as $item) {
            LookbookItem::firstOrCreate(['caption' => $item['caption']], $item);
        }
    }
}
