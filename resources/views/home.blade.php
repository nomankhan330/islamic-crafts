@extends('layouts.app')

@section('title', 'Welcome to Islamic Crafts — Handmade with Love, Crafted with Elegance')

@section('content')

<!-- High-Definition Hero Banner (Crisp Vector Typography & 1920x1080 Photorealistic Background) -->
<section class="relative w-full bg-[#FAF4ED] overflow-hidden border-b border-[#EADBCC]">
    <div class="relative w-full min-h-[460px] sm:min-h-[520px] lg:min-h-[560px] flex items-center">
        <!-- High Resolution Background Image -->
        <img src="{{ asset('images/hero-banner-hd.jpg') }}" 
             alt="Islamic Crafts Hero Setup" 
             class="absolute inset-0 w-full h-full object-cover object-right sm:object-center select-none pointer-events-none">
        
        <!-- Soft gradient overlay on mobile for guaranteed readability -->
        <div class="absolute inset-0 bg-gradient-to-r from-[#FAF4ED]/95 via-[#FAF4ED]/75 to-transparent sm:from-[#FAF4ED]/90 sm:via-[#FAF4ED]/40 sm:to-transparent pointer-events-none"></div>

        <!-- Crisp Vector Typography (Infinitely Sharp, Never Pixelates!) -->
        <div class="relative max-w-7xl mx-auto px-6 sm:px-10 lg:px-12 w-full py-12 sm:py-16">
            <div class="max-w-xl text-left z-10">
                <!-- Sparkle -->
                <div class="text-[#B38E6A] text-xl mb-1">✦</div>

                <!-- Decorative flourish above title -->
                <div class="w-24 sm:w-28 text-[#CBB199] mb-2 opacity-80">
                    <svg viewBox="0 0 100 20" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M0 10 Q 50 20 70 5 Q 85 0 100 10" stroke-linecap="round"/>
                    </svg>
                </div>

                <h1 class="font-serif-lux text-5xl sm:text-6xl lg:text-7xl font-normal text-[#52351E] leading-[1.08] mb-3">
                    Welcome to<br>
                    <span class="italic font-normal">Islamic Crafts</span>
                    <span class="font-sans font-light text-[#9A7453] text-4xl sm:text-5xl"> ♡</span>
                </h1>

                <p class="font-serif-lux italic text-xl sm:text-2xl text-[#785539] mb-8 font-light leading-snug">
                    Handmade with love,<br class="hidden sm:inline"> crafted with elegance.
                </p>

                <div>
                    <a href="{{ route('products.index') }}" class="btn-luxury inline-flex items-center space-x-2 px-8 py-3.5 rounded-full text-xs sm:text-sm font-medium tracking-wide shadow-md hover:shadow-lg transform transition-all duration-300 hover:scale-105 active:scale-95">
                        <span>Shop Now</span>
                        <span>→</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3 Main Featured Collections (Resin, Floral, Crochet Cards - Ultra Luxury Seamless Silk Design) -->
<section class="py-12 sm:py-16 bg-[#FAF4ED]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-7">
            
            <!-- 1. Resin Collection Card -->
            <a href="{{ route('category.show', 'resin-collection') }}" class="group relative rounded-3xl overflow-hidden border border-[#E8DACB] shadow-[0_8px_24px_-4px_rgba(79,53,32,0.06)] hover:shadow-[0_20px_40px_-8px_rgba(79,53,32,0.16)] hover:border-[#CBB199] transition-all duration-500 hover:-translate-y-2 min-h-[210px] sm:min-h-[230px] flex flex-col justify-between p-6 sm:p-7 bg-[#F7EFE6] block">
                <!-- Background Image of Silk with Resin Tray on right -->
                <img src="{{ asset('images/card-resin-full-hd.jpg') }}" alt="Resin Collection" class="absolute inset-0 w-full h-full object-cover object-right transform group-hover:scale-108 transition-transform duration-700 ease-out select-none">
                
                <!-- Soft Gradient Fade on Left for Text Readability -->
                <div class="absolute inset-0 bg-gradient-to-r from-[#FAF4ED]/95 via-[#FAF4ED]/75 to-transparent w-[75%] sm:w-[70%] pointer-events-none"></div>

                <!-- Text Content on Left -->
                <div class="relative z-10">
                    <div class="text-[#B38E6A] text-xs mb-1">✦</div>
                    <h3 class="font-serif-lux text-2xl sm:text-3xl text-[#4A2F17] font-normal leading-tight">
                        Resin<br><span class="italic font-normal">Collection</span>
                    </h3>
                    <p class="text-xs text-[#8A6749] mt-1.5 font-medium flex items-center space-x-1">
                        <span>Timeless Elegance</span>
                        <span class="text-xs text-[#9A7453]">♡</span>
                    </p>
                </div>

                <!-- Explore Pill Button -->
                <div class="relative z-10 mt-8">
                    <span class="inline-flex items-center space-x-1.5 bg-[#FAF4ED]/90 backdrop-blur-sm text-[#5C3D24] border border-[#DFCBB7] text-xs font-semibold px-4 sm:px-5 py-2 rounded-full shadow-sm group-hover:bg-[#6B4B32] group-hover:text-white group-hover:border-[#6B4B32] transition-all duration-300">
                        <span>Explore</span>
                        <span class="transform transition-transform duration-300 group-hover:translate-x-1">→</span>
                    </span>
                </div>
            </a>

            <!-- 2. Floral Collection Card -->
            <a href="{{ route('category.show', 'floral-collection') }}" class="group relative rounded-3xl overflow-hidden border border-[#E8DACB] shadow-[0_8px_24px_-4px_rgba(79,53,32,0.06)] hover:shadow-[0_20px_40px_-8px_rgba(79,53,32,0.16)] hover:border-[#CBB199] transition-all duration-500 hover:-translate-y-2 min-h-[210px] sm:min-h-[230px] flex flex-col justify-between p-6 sm:p-7 bg-[#F7EFE6] block">
                <img src="{{ asset('images/card-floral-full-hd.jpg') }}" alt="Floral Collection" class="absolute inset-0 w-full h-full object-cover object-right transform group-hover:scale-108 transition-transform duration-700 ease-out select-none">
                
                <div class="absolute inset-0 bg-gradient-to-r from-[#FAF4ED]/95 via-[#FAF4ED]/75 to-transparent w-[75%] sm:w-[70%] pointer-events-none"></div>

                <div class="relative z-10">
                    <div class="text-[#B38E6A] text-xs mb-1">✦</div>
                    <h3 class="font-serif-lux text-2xl sm:text-3xl text-[#4A2F17] font-normal leading-tight">
                        Floral<br><span class="italic font-normal">Collection</span>
                    </h3>
                    <p class="text-xs text-[#8A6749] mt-1.5 font-medium flex items-center space-x-1">
                        <span>Bloom with Love</span>
                        <span class="text-xs text-[#9A7453]">♡</span>
                    </p>
                </div>

                <div class="relative z-10 mt-8">
                    <span class="inline-flex items-center space-x-1.5 bg-[#FAF4ED]/90 backdrop-blur-sm text-[#5C3D24] border border-[#DFCBB7] text-xs font-semibold px-4 sm:px-5 py-2 rounded-full shadow-sm group-hover:bg-[#6B4B32] group-hover:text-white group-hover:border-[#6B4B32] transition-all duration-300">
                        <span>Explore</span>
                        <span class="transform transition-transform duration-300 group-hover:translate-x-1">→</span>
                    </span>
                </div>
            </a>

            <!-- 3. Crochet Collection Card -->
            <a href="{{ route('category.show', 'crochet-collection') }}" class="group relative rounded-3xl overflow-hidden border border-[#E8DACB] shadow-[0_8px_24px_-4px_rgba(79,53,32,0.06)] hover:shadow-[0_20px_40px_-8px_rgba(79,53,32,0.16)] hover:border-[#CBB199] transition-all duration-500 hover:-translate-y-2 min-h-[210px] sm:min-h-[230px] flex flex-col justify-between p-6 sm:p-7 bg-[#F7EFE6] block">
                <img src="{{ asset('images/card-crochet-full-hd.jpg') }}" alt="Crochet Collection" class="absolute inset-0 w-full h-full object-cover object-right transform group-hover:scale-108 transition-transform duration-700 ease-out select-none">
                
                <div class="absolute inset-0 bg-gradient-to-r from-[#FAF4ED]/95 via-[#FAF4ED]/75 to-transparent w-[75%] sm:w-[70%] pointer-events-none"></div>

                <div class="relative z-10">
                    <div class="text-[#B38E6A] text-xs mb-1">✦</div>
                    <h3 class="font-serif-lux text-2xl sm:text-3xl text-[#4A2F17] font-normal leading-tight">
                        Crochet<br><span class="italic font-normal">Collection</span>
                    </h3>
                    <p class="text-xs text-[#8A6749] mt-1.5 font-medium flex items-center space-x-1">
                        <span>Handmade Happiness</span>
                        <span class="text-xs text-[#9A7453]">♡</span>
                    </p>
                </div>

                <div class="relative z-10 mt-8">
                    <span class="inline-flex items-center space-x-1.5 bg-[#FAF4ED]/90 backdrop-blur-sm text-[#5C3D24] border border-[#DFCBB7] text-xs font-semibold px-4 sm:px-5 py-2 rounded-full shadow-sm group-hover:bg-[#6B4B32] group-hover:text-white group-hover:border-[#6B4B32] transition-all duration-300">
                        <span>Explore</span>
                        <span class="transform transition-transform duration-300 group-hover:translate-x-1">→</span>
                    </span>
                </div>
            </a>

        </div>

    </div>
