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

        <!-- Left / Right Carousel Navigation Arrows (Decorative like in screenshot) -->
        <div class="relative">
            <button class="hidden md:flex absolute -left-5 top-1/2 -translate-y-1/2 z-20 text-[#7D5838] hover:text-[#52351E] p-2 transition-transform hover:-translate-x-1" title="Previous">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button class="hidden md:flex absolute -right-5 top-1/2 -translate-y-1/2 z-20 text-[#7D5838] hover:text-[#52351E] p-2 transition-transform hover:translate-x-1" title="Next">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </button>

            <!-- 4 Products Row Exactly from Screenshot: Resin Earrings, Resin Keychains, Nikkah Platter, Crochet Bag -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
                @foreach($featuredProducts->take(4) as $product)
                <div class="product-card rounded-2xl overflow-hidden flex flex-col justify-between group">
                    
                    <!-- Product Image Area -->
                    <div class="relative bg-[#F3E8DB] aspect-square flex items-center justify-center overflow-hidden">
                        @if($product->primary_image_url)
                            <img src="{{ $product->primary_image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                            <div class="flex flex-col items-center justify-center text-center p-4">
                                <span class="text-4xl mb-2">{{ $product->category->icon ?? '✨' }}</span>
                                <span class="font-serif-lux italic text-xs text-[#8A6749]">{{ $product->category->name }}</span>
                            </div>
                        @endif

                        <!-- Heart Wishlist Icon (Top Right) Exactly as in screenshot -->
                        <button class="absolute top-2.5 right-2.5 text-[#5C3D24] hover:text-rose-500 bg-[#FAF4ED]/70 backdrop-blur-sm p-1.5 rounded-full transition-colors" title="Wishlist">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </button>
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
                            <button type="submit" class="w-full btn-luxury py-2 px-3 rounded-xl text-xs font-medium tracking-wide">
                                Add to Cart
                            </button>
                        </form>
                    </div>

                </div>
                @endforeach
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

<!-- Interactive Scripts for Review Slider & Craft Estimator -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
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
