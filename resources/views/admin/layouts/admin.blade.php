<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Portal') — Islamic Crafts</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream: '#FDFBF7',
                        'cream-card': '#FAF4ED',
                        beige: '#F5ECE1',
                        'tan-border': '#E4D3C0',
                        'brown-espresso': '#352110',
                        'brown-sidebar': '#422A16',
                        'brown-active': '#5B3B20',
                        'brown-primary': '#52351E',
                        'brown-btn': '#6B4B32',
                        'brown-hover': '#553922',
                        'gold-accent': '#C5A059',
                    },
                    fontFamily: {
                        serif: ['"Cormorant Garamond"', 'serif'],
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #F7F1E8; 
            color: #432C19; 
            overflow-x: hidden;
        }
        .font-serif-lux { font-family: 'Cormorant Garamond', serif; }
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
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #FAF4ED; }
        ::-webkit-scrollbar-thumb { background: #DAC7B2; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #B38E6A; }
    </style>
    @stack('styles')
</head>
<body class="min-h-screen flex">

    <!-- Luxury Dark Espresso Sidebar -->
    <aside class="w-64 bg-gradient-to-b from-[#382312] via-[#432A17] to-[#331E0E] text-[#FAF4ED] flex flex-col flex-shrink-0 min-h-screen border-r border-[#2C190B] shadow-lg sticky top-0 h-screen z-40">
        
        <!-- Brand Header with Bow Ornament -->
        <div class="h-20 px-6 flex items-center space-x-3 border-b border-[#54361C]/80 bg-[#321E0E]/40">
            <div class="w-10 h-10 rounded-2xl bg-[#5A3B22] border border-[#835A36] flex items-center justify-center text-[#EAC9A4] shadow-sm flex-shrink-0">
                <svg class="w-6 h-6" viewBox="0 0 100 100" fill="none" stroke="currentColor">
                    <path d="M50 48 C42 36 24 24 16 34 C8 44 20 60 40 53 C46 51 49 48 50 48 Z" stroke-width="4.5" stroke-linecap="round"/>
                    <path d="M50 48 C58 36 76 24 84 34 C92 44 80 60 60 53 C54 51 51 48 50 48 Z" stroke-width="4.5" stroke-linecap="round"/>
                    <circle cx="50" cy="48" r="5" fill="#EAC9A4"/>
                    <path d="M47 53 C43 68 33 82 22 90 M53 53 C57 68 67 82 78 90" stroke-width="4" stroke-linecap="round"/>
                </svg>
            </div>
            <div class="overflow-hidden">
                <span class="font-serif-lux text-xl font-medium italic text-[#FAF4ED] block leading-tight tracking-wide truncate">Islamic Crafts</span>
                <span class="text-[9px] tracking-widest uppercase text-[#D2BBA0] font-semibold flex items-center space-x-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse inline-block"></span>
                    <span>Admin Portal</span>
                </span>
            </div>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-grow py-5 px-3.5 space-y-1.5 text-xs font-medium overflow-y-auto">
            
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-[#6B4B32] to-[#865F40] text-white shadow-md font-semibold' : 'text-[#DECDBD] hover:bg-[#52351D] hover:text-white' }}">
                <div class="flex items-center space-x-3">
                    <span class="text-sm">📊</span>
                    <span>Dashboard</span>
                </div>
                @if(request()->routeIs('admin.dashboard'))
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-300"></span>
                @endif
            </a>

            <a href="{{ route('admin.products.index') }}" 
               class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.products.*') ? 'bg-gradient-to-r from-[#6B4B32] to-[#865F40] text-white shadow-md font-semibold' : 'text-[#DECDBD] hover:bg-[#52351D] hover:text-white' }}">
                <div class="flex items-center space-x-3">
                    <span class="text-sm">📦</span>
                    <span>Products Catalog</span>
                </div>
                <span class="text-[10px] bg-[#352010] text-[#D9C4AF] px-2 py-0.5 rounded-full font-mono">
                    {{ \App\Models\Product::count() }}
                </span>
            </a>

            <a href="{{ route('admin.categories.index') }}" 
               class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.categories.*') ? 'bg-gradient-to-r from-[#6B4B32] to-[#865F40] text-white shadow-md font-semibold' : 'text-[#DECDBD] hover:bg-[#52351D] hover:text-white' }}">
                <div class="flex items-center space-x-3">
                    <span class="text-sm">🏷️</span>
                    <span>Categories</span>
                </div>
                <span class="text-[10px] bg-[#352010] text-[#D9C4AF] px-2 py-0.5 rounded-full font-mono">
                    {{ \App\Models\Category::count() }}
                </span>
            </a>

            <a href="{{ route('admin.orders.index') }}" 
               class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.orders.*') ? 'bg-gradient-to-r from-[#6B4B32] to-[#865F40] text-white shadow-md font-semibold' : 'text-[#DECDBD] hover:bg-[#52351D] hover:text-white' }}">
                <div class="flex items-center space-x-3">
                    <span class="text-sm">🛍️</span>
                    <span>Orders</span>
                </div>
                @php $pendingOrders = \App\Models\Order::where('status', 'pending')->count(); @endphp
                @if($pendingOrders > 0)
                    <span class="text-[10px] bg-amber-500 text-white px-2 py-0.2 rounded-full font-bold animate-pulse">
                        {{ $pendingOrders }} new
                    </span>
                @else
                    <span class="text-[10px] bg-[#352010] text-[#D9C4AF] px-2 py-0.5 rounded-full font-mono">
                        {{ \App\Models\Order::count() }}
                    </span>
                @endif
            </a>

            <a href="{{ route('admin.custom-orders.index') }}" 
               class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.custom-orders.*') ? 'bg-gradient-to-r from-[#6B4B32] to-[#865F40] text-white shadow-md font-semibold' : 'text-[#DECDBD] hover:bg-[#52351D] hover:text-white' }}">
                <div class="flex items-center space-x-3">
                    <span class="text-sm">🎁</span>
                    <span>Custom Inquiries</span>
                </div>
                @php $pendingCustom = \App\Models\CustomOrderRequest::where('status', 'pending')->count(); @endphp
                @if($pendingCustom > 0)
                    <span class="text-[10px] bg-rose-500 text-white px-2 py-0.2 rounded-full font-bold">
                        {{ $pendingCustom }}
                    </span>
                @endif
            </a>

            <a href="{{ route('admin.reviews.index') }}" 
               class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.reviews.*') ? 'bg-gradient-to-r from-[#6B4B32] to-[#865F40] text-white shadow-md font-semibold' : 'text-[#DECDBD] hover:bg-[#52351D] hover:text-white' }}">
                <div class="flex items-center space-x-3">
                    <span class="text-sm">⭐</span>
                    <span>Reviews</span>
                </div>
                <span class="text-[10px] bg-[#352010] text-[#D9C4AF] px-2 py-0.5 rounded-full font-mono">
                    {{ \App\Models\Review::count() }}
                </span>
            </a>

            <a href="{{ route('admin.subscribers.index') }}" 
               class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.subscribers.*') ? 'bg-gradient-to-r from-[#6B4B32] to-[#865F40] text-white shadow-md font-semibold' : 'text-[#DECDBD] hover:bg-[#52351D] hover:text-white' }}">
                <div class="flex items-center space-x-3">
                    <span class="text-sm">📧</span>
                    <span>Subscribers</span>
                </div>
                <span class="text-[10px] bg-[#352010] text-[#D9C4AF] px-2 py-0.5 rounded-full font-mono">
                    {{ \App\Models\Subscriber::count() }}
                </span>
            </a>

            <!-- Homepage Studio CMS Links -->
            <div class="pt-3 mt-2 border-t border-[#54361C]/50">
                <p class="px-3.5 pb-1.5 text-[10px] font-semibold uppercase tracking-[0.18em] text-[#B8987A]">Homepage Studio</p>

                <a href="{{ route('admin.occasions.index') }}" 
                   class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition-all duration-200 {{ request()->routeIs('admin.occasions.*') ? 'bg-gradient-to-r from-[#6B4B32] to-[#865F40] text-white shadow-md font-semibold' : 'text-[#DECDBD] hover:bg-[#52351D] hover:text-white' }}">
                    <div class="flex items-center space-x-3">
                        <span class="text-sm">💍</span>
                        <span>Shop by Occasion</span>
                    </div>
                    <span class="text-[10px] bg-[#352010] text-[#D9C4AF] px-2 py-0.5 rounded-full font-mono">
                        {{ \App\Models\Occasion::count() }}
                    </span>
                </a>

                <a href="{{ route('admin.lookbook.index') }}" 
                   class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition-all duration-200 mt-1 {{ request()->routeIs('admin.lookbook.*') ? 'bg-gradient-to-r from-[#6B4B32] to-[#865F40] text-white shadow-md font-semibold' : 'text-[#DECDBD] hover:bg-[#52351D] hover:text-white' }}">
                    <div class="flex items-center space-x-3">
                        <span class="text-sm">📸</span>
                        <span>Studio Lookbook</span>
                    </div>
                    <span class="text-[10px] bg-[#352010] text-[#D9C4AF] px-2 py-0.5 rounded-full font-mono">
                        {{ \App\Models\LookbookItem::count() }}
                    </span>
                </a>

                <a href="{{ route('admin.coupons.index') }}" 
                   class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition-all duration-200 mt-1 {{ request()->routeIs('admin.coupons.*') ? 'bg-gradient-to-r from-[#6B4B32] to-[#865F40] text-white shadow-md font-semibold' : 'text-[#DECDBD] hover:bg-[#52351D] hover:text-white' }}">
                    <div class="flex items-center space-x-3">
                        <span class="text-sm">🏷️</span>
                        <span>Promo Codes</span>
                    </div>
                    <span class="text-[10px] bg-[#352010] text-[#D9C4AF] px-2 py-0.5 rounded-full font-mono">
                        {{ \App\Models\Coupon::count() }}
                    </span>
                </a>

                <a href="{{ route('admin.settings.index') }}" 
                   class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition-all duration-200 mt-1 {{ request()->routeIs('admin.settings.*') ? 'bg-gradient-to-r from-[#6B4B32] to-[#865F40] text-white shadow-md font-semibold' : 'text-[#DECDBD] hover:bg-[#52351D] hover:text-white' }}">
                    <div class="flex items-center space-x-3">
                        <span class="text-sm">⚙️</span>
                        <span>Store Settings</span>
                    </div>
                </a>
            </div>

            <!-- Storefront Live Preview Shortcut -->
            <div class="pt-4 mt-4 border-t border-[#54361C]/60">
                <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-between px-3.5 py-2 rounded-xl text-[#D9C4AF] bg-[#321E0E]/40 hover:bg-[#52351D] hover:text-white transition-all text-xs border border-[#52351D]/60 shadow-inner">
                    <div class="flex items-center space-x-2.5">
                        <span>🌐</span>
                        <span>View Storefront</span>
                    </div>
                    <span class="text-xs">↗</span>
                </a>
            </div>

        </nav>

        <!-- Admin User Profile & Logout -->
        <div class="p-4 border-t border-[#54361C] bg-[#2E1B0C]">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2.5 overflow-hidden">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-[#805838] to-[#593920] border border-[#A67851] text-[#FAF4ED] font-bold flex items-center justify-center text-xs flex-shrink-0 shadow-sm">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="truncate">
                        <p class="text-xs font-semibold text-[#FAF4ED] truncate leading-tight">{{ auth()->user()->name ?? 'Admin User' }}</p>
                        <p class="text-[10px] text-[#C2A78F] truncate">{{ auth()->user()->email ?? 'admin@islamiccrafts.com' }}</p>
                    </div>
                </div>
                
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="p-2 text-[#C2A78F] hover:text-rose-400 hover:bg-[#3D2512] rounded-xl transition-all" title="Logout from Admin">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

    </aside>

    <!-- Main Content Canvas -->
    <div class="flex-grow flex flex-col min-w-0 bg-[#F7F1E8]">
        
        <!-- Sticky Luxury Top Bar -->
        <header class="h-20 bg-[#FAF4ED]/90 backdrop-blur-md border-b border-[#E8DACB] px-8 flex items-center justify-between sticky top-0 z-30 shadow-2xs">
            <div>
                <div class="flex items-center space-x-2">
                    <span class="text-xs text-[#B38E6A]">✦</span>
                    <h1 class="font-serif-lux text-2xl font-semibold text-[#4A2F17]">
                        @yield('header_title', 'Dashboard')
                    </h1>
                </div>
                <p class="text-[11px] text-[#8A6749]">Islamic Crafts Luxury Management Suite</p>
            </div>
            
            <div class="flex items-center space-x-3.5">
                <!-- Date Pill -->
                <span class="hidden sm:inline-flex items-center space-x-1.5 text-xs text-[#6B4B32] bg-[#F3E7D9] border border-[#E0D0BE] px-3.5 py-1.5 rounded-full font-medium shadow-2xs">
                    <span>📅</span>
                    <span>{{ now()->format('l, d M Y') }}</span>
                </span>

                <!-- Quick Add Product Action -->
                <a href="{{ route('admin.products.create') }}" class="btn-luxury px-4 py-2 rounded-xl text-xs font-semibold tracking-wide inline-flex items-center space-x-1.5 shadow-sm hover:shadow-md transition-all">
                    <span>+</span>
                    <span>Add New Product</span>
                </a>
            </div>
        </header>

        <!-- Flash Messages -->
        <div class="px-8 pt-6 pb-0">
            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-2xl text-xs sm:text-sm flex items-center space-x-2 shadow-2xs">
                    <span class="text-emerald-700 font-bold">✓</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            @if(session('error'))
                <div class="bg-rose-50 border border-rose-200 text-rose-800 px-4 py-3 rounded-2xl text-xs sm:text-sm flex items-center space-x-2 shadow-2xs">
                    <span class="text-rose-700 font-bold">⚠️</span>
                    <span>{{ session('error') }}</span>
                </div>
            @endif
        </div>

        <!-- Main Page Body -->
        <main class="p-8 flex-grow">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