</section>

<!-- Our Bestsellers (Header with side lines and bow motif, 4 exact products, left/right arrows) -->
<section class="py-12 sm:py-16 bg-[#FAF4ED] border-y border-[#EADBCC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        
        <!-- Section Header with Center Bow Line Ornament -->
        <div class="text-center mb-10">
            <div class="flex items-center justify-center space-x-4 mb-1">
                <div class="h-[1px] w-12 sm:w-20 bg-[#D4C1AB]"></div>
                <h2 class="font-serif-lux italic text-3xl sm:text-4xl text-[#52351E] font-normal tracking-wide">
                    Our Bestsellers
                </h2>
                <div class="h-[1px] w-12 sm:w-20 bg-[#D4C1AB]"></div>
            </div>
            <!-- Ribbon Bow SVG Under Title -->
            <div class="flex justify-center text-[#7D5838] mt-1">
                <svg class="w-7 h-5" viewBox="0 0 100 60" fill="none" stroke="currentColor">
                    <path d="M50 30 C42 18 24 6 16 16 C8 26 20 42 40 35 C46 33 49 30 50 30 Z" stroke-width="4.5" stroke-linecap="round"/>
                    <path d="M50 30 C58 18 76 6 84 16 C92 26 80 42 60 35 C54 33 51 30 50 30 Z" stroke-width="4.5" stroke-linecap="round"/>
                    <circle cx="50" cy="30" r="4.5" fill="#7D5838"/>
                    <path d="M47 34 C43 46 35 56 26 60 M53 34 C57 46 65 56 74 60" stroke-width="3.5" stroke-linecap="round"/>
                </svg>
            </div>
        </div>

        <!-- Working Left / Right Carousel Navigation Arrows -->
        <div class="relative" id="bestsellers-carousel">
            @if($featuredProducts->count() > 4)
            <button type="button" id="bestseller-prev-btn" class="hidden md:flex absolute -left-5 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-[#FAF4ED]/95 border border-[#DFCBB7] text-[#7D5838] hover:bg-[#6B4B32] hover:text-white hover:border-[#6B4B32] items-center justify-center shadow-sm transition-all cursor-pointer" title="Previous Bestsellers">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button type="button" id="bestseller-next-btn" class="hidden md:flex absolute -right-5 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-[#FAF4ED]/95 border border-[#DFCBB7] text-[#7D5838] hover:bg-[#6B4B32] hover:text-white hover:border-[#6B4B32] items-center justify-center shadow-sm transition-all cursor-pointer" title="Next Bestsellers">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </button>
            @endif

            <!-- Products Grid (4 visible per page, cycles smoothly when arrows clicked) -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6" id="bestsellers-grid">
                @foreach($featuredProducts as $idx => $product)
                <div class="bestseller-card product-card rounded-2xl overflow-hidden flex flex-col justify-between group transition-all duration-300 {{ $idx >= 4 ? 'hidden' : '' }}" data-page="{{ intdiv($idx, 4) }}">
                    
                    <!-- Product Image Area -->
                    <div class="relative bg-[#F3E8DB] aspect-square flex items-center justify-center overflow-hidden">
                        <a href="{{ route('products.show', $product->slug) }}" class="block w-full h-full">
                            @if($product->primary_image_url)
                                <img src="{{ $product->primary_image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center text-center p-4">
                                    <span class="text-4xl mb-2">{{ $product->category->icon ?? '✨' }}</span>
                                    <span class="font-serif-lux italic text-xs text-[#8A6749]">{{ $product->category->name }}</span>
                                </div>
                            @endif
                        </a>

                        <!-- Floating Action Buttons (Top Right): Wishlist & Quick View -->
                        <div class="absolute top-2.5 right-2.5 flex flex-col space-y-1.5 z-10">
                            <button type="button"
                                    class="wishlist-toggle-btn text-[#5C3D24] hover:text-rose-500 bg-[#FAF4ED]/85 backdrop-blur-sm p-1.5 rounded-full transition-all shadow-2xs hover:scale-110 cursor-pointer"
                                    data-product-id="{{ $product->id }}"
                                    data-product-name="{{ $product->name }}"
                                    title="Save to Wishlist">
                                <svg class="w-3.5 h-3.5 wishlist-svg" fill="none" stroke="currentColor" stroke-width="1.9" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </button>

                            <button type="button"
                                    class="quick-view-btn text-[#5C3D24] hover:text-[#6B4B32] bg-[#FAF4ED]/85 backdrop-blur-sm p-1.5 rounded-full transition-all shadow-2xs hover:scale-110 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 cursor-pointer"
                                    data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}"
                                    data-price="Rs. {{ number_format($product->current_price, 0) }}"
                                    data-category="{{ $product->category->name ?? 'Handcrafted' }}"
                                    data-image="{{ $product->primary_image_url ?? '' }}"
                                    data-description="{{ Str::limit(strip_tags($product->short_description ?: $product->description ?: 'Handcrafted with care in our Islamic Crafts studio.'), 150) }}"
                                    data-url="{{ route('products.show', $product->slug) }}"
                                    title="Quick View">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.9" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Product Details: Title, Price, Add to Cart Button -->
                    <div class="p-3.5 sm:p-4 text-center flex flex-col items-center flex-grow justify-between">
                        <div class="mb-3">
                            <h4 class="font-serif-lux text-base sm:text-lg text-[#52351E] font-medium line-clamp-1 mb-0.5">
                                <a href="{{ route('products.show', $product->slug) }}" class="hover:text-[#8F6644] transition-colors">
                                    {{ $product->name }}
                                </a>
                            </h4>
                            
                            <div class="text-xs sm:text-[13px] font-medium text-[#785539]">
                                <span>Rs. {{ number_format($product->current_price, 0) }}</span>
                            </div>
                        </div>

                        <form action="{{ route('cart.add') }}" method="POST" class="w-full">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="w-full btn-luxury py-2 px-3 rounded-xl text-xs font-medium tracking-wide cursor-pointer">
                                Add to Cart
                            </button>
                        </form>
                    </div>

                </div>
                @endforeach
            </div>

            <!-- Bestsellers Carousel Indicator & View All CTA -->
            <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                @if($featuredProducts->count() > 4)
                <div class="flex items-center space-x-2" id="bestseller-dots">
                    @for($p = 0; $p < ceil($featuredProducts->count() / 4); $p++)
                        <button type="button" data-bpage="{{ $p }}" class="bestseller-dot h-2 rounded-full transition-all duration-300 cursor-pointer {{ $p === 0 ? 'w-6 bg-[#6B4B32]' : 'w-2 bg-[#DECDBD]' }}" aria-label="Page {{ $p + 1 }}"></button>
                    @endfor
                </div>
                @endif
                <a href="{{ route('products.index') }}" class="inline-flex items-center space-x-2 px-6 py-2.5 rounded-full bg-[#F3E7D9] hover:bg-[#6B4B32] text-[#58381C] hover:text-white border border-[#DEC7AF] text-xs font-semibold transition-all duration-300 shadow-2xs">
                    <span>View All Handcrafted Pieces</span>
                    <span>→</span>
                </a>
            </div>
        </div>

    </div>
