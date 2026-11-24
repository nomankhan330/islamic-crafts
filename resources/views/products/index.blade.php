@extends('layouts.app')

@section('title', 'Shop All Collections — Islamic Crafts')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- Header -->
    <div class="text-center mb-10">
        <h1 class="font-serif-lux text-4xl sm:text-5xl text-[#58381C] font-normal mb-2">Shop All Collections</h1>
        <p class="text-xs sm:text-sm text-[#8B613D] italic font-serif-lux">Handcrafted treasures for you and your loved ones</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        
        <!-- Filters Sidebar -->
        <aside class="lg:col-span-1">
            <div class="luxury-card rounded-2xl p-6 sticky top-24">
                <h3 class="font-serif-lux text-xl text-[#58381C] font-medium mb-4 pb-2 border-b border-[#EADBCC]">
                    Filter by Collection
                </h3>

                <form action="{{ route('products.index') }}" method="GET" id="filter-form">
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif

                    <!-- Categories list -->
                    <div class="space-y-2 mb-6">
                        <label class="flex items-center space-x-2 cursor-pointer text-xs font-medium text-[#58381C]">
                            <input type="radio" name="category" value="" {{ !request('category') ? 'checked' : '' }} onchange="this.form.submit()" class="text-[#6F4B2D] focus:ring-[#6F4B2D]">
                            <span>All Collections</span>
                        </label>
                        @foreach($categories as $cat)
                        <label class="flex items-center space-x-2 cursor-pointer text-xs font-medium text-[#58381C]">
                            <input type="radio" name="category" value="{{ $cat->slug }}" {{ request('category') == $cat->slug ? 'checked' : '' }} onchange="this.form.submit()" class="text-[#6F4B2D] focus:ring-[#6F4B2D]">
                            <span>{{ $cat->icon }} {{ $cat->name }}</span>
                        </label>
                        @endforeach
                    </div>

                    <!-- Sort -->
                    <h3 class="font-serif-lux text-xl text-[#58381C] font-medium mb-3 pt-4 border-t border-[#EADBCC]">
                        Sort By
                    </h3>
                    <select name="sort" onchange="this.form.submit()" class="w-full bg-[#FAF4ED] border border-[#DECDBD] rounded-xl px-3 py-2 text-xs text-[#55371E] outline-none">
                        <option value="featured" {{ request('sort') == 'featured' ? 'selected' : '' }}>Featured Bestsellers</option>
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest Arrivals</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                    </select>

                    @if(request('category') || request('search') || request('sort'))
                        <a href="{{ route('products.index') }}" class="block text-center text-[11px] text-[#A8917A] hover:text-[#58381C] mt-4 underline">
                            Clear all filters
                        </a>
                    @endif
                </form>
            </div>
        </aside>

        <!-- Product Grid -->
        <main class="lg:col-span-3">
            
            <div class="flex items-center justify-between mb-6 text-xs text-[#7D5A3C]">
                <span>Showing {{ $products->total() }} handcrafted products</span>
                @if(request('search'))
                    <span>Search results for: "<strong>{{ request('search') }}</strong>"</span>
                @endif
            </div>

            @if($products->isEmpty())
                <div class="luxury-card rounded-2xl p-12 text-center my-8">
                    <span class="text-4xl block mb-3">🔍</span>
                    <h3 class="font-serif-lux text-2xl text-[#58381C] mb-2">No products found</h3>
                    <p class="text-xs text-[#8A6749] mb-6">Try clearing your filters or searching for something else.</p>
                    <a href="{{ route('products.index') }}" class="btn-luxury px-6 py-2.5 rounded-full text-xs">Reset All</a>
                </div>
            @else
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-5">
                    @foreach($products as $product)
                    <div class="luxury-card rounded-2xl overflow-hidden flex flex-col justify-between group">
                        
                        <a href="{{ route('products.show', $product->slug) }}" class="relative bg-[#EFE3D4] h-52 sm:h-60 flex items-center justify-center overflow-hidden">
                            @if($product->primary_image_url)
                                <img src="{{ $product->primary_image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                                <div class="flex flex-col items-center justify-center text-center p-4">
                                    <span class="text-4xl mb-2">{{ $product->category->icon ?? '✨' }}</span>
                                    <span class="font-serif-lux italic text-xs text-[#8A6749]">{{ $product->category->name }}</span>
                                </div>
                            @endif

                            @if($product->is_customizable)
                                <span class="absolute top-2 right-2 bg-[#FAF4ED]/90 text-[#6F4B2D] text-[9px] font-semibold px-2 py-0.5 rounded-full border border-[#D5C2AC]">
                                    Customizable ✨
                                </span>
                            @endif
                        </a>

                        <div class="p-4 text-center flex flex-col items-center flex-grow justify-between">
                            <div>
                                <p class="text-[10px] text-[#8B613D] uppercase tracking-wider mb-1">{{ $product->category->name }}</p>
                                <h4 class="font-serif-lux text-sm sm:text-base text-[#55371E] font-medium line-clamp-1 mb-1">
                                    <a href="{{ route('products.show', $product->slug) }}" class="hover:text-[#B89254] transition-colors">
                                        {{ $product->name }}
                                    </a>
                                </h4>
                                
                                <div class="text-xs sm:text-sm font-medium text-[#785333] mb-3">
                                    <span>Rs. {{ number_format($product->current_price, 0) }}</span>
                                    @if($product->sale_price)
                                        <span class="text-[11px] text-[#A8917A] line-through ml-1">Rs. {{ number_format($product->price, 0) }}</span>
                                    @endif
                                </div>
                            </div>

                            <form action="{{ route('cart.add') }}" method="POST" class="w-full">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="w-full btn-luxury py-2 px-3 rounded-xl text-xs font-medium tracking-wide">
                                    Add to Cart
                                </button>
                            </form>
                        </div>

                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-10">
                    {{ $products->links() }}
                </div>
            @endif

        </main>

    </div>

</div>

@endsection
