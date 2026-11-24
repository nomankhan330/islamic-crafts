@extends('layouts.app')

@section('title', 'Our Story — Islamic Crafts')

@section('content')

<div class="relative overflow-hidden">
    <!-- Subtle Ambient Background Glows -->
    <div class="pointer-events-none absolute -top-24 -right-24 w-96 h-96 rounded-full bg-[#E9D5BC]/35 blur-3xl"></div>
    <div class="pointer-events-none absolute top-[32rem] -left-24 w-80 h-80 rounded-full bg-[#DFC3A3]/25 blur-3xl"></div>

    <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">

        <!-- 1. Editorial Hero Header -->
        <div class="relative rounded-[2.25rem] bg-gradient-to-br from-[#FAF3EA] via-[#F5EADC] to-[#EEE0CE] border border-[#E2CEB9] px-6 py-12 sm:px-14 sm:py-16 text-center shadow-sm overflow-hidden mb-14">
            <div class="pointer-events-none absolute top-5 left-7 text-[#C9AE90]/45 text-2xl select-none">✦</div>
            <div class="pointer-events-none absolute bottom-5 right-8 text-[#C9AE90]/45 text-2xl select-none">✦</div>

            <div class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-full bg-[#FBF6EE]/90 border border-[#DFCBB7] text-[10px] sm:text-[11px] font-semibold uppercase tracking-[0.22em] text-[#7D5838] mb-5 shadow-2xs">
                <span>✦</span>
                <span>Our Atelier Heritage</span>
                <span>✦</span>
            </div>

            <h1 class="font-serif-lux italic text-4xl sm:text-6xl text-[#4A2D16] font-normal tracking-tight leading-[1.1] mb-4">
                Handmade with Love,<br class="hidden sm:inline"> Crafted with Elegance <span class="text-[#9E7248]">♡</span>
            </h1>

            <p class="max-w-2xl mx-auto text-xs sm:text-sm text-[#7D5A3C] leading-relaxed mb-9">
                Welcome to <strong class="text-[#58381C] font-semibold">Islamic Crafts</strong> — a homegrown Pakistani studio where timeless Islamic artistry, real pressed botanicals, and modern handcrafted luxury come together to celebrate life's most sacred milestones.
            </p>

            <!-- Luxury Stats Bar -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 max-w-4xl mx-auto">
                <div class="rounded-2xl bg-[#FBF6EE]/90 border border-[#E4D1BD] px-4 py-4 shadow-2xs">
                    <p class="font-serif-lux text-2xl sm:text-3xl text-[#4A2D16] font-semibold leading-none mb-1">500+</p>
                    <p class="text-[11px] text-[#846041] font-medium">Happy Craft Families</p>
                </div>
                <div class="rounded-2xl bg-[#FBF6EE]/90 border border-[#E4D1BD] px-4 py-4 shadow-2xs">
                    <p class="font-serif-lux text-2xl sm:text-3xl text-[#4A2D16] font-semibold leading-none mb-1">100%</p>
                    <p class="text-[11px] text-[#846041] font-medium">Hand-Poured & Knitted</p>
                </div>
                <div class="rounded-2xl bg-[#FBF6EE]/90 border border-[#E4D1BD] px-4 py-4 shadow-2xs">
                    <p class="font-serif-lux text-2xl sm:text-3xl text-[#4A2D16] font-semibold leading-none mb-1">4.9 ★</p>
                    <p class="text-[11px] text-[#846041] font-medium">Verified Buyer Rating</p>
                </div>
                <div class="rounded-2xl bg-[#FBF6EE]/90 border border-[#E4D1BD] px-4 py-4 shadow-2xs">
                    <p class="font-serif-lux text-2xl sm:text-3xl text-[#4A2D16] font-semibold leading-none mb-1">All PK</p>
                    <p class="text-[11px] text-[#846041] font-medium">Tracked Safe Shipping</p>
                </div>
            </div>
        </div>

        <!-- 2. Split Brand Story & Visual Showcase -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center mb-16">

            <!-- Left: Layered Luxury Editorial Collage -->
            <div class="lg:col-span-5 relative">
                <div class="relative rounded-[2rem] bg-gradient-to-br from-[#F7EFE6] to-[#EBDAC7] p-3 border border-[#DFCBB7] shadow-md">
                    <div class="aspect-[4/5] rounded-[1.5rem] overflow-hidden bg-[#F4ECE1]">
                        <img src="{{ asset('images/product-nikkah-platter-hd.jpg') }}"
                             alt="Handcrafted Islamic Crafts Nikkah Platter"
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-700">
                    </div>

                    <!-- Floating Glass Pill -->
                    <div class="absolute top-6 left-6 px-3.5 py-1.5 rounded-full bg-[#FAF4ED]/90 backdrop-blur-md border border-[#DFCBB7] text-[10px] font-semibold uppercase tracking-wider text-[#58381C] shadow-xs">
                        ✨ Crafted with Barakah
                    </div>
                </div>

                <!-- Overlapping Mini Inset Frame -->
                <div class="hidden sm:block absolute -bottom-6 -right-5 w-40 h-40 rounded-2xl bg-[#FAF4ED] p-2 border border-[#DFCBB7] shadow-lg">
                    <img src="{{ asset('images/luxury-resin-tray-hd.jpg') }}"
                         alt="Luxury Resin Art Detail"
                         class="w-full h-full object-cover rounded-xl">
                </div>
            </div>

            <!-- Right: Narrative & Pull Quote -->
            <div class="lg:col-span-7">
                <span class="text-[10px] font-semibold uppercase tracking-[0.22em] text-[#9A714C] block mb-2">The Story Behind The Studio</span>
                <h2 class="font-serif-lux text-3xl sm:text-4xl text-[#4A2D16] font-normal leading-tight mb-5">
                    Born from Patience, Passion & Sacred Aesthetics
                </h2>

                <div class="space-y-4 text-xs sm:text-sm text-[#5C3B20] leading-relaxed mb-6">
                    <p>
                        Every creation in our studio begins with quiet intention and meticulous attention to detail. What started as a heartfelt love for preserving delicate flowers in crystal-clear resin and crafting serene Islamic decor has blossomed into a beloved boutique trusted by families across Pakistan.
                    </p>
                    <p>
                        From bespoke <strong class="text-[#4A2D16]">Nikkah platters</strong> inscribed with sacred Arabic calligraphy, to hand-knitted <strong class="text-[#4A2D16]">crochet daisy handbags</strong> and preserved floral keepsakes — we pour hours of dedicated artistry into every piece so it becomes an heirloom you cherish for years.
                    </p>
                </div>

                <!-- Sculpted Pull Quote -->
                <div class="rounded-2xl bg-[#FAF4ED] border-l-4 border-[#6B4B32] border-y border-r border-y-[#E5D3BF] border-r-[#E5D3BF] p-5 sm:p-6 mb-6 shadow-2xs">
                    <p class="font-serif-lux italic text-lg sm:text-xl text-[#4A2D16] leading-snug mb-2">
                        “We believe handmade pieces hold a warmth, prayer, and soul that mass-produced goods can never replicate.”
                    </p>
                    <span class="text-[11px] font-semibold uppercase tracking-widest text-[#9A714C]">— The Islamic Crafts Atelier</span>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('products.index') }}" class="btn-luxury px-6 py-3 rounded-full text-xs font-semibold inline-flex items-center space-x-2 shadow-sm">
                        <span>Explore Our Collection</span>
                        <span>→</span>
                    </a>
                    <a href="{{ route('custom-orders') }}" class="px-6 py-3 rounded-full text-xs font-semibold bg-[#F3E7D9] hover:bg-[#E8D5C0] text-[#58381C] border border-[#DEC7AF] transition-all">
                        Commission a Custom Piece
                    </a>
                </div>
            </div>
        </div>

        <!-- 3. Our Signature Crafts (3 Visual Editorial Cards) -->
        <div class="mb-16">
            <div class="text-center mb-9">
                <span class="text-[10px] font-semibold uppercase tracking-[0.22em] text-[#9A714C] block mb-1.5">✦ What We Create</span>
                <h2 class="font-serif-lux italic text-3xl sm:text-4xl text-[#4A2D16] font-normal">Our Signature Crafts</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Craft 1 -->
                <div class="group rounded-3xl bg-[#FAF4ED] border border-[#E2CEB9] overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                    <div class="aspect-[4/3] overflow-hidden bg-[#F2E7DA]">
                        <img src="{{ asset('images/luxury-resin-tray-hd.jpg') }}"
                             alt="Crystal Resin & Calligraphy Art"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>
                    <div class="p-6">
                        <span class="text-[10px] font-semibold uppercase tracking-widest text-[#9A714C]">Heirloom Resin</span>
                        <h3 class="font-serif-lux text-2xl text-[#4A2D16] font-medium mt-1 mb-2">Resin & Nikkah Art</h3>
                        <p class="text-xs text-[#7D5A3C] leading-relaxed">
                            Crystal-clear non-yellowing resin layered with 24k gold leaf, pearls, real dried florals, and bespoke Arabic calligraphy.
                        </p>
                    </div>
                </div>

                <!-- Craft 2 -->
                <div class="group rounded-3xl bg-[#FAF4ED] border border-[#E2CEB9] overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                    <div class="aspect-[4/3] overflow-hidden bg-[#F2E7DA]">
                        <img src="{{ asset('images/crochet-handbag-hd.jpg') }}"
                             alt="Hand-Knitted Crochet Accessories"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>
                    <div class="p-6">
                        <span class="text-[10px] font-semibold uppercase tracking-widest text-[#9A714C]">Slow-Crafted</span>
                        <h3 class="font-serif-lux text-2xl text-[#4A2D16] font-medium mt-1 mb-2">Artisanal Crochet</h3>
                        <p class="text-xs text-[#7D5A3C] leading-relaxed">
                            Soft, structured crochet handbags, daisy totes, and dainty everyday accessories stitched loop-by-loop by hand.
                        </p>
                    </div>
                </div>

                <!-- Craft 3 -->
                <div class="group rounded-3xl bg-[#FAF4ED] border border-[#E2CEB9] overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                    <div class="aspect-[4/3] overflow-hidden bg-[#F2E7DA]">
                        <img src="{{ asset('images/luxury-blush-bouquet-hd.jpg') }}"
                             alt="Botanical & Floral Keepsakes"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>
                    <div class="p-6">
                        <span class="text-[10px] font-semibold uppercase tracking-widest text-[#9A714C]">Thoughtful Gifting</span>
                        <h3 class="font-serif-lux text-2xl text-[#4A2D16] font-medium mt-1 mb-2">Floral & Gift Boxes</h3>
                        <p class="text-xs text-[#7D5A3C] leading-relaxed">
                            Curated blush bouquets, Eid & Ramadan gift hampers, and personalized celebration favors wrapped to delight.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Dark Espresso Atelier Craft Process -->
        <div class="relative rounded-[2.25rem] bg-gradient-to-br from-[#4D311B] via-[#5A3920] to-[#3A2210] text-[#FAF4ED] p-8 sm:p-12 shadow-md overflow-hidden mb-14">
            <div class="pointer-events-none absolute -top-16 -right-16 w-64 h-64 rounded-full bg-[#C6A47E]/15 blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-16 -left-16 w-64 h-64 rounded-full bg-[#C6A47E]/10 blur-3xl"></div>

            <div class="relative text-center max-w-2xl mx-auto mb-10">
                <span class="text-[10px] font-semibold uppercase tracking-[0.22em] text-[#D9BE9F] block mb-2">✦ From Idea to Doorstep</span>
                <h2 class="font-serif-lux italic text-3xl sm:text-4xl text-[#FDF8F1] font-normal mb-2">How Every Creation Is Born</h2>
                <p class="text-xs sm:text-sm text-[#DEC8B0]">A transparent, heartfelt process designed so your keepsake arrives exactly as you envisioned.</p>
            </div>

            <div class="relative grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @php
                    $steps = [
                        ['num' => '01', 'title' => 'Personal Consultation', 'desc' => 'We note your color palette, Arabic calligraphy, names, and celebration date.'],
                        ['num' => '02', 'title' => 'Digital Preview', 'desc' => 'Before the final resin pour, we share a layout preview on WhatsApp for approval.'],
                        ['num' => '03', 'title' => 'Patient Curing', 'desc' => 'Multi-layer pouring, 48–72 hour curing, smooth polishing & gold-leaf detailing.'],
                        ['num' => '04', 'title' => 'Fragile Gift Packing', 'desc' => 'Wrapped in protective bubble layers & luxury boxes, shipped safely across Pakistan.'],
                    ];
                @endphp

                @foreach($steps as $step)
                    <div class="rounded-2xl bg-[#FAF4ED]/8 border border-[#DFCBB7]/20 p-5 backdrop-blur-xs">
                        <span class="font-serif-lux text-3xl text-[#E5C9A8] font-light block mb-2">{{ $step['num'] }}</span>
                        <h3 class="font-serif-lux text-xl text-[#FDF8F1] font-medium mb-1.5">{{ $step['title'] }}</h3>
                        <p class="text-xs text-[#D9C3AA] leading-relaxed">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 5. Core Values Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-14">
            <div class="rounded-3xl bg-[#FAF4ED] border border-[#E2CEB9] p-7 text-center shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 mx-auto rounded-2xl bg-[#F3E5D5] border border-[#E2CCB6] flex items-center justify-center text-2xl mb-4">🤲</div>
                <h3 class="font-serif-lux text-2xl text-[#4A2D16] font-medium mb-2">Pure Dedication</h3>
                <p class="text-xs text-[#7D5A3C] leading-relaxed">
                    Every petal, pearl, stitch, and brushstroke is arranged with patience, sincerity, and barakah.
                </p>
            </div>

            <div class="rounded-3xl bg-[#FAF4ED] border border-[#E2CEB9] p-7 text-center shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 mx-auto rounded-2xl bg-[#F3E5D5] border border-[#E2CCB6] flex items-center justify-center text-2xl mb-4">✨</div>
                <h3 class="font-serif-lux text-2xl text-[#4A2D16] font-medium mb-2">Timeless Aesthetic</h3>
                <p class="text-xs text-[#7D5A3C] leading-relaxed">
                    Soft cream, warm beige, and champagne-gold harmony tailored for refined modern Islamic homes.
                </p>
            </div>

            <div class="rounded-3xl bg-[#FAF4ED] border border-[#E2CEB9] p-7 text-center shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                <div class="w-12 h-12 mx-auto rounded-2xl bg-[#F3E5D5] border border-[#E2CCB6] flex items-center justify-center text-2xl mb-4">📦</div>
                <h3 class="font-serif-lux text-2xl text-[#4A2D16] font-medium mb-2">Safe Nationwide Delivery</h3>
                <p class="text-xs text-[#7D5A3C] leading-relaxed">
                    Securely cushioned in fragile-safe gifting boxes and dispatched via trusted couriers across Pakistan.
                </p>
            </div>
        </div>

        <!-- 6. Bottom CTA Banner -->
        <div class="rounded-[2rem] bg-gradient-to-r from-[#F5E9DA] via-[#FAF3EA] to-[#F2E4D3] border border-[#E2CEB9] p-8 sm:p-10 flex flex-col md:flex-row items-center justify-between gap-6 shadow-sm">
            <div class="text-center md:text-left">
                <span class="text-[10px] font-semibold uppercase tracking-[0.2em] text-[#9A714C] block mb-1.5">✦ Begin Your Keepsake</span>
                <h3 class="font-serif-lux italic text-2xl sm:text-3xl text-[#4A2D16] mb-1">Let's Craft Something Unforgettable Together</h3>
                <p class="text-xs sm:text-sm text-[#7D5A3C]">Browse our ready-to-love collection or share your custom vision with our artisans.</p>
            </div>
            <div class="flex flex-wrap items-center justify-center gap-3 flex-shrink-0">
                <a href="{{ route('products.index') }}" class="btn-luxury px-6 py-3.5 rounded-full text-xs font-semibold inline-flex items-center space-x-2 shadow-sm">
                    <span>Shop Collection</span>
                    <span>→</span>
                </a>
                <a href="{{ route('contact') }}" class="px-6 py-3.5 rounded-full text-xs font-semibold bg-[#FAF4ED] hover:bg-white text-[#58381C] border border-[#DEC7AF] transition-all">
                    Contact Studio
                </a>
            </div>
        </div>

    </div>
</div>

@endsection
