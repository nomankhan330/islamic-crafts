<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Resin Collection',
                'icon' => '🔮',
                'description' => 'Timeless Elegance ♡',
                'children' => [
                    'Resin Jewellery',
                    'Resin Keychains',
                    'Resin Nikkah Platters',
                    'Resin Wall Clocks',
                    'Resin Floral Trays'
                ]
            ],
            [
                'name' => 'Floral Collection',
                'icon' => '🌸',
                'description' => 'Bloom with Love ♡',
                'children' => [
                    'Floral Flower Bouquets',
                    'Flower Pots',
                    'Floral Keychains',
                    'Floral Flower Bags',
                    'Crossbody Bags'
                ]
            ],
            [
                'name' => 'Crochet Collection',
                'icon' => '🧶',
                'description' => 'Handmade Happiness ♡',
                'children' => [
                    'Crochet Bags',
                    'Crochet Keychains',
                    'Crochet Flower Bouquets',
                    'Crochet Gajras',
                    'Crochet Bandanas'
                ]
            ],
            [
                'name' => 'Candle Collection',
                'icon' => '🕯️',
                'description' => 'Illuminate Your Space ♡',
                'children' => [
                    'Scented Jar Candles',
                    'Decorative Candles',
                    'Floral Candles',
                    'Teddy Candles',
                    'Bubble Candles',
                    'Customized Candles',
                    'Candle & Tray Sets'
                ]
            ],
            [
                'name' => 'Calligraphy Collection',
                'icon' => '✍️',
                'description' => 'Sacred Words & Islamic Art ♡',
                'children' => [
                    'Arabic Calligraphy Canvases',
                    'Islamic Wall Art',
                    'Customized Name Calligraphy',
                    'Bismillah Frames',
                    'Alhamdulillah Frames',
                    'Mashallah Frames',
                    'Sufi Art & Paintings',
                    'Nikkah Frames',
                    'Customized Islamic Gifts',
                    'Stands'
                ]
            ],
        ];

        foreach ($categories as $i => $catData) {
            $parent = Category::create([
                'name' => $catData['name'],
                'slug' => Str::slug($catData['name']),
                'icon' => $catData['icon'],
                'description' => $catData['description'],
                'sort_order' => $i + 1,
                'is_active' => true,
            ]);

            foreach ($catData['children'] as $j => $childName) {
                Category::create([
                    'name' => $childName,
                    'slug' => Str::slug($childName),
                    'parent_id' => $parent->id,
                    'icon' => $catData['icon'],
                    'sort_order' => $j + 1,
                    'is_active' => true,
                ]);
            }
        }
    }
}
