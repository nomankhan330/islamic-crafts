<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LookbookItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LookbookController extends Controller
{
    public function index()
    {
        $items = LookbookItem::orderBy('sort_order')->orderBy('id')->get();
        return view('admin.lookbook.index', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'caption' => 'required|string|max:120',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'image_path' => 'nullable|string|max:255',
            'link_url' => 'nullable|string|max:255',
            'handle' => 'nullable|string|max:60',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $imagePath = $validated['image_path'] ?? null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('lookbook', 'public');
        }

        if (!$imagePath) {
            return back()->withErrors(['image' => 'Please upload a photo or provide an image path.'])->withInput();
        }

        LookbookItem::create([
            'caption' => $validated['caption'],
            'image_path' => $imagePath,
            'link_url' => $validated['link_url'] ?: 'https://instagram.com',
            'handle' => $validated['handle'] ?: '@islamiccrafts',
            'sort_order' => $validated['sort_order'] ?? (LookbookItem::max('sort_order') + 1),
            'is_active' => true,
        ]);

        return back()->with('success', 'Photo added to Studio Lookbook! 📸');
    }

    public function update(Request $request, LookbookItem $lookbookItem)
    {
        $validated = $request->validate([
            'caption' => 'required|string|max:120',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'image_path' => 'nullable|string|max:255',
            'link_url' => 'nullable|string|max:255',
            'handle' => 'nullable|string|max:60',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $imagePath = $lookbookItem->image_path;
        if ($request->hasFile('image')) {
            if ($imagePath && !str_starts_with($imagePath, 'images/') && !str_starts_with($imagePath, 'http')) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('lookbook', 'public');
        } elseif (!empty($validated['image_path'])) {
            $imagePath = $validated['image_path'];
        }

        $lookbookItem->update([
            'caption' => $validated['caption'],
            'image_path' => $imagePath,
            'link_url' => $validated['link_url'] ?: 'https://instagram.com',
            'handle' => $validated['handle'] ?: '@islamiccrafts',
            'sort_order' => $validated['sort_order'] ?? $lookbookItem->sort_order,
        ]);

        return back()->with('success', 'Lookbook photo updated! ✨');
    }

    public function toggleActive(LookbookItem $lookbookItem)
    {
        $lookbookItem->update(['is_active' => !$lookbookItem->is_active]);
        return back()->with('success', $lookbookItem->is_active ? 'Lookbook item is now visible.' : 'Lookbook item hidden from homepage.');
    }

    public function destroy(LookbookItem $lookbookItem)
    {
        if ($lookbookItem->image_path && !str_starts_with($lookbookItem->image_path, 'images/') && !str_starts_with($lookbookItem->image_path, 'http')) {
            Storage::disk('public')->delete($lookbookItem->image_path);
        }
        $lookbookItem->delete();
        return back()->with('success', 'Lookbook photo deleted.');
    }
}
