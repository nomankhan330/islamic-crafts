@extends('layouts.app')

@section('title', 'About Us — Islamic Crafts')

@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    
    <div class="text-center mb-12">
        <div class="flex justify-center text-[#8B613D] text-3xl mb-3">🎀</div>
        <h1 class="font-serif-lux italic text-4xl sm:text-6xl text-[#58381C] font-normal mb-3">Our Story</h1>
        <p class="font-serif-lux italic text-lg sm:text-xl text-[#785333]">Handmade with love, crafted with elegance.</p>
    </div>

    <!-- Story Card -->
    <div class="luxury-card rounded-3xl p-8 sm:p-12 mb-12">
        <div class="prose max-w-none text-xs sm:text-sm text-[#5C3B20] leading-relaxed space-y-4">
            <p>
                Welcome to <strong class="text-[#58381C] font-serif-lux text-base">Islamic Crafts</strong> — where Islamic spiritual aesthetics meet modern handcrafted luxury. Every creation in our studio is born out of patience, passion, and meticulous attention to detail.
            </p>
            <p>
                From timeless crystal resin trays preserving real dried botanical blooms, to hand-knitted crochet daisy bags, pure scented soy candles, and sacred Arabic calligraphy plaques — we believe handmade items hold a warmth and soul that mass-produced goods can never replicate.
            </p>
            <p>
                Whether you are looking for a personalized Nikkah platter for your once-in-a-lifetime milestone, a customized Bismillah or MashaAllah wall frame for your home, or a thoughtful gift box for someone special, we craft each piece with genuine love and care.
            </p>
        </div>
    </div>

    <!-- Values Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
        <div class="luxury-card rounded-2xl p-6">
            <span class="text-3xl block mb-2">🤲</span>
            <h3 class="font-serif-lux text-xl text-[#58381C] font-medium mb-1">Pure Dedication</h3>
            <p class="text-xs text-[#7A5333]">Every petal, pearl, and brushstroke is arranged with care and barakah.</p>
        </div>

        <div class="luxury-card rounded-2xl p-6">
            <span class="text-3xl block mb-2">✨</span>
            <h3 class="font-serif-lux text-xl text-[#58381C] font-medium mb-1">Luxury Aesthetic</h3>
            <p class="text-xs text-[#7A5333]">Cream, beige, and champagne-gold harmony tailored for sophisticated tastes.</p>
        </div>

        <div class="luxury-card rounded-2xl p-6">
            <span class="text-3xl block mb-2">📦</span>
            <h3 class="font-serif-lux text-xl text-[#58381C] font-medium mb-1">Safe Delivery</h3>
            <p class="text-xs text-[#7A5333]">Carefully packaged in premium protective boxes and delivered nationwide.</p>
        </div>
    </div>

</div>

@endsection
