<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::active()->with(['images', 'category', 'reviews']);

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('description', 'like', "%{$searchTerm}%")
                  ->orWhere('short_description', 'like', "%{$searchTerm}%");
            });
        }

        if ($request->filled('category')) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $childIds = $category->children->pluck('id')->push($category->id);
                $query->whereIn('category_id', $childIds);
            }
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', (float) $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', (float) $request->max_price);
        }

        switch ($request->sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->latest();
                break;
            case 'featured':
            default:
                $query->orderBy('is_featured', 'desc')->latest();
                break;
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::active()->parent()->with('children')->orderBy('sort_order')->get();

        return view('products.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        $product->load(['images', 'category', 'reviews']);
        $relatedProducts = Product::active()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->with(['images', 'category'])
            ->take(4)
            ->get();

        if ($relatedProducts->count() < 4) {
            $moreProducts = Product::active()
                ->where('id', '!=', $product->id)
                ->whereNotIn('id', $relatedProducts->pluck('id'))
                ->with(['images', 'category'])
                ->take(4 - $relatedProducts->count())
                ->get();
            $relatedProducts = $relatedProducts->concat($moreProducts);
        }

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function byCategory(Category $category)
    {
        $childIds = $category->children->pluck('id')->push($category->id);
        $products = Product::active()
            ->whereIn('category_id', $childIds)
            ->with(['images', 'category', 'reviews'])
            ->paginate(12);

        $subcategories = $category->parent_id ? $category->parent->children : $category->children;

        return view('products.category', compact('category', 'products', 'subcategories'));
    }

    public function storeReview(Request $request, Product $product)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:100',
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string|max:1000',
        ]);

        $review = $product->reviews()->create([
            'customer_name' => $validated['customer_name'],
            'rating' => $validated['rating'],
            'review' => $validated['review'],
            'is_approved' => true,
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'JazakAllah Khair! Aapka review add ho gaya hai ♡',
                'review' => [
                    'id' => $review->id,
                    'customer_name' => $review->customer_name,
                    'rating' => (int) $review->rating,
                    'review' => $review->review,
                    'initials' => strtoupper(substr(trim($review->customer_name), 0, 2)),
                    'date' => $review->created_at ? $review->created_at->format('d M, Y') : date('d M, Y'),
                ],
                'total_reviews' => $product->reviews()->count(),
            ]);
        }

        return back()->with('success', 'Shukriya! Aapka review add ho gaya hai. JazakAllah Khair! 💛');
    }
}
