@extends('layouts.app')

@section('title', 'Bespoke Custom Orders & Personalization — Islamic Crafts')

@section('content')

<!-- Breadcrumb Strip -->
<div class="bg-[#F6ECE0] border-b border-[#EADBCC] py-3.5 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto flex items-center space-x-2 text-xs text-[#7A5638] overflow-x-auto whitespace-nowrap">
        <a href="{{ route('home') }}" class="hover:text-[#4A2F17] transition-colors">Home</a>
        <span>/</span>
        <span class="text-[#4A2F17] font-semibold">Bespoke Custom Orders</span>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-16">
    
    <!-- Hero Header Banner with Atelier Ribbon -->
    <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
        <div class="inline-flex items-center space-x-2 text-xs text-[#6B4B32] font-semibold bg-[#FAF4ED] px-4 py-1.5 rounded-full border border-[#DFCBB7] shadow-2xs mb-4">
            <span class="text-sm">✨</span>
            <span class="tracking-wide uppercase text-[10px] font-bold">Atelier Personalization Studio</span>
            <span class="text-[#DFCBB7]">•</span>
            <span class="text-[11px] font-medium text-[#8F6644]">Handcrafted Just For You</span>
        </div>

        <h1 class="font-serif-lux text-3xl sm:text-5xl lg:text-6xl text-[#4A2F17] font-normal leading-tight mb-4">
            Bespoke Custom Orders <span class="text-[#8F6644] font-light italic">♡</span>
        </h1>
        
        <p class="font-serif-lux italic text-base sm:text-lg text-[#785333] max-w-2xl mx-auto leading-relaxed mb-6">
            Turn your heartfelt wedding vows, Nikkah memories, Arabic calligraphy, and personalized gift dreams into one-of-a-kind handcrafted keepsakes.
        </p>

        <!-- Trust Stats Ribbon -->
        <div class="flex flex-wrap items-center justify-center gap-3 sm:gap-6 text-xs text-[#7A5638]">
            <div class="inline-flex items-center space-x-1.5 bg-[#FAF4ED] border border-[#DECDBD] px-3.5 py-1.5 rounded-full shadow-2xs">
                <span class="text-sm">💍</span>
                <span class="font-semibold text-[#4A2F17]">1,200+</span>
                <span>Bridal Keepsakes Made</span>
            </div>
            <div class="inline-flex items-center space-x-1.5 bg-[#FAF4ED] border border-[#DECDBD] px-3.5 py-1.5 rounded-full shadow-2xs">
                <span class="text-sm">🎨</span>
                <span class="font-semibold text-[#4A2F17]">Digital Preview</span>
                <span>Approved on WhatsApp</span>
            </div>
            <div class="inline-flex items-center space-x-1.5 bg-[#FAF4ED] border border-[#DECDBD] px-3.5 py-1.5 rounded-full shadow-2xs">
                <span class="text-sm">📦</span>
                <span class="font-semibold text-[#4A2F17]">Fragile Transit</span>
                <span>Guaranteed Across PK</span>
            </div>
        </div>
    </div>

    <!-- 1. Interactive Visual Category Cards (Select Your Craft) -->
    <div class="mb-16">
        <div class="text-center mb-8">
            <h2 class="font-serif-lux text-2xl sm:text-3xl text-[#52351E] font-medium">
                Choose What You Wish to Create
            </h2>
            <p class="text-xs text-[#8A6749] mt-1">Click a category card to auto-select your craft details below</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-5 gap-3.5 sm:gap-4" id="category-cards-grid">
            
            <!-- Category 1: Nikkah Platters -->
            <button type="button" 
                    class="custom-cat-card group rounded-2xl bg-[#FAF4ED] border-2 border-[#6B4B32] p-4 text-center transition-all duration-300 hover:shadow-md cursor-pointer text-left flex flex-col justify-between"
                    data-cat="Resin Nikkah & Wedding Platter">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-[#F4ECE1] text-2xl flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                        💍
                    </div>
                    <h3 class="font-serif-lux text-sm sm:text-base font-semibold text-[#4A2F17] text-center mb-1">
                        Nikkah Platters
                    </h3>
                    <p class="text-[11px] text-[#7A5638] text-center leading-snug">
                        Couple names, gold foil Quranic verses & flowers
                    </p>
                </div>
                <span class="cat-card-indicator text-[10px] text-center text-[#6B4B32] font-bold block mt-3 uppercase tracking-wider">
                    ● Selected
                </span>
            </button>

            <!-- Category 2: Resin Clocks & Trays -->
            <button type="button" 
                    class="custom-cat-card group rounded-2xl bg-[#FAF4ED] border-2 border-[#DFCBB7] p-4 text-center transition-all duration-300 hover:border-[#6B4B32] hover:shadow-md cursor-pointer text-left flex flex-col justify-between"
                    data-cat="Resin Clocks & Vanity Trays">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-[#F4ECE1] text-2xl flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                        🔮
                    </div>
                    <h3 class="font-serif-lux text-sm sm:text-base font-semibold text-[#4A2F17] text-center mb-1">
                        Resin Vanity Trays
                    </h3>
                    <p class="text-[11px] text-[#7A5638] text-center leading-snug">
                        Ocean waves, gold trims & preserved wild flora
                    </p>
                </div>
                <span class="cat-card-indicator text-[10px] text-center text-[#8A6749] font-medium block mt-3">
                    Click to Choose
                </span>
            </button>

            <!-- Category 3: Floral Bouquets -->
            <button type="button" 
                    class="custom-cat-card group rounded-2xl bg-[#FAF4ED] border-2 border-[#DFCBB7] p-4 text-center transition-all duration-300 hover:border-[#6B4B32] hover:shadow-md cursor-pointer text-left flex flex-col justify-between"
                    data-cat="Everlasting Floral Bouquets">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-[#F4ECE1] text-2xl flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                        💐
                    </div>
                    <h3 class="font-serif-lux text-sm sm:text-base font-semibold text-[#4A2F17] text-center mb-1">
                        Floral Bouquets
                    </h3>
                    <p class="text-[11px] text-[#7A5638] text-center leading-snug">
                        Eternal satin ribbon & faux floral bridal bouquets
                    </p>
                </div>
                <span class="cat-card-indicator text-[10px] text-center text-[#8A6749] font-medium block mt-3">
                    Click to Choose
                </span>
            </button>

            <!-- Category 4: Crochet Bags & Accessories -->
            <button type="button" 
                    class="custom-cat-card group rounded-2xl bg-[#FAF4ED] border-2 border-[#DFCBB7] p-4 text-center transition-all duration-300 hover:border-[#6B4B32] hover:shadow-md cursor-pointer text-left flex flex-col justify-between"
                    data-cat="Crochet Handbags & Accessories">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-[#F4ECE1] text-2xl flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                        🧶
                    </div>
                    <h3 class="font-serif-lux text-sm sm:text-base font-semibold text-[#4A2F17] text-center mb-1">
                        Crochet Bags
                    </h3>
                    <p class="text-[11px] text-[#7A5638] text-center leading-snug">
                        Daisy tote bags, bridal pouches & floral hairclips
                    </p>
                </div>
                <span class="cat-card-indicator text-[10px] text-center text-[#8A6749] font-medium block mt-3">
                    Click to Choose
                </span>
            </button>

            <!-- Category 5: Arabic Calligraphy Frames -->
            <button type="button" 
                    class="custom-cat-card group rounded-2xl bg-[#FAF4ED] border-2 border-[#DFCBB7] p-4 text-center transition-all duration-300 hover:border-[#6B4B32] hover:shadow-md cursor-pointer text-left flex flex-col justify-between col-span-2 md:col-span-1"
                    data-cat="Arabic Calligraphy & Wall Art">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-[#F4ECE1] text-2xl flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                        ✍️
                    </div>
                    <h3 class="font-serif-lux text-sm sm:text-base font-semibold text-[#4A2F17] text-center mb-1">
                        Arabic Calligraphy
                    </h3>
                    <p class="text-[11px] text-[#7A5638] text-center leading-snug">
                        Ayat-ul-Kursi, 4 Quls & personalized couple names
                    </p>
                </div>
                <span class="cat-card-indicator text-[10px] text-center text-[#8A6749] font-medium block mt-3">
                    Click to Choose
                </span>
            </button>

        </div>
    </div>

    <!-- 2. The 4-Step Artisanal Creation Process Timeline -->
    <div class="mb-16 bg-gradient-to-br from-[#FAF4ED] via-[#F8F1E7] to-[#F1E4D3] border border-[#DFCBB7] rounded-3xl p-6 sm:p-10 shadow-xs">
        <div class="text-center max-w-xl mx-auto mb-8">
            <span class="text-xs uppercase tracking-widest text-[#8F6644] font-semibold block mb-1">How It Works</span>
            <h2 class="font-serif-lux text-2xl sm:text-3xl text-[#4A2F17] font-medium">
                Our 4-Step Bespoke Journey
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 relative">
            
            <!-- Step 1 -->
            <div class="p-5 rounded-2xl bg-[#FAF4ED] border border-[#DECDBD] relative shadow-2xs">
                <div class="w-8 h-8 rounded-full bg-[#6B4B32] text-white text-xs font-bold flex items-center justify-center mb-3 shadow-sm">
                    1
                </div>
                <h3 class="font-serif-lux text-base font-semibold text-[#4A2F17] mb-1">
                    Share Your Vision
                </h3>
                <p class="text-xs text-[#7A5638] leading-relaxed">
                    Submit your names, celebration date, preferred colors, or upload any reference photo.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="p-5 rounded-2xl bg-[#FAF4ED] border border-[#DECDBD] relative shadow-2xs">
                <div class="w-8 h-8 rounded-full bg-[#8F6644] text-white text-xs font-bold flex items-center justify-center mb-3 shadow-sm">
                    2
                </div>
                <h3 class="font-serif-lux text-base font-semibold text-[#4A2F17] mb-1">
                    Digital WhatsApp Proof
                </h3>
                <p class="text-xs text-[#7A5638] leading-relaxed">
                    Our artisan sends mockups & flower layout arrangements on WhatsApp for your 100% approval.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="p-5 rounded-2xl bg-[#FAF4ED] border border-[#DECDBD] relative shadow-2xs">
                <div class="w-8 h-8 rounded-full bg-[#A87B54] text-white text-xs font-bold flex items-center justify-center mb-3 shadow-sm">
                    3
                </div>
                <h3 class="font-serif-lux text-base font-semibold text-[#4A2F17] mb-1">
                    Handcrafted & Cured
                </h3>
                <p class="text-xs text-[#7A5638] leading-relaxed">
                    Hand-poured with crystal UV-stabilized resin or stitched with organic cotton, curing for 48 hours.
                </p>
            </div>

            <!-- Step 4 -->
            <div class="p-5 rounded-2xl bg-[#FAF4ED] border border-[#DECDBD] relative shadow-2xs">
                <div class="w-8 h-8 rounded-full bg-[#593920] text-white text-xs font-bold flex items-center justify-center mb-3 shadow-sm">
                    4
                </div>
                <h3 class="font-serif-lux text-base font-semibold text-[#4A2F17] mb-1">
                    Gift Box Delivery
                </h3>
                <p class="text-xs text-[#7A5638] leading-relaxed">
                    Double bubble wrapped in a luxury gift box with tracked courier delivery straight to your doorstep.
                </p>
            </div>

        </div>
    </div>

    <!-- 3. Main 2-Column Studio Inquiry Workspace -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start mb-16" id="inquiry-form-section">
        
        <!-- Left Column: The Interactive Request Form (7 cols) -->
        <div class="lg:col-span-7 bg-[#FAF4ED] border-2 border-[#DECDBD] rounded-3xl p-6 sm:p-10 shadow-sm space-y-6">
            
            <div class="border-b border-[#EADBCC] pb-4 mb-2 flex items-center justify-between">
                <div>
                    <h2 class="font-serif-lux text-2xl sm:text-3xl font-medium text-[#4A2F17]">
                        Custom Inquiry Form
                    </h2>
                    <p class="text-xs text-[#8A6749] mt-0.5">Fill in your requirements below for an instant quote</p>
                </div>
                <span class="text-xs text-emerald-800 bg-emerald-50 border border-emerald-200 px-3 py-1 rounded-full font-semibold">
                    Free Consultation
                </span>
            </div>

            <!-- AJAX Success Confirmation Box (Hidden initially) -->
            <div id="custom-order-success-box" class="hidden p-6 sm:p-8 rounded-3xl bg-gradient-to-br from-[#FAF4ED] via-[#F8F1E7] to-[#F1E4D3] border-2 border-emerald-600/30 text-center space-y-4 shadow-sm animate-fade-in">
                <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-800 text-3xl flex items-center justify-center mx-auto shadow-2xs">
                    ✓
                </div>
                <div>
                    <span class="text-[10px] uppercase tracking-widest text-emerald-800 font-bold bg-emerald-50 border border-emerald-200 px-3 py-0.5 rounded-full inline-block mb-2">
                        Inquiry Successfully Saved
                    </span>
                    <h3 class="font-serif-lux text-2xl sm:text-3xl font-medium text-[#4A2F17]">
                        JazakAllah Khair! We Have Received Your Vision ♡
                    </h3>
                    <p class="text-xs text-[#7A5638] max-w-md mx-auto mt-2 leading-relaxed">
                        Your custom commission request has been logged in our studio workspace. A dedicated WhatsApp chat has been prepared for you.
                    </p>
                </div>

                <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-3">
                    <a href="#" 
                       id="success-wa-link"
                       target="_blank" 
                       class="w-full sm:w-auto px-7 py-3.5 rounded-full text-xs font-semibold text-white bg-[#25D366] hover:bg-[#1EBE5D] transition-all flex items-center justify-center space-x-2 shadow-md hover:shadow-lg transform hover:scale-105">
                        <span>💬</span>
                        <span>Open WhatsApp in New Tab</span>
                        <span>↗</span>
                    </a>
                    <button type="button" 
                            id="reset-custom-form-btn"
                            class="w-full sm:w-auto px-6 py-3.5 rounded-full text-xs font-semibold text-[#5C3D24] bg-[#FAF4ED] hover:bg-[#EDE0D1] border border-[#DFCBB7] transition-all">
                        Submit Another Request
                    </button>
                </div>
            </div>

            <form action="{{ route('custom-orders.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5" id="custom-order-form">
                @csrf
                
                <!-- Hidden Input for selected category (synced with cards & pills) -->
                <input type="hidden" name="category" id="selected-category-input" value="Resin Nikkah & Wedding Platter">

                <!-- Client Name & WhatsApp -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Your Full Name *</label>
                        <input type="text" 
                               name="name" 
                               required 
                               placeholder="e.g. Fatima Zahra" 
                               class="w-full bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl px-4 py-3 text-xs sm:text-sm text-[#4A2F17] outline-none shadow-2xs transition-colors">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-[#52351E] mb-1.5">WhatsApp Number *</label>
                        <div class="relative flex items-center">
                            <span class="absolute left-3.5 text-xs text-[#8F6644] font-medium flex items-center space-x-1">
                                <span>🇵🇰</span>
                                <span>+92</span>
                            </span>
                            <input type="tel" 
                                   name="phone" 
                                   required 
                                   placeholder="300 1234567" 
                                   class="w-full bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl pl-16 pr-4 py-3 text-xs sm:text-sm text-[#4A2F17] outline-none shadow-2xs transition-colors">
                        </div>
                    </div>
                </div>

                <!-- Email & Celebration Date -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-[#52351E] mb-1.5 flex items-center justify-between">
                            <span>Email Address</span>
                            <span class="text-[10px] text-[#8A6749] font-normal">Optional</span>
                        </label>
                        <input type="email" 
                               name="email" 
                               placeholder="e.g. fatima@gmail.com" 
                               class="w-full bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl px-4 py-3 text-xs sm:text-sm text-[#4A2F17] outline-none shadow-2xs transition-colors">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-[#52351E] mb-1.5 flex items-center justify-between">
                            <span>Required By Date</span>
                            <span class="text-[10px] text-[#8A6749] font-normal">When is the big day?</span>
                        </label>
                        <input type="date" 
                               id="required-date-picker"
                               class="w-full bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl px-4 py-3 text-xs sm:text-sm text-[#4A2F17] outline-none shadow-2xs transition-colors">
                    </div>
                </div>

                <!-- Category Selected Display Pill -->
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Craft Category</label>
                    <div class="flex items-center space-x-2 p-3 bg-[#F4ECE1] border border-[#DFCBB7] rounded-xl">
                        <span class="text-lg">🎨</span>
                        <span class="text-xs font-bold text-[#4A2F17]" id="display-selected-category">Resin Nikkah & Wedding Platter</span>
                        <span class="text-[10px] text-[#8F6644] ml-auto">(Click any card above to change)</span>
                    </div>
                </div>

                <!-- Budget Range Interactive Pills -->
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Estimated Budget (PKR)</label>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2" id="budget-pills">
                        <button type="button" class="budget-pill py-2.5 px-3 rounded-xl border border-[#DECDBD] bg-[#FAF4ED] text-xs font-semibold text-[#6B4B32] hover:border-[#6B4B32] transition-colors" data-budget="Under Rs. 2,000">
                            Under 2,000
                        </button>
                        <button type="button" class="budget-pill py-2.5 px-3 rounded-xl border-2 border-[#6B4B32] bg-[#F4ECE1] text-xs font-bold text-[#4A2F17] transition-colors" data-budget="Rs. 2,000 - 4,000">
                            2,000 - 4,000
                        </button>
                        <button type="button" class="budget-pill py-2.5 px-3 rounded-xl border border-[#DECDBD] bg-[#FAF4ED] text-xs font-semibold text-[#6B4B32] hover:border-[#6B4B32] transition-colors" data-budget="Rs. 4,000 - 7,000">
                            4,000 - 7,000
                        </button>
                        <button type="button" class="budget-pill py-2.5 px-3 rounded-xl border border-[#DECDBD] bg-[#FAF4ED] text-xs font-semibold text-[#6B4B32] hover:border-[#6B4B32] transition-colors" data-budget="Rs. 7,000+ (Luxury Set)">
                            7,000+ (Sets)
                        </button>
                    </div>
                    <input type="hidden" name="budget" id="selected-budget-input" value="Rs. 2,000 - 4,000">
                </div>

                <!-- Custom Requirements Description -->
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">
                        Describe What You Wish to Create *
                    </label>
                    <textarea name="description" 
                              id="custom-description-input"
                              rows="4" 
                              required 
                              placeholder="Please share names, Nikkah date, color theme (e.g. emerald & gold, blush pink & pearls), specific flower preferences, or custom calligraphy verses..." 
                              class="w-full bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl p-3.5 text-xs text-[#4A2F17] outline-none shadow-2xs leading-relaxed transition-colors"></textarea>
                </div>

                <!-- Reference Photo Drag & Drop Studio Uploader -->
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5 flex items-center justify-between">
                        <span>Reference Image or Inspiration Photo</span>
                        <span class="text-[10px] text-[#8A6749] font-normal">Optional (Max 5MB)</span>
                    </label>

                    <div id="reference-dropzone" class="relative border-2 border-dashed border-[#DFCBB7] hover:border-[#6B4B32] rounded-2xl bg-[#F6ECE0]/60 p-4 text-center transition-colors cursor-pointer group">
                        <input type="file" 
                               name="reference_image" 
                               id="reference-image-input" 
                               accept="image/jpeg,image/png,image/webp,image/jpg"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        
                        <!-- Empty Dropzone State -->
                        <div id="reference-empty-state" class="py-2 flex flex-col items-center justify-center space-y-1.5">
                            <span class="text-2xl group-hover:scale-110 transition-transform">📷</span>
                            <span class="text-xs font-semibold text-[#4A2F17]">Click to upload screenshot or inspiration photo</span>
                            <span class="text-[10px] text-[#8A6749]">Pinterest pins, Instagram screenshots, or color swatches</span>
                        </div>

                        <!-- Live File Preview Container -->
                        <div id="reference-preview-state" class="hidden flex items-center space-x-3 p-1 text-left">
                            <div class="w-14 h-14 rounded-xl bg-white border border-[#DECDBD] overflow-hidden flex-shrink-0 shadow-2xs">
                                <img id="reference-preview-img" src="" alt="Reference Preview" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-grow min-w-0">
                                <span class="text-xs font-bold text-[#4A2F17] truncate block" id="reference-filename">photo.jpg</span>
                                <span class="text-[10px] text-emerald-800 font-semibold bg-emerald-50 px-2 py-0.5 rounded-full inline-block mt-0.5">✓ Reference Attached</span>
                                <span class="text-[10px] text-[#8A6749] block mt-1 hover:underline cursor-pointer">Click to change</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="pt-2">
                    <button type="submit" 
                            id="custom-order-submit-btn"
                            class="btn-luxury w-full py-4 px-6 rounded-full text-xs sm:text-sm font-semibold tracking-wide text-center flex items-center justify-center space-x-2 shadow-md hover:shadow-lg transform transition-all duration-300 hover:scale-[1.02] active:scale-95">
                        <span>💬</span>
                        <span id="custom-order-btn-text">Send Custom Request & Open WhatsApp Chat</span>
                        <span id="custom-order-btn-arrow">→</span>
                    </button>
                    <p class="text-[11px] text-center text-[#8A6749] mt-2">
                        🔒 Your request is saved in our studio log and immediately opens WhatsApp in a new tab.
                    </p>
                </div>

            </form>

        </div>

        <!-- Right Column: Studio Trust, Direct Chat & Artisan Perks (5 cols) -->
        <div class="lg:col-span-5 space-y-6 lg:sticky lg:top-28">
            
            <!-- Direct Urgent WhatsApp Consultation Card -->
            <div class="bg-gradient-to-br from-[#FAF4ED] via-[#F8F1E7] to-[#F1E4D3] border-2 border-[#DECDBD] rounded-3xl p-6 sm:p-7 shadow-xs space-y-5">
                
                <div class="flex items-center space-x-3 pb-4 border-b border-[#E8DACB]">
                    <div class="w-12 h-12 rounded-2xl bg-[#25D366] text-white flex items-center justify-center text-2xl shadow-sm flex-shrink-0">
                        💬
                    </div>
                    <div>
                        <h3 class="font-serif-lux text-xl font-medium text-[#4A2F17]">Need It Urgently?</h3>
                        <p class="text-xs text-[#8A6749]">Chat directly with our master artisan</p>
                    </div>
                </div>

                <p class="text-xs text-[#6F4B2E] leading-relaxed">
                    Have an urgent Nikkah date within 3-5 days or need immediate flower availability check? Tap below for instant one-on-one assistance:
                </p>

                @php
                    $directChatText = "Assalam-o-Alaikum Islamic Crafts! I would like to inquire about a custom handcrafted order for an upcoming event.";
                    $cleanNumber = preg_replace('/[^0-9]/', '', env('WHATSAPP_NUMBER', '923001234567'));
                @endphp
                <a href="https://wa.me/{{ $cleanNumber }}?text={{ urlencode($directChatText) }}" 
                   target="_blank" 
                   class="w-full py-3.5 px-5 rounded-full text-xs sm:text-sm font-semibold text-white bg-[#25D366] hover:bg-[#1EBE5D] transition-all flex items-center justify-center space-x-2 shadow-sm hover:shadow-md transform hover:scale-[1.02]">
                    <span>💬</span>
                    <span>1-Click Instant WhatsApp Chat</span>
                </a>

                <!-- What Can You Customize Checklist -->
                <div class="pt-4 border-t border-[#E8DACB] space-y-2.5">
                    <span class="text-xs font-semibold text-[#4A2F17] block mb-2">
                        ✨ Fully Customizable Elements:
                    </span>
                    <div class="flex items-start space-x-2 text-xs text-[#7A5638]">
                        <span class="text-emerald-700 font-bold">✓</span>
                        <span><strong>Couple Names & Dates:</strong> Embossed gold leaf calligraphy.</span>
                    </div>
                    <div class="flex items-start space-x-2 text-xs text-[#7A5638]">
                        <span class="text-emerald-700 font-bold">✓</span>
                        <span><strong>Real Flowers:</strong> Preserved baby's breath, blush roses, daisies.</span>
                    </div>
                    <div class="flex items-start space-x-2 text-xs text-[#7A5638]">
                        <span class="text-emerald-700 font-bold">✓</span>
                        <span><strong>Rims & Handles:</strong> Pearls, gold vintage handles, crystal stones.</span>
                    </div>
                    <div class="flex items-start space-x-2 text-xs text-[#7A5638]">
                        <span class="text-emerald-700 font-bold">✓</span>
                        <span><strong>Quranic Verses:</strong> Ayat-ul-Kursi or Surah Ar-Rum love verses.</span>
                    </div>
                </div>

            </div>

            <!-- Real Bride Review Card -->
            <div class="bg-[#FAF4ED] border border-[#DECDBD] rounded-3xl p-6 shadow-2xs space-y-3">
                <div class="flex items-center space-x-2 text-xs text-[#C89B55]">
                    <span>★★★★★</span>
                    <span class="text-[#8A6749] font-medium text-[11px]">• Real Custom Nikkah Order</span>
                </div>
                <p class="font-serif-lux italic text-xs sm:text-sm text-[#52351E] leading-relaxed">
                    "Our personalized Nikkah platter arrived in Lahore safely double-boxed. The WhatsApp preview matched the final resin gloss 100%! Ayyan and all our guests couldn't stop taking pictures."
                </p>
                <div class="flex items-center space-x-2 pt-1 text-[11px] text-[#8F6644]">
                    <span class="font-semibold text-[#4A2F17]">Sara & Ayyan</span>
                    <span>—</span>
                    <span>Lahore, Pakistan</span>
                </div>
            </div>

        </div>

    </div>

    <!-- 4. Customer Gallery Spotlight ("Recent Bespoke Masterpieces") -->
    <div class="mt-16 pt-12 border-t border-[#EADBCC]">
        <div class="text-center max-w-xl mx-auto mb-10">
            <span class="text-xs uppercase tracking-widest text-[#8F6644] font-semibold block mb-1">Inspiration Gallery</span>
            <h2 class="font-serif-lux italic text-2xl sm:text-3xl text-[#52351E] font-medium">
                Recent Bespoke Masterpieces
            </h2>
            <p class="text-xs text-[#8A6749] mt-1">Real handcrafted commissions loved by our couples across Pakistan</p>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            
            <!-- Masterpiece 1: Nikkah Platter -->
            <div class="luxury-card rounded-2xl overflow-hidden group">
                <div class="aspect-square bg-[#F4ECE1] relative overflow-hidden">
                    <img src="{{ asset('images/product-nikkah-platter-hd.jpg') }}" alt="Personalized Nikkah Platter" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-108">
                    <span class="absolute top-2.5 left-2.5 bg-[#FAF4ED]/90 backdrop-blur-sm text-[#5C3D24] text-[10px] font-semibold px-2.5 py-0.5 rounded-full border border-[#DECDBD]">
                        💍 Nikkah Platter
                    </span>
                </div>
                <div class="p-3.5 text-center">
                    <h4 class="font-serif-lux text-sm font-semibold text-[#4A2F17]">Personalized Couple Platter</h4>
                    <p class="text-[11px] text-[#8A6749] mt-0.5">Gold calligraphy with real floral wreath</p>
                </div>
            </div>

            <!-- Masterpiece 2: Crochet Daisy Bag -->
            <div class="luxury-card rounded-2xl overflow-hidden group">
                <div class="aspect-square bg-[#F4ECE1] relative overflow-hidden">
                    <img src="{{ asset('images/product-crochet-bag-hd.jpg') }}" alt="Handmade Daisy Crochet Bag" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-108">
                    <span class="absolute top-2.5 left-2.5 bg-[#FAF4ED]/90 backdrop-blur-sm text-[#5C3D24] text-[10px] font-semibold px-2.5 py-0.5 rounded-full border border-[#DECDBD]">
                        🧶 Crochet Bag
                    </span>
                </div>
                <div class="p-3.5 text-center">
                    <h4 class="font-serif-lux text-sm font-semibold text-[#4A2F17]">Daisy Bloom Crochet Handbag</h4>
                    <p class="text-[11px] text-[#8A6749] mt-0.5">Hand-knitted with pearl beads strap</p>
                </div>
            </div>

            <!-- Masterpiece 3: Floral Vanity Tray -->
            <div class="luxury-card rounded-2xl overflow-hidden group">
                <div class="aspect-square bg-[#F4ECE1] relative overflow-hidden">
                    <img src="{{ asset('images/luxury-resin-tray-hd.jpg') }}" alt="Wild Rose Resin Tray" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-108">
                    <span class="absolute top-2.5 left-2.5 bg-[#FAF4ED]/90 backdrop-blur-sm text-[#5C3D24] text-[10px] font-semibold px-2.5 py-0.5 rounded-full border border-[#DECDBD]">
                        🔮 Vanity Tray
                    </span>
                </div>
                <div class="p-3.5 text-center">
                    <h4 class="font-serif-lux text-sm font-semibold text-[#4A2F17]">Wild Rose Botanical Tray</h4>
                    <p class="text-[11px] text-[#8A6749] mt-0.5">Heat-resistant crystal resin & gold leaf</p>
                </div>
            </div>

            <!-- Masterpiece 4: Floral Bouquet -->
            <div class="luxury-card rounded-2xl overflow-hidden group">
                <div class="aspect-square bg-[#F4ECE1] relative overflow-hidden">
                    <img src="{{ asset('images/cat-floral-hd.jpg') }}" alt="Everlasting Rose Bouquet" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-108">
                    <span class="absolute top-2.5 left-2.5 bg-[#FAF4ED]/90 backdrop-blur-sm text-[#5C3D24] text-[10px] font-semibold px-2.5 py-0.5 rounded-full border border-[#DECDBD]">
                        💐 Bridal Bouquet
                    </span>
                </div>
                <div class="p-3.5 text-center">
                    <h4 class="font-serif-lux text-sm font-semibold text-[#4A2F17]">Pastel Eternal Bouquet</h4>
                    <p class="text-[11px] text-[#8A6749] mt-0.5">Satin ribbon wrapped with baby's breath</p>
                </div>
            </div>

        </div>
    </div>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // --- 1. Interactive Visual Category Cards Selector ---
        const catCards = document.querySelectorAll('.custom-cat-card');
        const selectedCatInput = document.getElementById('selected-category-input');
        const displaySelectedCat = document.getElementById('display-selected-category');

        catCards.forEach(card => {
            card.addEventListener('click', function () {
                const catName = this.getAttribute('data-cat');
                if (selectedCatInput) selectedCatInput.value = catName;
                if (displaySelectedCat) displaySelectedCat.textContent = catName;

                // Update visual border highlights
                catCards.forEach(c => {
                    c.classList.remove('border-[#6B4B32]', 'shadow-md');
                    c.classList.add('border-[#DFCBB7]');
                    const indicator = c.querySelector('.cat-card-indicator');
                    if (indicator) {
                        indicator.textContent = 'Click to Choose';
                        indicator.className = 'cat-card-indicator text-[10px] text-center text-[#8A6749] font-medium block mt-3';
                    }
                });

                this.classList.remove('border-[#DFCBB7]');
                this.classList.add('border-[#6B4B32]', 'shadow-md');
                const activeIndicator = this.querySelector('.cat-card-indicator');
                if (activeIndicator) {
                    activeIndicator.textContent = '● Selected';
                    activeIndicator.className = 'cat-card-indicator text-[10px] text-center text-[#6B4B32] font-bold block mt-3 uppercase tracking-wider';
                }

                // Smooth scroll down to inquiry form
                const formSection = document.getElementById('inquiry-form-section');
                if (formSection) {
                    formSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // --- 2. Interactive Budget Range Pills ---
        const budgetPills = document.querySelectorAll('.budget-pill');
        const budgetInput = document.getElementById('selected-budget-input');

        budgetPills.forEach(pill => {
            pill.addEventListener('click', function () {
                const budgetVal = this.getAttribute('data-budget');
                if (budgetInput) budgetInput.value = budgetVal;

                budgetPills.forEach(p => {
                    p.classList.remove('border-2', 'border-[#6B4B32]', 'bg-[#F4ECE1]', 'font-bold', 'text-[#4A2F17]');
                    p.classList.add('border', 'border-[#DECDBD]', 'bg-[#FAF4ED]', 'font-semibold', 'text-[#6B4B32]');
                });

                this.classList.remove('border', 'border-[#DECDBD]', 'bg-[#FAF4ED]', 'font-semibold', 'text-[#6B4B32]');
                this.classList.add('border-2', 'border-[#6B4B32]', 'bg-[#F4ECE1]', 'font-bold', 'text-[#4A2F17]');
            });
        });

        // --- 3. Reference Photo Live Preview ---
        const refInput = document.getElementById('reference-image-input');
        const emptyState = document.getElementById('reference-empty-state');
        const previewState = document.getElementById('reference-preview-state');
        const previewImg = document.getElementById('reference-preview-img');
        const filenameLabel = document.getElementById('reference-filename');

        if (refInput) {
            refInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewImg.src = e.target.result;
                        filenameLabel.textContent = file.name;
                        emptyState.classList.add('hidden');
                        previewState.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // --- 4. AJAX Submission with Toast & New Tab WhatsApp ---
        const datePicker = document.getElementById('required-date-picker');
        const descInput = document.getElementById('custom-description-input');
        const customForm = document.getElementById('custom-order-form');
        const submitBtn = document.getElementById('custom-order-submit-btn');
        const btnText = document.getElementById('custom-order-btn-text');
        const successBox = document.getElementById('custom-order-success-box');
        const successWaLink = document.getElementById('success-wa-link');
        const resetFormBtn = document.getElementById('reset-custom-form-btn');

        if (customForm) {
            customForm.addEventListener('submit', function (e) {
                e.preventDefault();

                if (datePicker && datePicker.value && descInput) {
                    descInput.value += `\n[Celebration / Required Date: ${datePicker.value}]`;
                }

                if (submitBtn) {
                    submitBtn.disabled = true;
                    if (btnText) btnText.textContent = 'Saving Inquiry & Opening WhatsApp...';
                }

                const formData = new FormData(customForm);

                fetch(customForm.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        if (btnText) btnText.textContent = 'Send Custom Request & Open WhatsApp Chat';
                    }

                    if (data.success) {
                        // 1. Show Luxury Notification Toast
                        if (typeof window.showNoticeToast === 'function') {
                            window.showNoticeToast('Inquiry Received ♡', data.message || 'JazakAllah Khair! Aapki custom inquiry receive ho gayi hai.', '✨');
                        }

                        // 2. Open WhatsApp in a NEW TAB / PAGE
                        if (data.whatsapp_url) {
                            window.open(data.whatsapp_url, '_blank');
                            if (successWaLink) {
                                successWaLink.href = data.whatsapp_url;
                            }
                        }

                        // 3. Show Success Box and Hide Form
                        customForm.classList.add('hidden');
                        if (successBox) {
                            successBox.classList.remove('hidden');
                            successBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    } else {
                        alert(data.message || 'Error submitting custom inquiry.');
                    }
                })
                .catch(err => {
                    console.error('Custom order error:', err);
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        if (btnText) btnText.textContent = 'Send Custom Request & Open WhatsApp Chat';
                    }
                    // Fallback to normal submit if fetch fails
                    customForm.submit();
                });
            });
        }

        // --- 5. Reset Form Handler ---
        if (resetFormBtn) {
            resetFormBtn.addEventListener('click', function () {
                if (customForm) {
                    customForm.reset();
                    customForm.classList.remove('hidden');
                }
                if (successBox) {
                    successBox.classList.add('hidden');
                }
                if (emptyState) emptyState.classList.remove('hidden');
                if (previewState) previewState.classList.add('hidden');
            });
        }
    });
</script>
@endpush

@endsection
