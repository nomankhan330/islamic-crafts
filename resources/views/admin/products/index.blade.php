@extends('admin.layouts.admin')

@section('title', 'Products Management')
@section('header_title', 'Products Catalog')

@section('content')

<!-- 1. Dark Espresso Products Catalog Hero Banner -->
<div class="relative rounded-[2rem] bg-gradient-to-br from-[#4A2E19] via-[#5B3A20] to-[#361F0E] text-[#FAF4ED] p-6 sm:p-8 mb-7 shadow-md overflow-hidden">
    <div class="pointer-events-none absolute -top-16 -right-16 w-64 h-64 rounded-full bg-[#C6A47E]/15 blur-3xl"></div>

    <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">
        <div>
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-[#FAF4ED]/10 border border-[#DFCBB7]/25 text-[10px] font-semibold uppercase tracking-[0.2em] text-[#E6C9A8] mb-3">
                <span>✨</span>
                <span>Artisanal Inventory Studio</span>
            </div>
            <h2 class="font-serif-lux italic text-3xl sm:text-4xl text-[#FDF8F1] font-normal leading-tight">
                Handcrafted Products Catalog
            </h2>
            <p class="text-xs sm:text-sm text-[#DBC4AC] mt-1.5 max-w-xl">
                Curate resin platters, floral keepsakes, and crochet pieces — manage multi-image galleries, pricing, stock, and homepage bestsellers.
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-2.5">
            <a href="{{ route('admin.products.create') }}"
               class="px-5 py-2.5 rounded-full bg-[#FAF4ED] hover:bg-white text-[#4A2D16] text-xs font-semibold shadow-sm transition-all inline-flex items-center space-x-1.5">
                <span>+</span>
                <span>Add New Craft Item</span>
            </a>
            <a href="{{ route('products.index') }}" target="_blank"
               class="px-4 py-2.5 rounded-full bg-[#FAF4ED]/12 hover:bg-[#FAF4ED]/20 text-[#FAF4ED] border border-[#DFCBB7]/30 text-xs font-semibold transition-all">
                View Live Shop ↗
            </a>
        </div>
    </div>
</div>

<!-- 2. 4 Clickable Inventory KPI Cards -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 mb-7">
    <a href="{{ route('admin.products.index') }}" class="group relative bg-gradient-to-br from-[#FAF4ED] to-[#F4E9DC] border border-[#DECDBD] hover:border-[#B8926A] rounded-3xl p-5 shadow-xs hover:shadow-md transition-all hover:-translate-y-0.5 overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-[#6B4B32] to-[#C6A47E]"></div>
        <div class="flex items-center justify-between mb-2">
            <span class="text-[10px] sm:text-[11px] font-semibold uppercase tracking-wider text-[#8A6749]">Total Crafts</span>
            <span class="w-9 h-9 rounded-xl bg-[#EFE1D1] border border-[#DFCBB7] flex items-center justify-center text-base">📦</span>
        </div>
        <p class="font-serif-lux text-3xl font-bold text-[#4A301A]">{{ $stats['total'] }}</p>
        <p class="text-[11px] text-[#7A5A3E] mt-1">All catalog items</p>
    </a>

    <a href="{{ route('admin.products.index', ['status' => 'active']) }}" class="group relative bg-gradient-to-br from-[#FAF4ED] to-[#F4E9DC] border border-[#DECDBD] hover:border-emerald-400 rounded-3xl p-5 shadow-xs hover:shadow-md transition-all hover:-translate-y-0.5 overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-emerald-500 to-teal-400"></div>
        <div class="flex items-center justify-between mb-2">
            <span class="text-[10px] sm:text-[11px] font-semibold uppercase tracking-wider text-[#8A6749]">Live & Visible</span>
            <span class="w-9 h-9 rounded-xl bg-emerald-50 border border-emerald-200 flex items-center justify-center text-base">🟢</span>
        </div>
        <p class="font-serif-lux text-3xl font-bold text-emerald-900">{{ $stats['active'] }}</p>
        <p class="text-[11px] text-emerald-800 mt-1">Published on storefront</p>
    </a>

    <a href="{{ route('admin.products.index', ['status' => 'featured']) }}" class="group relative bg-gradient-to-br from-[#FAF4ED] to-[#F4E9DC] border border-[#DECDBD] hover:border-amber-400 rounded-3xl p-5 shadow-xs hover:shadow-md transition-all hover:-translate-y-0.5 overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-amber-500 to-amber-300"></div>
        <div class="flex items-center justify-between mb-2">
            <span class="text-[10px] sm:text-[11px] font-semibold uppercase tracking-wider text-[#8A6749]">Bestsellers</span>
            <span class="w-9 h-9 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-center text-base">⭐</span>
        </div>
        <p class="font-serif-lux text-3xl font-bold text-amber-900">{{ $stats['featured'] }}</p>
        <p class="text-[11px] text-amber-800 mt-1">Featured on homepage</p>
    </a>

    <a href="{{ route('admin.products.index', ['status' => 'low_stock']) }}" class="group relative bg-gradient-to-br from-[#FAF4ED] to-[#F4E9DC] border border-[#DECDBD] hover:border-rose-400 rounded-3xl p-5 shadow-xs hover:shadow-md transition-all hover:-translate-y-0.5 overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-rose-500 to-amber-400"></div>
        <div class="flex items-center justify-between mb-2">
            <span class="text-[10px] sm:text-[11px] font-semibold uppercase tracking-wider text-[#8A6749]">Low Stock</span>
            <span class="w-9 h-9 rounded-xl bg-rose-50 border border-rose-200 flex items-center justify-center text-base">⚠️</span>
        </div>
        <p class="font-serif-lux text-3xl font-bold text-rose-900">{{ $stats['low_stock'] }}</p>
        <p class="text-[11px] text-rose-800 mt-1">5 or fewer remaining</p>
    </a>
</div>

<!-- 3. Main Products Catalog Card -->
<div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-7 shadow-xs">

    <!-- Quick Status Pills + Search & Category Filter -->
    <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-4 mb-6 pb-5 border-b border-[#EADBCC]">
        <div class="flex flex-wrap items-center gap-2">
            @php
                $statusTabs = [
                    '' => 'All (' . $stats['total'] . ')',
                    'active' => 'Live (' . $stats['active'] . ')',
                    'featured' => 'Bestsellers (' . $stats['featured'] . ')',
                    'low_stock' => 'Low Stock (' . $stats['low_stock'] . ')',
                    'hidden' => 'Hidden',
                ];
            @endphp
            @foreach($statusTabs as $val => $label)
                @php $isActive = request('status', '') === $val; @endphp
                <a href="{{ route('admin.products.index', array_filter(['status' => $val, 'search' => request('search'), 'category_id' => request('category_id')])) }}"
                   class="px-3.5 py-1.5 rounded-full text-xs font-semibold transition-all {{ $isActive ? 'bg-[#6B4B32] text-white shadow-xs' : 'bg-[#F5ECE1] text-[#7A5A3E] border border-[#E6D6C5] hover:bg-[#EADBCC]' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        <form method="GET" action="{{ route('admin.products.index') }}" class="flex flex-wrap items-center gap-2.5">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif
            <div class="relative min-w-[200px] flex-grow sm:flex-grow-0">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Search title or SKU..."
                       class="w-full bg-[#F5ECE1] border border-[#DFCBB7] focus:border-[#6B4B32] rounded-full pl-9 pr-4 py-2 text-xs text-[#432C19] placeholder-[#9E8165] outline-none">
                <span class="absolute left-3 top-2 text-[#8A6749] text-xs">🔍</span>
            </div>

            <select name="category_id" class="bg-[#F5ECE1] border border-[#DFCBB7] focus:border-[#6B4B32] rounded-full px-3.5 py-2 text-xs text-[#432C19] outline-none">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="bg-[#6B4B32] hover:bg-[#573C27] text-white px-4 py-2 rounded-full text-xs font-semibold transition-colors cursor-pointer">
                Filter
            </button>

            @if(request()->hasAny(['search', 'category_id', 'status']))
                <a href="{{ route('admin.products.index') }}" class="text-xs font-semibold text-[#8A6749] hover:text-[#4A301A] underline">Reset</a>
            @endif
        </form>
    </div>

    <!-- Products Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead>
                <tr class="border-b border-[#EADBCC] text-[#8A6749] uppercase tracking-wider font-semibold text-[11px]">
                    <th class="pb-3.5 w-20">Photo</th>
                    <th class="pb-3.5">Product & SKU</th>
                    <th class="pb-3.5">Category</th>
                    <th class="pb-3.5">Pricing</th>
                    <th class="pb-3.5 text-center">Stock</th>
                    <th class="pb-3.5 text-center">Homepage</th>
                    <th class="pb-3.5 text-center">Visibility</th>
                    <th class="pb-3.5 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#EFE2D4]">
                @forelse($products as $product)
                <tr class="hover:bg-[#F5ECE1]/60 transition-colors group">

                    <!-- HD Thumbnail + Gallery Count Badge -->
                    <td class="py-3.5">
                        <div class="relative w-14 h-14 rounded-2xl bg-[#F0E3D3] overflow-hidden flex items-center justify-center border border-[#DECDBD] shadow-2xs flex-shrink-0">
                            @if($product->primary_image_url)
                                <img src="{{ $product->primary_image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            @else
                                <span class="text-xl">{{ $product->category->icon ?? '✨' }}</span>
                            @endif
                            @if($product->images_count > 1)
                                <span class="absolute bottom-0.5 right-0.5 px-1.5 py-0.2 rounded-md bg-[#3A2210]/85 text-[#FAF4ED] text-[9px] font-bold">
                                    📷 {{ $product->images_count }}
                                </span>
                            @endif
                        </div>
                    </td>

                    <!-- Name & SKU -->
                    <td class="py-3.5 pr-4">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="font-serif-lux font-semibold text-[#4A301A] hover:text-[#8F6644] text-base block leading-tight">
                            {{ $product->name }}
                        </a>
                        <div class="flex flex-wrap items-center gap-1.5 text-[10px] text-[#8A6749] mt-1">
                            <span class="font-mono bg-[#F2E5D5] border border-[#E4D1BD] px-1.5 py-0.2 rounded">SKU: {{ $product->sku }}</span>
                            @if($product->is_customizable)
                                <span class="px-1.5 py-0.2 rounded bg-amber-50 text-amber-800 border border-amber-200 font-semibold">✨ Customizable</span>
                            @endif
                            <a href="{{ route('products.show', $product->slug) }}" target="_blank" class="text-[#6B4B32] hover:underline ml-0.5">Live ↗</a>
                        </div>
                    </td>

                    <!-- Category -->
                    <td class="py-3.5">
                        <span class="inline-block px-3 py-1 rounded-full text-[11px] font-medium bg-[#F3E7D9] text-[#6B4B32] border border-[#DECDBD]">
                            {{ $product->category->name ?? 'Uncategorized' }}
                        </span>
                    </td>

                    <!-- Pricing -->
                    <td class="py-3.5">
                        @if($product->sale_price)
                            <span class="font-bold text-rose-700 text-[13px] block">Rs. {{ number_format($product->sale_price, 0) }}</span>
                            <span class="text-[10px] text-[#8A6749] line-through">Rs. {{ number_format($product->price, 0) }}</span>
                        @else
                            <span class="font-bold text-[#4A301A] text-[13px]">Rs. {{ number_format($product->price, 0) }}</span>
                        @endif
                    </td>

                    <!-- Stock -->
                    <td class="py-3.5 text-center">
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-semibold {{ $product->stock > 5 ? 'bg-emerald-100 text-emerald-800 border border-emerald-200' : ($product->stock > 0 ? 'bg-amber-100 text-amber-800 border border-amber-200' : 'bg-rose-100 text-rose-800 border border-rose-200') }}">
                            {{ $product->stock > 0 ? $product->stock . ' in stock' : 'Out of stock' }}
                        </span>
                    </td>

                    <!-- Featured Toggle -->
                    <td class="py-3.5 text-center">
                        <form action="{{ route('admin.products.toggle-featured', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="px-2.5 py-1 rounded-full text-[10px] font-semibold transition-all cursor-pointer {{ $product->is_featured ? 'bg-amber-100 text-amber-900 border border-amber-300 shadow-2xs' : 'bg-[#EFE2D4] text-[#7A5638] hover:bg-[#E4D1BD]' }}" title="Toggle homepage bestseller">
                                {{ $product->is_featured ? '⭐ Bestseller' : 'Standard' }}
                            </button>
                        </form>
                    </td>

                    <!-- Active Toggle -->
                    <td class="py-3.5 text-center">
                        <form action="{{ route('admin.products.toggle-active', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="px-2.5 py-1 rounded-full text-[10px] font-semibold transition-all cursor-pointer {{ $product->is_active ? 'bg-emerald-100 text-emerald-800 border border-emerald-300' : 'bg-rose-100 text-rose-800 border border-rose-300' }}" title="Toggle storefront visibility">
                                {{ $product->is_active ? '● Live' : '○ Hidden' }}
                            </button>
                        </form>
                    </td>

                    <!-- Actions -->
                    <td class="py-3.5 text-right">
                        <div class="inline-flex items-center space-x-1.5">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="px-3 py-1.5 rounded-lg text-[11px] font-semibold bg-[#FAF4ED] text-[#5C3D24] border border-[#DFCBB7] hover:bg-[#6B4B32] hover:text-white transition-all shadow-2xs">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete {{ addslashes($product->name) }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2.5 py-1.5 rounded-lg text-[11px] font-semibold bg-rose-50 text-rose-700 border border-rose-200 hover:bg-rose-600 hover:text-white transition-all cursor-pointer" title="Delete Product">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-14">
                        <div class="w-14 h-14 mx-auto rounded-2xl bg-[#F3E6D7] border border-[#E2CCB6] flex items-center justify-center text-2xl mb-3">📦</div>
                        <h4 class="font-serif-lux text-2xl text-[#4A301A] mb-1">No products found</h4>
                        <p class="text-xs text-[#8A6749]">Try adjusting your search or filter, or add a new handcrafted piece.</p>
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
