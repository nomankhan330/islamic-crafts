<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Islamic Crafts — Handmade with Love, Crafted with Elegance')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400;1,500&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream: '#FBF6EE',
                        'cream-light': '#FDFBF7',
                        beige: '#F4ECE1',
                        'beige-card': '#F7EFE6',
                        'card-bg': '#F9F3EA',
                        tan: '#E7D7C5',
                        'tan-bar': '#E8D9C8',
                        'brown-text': '#4F3520',
                        'brown-btn': '#6B4B32',
                        'brown-btn-hover': '#573C27',
                        'brown-dark': '#3D2614',
                    },
                    fontFamily: {
                        serif: ['"Cormorant Garamond"', 'serif'],
                        display: ['"Playfair Display"', 'serif'],
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            background-color: #FAF4ED;
            color: #4F3520;
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
        }
        .font-serif-lux {
            font-family: 'Cormorant Garamond', serif;
        }
        .font-display-lux {
            font-family: 'Playfair Display', serif;
        }
        .btn-luxury {
            background-color: #6B4B32;
            color: #FAF4ED;
            transition: all 0.25s ease;
        }
        .btn-luxury:hover {
            background-color: #553B26;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(107, 75, 50, 0.25);
        }
        .btn-explore {
            background-color: #FAF4ED;
            color: #5C3D24;
            border: 1px solid #E2D2C0;
            transition: all 0.25s ease;
        }
        .btn-explore:hover {
            background-color: #F1E4D4;
            border-color: #CBB199;
        }
        .card-craft {
            background: #F7EFE6;
            border: 1px solid #ECE0D1;
            transition: all 0.3s ease;
        }
        .card-craft:hover {
            border-color: #DCC7B0;
            box-shadow: 0 10px 24px rgba(79, 53, 32, 0.06);
        }
        .product-card {
            background: #F8F2E8;
            border: 1px solid #EAE0D3;
            transition: all 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 22px rgba(79, 53, 32, 0.08);
            border-color: #DFCDBB;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 7px; }
        ::-webkit-scrollbar-track { background: #FAF4ED; }
        ::-webkit-scrollbar-thumb { background: #DAC7B2; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #B38E6A; }
    </style>
    @stack('styles')
</head>
<body class="flex flex-col min-h-screen">

    <!-- Top Announcement Bar (Exact matching screenshot: ✦ Handmade with love | Nationwide Delivery ✦) -->
    <div class="bg-[#E9DAC9] text-[#7A5638] text-[11px] sm:text-xs py-2 tracking-widest text-center font-medium border-b border-[#DECDBD] px-4">
        <span class="text-[#8F6644]">✦</span>&nbsp; Handmade with love &nbsp;|&nbsp; Nationwide Delivery &nbsp;<span class="text-[#8F6644]">✦</span>
    </div>

    <!-- Main Navigation Header -->
    <header class="bg-[#FAF4ED] sticky top-0 z-50 border-b border-[#EEDBCC] transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Brand Logo (with bow icon) -->
                <a href="{{ route('home') }}" class="flex items-center space-x-2.5 group">
                    <!-- Delicate Ribbon Bow Icon -->
                    <svg class="w-8 h-8 text-[#7D5838] transition-transform group-hover:scale-105" viewBox="0 0 100 100" fill="none" stroke="currentColor">
                        <path d="M50 48 C42 36 24 24 16 34 C8 44 20 60 40 53 C46 51 49 48 50 48 Z" stroke-width="4.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M50 48 C58 36 76 24 84 34 C92 44 80 60 60 53 C54 51 51 48 50 48 Z" stroke-width="4.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="50" cy="48" r="5" fill="#7D5838"/>
                        <path d="M47 53 C43 68 33 82 22 90" stroke-width="4" stroke-linecap="round"/>
                        <path d="M53 53 C57 68 67 82 78 90" stroke-width="4" stroke-linecap="round"/>
                    </svg>
                    <span class="font-serif-lux text-2xl sm:text-3xl font-medium tracking-wide text-[#5C3D24] italic">Islamic Crafts</span>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center space-x-9 text-xs sm:text-[13px] font-medium text-[#5C3D24]">
                    <a href="{{ route('home') }}" class="transition-colors hover:text-[#8F6644] {{ request()->routeIs('home') ? 'border-b border-[#7D5838] pb-1' : '' }}">Home</a>
                    <a href="{{ route('products.index') }}" class="transition-colors hover:text-[#8F6644] {{ request()->routeIs('products.index') && !request('category') ? 'border-b border-[#7D5838] pb-1' : '' }}">Shop All</a>
                    
                    <!-- Categories Dropdown -->
                    <div class="relative group py-2">
                        <button class="flex items-center space-x-1 transition-colors hover:text-[#8F6644] focus:outline-none">
                            <span>Categories</span>
                            <svg class="w-3 h-3 text-[#7D5838] transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        
                        <div class="absolute left-0 top-full hidden group-hover:block w-72 bg-[#FAF4ED] border border-[#E8DACB] shadow-xl rounded-xl py-3 z-50">
                            @php
                                $navCategories = \App\Models\Category::active()->parent()->with('children')->orderBy('sort_order')->get();
                            @endphp
                            @foreach($navCategories as $cat)
                                <div class="px-4 py-2 hover:bg-[#F3E7D9] transition-colors">
                                    <a href="{{ route('category.show', $cat->slug) }}" class="font-serif-lux text-base font-semibold text-[#5C3D24] flex items-center justify-between">
                                        <span>{{ $cat->name }}</span>
                                        <span class="text-xs">{{ $cat->icon }}</span>
                                    </a>
                                    <div class="pl-2 mt-1 space-y-0.5 border-l border-[#D9C6B1]">
                                        @foreach($cat->children->take(3) as $sub)
                                            <a href="{{ route('category.show', $sub->slug) }}" class="block text-xs text-[#7B583A] hover:text-[#9A6F49] py-0.5">
                                                {{ $sub->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <a href="{{ route('custom-orders') }}" class="transition-colors hover:text-[#8F6644] {{ request()->routeIs('custom-orders') ? 'border-b border-[#7D5838] pb-1' : '' }}">Custom Orders</a>
                    <a href="{{ route('about') }}" class="transition-colors hover:text-[#8F6644] {{ request()->routeIs('about') ? 'border-b border-[#7D5838] pb-1' : '' }}">About Us</a>
                    <a href="{{ route('contact') }}" class="transition-colors hover:text-[#8F6644] {{ request()->routeIs('contact') ? 'border-b border-[#7D5838] pb-1' : '' }}">Contact Us</a>
                </nav>

                <!-- Action Icons (Search, User, Cart) - Exactly as in Screenshot -->
                <div class="flex items-center space-x-4 sm:space-x-5 text-[#5C3D24]">
                    <!-- Search Icon -->
                    <a href="{{ route('products.index') }}" class="hover:text-[#8F6644] transition-colors p-1" title="Search">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="7"/>
                            <path stroke-linecap="round" d="M20 20l-3.5-3.5"/>
                        </svg>
                    </a>

                    <!-- User Account / Admin Access Icon -->
                    <a href="{{ auth()->check() ? route('admin.dashboard') : route('admin.login') }}" class="hover:text-[#8F6644] transition-colors p-1" title="{{ auth()->check() ? 'Admin Dashboard' : 'Admin Login' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </a>

                    <!-- Shopping Bag Icon with Badge (0 or count) -->
                    <a href="{{ route('cart.index') }}" class="relative hover:text-[#8F6644] transition-colors p-1" title="Shopping Bag">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        <span id="nav-cart-count" class="absolute -top-1 -right-1 bg-[#6B4B32] text-[#FAF4ED] text-[9px] font-bold w-4 h-4 rounded-full flex items-center justify-center">
                            {{ app(\App\Services\CartService::class)->getCount() }}
                        </span>
                    </a>

                    <!-- Mobile Drawer Toggle -->
                    <button id="mobile-toggle" class="lg:hidden p-1 text-[#5C3D24]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div id="mobile-menu" class="hidden lg:hidden bg-[#FAF4ED] border-b border-[#EADBCC] px-6 py-5 space-y-4">
            <a href="{{ route('home') }}" class="block font-medium py-1">Home</a>
            <a href="{{ route('products.index') }}" class="block font-medium py-1">Shop All</a>
            <a href="{{ route('custom-orders') }}" class="block font-medium py-1">Custom Orders</a>
            <a href="{{ route('about') }}" class="block font-medium py-1">About Us</a>
            <a href="{{ route('contact') }}" class="block font-medium py-1">Contact Us</a>
            <a href="{{ route('admin.dashboard') }}" class="block font-medium py-1 text-[#6B4B32] border-t border-[#E8DACB] pt-2">Admin Panel</a>
        </div>
    </header>

    <!-- Flash Notifications -->
    @if(session('success'))
        <div class="bg-[#EAE0D3] border-b border-[#D5C2AD] text-[#4D331E] px-4 py-3 text-center text-xs sm:text-sm font-medium flex items-center justify-center space-x-2">
            <span>✨</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    @if(session('error'))
        <div class="bg-rose-100 border-b border-rose-200 text-rose-800 px-4 py-3 text-center text-xs sm:text-sm font-medium">
            <span>{{ session('error') }}</span>
        </div>
    @endif

    <!-- Main Page Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Luxury Enhanced Footer (Matching Studio Aesthetic & Screenshot) -->
    <footer class="bg-gradient-to-b from-[#FAF4ED] via-[#F8F1E7] to-[#F1E4D3] border-t border-[#E8DACB] text-[#55371E] mt-16 sm:mt-20">
        
        <!-- Luxury Newsletter Band (Atelier Inner Circle Invitation) -->
        <div class="py-12 sm:py-16 px-4 sm:px-6 lg:px-8 relative overflow-hidden border-b border-[#EADBCC]">
            
            <div class="max-w-4xl mx-auto relative">
                
                <!-- Sculpted Atelier Invitation Card -->
                <div class="relative bg-gradient-to-br from-[#FFFDF9] via-[#FAF3EA] to-[#F3E7D7] border-2 border-[#DFCBB7] rounded-[2.5rem] p-7 sm:p-12 lg:p-14 shadow-[0_20px_50px_-15px_rgba(79,53,32,0.15)] overflow-hidden text-center">
                    
                    <!-- Atmospheric Luxury Glows & Corner Motifs -->
                    <div class="absolute -top-12 -left-12 w-40 h-40 rounded-full bg-[#EBDBC9]/50 blur-2xl pointer-events-none"></div>
                    <div class="absolute -bottom-12 -right-12 w-44 h-44 rounded-full bg-[#DFCBB7]/50 blur-2xl pointer-events-none"></div>
                    
                    <!-- Decorative Golden Stars -->
                    <div class="absolute top-6 left-8 text-[#CBB199] text-xl opacity-75 select-none animate-pulse">✦</div>
                    <div class="absolute bottom-6 right-8 text-[#CBB199] text-2xl opacity-75 select-none animate-pulse">✦</div>
                    <div class="absolute top-1/2 right-6 -translate-y-1/2 text-[#D9C4AF] text-xs opacity-50 select-none hidden sm:block">✦</div>
                    <div class="absolute top-1/2 left-6 -translate-y-1/2 text-[#D9C4AF] text-xs opacity-50 select-none hidden sm:block">✦</div>

                    <!-- Inner Card Content -->
                    <div class="relative z-10 max-w-2xl mx-auto">
                        
                        <!-- Top Floating VIP Pill -->
                        <div class="inline-flex items-center space-x-2 text-xs text-[#6B4B32] font-semibold bg-[#FAF4ED] px-4 py-1.5 rounded-full border border-[#DFCBB7] shadow-2xs mb-4">
                            <span class="w-2 h-2 rounded-full bg-[#6B4B32] animate-ping"></span>
                            <span class="tracking-wide uppercase text-[10px] font-bold">Atelier Inner Circle</span>
                            <span class="text-[#DFCBB7]">•</span>
                            <span class="text-[11px] font-medium text-[#8F6644]">Complimentary 10% Voucher</span>
                        </div>

                        <!-- Main Headline with Cormorant Garamond Font -->
                        <h3 class="font-serif-lux text-3xl sm:text-4xl lg:text-5xl text-[#4A2F17] font-normal leading-[1.15] mb-3">
                            Join Our Crafty Family <span class="text-[#8F6644] font-light">♡</span>
                        </h3>
                        
                        <!-- Subtitle -->
                        <p class="font-serif-lux italic text-sm sm:text-base text-[#7A5638] max-w-lg mx-auto mb-7 leading-relaxed">
                            Be the first to explore limited resin drops, bespoke bridal collections, and receive an instant <strong class="text-[#52351E] not-italic font-semibold underline decoration-[#CBB199] decoration-2">10% OFF code</strong> for your next handcrafted treasure.
                        </p>
                        
                        <!-- Interactive Form with Glassmorphism Pill -->
                        <div id="newsletter-form-container">
                            <form id="newsletter-form" action="{{ route('subscribe') }}" method="POST" class="max-w-xl mx-auto flex flex-col sm:flex-row items-center gap-2 p-1.5 sm:p-2 bg-[#FAF4ED]/95 backdrop-blur-sm border-2 border-[#DFCBB7] focus-within:border-[#6B4B32] focus-within:ring-4 focus-within:ring-[#6B4B32]/10 rounded-3xl sm:rounded-full shadow-sm transition-all duration-300">
                                @csrf
                                <div class="flex items-center space-x-3 pl-4 pr-2 w-full sm:w-auto flex-grow py-1.5">
                                    <span class="text-base text-[#8F6644] flex-shrink-0">💌</span>
                                    <input type="email" 
                                           name="email" 
                                           id="newsletter-email-input"
                                           required 
                                           placeholder="Enter your email for 10% off..." 
                                           class="bg-transparent text-xs sm:text-sm outline-none text-[#4A2F17] placeholder-[#A4886E] w-full font-medium">
                                </div>
                                <button type="submit" 
                                        id="newsletter-submit-btn"
                                        class="btn-luxury w-full sm:w-auto px-7 py-3.5 rounded-full text-xs font-semibold tracking-wide flex-shrink-0 shadow-md hover:shadow-lg transform transition-all duration-300 hover:scale-[1.03] active:scale-95 flex items-center justify-center space-x-2">
                                    <span id="newsletter-btn-text">Claim 10% Off</span>
                                    <span id="newsletter-btn-arrow">→</span>
                                </button>
                            </form>
                            
                            <!-- Success State Banner (Hidden by Default) -->
                            <div id="newsletter-success-box" class="hidden max-w-xl mx-auto p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-xs font-medium text-center shadow-xs">
                                <div class="flex items-center justify-center space-x-2 mb-1 text-sm font-semibold text-emerald-800">
                                    <span>✨</span>
                                    <span>Alhamdulillah! You're on the VIP Guest List</span>
                                </div>
                                <p class="text-[11px] text-emerald-700">Use promo code <strong class="tracking-wider bg-white px-2 py-0.5 rounded border border-emerald-300 text-emerald-900 font-bold">CRAFTY10</strong> at checkout for 10% off your order! ♡</p>
                            </div>
                        </div>

                        <!-- Social Proof Avatars Strip -->
                        <div class="mt-6 pt-5 border-t border-[#E8DACB]/70 flex flex-col sm:flex-row items-center justify-center gap-3 text-xs text-[#7A5638]">
                            <div class="flex items-center -space-x-2">
                                <div class="w-7 h-7 rounded-full bg-gradient-to-br from-[#8C6240] to-[#593920] text-white text-[10px] font-bold flex items-center justify-center border-2 border-[#FAF4ED] shadow-2xs">AK</div>
                                <div class="w-7 h-7 rounded-full bg-gradient-to-br from-[#B38E6A] to-[#8C6240] text-white text-[10px] font-bold flex items-center justify-center border-2 border-[#FAF4ED] shadow-2xs">FZ</div>
                                <div class="w-7 h-7 rounded-full bg-gradient-to-br from-[#593920] to-[#3D2513] text-white text-[10px] font-bold flex items-center justify-center border-2 border-[#FAF4ED] shadow-2xs">SA</div>
                                <div class="w-7 h-7 rounded-full bg-gradient-to-br from-[#C89B55] to-[#8C6240] text-white text-[10px] font-bold flex items-center justify-center border-2 border-[#FAF4ED] shadow-2xs">MB</div>
                            </div>
                            <span class="text-[11px] font-medium">
                                Loved by <strong class="text-[#52351E] font-bold">4,800+</strong> handmade craft lovers across Pakistan ♡
                            </span>
                        </div>

                        <!-- Perks Micro-Badges -->
                        <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-4 mt-4 text-[11px] text-[#8A6749]">
                            <span class="inline-flex items-center space-x-1.5 bg-[#FAF4ED]/80 px-3 py-1 rounded-full border border-[#E8DACB]">
                                <span class="text-emerald-700 font-bold">✓</span>
                                <span>Instant 10% Discount</span>
                            </span>
                            <span class="inline-flex items-center space-x-1.5 bg-[#FAF4ED]/80 px-3 py-1 rounded-full border border-[#E8DACB]">
                                <span class="text-emerald-700 font-bold">✓</span>
                                <span>Early Access to Drops</span>
                            </span>
                            <span class="inline-flex items-center space-x-1.5 bg-[#FAF4ED]/80 px-3 py-1 rounded-full border border-[#E8DACB]">
                                <span class="text-emerald-700 font-bold">✓</span>
                                <span>Zero Spam, Unsubscribe Anytime</span>
                            </span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Multi-Column Rich Boutique Footer Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-10">
                
                <!-- Col 1: Brand Story & Artisan Studio (4 cols) -->
                <div class="lg:col-span-4 space-y-4">
                    <a href="{{ route('home') }}" class="inline-flex items-center space-x-2.5 group">
                        <svg class="w-8 h-8 text-[#7D5838] transition-transform group-hover:scale-105" viewBox="0 0 100 100" fill="none" stroke="currentColor">
                            <path d="M50 48 C42 36 24 24 16 34 C8 44 20 60 40 53 C46 51 49 48 50 48 Z" stroke-width="4.5" stroke-linecap="round"/>
                            <path d="M50 48 C58 36 76 24 84 34 C92 44 80 60 60 53 C54 51 51 48 50 48 Z" stroke-width="4.5" stroke-linecap="round"/>
                            <circle cx="50" cy="48" r="5" fill="#7D5838"/>
                            <path d="M47 53 C43 68 33 82 22 90 M53 53 C57 68 67 82 78 90" stroke-width="4" stroke-linecap="round"/>
                        </svg>
                        <span class="font-serif-lux text-3xl font-medium tracking-wide text-[#5C3D24] italic">Islamic Crafts</span>
                    </a>

                    <p class="font-serif-lux italic text-sm text-[#785539] leading-snug">
                        Handmade with love, crafted with elegance.
                    </p>

                    <p class="text-xs text-[#7A5B3E] leading-relaxed max-w-sm">
                        Creating heartfelt resin keepsakes, bridal nikkah platters, everlasting floral bouquets, and handmade crochet accessories for your life's most precious celebrations.
                    </p>

                    <!-- Direct Studio WhatsApp Pill -->
                    <div class="pt-1">
                        <a href="https://wa.me/923001234567" target="_blank" class="inline-flex items-center space-x-2 px-4 py-2 rounded-full text-xs font-semibold bg-[#FAF4ED] text-[#25D366] hover:bg-[#25D366] hover:text-white border border-[#DECDBD] transition-all duration-300 shadow-2xs group">
                            <span>💬</span>
                            <span class="text-[#4A2F17] group-hover:text-white font-medium">WhatsApp:</span>
                            <span class="font-bold">+92 300 1234567</span>
                        </a>
                    </div>
                </div>

                <!-- Col 2: Handcrafted Collections (3 cols) -->
                <div class="lg:col-span-3 space-y-3.5">
                    <h4 class="font-serif-lux text-lg text-[#4A2F17] font-semibold border-b border-[#E8DACB] pb-2 flex items-center space-x-1.5">
                        <span>Our Collections</span>
                        <span class="text-xs text-[#8F6644]">✦</span>
                    </h4>
                    <ul class="space-y-2 text-xs text-[#7A5638]">
                        <li>
                            <a href="{{ route('category.show', 'resin-collection') }}" class="hover:text-[#4A2F17] hover:translate-x-1 inline-flex items-center space-x-1.5 transition-all">
                                <span class="text-[#B38E6A]">›</span>
                                <span>Resin Jewellery & Trays</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('category.show', 'floral-collection') }}" class="hover:text-[#4A2F17] hover:translate-x-1 inline-flex items-center space-x-1.5 transition-all">
                                <span class="text-[#B38E6A]">›</span>
                                <span>Everlasting Floral Bouquets</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('category.show', 'crochet-collection') }}" class="hover:text-[#4A2F17] hover:translate-x-1 inline-flex items-center space-x-1.5 transition-all">
                                <span class="text-[#B38E6A]">›</span>
                                <span>Handmade Crochet Bags</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('products.index') }}" class="hover:text-[#4A2F17] hover:translate-x-1 inline-flex items-center space-x-1.5 transition-all">
                                <span class="text-[#B38E6A]">›</span>
                                <span>Custom Nikkah Platters</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('products.index') }}" class="hover:text-[#4A2F17] hover:translate-x-1 inline-flex items-center space-x-1.5 transition-all">
                                <span class="text-[#B38E6A]">›</span>
                                <span>Arabic Calligraphy Plaques</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Col 3: Customer Care & Info (3 cols) -->
                <div class="lg:col-span-3 space-y-3.5">
                    <h4 class="font-serif-lux text-lg text-[#4A2F17] font-semibold border-b border-[#E8DACB] pb-2 flex items-center space-x-1.5">
                        <span>Customer Care</span>
                        <span class="text-xs text-[#8F6644]">✦</span>
                    </h4>
                    <ul class="space-y-2 text-xs text-[#7A5638]">
                        <li>
                            <a href="{{ route('custom-orders') }}" class="hover:text-[#4A2F17] hover:translate-x-1 inline-flex items-center space-x-1.5 transition-all">
                                <span class="text-[#B38E6A]">›</span>
                                <span>Custom Order Request</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="hover:text-[#4A2F17] hover:translate-x-1 inline-flex items-center space-x-1.5 transition-all">
                                <span class="text-[#B38E6A]">›</span>
                                <span>About Our Artisans</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="hover:text-[#4A2F17] hover:translate-x-1 inline-flex items-center space-x-1.5 transition-all">
                                <span class="text-[#B38E6A]">›</span>
                                <span>Contact & Inquiries</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="hover:text-[#4A2F17] hover:translate-x-1 inline-flex items-center space-x-1.5 transition-all">
                                <span class="text-[#B38E6A]">›</span>
                                <span>Shipping & Breakage Guarantee</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="hover:text-[#4A2F17] hover:translate-x-1 inline-flex items-center space-x-1.5 transition-all">
                                <span class="text-[#B38E6A]">›</span>
                                <span>Frequently Asked Questions</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Col 4: Trust & Social Links (2 cols) -->
                <div class="lg:col-span-2 space-y-3.5">
                    <h4 class="font-serif-lux text-lg text-[#4A2F17] font-semibold border-b border-[#E8DACB] pb-2 flex items-center space-x-1.5">
                        <span>Follow Us</span>
                        <span class="text-xs text-[#8F6644]">♡</span>
                    </h4>

                    <!-- Social Icons with Luxury Badges -->
                    <div class="flex items-center space-x-2.5 pt-1">
                        <!-- Instagram -->
                        <a href="https://instagram.com" target="_blank" class="w-9 h-9 rounded-full bg-[#FAF4ED] text-[#6B4B32] border border-[#DECDBD] hover:bg-[#6B4B32] hover:text-white flex items-center justify-center transition-all duration-300 shadow-2xs hover:scale-110" title="Instagram">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <!-- TikTok -->
                        <a href="https://tiktok.com" target="_blank" class="w-9 h-9 rounded-full bg-[#FAF4ED] text-[#6B4B32] border border-[#DECDBD] hover:bg-[#6B4B32] hover:text-white flex items-center justify-center transition-all duration-300 shadow-2xs hover:scale-110" title="TikTok">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.24 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                        </a>
                        <!-- WhatsApp -->
                        <a href="https://wa.me/923001234567" target="_blank" class="w-9 h-9 rounded-full bg-[#FAF4ED] text-[#25D366] border border-[#DECDBD] hover:bg-[#25D366] hover:text-white flex items-center justify-center transition-all duration-300 shadow-2xs hover:scale-110" title="WhatsApp Chat">
                            <span class="text-base">💬</span>
                        </a>
                    </div>

                    <!-- Payment Assurance Pills -->
                    <div class="pt-2 text-[11px] text-[#8A6749] space-y-1">
                        <span class="font-semibold text-[#52351E] block">Accepted Payments:</span>
                        <div class="flex flex-wrap gap-1 text-[10px]">
                            <span class="bg-[#FAF4ED] border border-[#DFCBB7] px-2 py-0.5 rounded">💵 COD</span>
                            <span class="bg-[#FAF4ED] border border-[#DFCBB7] px-2 py-0.5 rounded">🏦 Raast</span>
                            <span class="bg-[#FAF4ED] border border-[#DFCBB7] px-2 py-0.5 rounded">📱 JazzCash</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer Bottom Bar (Logo, Follow Us, Links, Heart Flourish - Matching Screenshot) -->
        <div class="border-t border-[#EADBCC] bg-[#F5ECE1]/60">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col md:flex-row items-center justify-between gap-4">
                
                <!-- Logo & Copyright -->
                <div class="flex items-center space-x-2.5">
                    <svg class="w-6 h-6 text-[#7D5838]" viewBox="0 0 100 100" fill="none" stroke="currentColor">
                        <path d="M50 48 C42 36 24 24 16 34 C8 44 20 60 40 53 C46 51 49 48 50 48 Z" stroke-width="4.5" stroke-linecap="round"/>
                        <path d="M50 48 C58 36 76 24 84 34 C92 44 80 60 60 53 C54 51 51 48 50 48 Z" stroke-width="4.5" stroke-linecap="round"/>
                        <circle cx="50" cy="48" r="5" fill="#7D5838"/>
                        <path d="M47 53 C43 68 33 82 22 90 M53 53 C57 68 67 82 78 90" stroke-width="4" stroke-linecap="round"/>
                    </svg>
                    <span class="font-serif-lux text-xl font-medium tracking-wide text-[#5C3D24] italic">Islamic Crafts</span>
                    <span class="text-xs text-[#8A6749]">© {{ date('Y') }} All Rights Reserved</span>
                </div>

                <!-- Bottom Links -->
                <div class="flex items-center space-x-5 text-xs text-[#7A5B3E]">
                    <a href="{{ route('about') }}" class="hover:text-[#4A2F17] transition-colors">About Us</a>
                    <span class="text-[#D4C1AB]">|</span>
                    <a href="{{ route('contact') }}" class="hover:text-[#4A2F17] transition-colors">Contact Us</a>
                    <span class="text-[#D4C1AB]">|</span>
                    <a href="{{ route('about') }}" class="hover:text-[#4A2F17] transition-colors">FAQ's</a>
                    <span class="text-[#D4C1AB]">|</span>
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-[#6B4B32] transition-colors font-medium">Admin Portal</a>
                </div>

                <!-- Ribbon Heart Flourish Ornament (Right Side) -->
                <div class="text-[#967353] hidden sm:block">
                    <svg class="w-12 h-6" viewBox="0 0 100 50" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 25 Q 35 25 45 15 C 48 10 52 10 55 15 C 65 25 95 25 95 25" stroke-linecap="round"/>
                        <path d="M45 15 C 40 8 45 2 50 7 C 55 2 60 8 55 15 Z" fill="#967353" stroke="none"/>
                    </svg>
                </div>

            </div>
        </div>

    </footer>

    <!-- Luxury Floating Cart Toast Notification -->
    <div id="cart-toast" class="fixed bottom-6 right-6 z-50 max-w-sm sm:max-w-md w-[calc(100%-3rem)] sm:w-full bg-[#FAF4ED] border border-[#D9C4AF] rounded-2xl shadow-[0_15px_35px_-5px_rgba(79,53,32,0.22)] p-4 sm:p-5 transition-all duration-300 transform translate-y-16 opacity-0 pointer-events-none" role="alert">
        <!-- Close button -->
        <button id="toast-close-btn" type="button" class="absolute top-3.5 right-3.5 text-[#8F6644] hover:text-[#4A2F17] p-1 rounded-full hover:bg-[#F3E7D9] transition-colors" title="Close">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        <!-- Header badge -->
        <div class="flex items-center space-x-2 mb-3">
            <span class="flex items-center justify-center w-5 h-5 rounded-full bg-emerald-100 text-emerald-800 text-[11px] font-bold">✓</span>
            <span class="font-serif-lux text-base sm:text-lg text-[#4A2F17] font-semibold flex items-center space-x-1">
                <span>Added to Your Bag</span>
                <span class="text-sm text-[#8F6644]">♡</span>
            </span>
        </div>

        <!-- Product preview -->
        <div class="flex items-center space-x-3.5 bg-[#F5ECE1] p-3 rounded-xl border border-[#EADBCC] mb-3.5">
            <div class="w-14 h-14 rounded-lg bg-[#FAF4ED] border border-[#DECDBD] overflow-hidden flex-shrink-0 flex items-center justify-center">
                <img id="toast-prod-img" src="" alt="" class="w-full h-full object-cover">
                <span id="toast-prod-fallback-icon" class="text-2xl hidden">✨</span>
            </div>
            <div class="flex-grow min-w-0">
                <h4 id="toast-prod-name" class="font-serif-lux text-sm sm:text-base font-semibold text-[#4A2F17] truncate"></h4>
                <div class="flex items-center space-x-2 text-xs text-[#7A5638] mt-0.5">
                    <span id="toast-prod-price" class="font-medium text-[#4A2F17]"></span>
                    <span class="text-[#C5B09B]">•</span>
                    <span id="toast-prod-category" class="italic text-[11px] text-[#9A7453]"></span>
                </div>
            </div>
        </div>

        <!-- Quick action buttons -->
        <div class="grid grid-cols-2 gap-2.5">
            <a href="{{ route('cart.index') }}" class="py-2.5 px-3 rounded-xl text-center text-xs font-semibold text-[#5C3D24] bg-[#FAF4ED] hover:bg-[#EDE0D1] border border-[#DFCBB7] transition-all flex items-center justify-center space-x-1.5 shadow-2xs">
                <span>View Bag</span>
                <span id="toast-bag-count" class="text-[10px] bg-[#6B4B32] text-white px-1.5 py-0.2 rounded-full font-bold ml-0.5"></span>
            </a>
            <a href="{{ route('checkout') }}" class="btn-luxury py-2.5 px-3 rounded-xl text-center text-xs font-semibold tracking-wide transition-all flex items-center justify-center space-x-1.5 shadow-sm">
                <span>Checkout</span>
                <span>→</span>
            </a>
        </div>

        <!-- Progress countdown bar -->
        <div class="absolute bottom-0 left-4 right-4 h-0.5 bg-[#DECDBD] rounded-full overflow-hidden">
            <div id="toast-progress-bar" class="h-full bg-[#6B4B32] w-full transition-all"></div>
        </div>
    </div>

    <!-- General Luxury Notification Toast (For Reviews, Subscriptions, Alerts) -->
    <div id="general-toast" class="fixed bottom-6 right-6 z-50 max-w-sm sm:max-w-md w-[calc(100%-3rem)] sm:w-full bg-gradient-to-br from-[#FAF4ED] to-[#F7EDE2] border-2 border-[#D9C4AF] rounded-2xl shadow-[0_15px_35px_-5px_rgba(79,53,32,0.25)] p-4 sm:p-5 transition-all duration-300 transform translate-y-16 opacity-0 pointer-events-none" role="alert">
        <button id="general-toast-close" type="button" class="absolute top-3.5 right-3.5 text-[#8F6644] hover:text-[#4A2F17] p-1 rounded-full hover:bg-[#F3E7D9] transition-colors" title="Close">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <div class="flex items-center space-x-2.5 mb-1.5">
            <span id="general-toast-icon" class="text-xl">✨</span>
            <span id="general-toast-title" class="text-xs font-bold uppercase tracking-wider text-[#7A5638]">Notification</span>
        </div>
        <p id="general-toast-msg" class="font-serif-lux text-sm sm:text-base text-[#4A2F17] font-medium leading-relaxed"></p>
        <div class="absolute bottom-0 left-4 right-4 h-0.5 bg-[#DECDBD] rounded-full overflow-hidden">
            <div id="general-toast-progress" class="h-full bg-[#6B4B32] w-full transition-all"></div>
        </div>
    </div>

    <script>
        // Mobile navigation toggle
        const toggleBtn = document.getElementById('mobile-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        if (toggleBtn && mobileMenu) {
            toggleBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Global Luxury Toast Notification & Ajax Cart Engine
        (function () {
            const toast = document.getElementById('cart-toast');
            const toastCloseBtn = document.getElementById('toast-close-btn');
            const toastImg = document.getElementById('toast-prod-img');
            const toastFallback = document.getElementById('toast-prod-fallback-icon');
            const toastName = document.getElementById('toast-prod-name');
            const toastPrice = document.getElementById('toast-prod-price');
            const toastCategory = document.getElementById('toast-prod-category');
            const toastBagCount = document.getElementById('toast-bag-count');
            const toastProgressBar = document.getElementById('toast-progress-bar');
            const cartBadge = document.getElementById('nav-cart-count');

            let toastTimer = null;
            let progressInterval = null;
            const TOAST_DURATION = 4500;

            window.showLuxuryToast = function (data) {
                if (!toast) return;

                // Set Product info
                const prod = data.product || {};
                toastName.textContent = prod.name || 'Handcrafted Item';
                toastPrice.textContent = prod.formatted_price || ('Rs. ' + (prod.price || ''));
                toastCategory.textContent = prod.category || 'Handmade with Love';
                
                if (prod.image) {
                    toastImg.src = prod.image;
                    toastImg.classList.remove('hidden');
                    toastFallback.classList.add('hidden');
                } else {
                    toastImg.classList.add('hidden');
                    toastFallback.classList.remove('hidden');
                }

                if (toastBagCount) {
                    toastBagCount.textContent = data.count || '';
                }

                // Update navbar badge with pulse animation
                if (cartBadge && typeof data.count !== 'undefined') {
                    cartBadge.textContent = data.count;
                    cartBadge.classList.add('scale-125', 'bg-[#8F6644]');
                    setTimeout(() => {
                        cartBadge.classList.remove('scale-125', 'bg-[#8F6644]');
                    }, 400);
                }

                // Show Toast
                toast.classList.remove('translate-y-16', 'opacity-0', 'pointer-events-none');
                toast.classList.add('translate-y-0', 'opacity-100', 'pointer-events-auto');

                // Animate progress bar
                clearInterval(progressInterval);
                clearTimeout(toastTimer);
                
                toastProgressBar.style.transition = 'none';
                toastProgressBar.style.width = '100%';
                
                setTimeout(() => {
                    toastProgressBar.style.transition = `width ${TOAST_DURATION}ms linear`;
                    toastProgressBar.style.width = '0%';
                }, 50);

                toastTimer = setTimeout(hideLuxuryToast, TOAST_DURATION);
            };

            function hideLuxuryToast() {
                if (!toast) return;
                toast.classList.remove('translate-y-0', 'opacity-100', 'pointer-events-auto');
                toast.classList.add('translate-y-16', 'opacity-0', 'pointer-events-none');
                clearTimeout(toastTimer);
                clearInterval(progressInterval);
            }

            if (toastCloseBtn) {
                toastCloseBtn.addEventListener('click', hideLuxuryToast);
            }

            if (toast) {
                toast.addEventListener('mouseenter', () => {
                    clearTimeout(toastTimer);
                    toastProgressBar.style.transition = 'none';
                });
                toast.addEventListener('mouseleave', () => {
                    toastTimer = setTimeout(hideLuxuryToast, 2000);
                });
            }

            // General Toast Controller
            const genToast = document.getElementById('general-toast');
            const genClose = document.getElementById('general-toast-close');
            const genTitle = document.getElementById('general-toast-title');
            const genMsg = document.getElementById('general-toast-msg');
            const genIcon = document.getElementById('general-toast-icon');
            const genProgress = document.getElementById('general-toast-progress');
            let genTimer = null;

            window.showNoticeToast = function (title, message, icon = '✨') {
                if (!genToast) return;
                genTitle.textContent = title || 'Notification';
                genMsg.textContent = message || '';
                genIcon.textContent = icon;

                genToast.classList.remove('translate-y-16', 'opacity-0', 'pointer-events-none');
                genToast.classList.add('translate-y-0', 'opacity-100', 'pointer-events-auto');

                clearTimeout(genTimer);
                genProgress.style.transition = 'none';
                genProgress.style.width = '100%';

                setTimeout(() => {
                    genProgress.style.transition = 'width 4500ms linear';
                    genProgress.style.width = '0%';
                }, 50);

                genTimer = setTimeout(hideGenToast, 4500);
            };

            function hideGenToast() {
                if (!genToast) return;
                genToast.classList.remove('translate-y-0', 'opacity-100', 'pointer-events-auto');
                genToast.classList.add('translate-y-16', 'opacity-0', 'pointer-events-none');
                clearTimeout(genTimer);
            }

            if (genClose) genClose.addEventListener('click', hideGenToast);

            // Universal Ajax Cart Interceptor for All Forms on the Page
            document.addEventListener('submit', function (e) {
                const form = e.target;
                if (!form || !form.action) return;

                // Target any Add to Cart form
                if (form.action.includes('cart/add') || form.classList.contains('ajax-add-cart')) {
                    e.preventDefault();

                    const submitBtn = form.querySelector('button[type="submit"]');
                    const origBtnText = submitBtn ? submitBtn.innerHTML : null;

                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = `
                            <span class="inline-flex items-center space-x-1.5">
                                <svg class="animate-spin h-3.5 w-3.5 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                </svg>
                                <span>Adding...</span>
                            </span>
                        `;
                    }

                    const formData = new FormData(form);

                    fetch(form.action, {
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
                            submitBtn.innerHTML = `<span>✓ Added!</span>`;
                            setTimeout(() => {
                                submitBtn.innerHTML = origBtnText;
                            }, 1800);
                        }

                        if (data.success) {
                            window.showLuxuryToast(data);
                        } else {
                            alert(data.message || 'Could not add to cart.');
                        }
                    })
                    .catch(err => {
                        console.error('Add to cart error:', err);
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = origBtnText;
                        }
                        // Fallback submit if network or json failed
                        form.submit();
                    });
                }
            });

            // Newsletter Ajax Subscription Handler
            const newsletterForm = document.getElementById('newsletter-form');
            const newsletterBtn = document.getElementById('newsletter-submit-btn');
            const newsletterBtnText = document.getElementById('newsletter-btn-text');
            const newsletterSuccess = document.getElementById('newsletter-success-box');

            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function (e) {
                    e.preventDefault();

                    if (newsletterBtn) {
                        newsletterBtn.disabled = true;
                        if (newsletterBtnText) newsletterBtnText.textContent = 'Unlocking 10% Off...';
                    }

                    const formData = new FormData(newsletterForm);

                    fetch(newsletterForm.action, {
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
                        if (newsletterBtn) {
                            newsletterBtn.disabled = false;
                            if (newsletterBtnText) newsletterBtnText.textContent = 'Claim 10% Off';
                        }

                        if (data.success) {
                            if (typeof window.showNoticeToast === 'function') {
                                window.showNoticeToast('Welcome to the Family ♡', data.message, '💌');
                            }
                            newsletterForm.classList.add('hidden');
                            if (newsletterSuccess) {
                                newsletterSuccess.classList.remove('hidden');
                            }
                        } else {
                            alert(data.message || 'Subscription failed. Please check your email.');
                        }
                    })
                    .catch(err => {
                        console.error('Newsletter error:', err);
                        if (newsletterBtn) newsletterBtn.disabled = false;
                        newsletterForm.submit();
                    });
                });
            }
        })();
    </script>

    @stack('scripts')
</body>
</html>
