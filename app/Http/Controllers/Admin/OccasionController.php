<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Occasion;
use Illuminate\Http\Request;

class OccasionController extends Controller
{
    public function index()
    {
        $occasions = Occasion::orderBy('sort_order')->orderBy('id')->paginate(8)->withQueryString();
        return view('admin.occasions.index', compact('occasions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:120',
            'icon' => 'nullable|string|max:20',
            'description' => 'nullable|string|max:400',
            'link_text' => 'nullable|string|max:80',
            'link_url' => 'required|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        Occasion::create([
            'title' => $validated['title'],
            'icon' => $validated['icon'] ?: '✨',
            'description' => $validated['description'] ?? '',
            'link_text' => $validated['link_text'] ?: 'Explore',
            'link_url' => $validated['link_url'],
            'sort_order' => $validated['sort_order'] ?? (Occasion::max('sort_order') + 1),
            'is_active' => true,
        ]);

        return back()->with('success', 'Occasion card added to homepage! ✨');
    }

    public function update(Request $request, Occasion $occasion)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:120',
            'icon' => 'nullable|string|max:20',
            'description' => 'nullable|string|max:400',
            'link_text' => 'nullable|string|max:80',
            'link_url' => 'required|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $occasion->update([
            'title' => $validated['title'],
            'icon' => $validated['icon'] ?: '✨',
            'description' => $validated['description'] ?? '',
            'link_text' => $validated['link_text'] ?: 'Explore',
            'link_url' => $validated['link_url'],
            'sort_order' => $validated['sort_order'] ?? $occasion->sort_order,
        ]);

        return back()->with('success', 'Occasion card updated successfully! 💛');
    }

    public function toggleActive(Occasion $occasion)
    {
        $occasion->update(['is_active' => !$occasion->is_active]);
        return back()->with('success', $occasion->is_active ? 'Occasion is now visible on homepage.' : 'Occasion hidden from homepage.');
    }

    public function destroy(Occasion $occasion)
    {
        $occasion->delete();
        return back()->with('success', 'Occasion deleted successfully.');
    }
}