</section>

<!-- Interactive Trust Badges Strip -->
<section class="py-7 sm:py-8 bg-[#F6ECE0] border-b border-[#EADBCC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            
            <!-- Badge 1: Custom Orders -->
            <a href="{{ route('custom-orders') }}" class="group flex items-center space-x-3.5 p-3 rounded-2xl bg-[#FAF4ED]/60 hover:bg-[#FAF4ED] border border-[#E8DACB]/60 hover:border-[#D4C1AB] hover:shadow-md transition-all duration-300">
                <div class="w-10 sm:w-11 h-10 sm:h-11 rounded-xl bg-[#EADBCC] text-[#6B4B32] group-hover:bg-[#6B4B32] group-hover:text-white flex items-center justify-center flex-shrink-0 transition-colors duration-300 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12v7a2 2 0 01-2 2H6a2 2 0 01-2-2v-7m16 0V9a2 2 0 00-2-2h-3m5 5H4m0 0V9a2 2 0 012-2h3m0 0V5a2 2 0 012-2h2a2 2 0 012 2v2m-6 0h6"/></svg>
                </div>
                <div class="text-left">
                    <span class="block text-xs sm:text-[13px] font-semibold text-[#4A2F17] group-hover:text-[#6B4B32] transition-colors leading-tight">Custom Orders</span>
                    <span class="block text-[11px] text-[#8A6749] mt-0.5 font-normal">Names, dates & themes</span>
                </div>
            </a>

            <!-- Badge 2: Nationwide Delivery -->
            <div class="group flex items-center space-x-3.5 p-3 rounded-2xl bg-[#FAF4ED]/60 hover:bg-[#FAF4ED] border border-[#E8DACB]/60 hover:border-[#D4C1AB] hover:shadow-md transition-all duration-300 cursor-default">
                <div class="w-10 sm:w-11 h-10 sm:h-11 rounded-xl bg-[#EADBCC] text-[#6B4B32] group-hover:bg-[#6B4B32] group-hover:text-white flex items-center justify-center flex-shrink-0 transition-colors duration-300 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8h4.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-4-1a1 1 0 00-1 1"/></svg>
                </div>
                <div class="text-left">
                    <span class="block text-xs sm:text-[13px] font-semibold text-[#4A2F17] leading-tight">Nationwide Delivery</span>
                    <span class="block text-[11px] text-[#8A6749] mt-0.5 font-normal">Tracked across Pakistan</span>
                </div>
            </div>

            <!-- Badge 3: Secure Payments -->
            <div class="group flex items-center space-x-3.5 p-3 rounded-2xl bg-[#FAF4ED]/60 hover:bg-[#FAF4ED] border border-[#E8DACB]/60 hover:border-[#D4C1AB] hover:shadow-md transition-all duration-300 cursor-default">
                <div class="w-10 sm:w-11 h-10 sm:h-11 rounded-xl bg-[#EADBCC] text-[#6B4B32] group-hover:bg-[#6B4B32] group-hover:text-white flex items-center justify-center flex-shrink-0 transition-colors duration-300 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <div class="text-left">
                    <span class="block text-xs sm:text-[13px] font-semibold text-[#4A2F17] leading-tight">Secure Payments</span>
                    <span class="block text-[11px] text-[#8A6749] mt-0.5 font-normal">COD & Bank Transfer</span>
                </div>
            </div>

            <!-- Badge 4: Customer Trust -->
            <div class="group flex items-center space-x-3.5 p-3 rounded-2xl bg-[#FAF4ED]/60 hover:bg-[#FAF4ED] border border-[#E8DACB]/60 hover:border-[#D4C1AB] hover:shadow-md transition-all duration-300 cursor-default">
                <div class="w-10 sm:w-11 h-10 sm:h-11 rounded-xl bg-[#EADBCC] text-[#6B4B32] group-hover:bg-[#6B4B32] group-hover:text-white flex items-center justify-center flex-shrink-0 transition-colors duration-300 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </div>
                <div class="text-left">
                    <span class="block text-xs sm:text-[13px] font-semibold text-[#4A2F17] leading-tight">Trusted by 1,000+</span>
                    <span class="block text-[11px] text-[#8A6749] mt-0.5 font-normal">5-Star handcrafted love</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Highly Interactive Customer Reviews & Custom Studio Split Banners -->
