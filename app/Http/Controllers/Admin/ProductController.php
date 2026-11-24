<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'images'])->latest();

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('sku', 'like', "%{$s}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:price',
            'stock' => 'required|integer|min:0',
            'short_description' => 'nullable|string|max:500',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'primary_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'is_customizable' => 'boolean',
            'customization_note' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        // Ensure unique slug
        $count = Product::where('slug', 'like', $validated['slug'] . '%')->count();
        if ($count > 0) {
            $validated['slug'] .= '-' . ($count + 1);
        }

        $validated['sku'] = 'IC-' . strtoupper(Str::random(6));
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['is_customizable'] = $request->boolean('is_customizable');

        $product = Product::create($validated);

        // 1. Primary / Master Image
        $primaryUploaded = false;
        if ($request->hasFile('primary_image')) {
            $path = $request->file('primary_image')->store('products', 'public');
            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $path,
                'is_primary' => true,
                'sort_order' => 1,
            ]);
            $primaryUploaded = true;
        } elseif ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $path,
                'is_primary' => true,
                'sort_order' => 1,
            ]);
            $primaryUploaded = true;
        }

        // 2. Multiple Gallery Images
        if ($request->hasFile('gallery_images')) {
            $order = $primaryUploaded ? 2 : 1;
            foreach ($request->file('gallery_images') as $galleryFile) {
                if ($galleryFile->isValid()) {
                    $path = $galleryFile->store('products', 'public');
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $path,
                        'is_primary' => !$primaryUploaded && $order === 1,
                        'sort_order' => $order++,
                    ]);
                    if (!$primaryUploaded && $order === 2) {
                        $primaryUploaded = true;
                    }
                }
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created with images successfully!');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        $product->load(['images' => function($q) {
            $q->orderByDesc('is_primary')->orderBy('sort_order');
        }]);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'short_description' => 'nullable|string|max:500',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'primary_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'is_customizable' => 'boolean',
            'customization_note' => 'nullable|string',
        ]);

        if ($product->name !== $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_customizable'] = $request->boolean('is_customizable');

        $product->update($validated);

        // 1. Primary / Master Image update
        $newPrimaryFile = $request->file('primary_image') ?? $request->file('image');
        if ($newPrimaryFile && $newPrimaryFile->isValid()) {
            $path = $newPrimaryFile->store('products', 'public');
            // Check if there is already a primary image
            $currentPrimary = $product->images()->where('is_primary', true)->first();
            if ($currentPrimary) {
                // Demote old primary or update
                $product->images()->update(['is_primary' => false]);
            }
            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $path,
                'is_primary' => true,
                'sort_order' => 1,
            ]);
        }

        // 2. Append Multiple Gallery Images
        if ($request->hasFile('gallery_images')) {
            $maxSort = (int) $product->images()->max('sort_order');
            $hasPrimary = $product->images()->where('is_primary', true)->exists();
            $order = $maxSort + 1;

            foreach ($request->file('gallery_images') as $galleryFile) {
                if ($galleryFile->isValid()) {
                    $path = $galleryFile->store('products', 'public');
                    $isFirstAndOnly = !$hasPrimary && $order === ($maxSort + 1);
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $path,
                        'is_primary' => $isFirstAndOnly,
                        'sort_order' => $order++,
                    ]);
                    if ($isFirstAndOnly) {
                        $hasPrimary = true;
                    }
                }
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function makePrimaryImage(Product $product, ProductImage $image)
    {
        if ($image->product_id !== $product->id) {
            abort(403);
        }

        $product->images()->update(['is_primary' => false]);
        $image->update(['is_primary' => true, 'sort_order' => 1]);

        return back()->with('success', 'Master/Primary image successfully updated! ⭐');
    }

    public function deleteImage(Product $product, ProductImage $image)
    {
        if ($image->product_id !== $product->id) {
            abort(403);
        }

        $wasPrimary = $image->is_primary;
        $image->delete();

        // If it was primary, promote another image to primary
        if ($wasPrimary) {
            $next = $product->images()->first();
            if ($next) {
                $next->update(['is_primary' => true, 'sort_order' => 1]);
            }
        }

        return back()->with('success', 'Image removed from product gallery.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }

    public function toggleFeatured(Product $product)
    {
        $product->update(['is_featured' => !$product->is_featured]);
        return back()->with('success', 'Featured status updated.');
    }

    public function toggleActive(Product $product)
    {
        $product->update(['is_active' => !$product->is_active]);
        return back()->with('success', 'Visibility status updated.');
    }
}
