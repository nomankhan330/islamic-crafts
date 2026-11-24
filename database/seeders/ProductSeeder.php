<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Resin
            [
                'category_slug' => 'resin-jewellery',
                'name' => 'Resin Earrings with Dried Flowers',
                'price' => 800,
                'sale_price' => null,
                'is_featured' => true,
                'is_customizable' => true,
                'short_description' => 'Delicate golden framed resin earrings with real pressed flowers.',
                'description' => 'Handcrafted resin earrings featuring authentic pressed flowers preserved in crystal-clear resin with elegant gold accents. Lightweight, comfortable, and perfect for special occasions or daily elegance.',
            ],
            [
                'category_slug' => 'resin-keychains',
                'name' => 'Resin Bow Keychains',
                'price' => 400,
                'sale_price' => null,
                'is_featured' => true,
                'is_customizable' => true,
                'short_description' => 'Cute bow shaped resin keychains with pearl and flower accents.',
                'description' => 'Handmade resin bow keychains filled with delicate baby\'s breath petals and golden flakes. Complete with a luxurious gold clasp and mini charms.',
            ],
            [
                'category_slug' => 'resin-nikkah-platters',
                'name' => 'Personalized Resin Nikkah Platter',
                'price' => 3500,
                'sale_price' => 3200,
                'is_featured' => true,
                'is_customizable' => true,
                'short_description' => 'Luxury pearl-beaded resin nikkah platter with custom names in gold calligraphy.',
                'description' => 'Create an unforgettable memory on your special day. Our luxury resin nikkah platter features pearls, dried floral wreath, and couple names in fine calligraphy with a heart detail. Includes gold pen stand.',
            ],
            [
                'category_slug' => 'resin-floral-trays',
                'name' => 'Resin Oval Floral Vanity Tray',
                'price' => 2400,
                'sale_price' => null,
                'is_featured' => true,
                'is_customizable' => true,
                'short_description' => 'Crystal clear resin tray embedded with wild dried roses and gold leaf.',
                'description' => 'Multi-purpose vanity or serving tray handcrafted using heat-resistant epoxy resin, preserved blush roses, and genuine gold leaf trim.',
            ],
            // Floral
            [
                'category_slug' => 'floral-flower-bouquets',
                'name' => 'Everlasting Pastel Rose Bouquet',
                'price' => 2200,
                'sale_price' => 1950,
                'is_featured' => true,
                'is_customizable' => true,
                'short_description' => 'Handcrafted eternal faux flower bouquet wrapped in luxury satin ribbon.',
                'description' => 'A sweet bouquet of blush pink and cream roses with baby\'s breath, wrapped delicately in frosted sheets and tied with a satin bow.',
            ],
            [
                'category_slug' => 'floral-keychains',
                'name' => 'Botanical Floral Keychain',
                'price' => 450,
                'sale_price' => null,
                'is_featured' => false,
                'is_customizable' => true,
                'short_description' => 'Clear acrylic dome keychain with real preserved petals.',
                'description' => 'Carry a garden wherever you go! Preserved baby\'s breath and daisy petals in a gold-finished keychain.',
            ],
            // Crochet
            [
                'category_slug' => 'crochet-bags',
                'name' => 'Daisy Bloom Crochet Handbag',
                'price' => 1800,
                'sale_price' => null,
                'is_featured' => true,
                'is_customizable' => true,
                'short_description' => 'Handmade ivory crochet tote with 3D daisy flower motifs.',
                'description' => 'Intricately hand-knitted tote bag made from soft cotton yarn with raised daisy blossoms. Features comfortable handles and a sturdy base.',
            ],
            [
                'category_slug' => 'crochet-gajras',
                'name' => 'Handmade Crochet Motia Gajra Pair',
                'price' => 950,
                'sale_price' => null,
                'is_featured' => true,
                'is_customizable' => true,
                'short_description' => 'Traditional motia jasmine gajras that never fade.',
                'description' => 'Adorn your wrists with these reusable, beautifully crafted crochet motia gajras. Perfect for weddings, eid, and parties.',
            ],
            // Candles
            [
                'category_slug' => 'scented-jar-candles',
                'name' => 'Vanilla & Amber Ribbed Glass Candle',
                'price' => 1200,
                'sale_price' => null,
                'is_featured' => true,
                'is_customizable' => false,
                'short_description' => 'Organic soy wax candle in luxury fluted glass container.',
                'description' => 'Clean-burning 100% natural soy wax infused with warm Madagascar vanilla and amber notes. Hand-poured with lead-free cotton wicks.',
            ],
            [
                'category_slug' => 'bubble-candles',
                'name' => 'Aesthetic Cube Bubble Candle Set (Pair)',
                'price' => 750,
                'sale_price' => null,
                'is_featured' => false,
                'is_customizable' => true,
                'short_description' => 'Trendy cube bubble decorative candles in ivory and beige.',
                'description' => 'Sculptural aesthetic bubble candles designed for coffee tables, vanity trays, and modern interior accents.',
            ],
            // Calligraphy
            [
                'category_slug' => 'mashallah-frames',
                'name' => 'MashaAllah Gold Foil Glass Platter Frame',
                'price' => 2800,
                'sale_price' => 2500,
                'is_featured' => true,
                'is_customizable' => true,
                'short_description' => 'Traditional Thuluth script MashaAllah artwork with pearl border.',
                'description' => 'Captivating Arabic calligraphy of "Masha\'Allah TabarakAllah" surrounded by delicate baby\'s breath floral arrangement and golden rim on an easel stand.',
            ],
            [
                'category_slug' => 'bismillah-frames',
                'name' => 'Bismillah Ar-Rahman Ar-Rahim Acrylic Plaque',
                'price' => 1600,
                'sale_price' => null,
                'is_featured' => true,
                'is_customizable' => true,
                'short_description' => 'Minimalist Bismillah calligraphy in mirror gold on clear glass.',
                'description' => 'A sacred blessing for your home entrance or living space. Hand-finished mirror gold Islamic calligraphy mounted on wooden base stand.',
            ],
            [
                'category_slug' => 'nikkah-frames',
                'name' => 'Custom Nikkah Mubarak Duo Frame with Date',
                'price' => 3200,
                'sale_price' => null,
                'is_featured' => true,
                'is_customizable' => true,
                'short_description' => 'Romantic custom Nikkah contract and Quranic verse frame.',
                'description' => 'Personalized with groom & bride names, Hijri and Gregorian dates, and the verse "And We created you in pairs" (Surah An-Naba 78:8).',
            ],
        ];

        foreach ($products as $pData) {
            $cat = Category::where('slug', $pData['category_slug'])->first();
            if (!$cat) {
                $cat = Category::first();
            }

            $product = Product::create([
                'category_id' => $cat->id,
                'name' => $pData['name'],
                'slug' => Str::slug($pData['name']),
                'short_description' => $pData['short_description'],
                'description' => $pData['description'],
                'price' => $pData['price'],
                'sale_price' => $pData['sale_price'],
                'sku' => 'IC-' . strtoupper(Str::random(6)),
                'stock' => 25,
                'is_featured' => $pData['is_featured'],
                'is_customizable' => $pData['is_customizable'],
                'customization_note' => $pData['is_customizable'] ? 'Provide names, preferred colors, or date in order notes.' : null,
                'is_active' => true,
            ]);

            // Sample review for featured
            if ($pData['is_featured']) {
                Review::create([
                    'product_id' => $product->id,
                    'customer_name' => 'Ayesha Khan',
                    'rating' => 5,
                    'review' => 'Absolutely in love with my order! The quality is beyond perfection. It looks even more breathtaking in person.',
                    'is_approved' => true,
                ]);
                Review::create([
                    'product_id' => $product->id,
                    'customer_name' => 'Sara & Ayyan',
                    'rating' => 5,
                    'review' => 'Ordered this for our Nikkah day, everyone was admiring it. JazakAllah Khair for the fast delivery!',
                    'is_approved' => true,
                ]);
            }
        }
    }
}
