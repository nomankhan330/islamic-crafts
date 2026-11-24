<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CustomOrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Categories, Products & Homepage Showcases
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            HomepageShowcaseSeeder::class,
        ]);

        // 2. Admin User
        User::updateOrCreate(
            ['email' => 'admin@islamiccrafts.com'],
            [
                'name' => 'Admin Islamic Crafts',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
            ]
        );

        // 3. Configure Exact Bestsellers & Multiple HD Gallery Images
        $bestsellerConfigs = [
            'Resin Earrings' => [
                'old_name' => 'Resin Earrings with Dried Flowers',
                'price' => 800,
                'primary' => 'images/product-resin-earrings-hd.jpg',
                'gallery' => [
                    'images/cat-resin-hd.jpg',
                    'images/luxury-resin-tray-hd.jpg',
                    'images/card-resin-full-hd.jpg',
                ],
            ],
            'Resin Keychains' => [
                'old_name' => 'Resin Bow Keychains',
                'price' => 400,
                'primary' => 'images/product-resin-keychains-hd.jpg',
                'gallery' => [
                    'images/hero-banner-v2.jpg',
                    'images/cat-resin-hd.jpg',
                    'images/card-resin-full-hd.jpg',
                ],
            ],
            'Nikkah Platter' => [
                'old_name' => 'Personalized Resin Nikkah Platter',
                'price' => 3500,
                'primary' => 'images/product-nikkah-platter-hd.jpg',
                'gallery' => [
                    'images/luxury-resin-tray-hd.jpg',
                    'images/hero-banner-v3.jpg',
                    'images/cat-resin-hd.jpg',
                ],
            ],
            'Crochet Bag' => [
                'old_name' => 'Daisy Bloom Crochet Handbag',
                'price' => 1800,
                'primary' => 'images/product-crochet-bag-hd.jpg',
                'gallery' => [
                    'images/crochet-handbag-hd.jpg',
                    'images/cat-crochet-hd.jpg',
                    'images/card-crochet-full-hd.jpg',
                ],
            ],
        ];

        foreach ($bestsellerConfigs as $name => $info) {
            $p = Product::where('name', $name)->orWhere('name', $info['old_name'])->first();
            if ($p) {
                $p->update([
                    'name' => $name,
                    'slug' => Str::slug($name),
                    'price' => $info['price'],
                    'sale_price' => null,
                    'is_featured' => true,
                    'is_active' => true,
                ]);

                // Reset and re-create multiple images
                ProductImage::where('product_id', $p->id)->delete();

                // 1. Primary Master Image
                ProductImage::create([
                    'product_id' => $p->id,
                    'image_path' => $info['primary'],
                    'is_primary' => true,
                    'sort_order' => 1,
                ]);

                // 2. Additional Gallery Images
                $sort = 2;
                foreach ($info['gallery'] as $galleryImg) {
                    ProductImage::create([
                        'product_id' => $p->id,
                        'image_path' => $galleryImg,
                        'is_primary' => false,
                        'sort_order' => $sort++,
                    ]);
                }
            }
        }

        // Attach category HD images
        $otherImages = [
            'Resin Oval Floral Vanity Tray' => 'images/cat-resin-hd.jpg',
            'Everlasting Pastel Rose Bouquet' => 'images/cat-floral-hd.jpg',
            'MashaAllah Gold Foil Glass Platter Frame' => 'images/hero-banner-hd.jpg',
        ];
        foreach ($otherImages as $pName => $img) {
            $p = Product::where('name', $pName)->first();
            if ($p) {
                ProductImage::updateOrCreate(
                    ['product_id' => $p->id],
                    ['image_path' => $img, 'is_primary' => true, 'sort_order' => 1]
                );
            }
        }

        // 4. Sample Custom Orders
        CustomOrderRequest::create([
            'name' => 'Fatima Zahra',
            'phone' => '0300-1234567',
            'email' => 'fatima.z@gmail.com',
            'category' => 'Resin Nikkah Platter',
            'description' => 'Need a round resin nikkah platter with names "Hamza & Fatima", white baby\'s breath flowers, and gold leaf. Date: 25 Dec 2026.',
            'budget' => 'Rs. 4,000 - 5,000',
            'status' => 'new',
        ]);

        CustomOrderRequest::create([
            'name' => 'Zainab Bibi',
            'phone' => '0321-9876543',
            'email' => 'zainab@yahoo.com',
            'category' => 'Crochet Bags',
            'description' => 'Can you make the Daisy crochet bag in sage green color instead of cream?',
            'budget' => 'Rs. 2,000',
            'status' => 'replied',
        ]);

        // 5. Sample Customer Orders
        $pPlatter = Product::where('name', 'Nikkah Platter')->first() ?? Product::first();
        $pEarrings = Product::where('name', 'Resin Earrings')->first() ?? Product::find(2);

        $order1 = Order::create([
            'order_number' => 'IC-' . date('Ymd') . '-001',
            'customer_name' => 'Ayesha Khan',
            'customer_phone' => '0312-3456789',
            'customer_email' => 'ayesha.khan@gmail.com',
            'customer_address' => 'House # 42, Street 7, Phase 5 DHA, Lahore',
            'city' => 'Lahore',
            'total_amount' => 4300.00,
            'status' => 'confirmed',
            'notes' => 'Please pack in luxury gift box, it is for my sister\'s wedding anniversary! ♡',
        ]);

        OrderItem::create([
            'order_id' => $order1->id,
            'product_id' => $pPlatter->id,
            'product_name' => $pPlatter->name,
            'price' => $pPlatter->price,
            'quantity' => 1,
            'customization_details' => 'Names: Ayaan & Sara',
        ]);

        OrderItem::create([
            'order_id' => $order1->id,
            'product_id' => $pEarrings->id,
            'product_name' => $pEarrings->name,
            'price' => $pEarrings->price,
            'quantity' => 1,
        ]);

        $order2 = Order::create([
            'order_number' => 'IC-' . date('Ymd') . '-002',
            'customer_name' => 'Bilal Ahmed',
            'customer_phone' => '0333-8765432',
            'customer_email' => 'bilal.ahmed@outlook.com',
            'customer_address' => 'Apartment 3B, Falcon Complex, Gulberg III, Lahore',
            'city' => 'Lahore',
            'total_amount' => 800.00,
            'status' => 'pending',
            'notes' => 'Call before delivery.',
        ]);

        OrderItem::create([
            'order_id' => $order2->id,
            'product_id' => $pEarrings->id,
            'product_name' => $pEarrings->name,
            'price' => $pEarrings->price,
            'quantity' => 1,
        ]);

        // 6. Subscribers
        Subscriber::firstOrCreate(['email' => 'client@craftygifts.pk']);
        Subscriber::firstOrCreate(['email' => 'ayesha.designs@gmail.com']);
    }
}
