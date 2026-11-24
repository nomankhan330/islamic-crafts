<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Services\CartService;

class HomeController extends Controller
{
    public function index(CartService $cartService)
    {
        $parentCategories = Category::active()->parent()->with('children')->orderBy('sort_order')->get();

        // Ensure the 4 screenshot bestsellers appear in exact order
        $bestsellerNames = ['Resin Earrings', 'Resin Keychains', 'Nikkah Platter', 'Crochet Bag'];
        $featuredProducts = Product::active()
            ->with(['images', 'category', 'reviews'])
            ->whereIn('name', $bestsellerNames)
            ->get()
            ->sortBy(function ($p) use ($bestsellerNames) {
                return array_search($p->name, $bestsellerNames);
            })
            ->values();

        // Add additional active products (up to 8 total) for interactive Bestsellers carousel
        if ($featuredProducts->count() < 8) {
            $extra = Product::active()
                ->with(['images', 'category', 'reviews'])
                ->whereNotIn('id', $featuredProducts->pluck('id'))
                ->take(8 - $featuredProducts->count())
                ->get();
            $featuredProducts = $featuredProducts->merge($extra)->unique('id')->values();
        }

        $approvedReviews = Review::with('product')->where('is_approved', true)->latest()->take(6)->get();

        return view('home', compact('parentCategories', 'featuredProducts', 'approvedReviews'));
    }
}
