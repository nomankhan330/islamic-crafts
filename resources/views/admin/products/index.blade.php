@extends('admin.layouts.admin')

@section('title', 'Products Management')
@section('header_title', 'Products Catalog')

@section('content')

<div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-8 shadow-xs">
    
    <!-- Top Filter Bar -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6 pb-6 border-b border-[#EADBCC]">
        <form method="GET" action="{{ route('admin.products.index') }}" class="flex flex-wrap items-center gap-3 flex-grow">
            <!-- Search Input -->
            <div class="relative min-w-[260px]">
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Search products by title or SKU..." 
                       class="w-full bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl pl-9 pr-4 py-2.5 text-xs text-[#432C19] outline-none shadow-2xs">
                <span class="absolute left-3 top-3 text-[#8A6749] text-xs">🔍</span>
            </div>

            <!-- Category Filter Dropdown -->
            <select name="category_id" class="bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl px-3.5 py-2.5 text-xs text-[#432C19] outline-none shadow-2xs">
                <option value="">All Craft Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="btn-luxury px-4 py-2.5 rounded-xl text-xs font-semibold shadow-2xs">
                Filter
            </button>
            @if(request()->hasAny(['search', 'category_id']))
                <a href="{{ route('admin.products.index') }}" class="text-xs text-[#8A6749] hover:underline">Clear Filter</a>
            @endif
        </form>

        <a href="{{ route('admin.products.create') }}" class="btn-luxury px-5 py-2.5 rounded-xl text-xs font-semibold tracking-wide inline-flex items-center space-x-1.5 shadow-sm hover:shadow-md transition-all flex-shrink-0">
            <span>+</span>
            <span>Add New Craft Item</span>
        </a>
    </div>

    <!-- Products Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead>
                <tr class="border-b border-[#EADBCC] text-[#8A6749] uppercase tracking-wider font-semibold text-[11px]">
                    <th class="pb-3.5 w-16">Item</th>
                    <th class="pb-3.5">Product Title & SKU</th>
                    <th class="pb-3.5">Category</th>
                    <th class="pb-3.5">Price</th>
                    <th class="pb-3.5 text-center">Stock</th>
                    <th class="pb-3.5 text-center">Homepage</th>
                    <th class="pb-3.5 text-center">Visibility</th>
                    <th class="pb-3.5 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#EFE2D4]">
                @forelse($products as $product)
                <tr class="hover:bg-[#F8F2E9]/60 transition-colors">
                    
                    <!-- Image -->
                    <td class="py-3.5">
                        <div class="w-12 h-12 rounded-xl bg-[#F0E3D3] overflow-hidden flex items-center justify-center border border-[#DECDBD] relative group flex-shrink-0 shadow-2xs">
                            @if($product->primary_image_url)
                                <img src="{{ $product->primary_image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                            @else
                                <span class="text-lg">{{ $product->category->icon ?? '✨' }}</span>
                            @endif
                        </div>
                    </td>

                    <!-- Name & SKU -->
                    <td class="py-3.5 pr-4">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="font-serif-lux font-semibold text-[#4A301A] hover:text-[#8F6644] text-sm sm:text-base block leading-tight">
                            {{ $product->name }}
                        </a>
                        <div class="flex items-center space-x-2 text-[10px] text-[#8A6749] mt-0.5">
                            <span class="font-mono bg-[#F2E5D5] px-1.5 py-0.2 rounded">SKU: {{ $product->sku }}</span>
                            @if($product->is_customizable)
                                <span class="text-amber-800 font-semibold">• Customizable</span>
                            @endif
                        </div>
                    </td>

                    <!-- Category -->
                    <td class="py-3.5">
                        <span class="inline-block px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#F3E7D9] text-[#6B4B32] border border-[#DECDBD]">
                            {{ $product->category->name ?? 'Uncategorized' }}
                        </span>
                    </td>

                    <!-- Price -->
                    <td class="py-3.5 font-semibold text-[#52351E]">
                        <span class="text-xs sm:text-sm">Rs. {{ number_format($product->price, 0) }}</span>
                        @if($product->sale_price)
                            <span class="text-[10px] text-rose-700 block font-normal">Sale: Rs. {{ number_format($product->sale_price, 0) }}</span>
                        @endif
                    </td>

                    <!-- Stock -->
                    <td class="py-3.5 text-center">
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-semibold {{ $product->stock > 5 ? 'bg-emerald-100 text-emerald-800' : ($product->stock > 0 ? 'bg-amber-100 text-amber-800' : 'bg-rose-100 text-rose-800') }}">
                            {{ $product->stock }} left
                        </span>
                    </td>

                    <!-- Featured Toggle -->
                    <td class="py-3.5 text-center">
                        <form action="{{ route('admin.products.toggle-featured', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="px-2.5 py-1 rounded-full text-[10px] font-semibold transition-all {{ $product->is_featured ? 'bg-amber-100 text-amber-900 border border-amber-300' : 'bg-[#EADBCC]/60 text-[#7A5638] hover:bg-[#EADBCC]' }}" title="Click to toggle featured on home page">
                                {{ $product->is_featured ? '⭐ Bestseller' : 'Standard' }}
                            </button>
                        </form>
                    </td>

                    <!-- Active Toggle -->
                    <td class="py-3.5 text-center">
                        <form action="{{ route('admin.products.toggle-active', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="px-2.5 py-1 rounded-full text-[10px] font-semibold transition-all {{ $product->is_active ? 'bg-emerald-100 text-emerald-800 border border-emerald-300' : 'bg-rose-100 text-rose-800 border border-rose-300' }}" title="Click to toggle active status">
                                {{ $product->is_active ? '● Live' : '○ Hidden' }}
                            </button>
                        </form>
                    </td>

                    <!-- Actions -->
                    <td class="py-3.5 text-right space-x-2">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="inline-flex items-center space-x-1 px-3 py-1.5 rounded-lg text-xs font-semibold bg-[#FAF4ED] text-[#5C3D24] border border-[#DFCBB7] hover:bg-[#6B4B32] hover:text-white transition-all shadow-2xs">
                            <span>✏️ Edit</span>
                        </a>

                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this craft item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2.5 py-1.5 rounded-lg text-xs font-semibold text-rose-700 hover:bg-rose-100 transition-colors">
                                🗑️
                            </button>
                        </form>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-12 text-[#8A6749]">
                        <span class="text-3xl block mb-2">📦</span>
                        <span>No handcrafted products found.</span>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 pt-4 border-t border-[#EADBCC]">
        {{ $products->links() }}
    </div>

</div>

@endsection
