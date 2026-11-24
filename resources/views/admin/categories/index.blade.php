@extends('admin.layouts.admin')

@section('title', 'Categories Management')
@section('header_title', 'Collections & Categories')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    
    <!-- Left: Add New Category Form (4 cols) -->
    <div class="lg:col-span-4 bg-[#FAF4ED] border border-[#E8DACB] rounded-2xl p-6 shadow-sm h-fit">
        <h2 class="font-serif-lux text-xl font-semibold text-[#4A301A] mb-4">Add New Category</h2>

        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Category Name *</label>
                <input type="text" name="name" required placeholder="e.g. Resin Jewellery" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2 text-xs text-[#432C19] outline-none focus:border-[#6B4B32]">
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Parent Collection</label>
                <select name="parent_id" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2 text-xs text-[#432C19] outline-none">
                    <option value="">None (Make Top-Level Collection)</option>
                    @foreach($parentCategories as $pCat)
                        <option value="{{ $pCat->id }}">{{ $pCat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Emoji / Icon</label>
                <input type="text" name="icon" placeholder="✨ or 🔮" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2 text-xs text-[#432C19] outline-none">
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Subtitle / Tagline</label>
                <input type="text" name="description" placeholder="Timeless Elegance ♡" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2 text-xs text-[#432C19] outline-none">
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Sort Order</label>
                <input type="number" name="sort_order" value="1" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2 text-xs text-[#432C19] outline-none">
            </div>

            <button type="submit" class="w-full bg-[#6B4B32] hover:bg-[#573C27] text-white py-2.5 rounded-xl text-xs font-semibold tracking-wide transition-colors mt-2">
                + Create Category
            </button>
        </form>
    </div>

    <!-- Right: Categories List (8 cols) -->
    <div class="lg:col-span-8 bg-[#FAF4ED] border border-[#E8DACB] rounded-2xl p-6 shadow-sm">
        <h2 class="font-serif-lux text-xl font-semibold text-[#4A301A] mb-4">All Active Categories ({{ $categories->total() }})</h2>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="border-b border-[#E8DACB] text-[#8A6749] font-semibold">
                        <th class="pb-3">Name</th>
                        <th class="pb-3">Parent</th>
                        <th class="pb-3">Icon</th>
                        <th class="pb-3">Products</th>
                        <th class="pb-3 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#EFE2D4]">
                    @foreach($categories as $category)
                    <tr class="hover:bg-[#F5ECE1]/50">
                        <td class="py-2.5 font-medium text-[#4A301A]">
                            {{ $category->parent ? '— ' . $category->name : $category->name }}
                        </td>
                        <td class="py-2.5 text-[#7A5A3E]">
                            {{ $category->parent->name ?? 'Main Collection' }}
                        </td>
                        <td class="py-2.5">{{ $category->icon }}</td>
                        <td class="py-2.5 font-semibold text-[#52351E]">{{ $category->products_count }}</td>
                        <td class="py-2.5 text-right">
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-600 font-semibold hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 pt-4 border-t border-[#EADBCC]">
            {{ $categories->links() }}
        </div>
    </div>

</div>

@endsection