<section class="py-12 sm:py-16 bg-[#FAF4ED]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-stretch">
            
            <!-- Left Card: Interactive Live Customer Reviews Slider (5 cols) -->
            <div class="lg:col-span-5 card-craft rounded-3xl p-6 sm:p-7 flex flex-col justify-between relative overflow-hidden bg-gradient-to-br from-[#FAF4ED] to-[#F5ECE1] border border-[#E8DACB] shadow-sm hover:shadow-md transition-all" id="review-carousel-container">
                
                <!-- Card Header with Navigation Arrows -->
                <div class="flex items-center justify-between pb-3 border-b border-[#E8DACB]/60 mb-4">
                    <div class="flex items-center space-x-2">
                        <span class="text-xs text-[#B38E6A]">✦</span>
                        <h3 class="font-serif-lux text-xl sm:text-2xl text-[#4A2F17] font-normal flex items-center space-x-1.5">
                            <span>What Our Customers Say</span>
                            <span class="text-lg text-[#8F6644]">♡</span>
                        </h3>
                    </div>

                    <!-- Slide Controls -->
                    <div class="flex items-center space-x-1.5">
                        <button type="button" id="review-prev-btn" class="w-7 h-7 rounded-full bg-[#FAF4ED] hover:bg-[#6B4B32] hover:text-white text-[#6B4B32] border border-[#DECDBD] flex items-center justify-center text-xs transition-colors shadow-2xs" title="Previous Review">
                            ‹
                        </button>
                        <button type="button" id="review-next-btn" class="w-7 h-7 rounded-full bg-[#FAF4ED] hover:bg-[#6B4B32] hover:text-white text-[#6B4B32] border border-[#DECDBD] flex items-center justify-center text-xs transition-colors shadow-2xs" title="Next Review">
                            ›
                        </button>
                    </div>
                </div>

                <!-- Review Slides Wrapper -->
                <div class="relative min-h-[170px] flex items-center overflow-hidden">
                    
                    <!-- Slide 1 -->
                    <div class="review-slide transition-all duration-500 w-full flex items-start space-x-4">
                        <div class="w-16 h-16 sm:w-18 sm:h-18 rounded-full overflow-hidden flex-shrink-0 border-2 border-[#E7D6C4] shadow-sm p-0.5 bg-white">
                            <img src="{{ asset('images/cat-floral-hd.jpg') }}" alt="Ayesha Khan" class="w-full h-full object-cover rounded-full">
                        </div>
                        <div class="flex-grow">
                            <div class="flex items-center space-x-1.5 mb-1">
                                <span class="text-[#C89B55] text-xs">★★★★★</span>
                                <span class="text-[10px] bg-emerald-100 text-emerald-800 font-semibold px-2 py-0.2 rounded-full">✓ Verified Buyer</span>
                            </div>
                            <p class="font-serif-lux italic text-xs sm:text-sm text-[#5C3D24] leading-relaxed mb-2.5">
                                "Absolutely in love with my order! The quality is beyond perfection. It looks even more breathtaking in person on my mantelpiece."
                            </p>
                            <div>
                                <p class="text-xs font-semibold text-[#4A2F17] leading-tight">— Ayesha Khan <span class="font-normal text-[11px] text-[#8A6749]">• Lahore</span></p>
                                <span class="text-[10px] text-[#8F6644] font-medium">Purchased: Personalized Nikkah Platter</span>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="review-slide hidden transition-all duration-500 w-full flex items-start space-x-4">
                        <div class="w-16 h-16 sm:w-18 sm:h-18 rounded-full overflow-hidden flex-shrink-0 border-2 border-[#E7D6C4] shadow-sm p-0.5 bg-white">
                            <img src="{{ asset('images/product-nikkah-platter-hd.jpg') }}" alt="Sara & Ayyan" class="w-full h-full object-cover rounded-full">
                        </div>
                        <div class="flex-grow">
                            <div class="flex items-center space-x-1.5 mb-1">
                                <span class="text-[#C89B55] text-xs">★★★★★</span>
                                <span class="text-[10px] bg-emerald-100 text-emerald-800 font-semibold px-2 py-0.2 rounded-full">✓ Verified Buyer</span>
                            </div>
                            <p class="font-serif-lux italic text-xs sm:text-sm text-[#5C3D24] leading-relaxed mb-2.5">
                                "Ordered this for our special Nikkah ceremony. Every guest asked where we had it made! The packaging was so safe and luxury."
                            </p>
                            <div>
                                <p class="text-xs font-semibold text-[#4A2F17] leading-tight">— Sara & Ayyan <span class="font-normal text-[11px] text-[#8A6749]">• Islamabad</span></p>
                                <span class="text-[10px] text-[#8F6644] font-medium">Purchased: Custom Nikkah Mubarak Duo Frame</span>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="review-slide hidden transition-all duration-500 w-full flex items-start space-x-4">
                        <div class="w-16 h-16 sm:w-18 sm:h-18 rounded-full overflow-hidden flex-shrink-0 border-2 border-[#E7D6C4] shadow-sm p-0.5 bg-white">
                            <img src="{{ asset('images/product-crochet-bag-hd.jpg') }}" alt="Fatima Zahra" class="w-full h-full object-cover rounded-full">
                        </div>
                        <div class="flex-grow">
                            <div class="flex items-center space-x-1.5 mb-1">
                                <span class="text-[#C89B55] text-xs">★★★★★</span>
                                <span class="text-[10px] bg-emerald-100 text-emerald-800 font-semibold px-2 py-0.2 rounded-full">✓ Verified Buyer</span>
                            </div>
                            <p class="font-serif-lux italic text-xs sm:text-sm text-[#5C3D24] leading-relaxed mb-2.5">
                                "The handmade crochet stitches are so neat, and the daisy flowers are gorgeous! It's now my daily favorite aesthetic tote."
                            </p>
                            <div>
                                <p class="text-xs font-semibold text-[#4A2F17] leading-tight">— Fatima Zahra <span class="font-normal text-[11px] text-[#8A6749]">• Karachi</span></p>
                                <span class="text-[10px] text-[#8F6644] font-medium">Purchased: Daisy Bloom Crochet Handbag</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Footer Dots Indicator -->
                <div class="pt-3 border-t border-[#E8DACB]/60 flex items-center justify-between text-[11px] text-[#8A6749]">
                    <div class="flex items-center space-x-1.5" id="review-dots">
                        <button type="button" class="w-2.5 h-2.5 rounded-full bg-[#6B4B32] transition-all" data-slide="0"></button>
                        <button type="button" class="w-2.5 h-2.5 rounded-full bg-[#DECDBD] transition-all" data-slide="1"></button>
                        <button type="button" class="w-2.5 h-2.5 rounded-full bg-[#DECDBD] transition-all" data-slide="2"></button>
                    </div>
                    <span class="italic font-serif-lux">Rated 4.9/5 by 1,200+ Craft Lovers</span>
                </div>

            </div>

            <!-- Right Card: Interactive Custom Studio with Quick Craft Selector (7 cols) -->
            <div class="lg:col-span-7 card-craft rounded-3xl p-6 sm:p-7 flex flex-col justify-between relative overflow-hidden bg-gradient-to-br from-[#FAF4ED] via-[#F8F1E7] to-[#F1E4D3] border border-[#E8DACB] shadow-sm hover:shadow-md transition-all">
                
                <div>
                    <!-- Section Header -->
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-serif-lux italic text-2xl sm:text-3xl text-[#4A2F17] font-normal leading-tight">
                            Let's Create Something Special Together <span class="font-sans not-italic text-lg text-[#8F6644]">♡</span>
                        </h3>
                    </div>
                    <p class="text-xs text-[#7A5B3E] mb-4">
                        Pick your craft to see customization options and instant price estimation:
                    </p>

                    <!-- Interactive Craft Selector Chips -->
                    <div class="flex flex-wrap gap-2 mb-4" id="craft-selector-tabs">
                        <button type="button" class="craft-chip active px-3.5 py-1.5 rounded-full text-xs font-semibold bg-[#6B4B32] text-white shadow-xs transition-all" data-category="nikkah" data-info="Custom names in gold calligraphy with pearls rim & pen stand. Starts from Rs. 3,500 • Ready in 3-5 days.">
                            💍 Nikkah Platter
                        </button>
                        <button type="button" class="craft-chip px-3.5 py-1.5 rounded-full text-xs font-semibold bg-[#FAF4ED] text-[#5C3D24] border border-[#DFCBB7] hover:border-[#6B4B32] transition-all" data-category="floral" data-info="Eternal faux roses, Korean luxury wrapping & customized greeting card. Starts from Rs. 2,200 • Ready in 2-4 days.">
                            🌸 Floral Bouquet
                        </button>
                        <button type="button" class="craft-chip px-3.5 py-1.5 rounded-full text-xs font-semibold bg-[#FAF4ED] text-[#5C3D24] border border-[#DFCBB7] hover:border-[#6B4B32] transition-all" data-category="crochet" data-info="Handmade daisy cotton tote with custom color yarn & flower charms. Starts from Rs. 1,800 • Ready in 3-5 days.">
                            🧶 Crochet Bag
                        </button>
                        <button type="button" class="craft-chip px-3.5 py-1.5 rounded-full text-xs font-semibold bg-[#FAF4ED] text-[#5C3D24] border border-[#DFCBB7] hover:border-[#6B4B32] transition-all" data-category="calligraphy" data-info="Custom Arabic verses, couple names on mirror gold acrylic with wooden easel. Starts from Rs. 2,500 • Ready in 4-6 days.">
                            ✍️ Arabic Calligraphy
                        </button>
                    </div>

                    <!-- Dynamic Live Estimation Box -->
                    <div class="bg-[#FAF4ED]/80 backdrop-blur-sm border border-[#E0CFBD] rounded-2xl p-3.5 mb-5 flex items-start space-x-3 transition-all duration-300" id="craft-estimation-box">
                        <span class="text-lg flex-shrink-0" id="craft-icon">💍</span>
                        <div class="text-xs">
                            <span class="font-semibold text-[#4A2F17] block mb-0.5" id="craft-title">Nikkah Keepsake Platter</span>
                            <span class="text-[#7D5A3C] leading-relaxed block" id="craft-desc">
                                Custom names in gold calligraphy with pearls rim & pen stand. Starts from Rs. 3,500 • Ready in 3-5 days.
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Dual Action Buttons: Form & Direct WhatsApp -->
                <div class="flex flex-wrap items-center gap-3 pt-3 border-t border-[#E8DACB]/60">
                    <a href="{{ route('custom-orders', ['category' => 'nikkah']) }}" id="craft-customize-btn" class="btn-luxury px-6 py-2.5 rounded-full text-xs font-semibold tracking-wide inline-flex items-center space-x-2 shadow-sm hover:shadow-md transition-all">
                        <span>Customize Yours</span>
                        <span>→</span>
                    </a>

                    <a href="https://wa.me/923001234567?text=Assalam-o-Alaikum!%20I%20am%20interested%20in%20ordering%20a%20custom%20craft%20from%20Islamic%20Crafts." target="_blank" class="inline-flex items-center space-x-2 bg-[#25D366] hover:bg-[#1EBE5D] text-white px-5 py-2.5 rounded-full text-xs font-semibold transition-all shadow-sm">
                        <span>💬</span>
                        <span>Chat on WhatsApp</span>
                    </a>

                    <span class="text-[11px] text-[#8A6749] italic ml-auto hidden sm:inline">
                        100% Tailored to Your Occasion ♡
                    </span>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- Shop by Occasion (Dynamic Admin-Managed Gifting Cards) -->
@if(isset($occasions) && $occasions->count() > 0)
<section class="py-12 sm:py-16 bg-[#F6ECE0]/60 border-t border-[#EADBCC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <span class="text-[10px] font-semibold uppercase tracking-[0.22em] text-[#9A714C] block mb-1.5">✦ Curated for Every Milestone</span>
            <h2 class="font-serif-lux italic text-3xl sm:text-4xl text-[#52351E] font-normal">Shop by Occasion</h2>
            <p class="text-xs text-[#8A6749] mt-1.5">Find the perfect handcrafted keepsake for life's most cherished moments</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($occasions as $occasion)
            <a href="{{ $occasion->link_url }}" class="group rounded-3xl bg-[#FAF4ED] border border-[#E4D1BD] p-6 hover:border-[#C2A07E] hover:shadow-md transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#F4DFC8] to-[#E8CCB0] border border-[#DCBF9F] flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition-transform">{{ $occasion->icon ?: '✨' }}</div>
                    <h3 class="font-serif-lux text-2xl text-[#4A2D16] font-medium mb-1">{{ $occasion->title }}</h3>
                    <p class="text-xs text-[#7D5A3C] leading-relaxed">{{ $occasion->description }}</p>
                </div>
                <span class="mt-5 inline-flex items-center text-xs font-semibold text-[#6B4B32] group-hover:translate-x-1 transition-transform">{{ $occasion->link_text ?: 'Explore' }} →</span>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Dark Espresso "The Atelier Difference" Luxury Contrast Showcase -->
<section class="py-12 sm:py-16 bg-gradient-to-br from-[#4A2E19] via-[#58371E] to-[#38200F] text-[#FAF4ED] relative overflow-hidden">
    <div class="pointer-events-none absolute -top-20 -right-20 w-72 h-72 rounded-full bg-[#C6A47E]/15 blur-3xl"></div>
    <div class="pointer-events-none absolute -bottom-20 -left-20 w-72 h-72 rounded-full bg-[#C6A47E]/10 blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="text-[10px] font-semibold uppercase tracking-[0.25em] text-[#DFC4A6] block mb-2">✦ The Islamic Crafts Promise</span>
            <h2 class="font-serif-lux italic text-3xl sm:text-4xl text-[#FDF8F1] font-normal mb-2">Why Families Trust Our Atelier</h2>
            <p class="text-xs sm:text-sm text-[#D9C2A8]">Every detail is thoughtfully crafted so your gift arrives with timeless beauty and lasting durability.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="rounded-3xl bg-[#FAF4ED]/8 border border-[#DFCBB7]/20 p-6 sm:p-7 backdrop-blur-xs hover:bg-[#FAF4ED]/12 transition-all">
                <span class="inline-flex w-11 h-11 rounded-2xl bg-[#C6A47E]/20 border border-[#C6A47E]/30 items-center justify-center text-xl mb-4">💎</span>
                <h3 class="font-serif-lux text-2xl text-[#FDF8F1] font-medium mb-2">Non-Yellowing Crystal Resin</h3>
                <p class="text-xs text-[#D9C2A8] leading-relaxed">We use imported UV-resistant luxury epoxy resin with genuine 24k gold-leaf flakes and real hand-pressed florals.</p>
            </div>

            <div class="rounded-3xl bg-[#FAF4ED]/8 border border-[#DFCBB7]/20 p-6 sm:p-7 backdrop-blur-xs hover:bg-[#FAF4ED]/12 transition-all">
                <span class="inline-flex w-11 h-11 rounded-2xl bg-[#C6A47E]/20 border border-[#C6A47E]/30 items-center justify-center text-xl mb-4">📱</span>
                <h3 class="font-serif-lux text-2xl text-[#FDF8F1] font-medium mb-2">WhatsApp Preview Before Pour</h3>
                <p class="text-xs text-[#D9C2A8] leading-relaxed">On personalized platters & calligraphy frames, our artisan shares a digital layout preview on WhatsApp for your approval first.</p>
            </div>

            <div class="rounded-3xl bg-[#FAF4ED]/8 border border-[#DFCBB7]/20 p-6 sm:p-7 backdrop-blur-xs hover:bg-[#FAF4ED]/12 transition-all">
                <span class="inline-flex w-11 h-11 rounded-2xl bg-[#C6A47E]/20 border border-[#C6A47E]/30 items-center justify-center text-xl mb-4">🎁</span>
                <h3 class="font-serif-lux text-2xl text-[#FDF8F1] font-medium mb-2">Fragile Gift-Ready Packaging</h3>
                <p class="text-xs text-[#D9C2A8] leading-relaxed">Multi-layer bubble cushioning tucked inside our aesthetic gifting boxes — ready to present straight out of the parcel.</p>
            </div>
        </div>
    </div>
</section>

<!-- Instagram Atelier Lookbook Gallery (Dynamic Admin-Managed) -->
@if(isset($lookbookItems) && $lookbookItems->count() > 0)
<section class="py-12 sm:py-16 bg-[#FAF4ED] border-t border-[#EADBCC]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
            <div>
                <span class="text-[10px] font-semibold uppercase tracking-[0.22em] text-[#9A714C] block mb-1">✦ Behind The Scenes</span>
                <h2 class="font-serif-lux italic text-3xl sm:text-4xl text-[#52351E] font-normal">Crafted in Our Studio, Loved in Your Homes</h2>
            </div>
            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="inline-flex items-center space-x-2 px-5 py-2.5 rounded-full bg-[#F3E7D9] hover:bg-[#6B4B32] text-[#58381C] hover:text-white border border-[#DEC7AF] text-xs font-semibold transition-all self-start sm:self-auto">
                <span>📸 Follow @islamiccrafts</span>
                <span>↗</span>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3.5 sm:gap-4">
            @foreach($lookbookItems as $item)
            <a href="{{ $item->link_url ?: 'https://instagram.com' }}" target="_blank" rel="noopener noreferrer" class="group relative aspect-square rounded-2xl overflow-hidden bg-[#F2E7DA] border border-[#E5D4C1] shadow-2xs block">
                <img src="{{ $item->image_url }}" alt="{{ $item->caption }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-[#3A2210]/85 via-[#3A2210]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-3">
                    <span class="text-[11px] font-medium text-[#FAF4ED] leading-tight">{{ $item->caption }}</span>
                    <span class="text-[10px] text-[#DFC4A6] mt-0.5">{{ $item->handle ?: '@islamiccrafts' }} ↗</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Luxury Quick View Modal -->
<div id="quick-view-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-[#2A180A]/60 backdrop-blur-xs">
    <div class="relative w-full max-w-2xl rounded-[2rem] bg-[#FAF4ED] border border-[#DFCBB7] shadow-2xl overflow-hidden animate-fadeIn">
        <button type="button" id="qv-close-btn" class="absolute top-4 right-4 z-10 w-9 h-9 rounded-full bg-[#FAF4ED]/90 hover:bg-[#6B4B32] text-[#58381C] hover:text-white border border-[#DECDBD] flex items-center justify-center text-lg transition-colors cursor-pointer" title="Close">
            ×
        </button>

        <div class="grid grid-cols-1 sm:grid-cols-2">
            <div class="bg-[#F2E7DA] aspect-square flex items-center justify-center overflow-hidden">
                <img id="qv-image" src="" alt="" class="w-full h-full object-cover">
            </div>
            <div class="p-6 sm:p-7 flex flex-col justify-between">
                <div>
                    <span id="qv-category" class="inline-block px-3 py-1 rounded-full bg-[#F2E5D5] text-[#7D5838] text-[10px] font-semibold uppercase tracking-wider mb-3"></span>
                    <h3 id="qv-name" class="font-serif-lux text-2xl sm:text-3xl text-[#4A2D16] font-medium leading-tight mb-2"></h3>
                    <p id="qv-price" class="text-lg font-semibold text-[#6B4B32] mb-3"></p>
                    <p id="qv-description" class="text-xs text-[#7D5A3C] leading-relaxed mb-5"></p>
                </div>

                <div class="space-y-2.5">
                    <form action="{{ route('cart.add') }}" method="POST" id="qv-cart-form">
                        @csrf
                        <input type="hidden" name="product_id" id="qv-product-id" value="">
                        <button type="submit" class="w-full btn-luxury py-3 px-5 rounded-full text-xs font-semibold tracking-wide cursor-pointer shadow-sm">
                            Add to Shopping Bag ♡
                        </button>
                    </form>
                    <a id="qv-details-link" href="#" class="w-full inline-flex items-center justify-center py-2.5 px-5 rounded-full bg-[#F3E7D9] hover:bg-[#E7D3BC] text-[#58381C] border border-[#DEC7AF] text-xs font-semibold transition-all">
                        View Full Details & Gallery →
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Interactive Scripts for Review Slider, Craft Estimator, Bestsellers Carousel, Wishlist & Quick View -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // --- 0. Working Bestsellers Carousel ---
        const bestsellerCards = document.querySelectorAll('.bestseller-card');
        const bestsellerDots = document.querySelectorAll('.bestseller-dot');
        const bsPrevBtn = document.getElementById('bestseller-prev-btn');
        const bsNextBtn = document.getElementById('bestseller-next-btn');
        const totalBsPages = Math.max(1, Math.ceil(bestsellerCards.length / 4));
        let currentBsPage = 0;

        function showBestsellerPage(pageIndex) {
            currentBsPage = (pageIndex + totalBsPages) % totalBsPages;
            bestsellerCards.forEach(card => {
                const cardPage = parseInt(card.getAttribute('data-page'), 10);
                if (cardPage === currentBsPage) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
            bestsellerDots.forEach(dot => {
                const dotPage = parseInt(dot.getAttribute('data-bpage'), 10);
                if (dotPage === currentBsPage) {
                    dot.classList.remove('w-2', 'bg-[#DECDBD]');
                    dot.classList.add('w-6', 'bg-[#6B4B32]');
                } else {
                    dot.classList.remove('w-6', 'bg-[#6B4B32]');
                    dot.classList.add('w-2', 'bg-[#DECDBD]');
                }
            });
        }

        if (bsPrevBtn) bsPrevBtn.addEventListener('click', () => showBestsellerPage(currentBsPage - 1));
        if (bsNextBtn) bsNextBtn.addEventListener('click', () => showBestsellerPage(currentBsPage + 1));
        bestsellerDots.forEach(dot => {
            dot.addEventListener('click', () => showBestsellerPage(parseInt(dot.getAttribute('data-bpage'), 10)));
        });

        // --- 0b. Working Wishlist Toggle (localStorage + Toast) ---
        let savedWishlist = [];
        try {
            savedWishlist = JSON.parse(localStorage.getItem('ic_wishlist') || '[]');
        } catch (e) { savedWishlist = []; }

        const wishlistBtns = document.querySelectorAll('.wishlist-toggle-btn');
        function renderWishlistState(btn, isSaved) {
            const svg = btn.querySelector('.wishlist-svg');
            if (isSaved) {
                btn.classList.add('text-rose-500');
                btn.classList.remove('text-[#5C3D24]');
                if (svg) svg.setAttribute('fill', 'currentColor');
            } else {
                btn.classList.remove('text-rose-500');
                btn.classList.add('text-[#5C3D24]');
                if (svg) svg.setAttribute('fill', 'none');
            }
        }

        wishlistBtns.forEach(btn => {
            const pid = btn.getAttribute('data-product-id');
            const pname = btn.getAttribute('data-product-name');
            renderWishlistState(btn, savedWishlist.includes(pid));

            btn.addEventListener('click', function (e) {
                e.preventDefault();
                const exists = savedWishlist.includes(pid);
                if (exists) {
                    savedWishlist = savedWishlist.filter(id => id !== pid);
                    renderWishlistState(btn, false);
                    if (typeof window.showNoticeToast === 'function') {
                        window.showNoticeToast('Removed from Wishlist', `${pname} removed from your favorites.`, '🤍');
                    }
                } else {
                    savedWishlist.push(pid);
                    renderWishlistState(btn, true);
                    if (typeof window.showNoticeToast === 'function') {
                        window.showNoticeToast('Saved to Wishlist ♡', `${pname} added to your favorites!`, '❤️');
                    }
                }
                try { localStorage.setItem('ic_wishlist', JSON.stringify(savedWishlist)); } catch (err) {}
                if (typeof window.syncWishlistBadge === 'function') window.syncWishlistBadge();
            });
        });

        // --- 0c. Quick View Modal ---
        const qvModal = document.getElementById('quick-view-modal');
        const qvCloseBtn = document.getElementById('qv-close-btn');
        const qvImg = document.getElementById('qv-image');
        const qvCategory = document.getElementById('qv-category');
        const qvName = document.getElementById('qv-name');
        const qvPrice = document.getElementById('qv-price');
        const qvDesc = document.getElementById('qv-description');
        const qvProductId = document.getElementById('qv-product-id');
        const qvDetailsLink = document.getElementById('qv-details-link');

        function closeQuickView() {
            if (!qvModal) return;
            qvModal.classList.add('hidden');
            qvModal.classList.remove('flex');
        }

        document.querySelectorAll('.quick-view-btn').forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                if (!qvModal) return;
                qvImg.src = this.dataset.image || '';
                qvImg.alt = this.dataset.name || '';
                qvCategory.textContent = this.dataset.category || 'Handcrafted';
                qvName.textContent = this.dataset.name || '';
                qvPrice.textContent = this.dataset.price || '';
                qvDesc.textContent = this.dataset.description || '';
                qvProductId.value = this.dataset.id || '';
                qvDetailsLink.href = this.dataset.url || '#';

                qvModal.classList.remove('hidden');
                qvModal.classList.add('flex');
            });
        });

        if (qvCloseBtn) qvCloseBtn.addEventListener('click', closeQuickView);
        if (qvModal) {
            qvModal.addEventListener('click', function (e) {
                if (e.target === qvModal) closeQuickView();
            });
        }
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeQuickView();
        });

        // --- 1. Customer Reviews Carousel ---
        const slides = document.querySelectorAll('.review-slide');
        const dots = document.querySelectorAll('#review-dots button');
        const prevBtn = document.getElementById('review-prev-btn');
        const nextBtn = document.getElementById('review-next-btn');
        const container = document.getElementById('review-carousel-container');
        let currentSlide = 0;
        let slideInterval = null;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                if (i === index) {
                    slide.classList.remove('hidden');
                    slide.classList.add('flex');
                } else {
                    slide.classList.add('hidden');
                    slide.classList.remove('flex');
                }
            });

            dots.forEach((dot, i) => {
                if (i === index) {
                    dot.classList.remove('bg-[#DECDBD]');
                    dot.classList.add('bg-[#6B4B32]');
                } else {
                    dot.classList.remove('bg-[#6B4B32]');
                    dot.classList.add('bg-[#DECDBD]');
                }
            });
            currentSlide = index;
        }

        function nextSlide() {
            let next = (currentSlide + 1) % slides.length;
            showSlide(next);
        }

        function prevSlide() {
            let prev = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(prev);
        }

        if (nextBtn) nextBtn.addEventListener('click', nextSlide);
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);

        dots.forEach((dot, i) => {
            dot.addEventListener('click', () => showSlide(i));
        });

        // Auto rotate every 5 seconds
        function startAutoSlide() {
            slideInterval = setInterval(nextSlide, 5000);
        }
        function stopAutoSlide() {
            clearInterval(slideInterval);
        }

        if (container) {
            container.addEventListener('mouseenter', stopAutoSlide);
            container.addEventListener('mouseleave', startAutoSlide);
        }
        startAutoSlide();

        // --- 2. Interactive Custom Craft Selector ---
        const craftChips = document.querySelectorAll('.craft-chip');
        const craftIcon = document.getElementById('craft-icon');
        const craftTitle = document.getElementById('craft-title');
        const craftDesc = document.getElementById('craft-desc');
        const customizeBtn = document.getElementById('craft-customize-btn');

        const craftData = {
            'nikkah': {
                icon: '💍',
                title: 'Personalized Resin Nikkah Platter',
                info: 'Custom names in gold calligraphy with pearls rim & pen stand. Starts from Rs. 3,500 • Ready in 3-5 days.',
                category: 'nikkah'
            },
            'floral': {
                icon: '🌸',
                title: 'Handcrafted Everlasting Rose Bouquet',
                info: 'Eternal faux roses, Korean luxury wrapping & customized greeting card. Starts from Rs. 2,200 • Ready in 2-4 days.',
                category: 'floral'
            },
            'crochet': {
                icon: '🧶',
                title: 'Daisy Bloom Crochet Tote & Charms',
                info: 'Handmade daisy cotton tote with custom color yarn & flower charms. Starts from Rs. 1,800 • Ready in 3-5 days.',
                category: 'crochet'
            },
            'calligraphy': {
                icon: '✍️',
                title: 'Islamic Arabic Calligraphy Art Frame',
                info: 'Custom Arabic verses, couple names on mirror gold acrylic with wooden easel. Starts from Rs. 2,500 • Ready in 4-6 days.',
                category: 'calligraphy'
            }
        };

        craftChips.forEach(chip => {
            chip.addEventListener('click', function () {
                craftChips.forEach(c => {
                    c.classList.remove('bg-[#6B4B32]', 'text-white');
                    c.classList.add('bg-[#FAF4ED]', 'text-[#5C3D24]', 'border', 'border-[#DFCBB7]');
                });

                this.classList.remove('bg-[#FAF4ED]', 'text-[#5C3D24]', 'border', 'border-[#DFCBB7]');
                this.classList.add('bg-[#6B4B32]', 'text-white');

                const catKey = this.getAttribute('data-category');
                const data = craftData[catKey];
                if (data) {
                    craftIcon.textContent = data.icon;
                    craftTitle.textContent = data.title;
                    craftDesc.textContent = data.info;
                    customizeBtn.href = "{{ route('custom-orders') }}?category=" + data.category;
                }
            });
        });
    });
</script>
@endpush

@endsection
