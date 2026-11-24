@extends('admin.layouts.admin')

@section('title', 'Admin Dashboard')
@section('header_title', 'Overview & Analytics')

@section('content')

<!-- 1. Dark Espresso Atelier Command Welcome Banner -->
<div class="relative rounded-[2rem] bg-gradient-to-br from-[#4A2E19] via-[#5B3A20] to-[#361F0E] text-[#FAF4ED] p-6 sm:p-8 mb-8 shadow-md overflow-hidden">
    <div class="pointer-events-none absolute -top-16 -right-16 w-64 h-64 rounded-full bg-[#C6A47E]/15 blur-3xl"></div>
    <div class="pointer-events-none absolute -bottom-16 left-1/3 w-56 h-56 rounded-full bg-[#C6A47E]/10 blur-3xl"></div>

    <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
        <div>
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-[#FAF4ED]/10 border border-[#DFCBB7]/25 text-[10px] font-semibold uppercase tracking-[0.2em] text-[#E6C9A8] mb-3">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>Atelier Command Center</span>
            </div>
            <h2 class="font-serif-lux italic text-3xl sm:text-4xl text-[#FDF8F1] font-normal leading-tight">
                Assalam-o-Alaikum, {{ explode(' ', auth()->user()->name ?? 'Admin')[0] }} ✦
            </h2>
            <p class="text-xs sm:text-sm text-[#DBC4AC] mt-1.5 max-w-xl">
                Here's your live studio pulse — track orders, curate homepage showcases, and delight every Islamic Crafts family.
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-2.5">
            <a href="{{ route('admin.products.create') }}" class="px-5 py-2.5 rounded-full bg-[#FAF4ED] hover:bg-white text-[#4A2D16] text-xs font-semibold shadow-sm transition-all inline-flex items-center space-x-1.5">
                <span>+ New Product</span>
            </a>
            <a href="{{ route('admin.occasions.index') }}" class="px-4 py-2.5 rounded-full bg-[#FAF4ED]/12 hover:bg-[#FAF4ED]/20 text-[#FAF4ED] border border-[#DFCBB7]/30 text-xs font-semibold transition-all">
                💍 Occasions
            </a>
            <a href="{{ route('admin.lookbook.index') }}" class="px-4 py-2.5 rounded-full bg-[#FAF4ED]/12 hover:bg-[#FAF4ED]/20 text-[#FAF4ED] border border-[#DFCBB7]/30 text-xs font-semibold transition-all">
                📸 Lookbook
            </a>
            <a href="{{ route('home') }}" target="_blank" class="px-4 py-2.5 rounded-full bg-[#C6A47E]/25 hover:bg-[#C6A47E]/35 text-[#FDF8F1] border border-[#C6A47E]/40 text-xs font-semibold transition-all inline-flex items-center space-x-1">
                <span>Live Store</span>
                <span>↗</span>
            </a>
        </div>
    </div>
</div>

<!-- 2. Elevated KPI Stat Cards Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

    <!-- Total Revenue -->
    <a href="{{ route('admin.orders.index') }}" class="group relative bg-gradient-to-br from-[#FAF4ED] to-[#F4E9DC] border border-[#DECDBD] hover:border-[#B8926A] rounded-3xl p-6 shadow-xs hover:shadow-md transition-all duration-300 hover:-translate-y-1 overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-emerald-500/70 to-amber-500/70"></div>
        <div class="flex items-center justify-between mb-3">
            <span class="text-[11px] font-semibold uppercase tracking-wider text-[#8A6749]">Total Revenue</span>
            <div class="w-10 h-10 rounded-2xl bg-emerald-50 border border-emerald-200 flex items-center justify-center text-lg group-hover:scale-110 transition-transform">
                💰
            </div>
        </div>
        <p class="font-serif-lux text-3xl sm:text-4xl font-bold text-[#4A301A] leading-tight">
            Rs. {{ number_format($stats['total_revenue'], 0) }}
        </p>
        <p class="text-[11px] text-emerald-800 mt-2.5 font-medium flex items-center justify-between">
            <span>Avg: Rs. {{ number_format($stats['avg_order_value'], 0) }} / order</span>
            <span class="opacity-0 group-hover:opacity-100 transition-opacity">→</span>
        </p>
    </a>

    <!-- Customer Orders -->
    <a href="{{ route('admin.orders.index') }}" class="group relative bg-gradient-to-br from-[#FAF4ED] to-[#F4E9DC] border border-[#DECDBD] hover:border-[#B8926A] rounded-3xl p-6 shadow-xs hover:shadow-md transition-all duration-300 hover:-translate-y-1 overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-amber-500/80 to-[#865F40]"></div>
        <div class="flex items-center justify-between mb-3">
            <span class="text-[11px] font-semibold uppercase tracking-wider text-[#8A6749]">Customer Orders</span>
            <div class="w-10 h-10 rounded-2xl bg-amber-50 border border-amber-200 flex items-center justify-center text-lg group-hover:scale-110 transition-transform">
                🛍️
            </div>
        </div>
        <p class="font-serif-lux text-3xl sm:text-4xl font-bold text-[#4A301A] leading-tight">
            {{ $stats['total_orders'] }}
        </p>
        <p class="text-[11px] text-amber-800 mt-2.5 font-medium flex items-center justify-between">
            <span>⏱️ {{ $stats['pending_orders'] }} pending dispatch</span>
            <span class="opacity-0 group-hover:opacity-100 transition-opacity">→</span>
        </p>
    </a>

    <!-- Handmade Catalog -->
    <a href="{{ route('admin.products.index') }}" class="group relative bg-gradient-to-br from-[#FAF4ED] to-[#F4E9DC] border border-[#DECDBD] hover:border-[#B8926A] rounded-3xl p-6 shadow-xs hover:shadow-md transition-all duration-300 hover:-translate-y-1 overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-[#6B4B32] to-[#C6A47E]"></div>
        <div class="flex items-center justify-between mb-3">
            <span class="text-[11px] font-semibold uppercase tracking-wider text-[#8A6749]">Handmade Catalog</span>
            <div class="w-10 h-10 rounded-2xl bg-[#EFE1D1] border border-[#DFCBB7] flex items-center justify-center text-lg group-hover:scale-110 transition-transform">
                📦
            </div>
        </div>
        <p class="font-serif-lux text-3xl sm:text-4xl font-bold text-[#4A301A] leading-tight">
            {{ $stats['total_products'] }}
        </p>
        <p class="text-[11px] text-[#7A5A3E] mt-2.5 font-medium flex items-center justify-between">
            <span>✨ {{ $stats['featured_products'] }} bestsellers • {{ $stats['total_categories'] }} cats</span>
            <span class="opacity-0 group-hover:opacity-100 transition-opacity">→</span>
        </p>
    </a>

    <!-- Custom Inquiries -->
    <a href="{{ route('admin.custom-orders.index') }}" class="group relative bg-gradient-to-br from-[#FAF4ED] to-[#F4E9DC] border border-[#DECDBD] hover:border-[#B8926A] rounded-3xl p-6 shadow-xs hover:shadow-md transition-all duration-300 hover:-translate-y-1 overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-rose-500/75 to-amber-500/70"></div>
        <div class="flex items-center justify-between mb-3">
            <span class="text-[11px] font-semibold uppercase tracking-wider text-[#8A6749]">Custom Inquiries</span>
            <div class="w-10 h-10 rounded-2xl bg-rose-50 border border-rose-200 flex items-center justify-center text-lg group-hover:scale-110 transition-transform">
                🎁
            </div>
        </div>
        <p class="font-serif-lux text-3xl sm:text-4xl font-bold text-[#4A301A] leading-tight">
            {{ $stats['pending_inquiries'] }}
        </p>
        <p class="text-[11px] text-rose-800 mt-2.5 font-medium flex items-center justify-between">
            <span>💬 {{ $stats['total_inquiries'] }} total studio requests</span>
            <span class="opacity-0 group-hover:opacity-100 transition-opacity">→</span>
        </p>
    </a>

</div>

<!-- 3. Studio Fulfillment Breakdown + Quick Hub (7 + 5 cols) -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-8">

    <!-- Left: Order Pipeline Visual Breakdown -->
    <div class="lg:col-span-7 bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 shadow-xs">
        <div class="flex items-center justify-between mb-5 pb-3 border-b border-[#EADBCC]">
            <div>
                <span class="text-[10px] font-semibold uppercase tracking-[0.2em] text-[#9A714C] block">Order Fulfillment Pulse</span>
                <h3 class="font-serif-lux text-2xl font-medium text-[#4A301A]">Order Pipeline Breakdown</h3>
            </div>
            <span class="px-3 py-1 rounded-full bg-[#F3E6D7] border border-[#E2CCB6] text-[11px] font-semibold text-[#6B4B32]">
                {{ $stats['total_orders'] }} Total
            </span>
        </div>

        @php
            $pipelineMeta = [
                'pending' => ['label' => 'Pending Confirmation', 'color' => 'bg-amber-500', 'badge' => 'text-amber-800 bg-amber-100'],
                'confirmed' => ['label' => 'Confirmed & Crafting', 'color' => 'bg-blue-500', 'badge' => 'text-blue-800 bg-blue-100'],
                'shipped' => ['label' => 'Shipped via Courier', 'color' => 'bg-purple-500', 'badge' => 'text-purple-800 bg-purple-100'],
                'delivered' => ['label' => 'Delivered Safely', 'color' => 'bg-emerald-500', 'badge' => 'text-emerald-800 bg-emerald-100'],
                'cancelled' => ['label' => 'Cancelled', 'color' => 'bg-rose-400', 'badge' => 'text-rose-800 bg-rose-100'],
            ];
            $maxOrders = max(1, $stats['total_orders']);
        @endphp

        <div class="space-y-3.5 mb-6">
            @foreach($pipelineMeta as $key => $meta)
                @php
                    $cnt = $orderStatusCounts[$key] ?? 0;
                    $pct = round(($cnt / $maxOrders) * 100);
                @endphp
                <div>
                    <div class="flex items-center justify-between text-xs mb-1">
                        <span class="font-medium text-[#52351E]">{{ $meta['label'] }}</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ $meta['badge'] }}">{{ $cnt }} ({{ $pct }}%)</span>
                    </div>
                    <div class="w-full h-2 rounded-full bg-[#EFE2D4] overflow-hidden">
                        <div class="h-full rounded-full {{ $meta['color'] }} transition-all duration-500" style="width: {{ $pct }}%"></div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Secondary Community Stats Row -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-4 border-t border-[#EADBCC]">
            <a href="{{ route('admin.reviews.index') }}" class="rounded-2xl bg-[#F5ECE1] hover:bg-[#EFE1D0] border border-[#E4D1BD] p-3 text-center transition-colors">
                <span class="block font-serif-lux text-2xl font-bold text-[#4A301A]">{{ $stats['total_reviews'] }}</span>
                <span class="text-[10px] font-semibold text-[#8A6749] uppercase tracking-wider">Reviews</span>
            </a>
            <a href="{{ route('admin.subscribers.index') }}" class="rounded-2xl bg-[#F5ECE1] hover:bg-[#EFE1D0] border border-[#E4D1BD] p-3 text-center transition-colors">
                <span class="block font-serif-lux text-2xl font-bold text-[#4A301A]">{{ $stats['total_subscribers'] }}</span>
                <span class="text-[10px] font-semibold text-[#8A6749] uppercase tracking-wider">VIP Family</span>
            </a>
            <a href="{{ route('admin.occasions.index') }}" class="rounded-2xl bg-[#F5ECE1] hover:bg-[#EFE1D0] border border-[#E4D1BD] p-3 text-center transition-colors">
                <span class="block font-serif-lux text-2xl font-bold text-[#4A301A]">{{ $stats['total_occasions'] }}</span>
                <span class="text-[10px] font-semibold text-[#8A6749] uppercase tracking-wider">Occasions</span>
            </a>
            <a href="{{ route('admin.lookbook.index') }}" class="rounded-2xl bg-[#F5ECE1] hover:bg-[#EFE1D0] border border-[#E4D1BD] p-3 text-center transition-colors">
                <span class="block font-serif-lux text-2xl font-bold text-[#4A301A]">{{ $stats['total_lookbook'] }}</span>
                <span class="text-[10px] font-semibold text-[#8A6749] uppercase tracking-wider">Lookbook</span>
            </a>
        </div>
    </div>

    <!-- Right: Quick Studio Management Shortcuts -->
    <div class="lg:col-span-5 bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 shadow-xs flex flex-col justify-between">
        <div>
            <div class="mb-5 pb-3 border-b border-[#EADBCC]">
                <span class="text-[10px] font-semibold uppercase tracking-[0.2em] text-[#9A714C] block">One-Click Actions</span>
                <h3 class="font-serif-lux text-2xl font-medium text-[#4A301A]">Quick Studio Shortcuts</h3>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <a href="{{ route('admin.products.create') }}" class="group p-4 rounded-2xl bg-[#F5ECE1] hover:bg-[#6B4B32] border border-[#E4D1BD] hover:border-[#6B4B32] transition-all">
                    <span class="text-xl block mb-1.5">✨</span>
                    <span class="text-xs font-semibold text-[#4A301A] group-hover:text-white block">Add New Product</span>
                    <span class="text-[10px] text-[#8A6749] group-hover:text-[#E8D5C0]">Upload with gallery</span>
                </a>

                <a href="{{ route('admin.occasions.index') }}" class="group p-4 rounded-2xl bg-[#F5ECE1] hover:bg-[#6B4B32] border border-[#E4D1BD] hover:border-[#6B4B32] transition-all">
                    <span class="text-xl block mb-1.5">💍</span>
                    <span class="text-xs font-semibold text-[#4A301A] group-hover:text-white block">Shop by Occasion</span>
                    <span class="text-[10px] text-[#8A6749] group-hover:text-[#E8D5C0]">Manage homepage cards</span>
                </a>

                <a href="{{ route('admin.lookbook.index') }}" class="group p-4 rounded-2xl bg-[#F5ECE1] hover:bg-[#6B4B32] border border-[#E4D1BD] hover:border-[#6B4B32] transition-all">
                    <span class="text-xl block mb-1.5">📸</span>
                    <span class="text-xs font-semibold text-[#4A301A] group-hover:text-white block">Studio Lookbook</span>
                    <span class="text-[10px] text-[#8A6749] group-hover:text-[#E8D5C0]">Curate gallery photos</span>
                </a>

                <a href="{{ route('admin.categories.index') }}" class="group p-4 rounded-2xl bg-[#F5ECE1] hover:bg-[#6B4B32] border border-[#E4D1BD] hover:border-[#6B4B32] transition-all">
                    <span class="text-xl block mb-1.5">🏷️</span>
                    <span class="text-xs font-semibold text-[#4A301A] group-hover:text-white block">Categories</span>
                    <span class="text-[10px] text-[#8A6749] group-hover:text-[#E8D5C0]">Organize collections</span>
                </a>

                <a href="{{ route('admin.reviews.index') }}" class="group p-4 rounded-2xl bg-[#F5ECE1] hover:bg-[#6B4B32] border border-[#E4D1BD] hover:border-[#6B4B32] transition-all">
                    <span class="text-xl block mb-1.5">⭐</span>
                    <span class="text-xs font-semibold text-[#4A301A] group-hover:text-white block">Customer Reviews</span>
                    <span class="text-[10px] text-[#8A6749] group-hover:text-[#E8D5C0]">{{ $stats['pending_reviews'] }} awaiting approval</span>
                </a>

                <a href="{{ route('admin.subscribers.index') }}" class="group p-4 rounded-2xl bg-[#F5ECE1] hover:bg-[#6B4B32] border border-[#E4D1BD] hover:border-[#6B4B32] transition-all">
                    <span class="text-xl block mb-1.5">💌</span>
                    <span class="text-xs font-semibold text-[#4A301A] group-hover:text-white block">VIP Subscribers</span>
                    <span class="text-[10px] text-[#8A6749] group-hover:text-[#E8D5C0]">{{ $stats['total_subscribers'] }} email members</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- 4. Featured Bestsellers Visual Showcase -->
@if($featuredProducts->count() > 0)
<div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-7 shadow-xs mb-8">
    <div class="flex items-center justify-between mb-5 pb-3 border-b border-[#EADBCC]">
        <div>
            <span class="text-[10px] font-semibold uppercase tracking-[0.2em] text-[#9A714C] block">Live on Storefront</span>
            <h3 class="font-serif-lux text-2xl font-medium text-[#4A301A]">Featured Studio Bestsellers</h3>
        </div>
        <a href="{{ route('admin.products.index') }}" class="text-xs font-semibold text-[#6B4B32] hover:underline">Manage All Products →</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach($featuredProducts as $product)
        <div class="group rounded-2xl bg-[#F5ECE1]/70 border border-[#E4D1BD] overflow-hidden hover:border-[#B8926A] hover:shadow-sm transition-all flex flex-col justify-between">
            <div class="relative aspect-[4/3] bg-[#EFE2D4] overflow-hidden">
                @if($product->primary_image_url)
                    <img src="{{ $product->primary_image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                    <div class="w-full h-full flex items-center justify-center text-3xl">✨</div>
                @endif
                <span class="absolute top-2 left-2 px-2.5 py-0.5 rounded-full bg-[#3A2210]/80 text-[#FAF4ED] text-[10px] font-semibold">
                    ⭐ Bestseller
                </span>
            </div>
            <div class="p-3.5">
                <p class="text-[10px] text-[#8A6749] uppercase tracking-wider truncate">{{ $product->category->name ?? 'Craft' }}</p>
                <h4 class="font-serif-lux text-lg font-semibold text-[#4A301A] truncate">{{ $product->name }}</h4>
                <div class="flex items-center justify-between mt-2 pt-2 border-t border-[#E6D6C5]">
                    <span class="text-xs font-bold text-[#5C3D24]">Rs. {{ number_format($product->current_price, 0) }}</span>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="text-[11px] font-semibold text-[#6B4B32] hover:text-[#3A2210] hover:underline">Edit →</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

<!-- 5. Recent Orders & Custom Requests Tables -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

    <!-- Recent Orders (8 cols) -->
    <div class="lg:col-span-8 bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-7 shadow-xs">
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-[#EADBCC]">
            <div class="flex items-center space-x-2">
                <span class="text-xs text-[#B38E6A]">✦</span>
                <h2 class="font-serif-lux text-2xl font-medium text-[#4A301A]">Recent Orders</h2>
            </div>
            <a href="{{ route('admin.orders.index') }}" class="text-xs font-semibold text-[#6B4B32] hover:text-[#4A2F17] hover:underline">
                View All Orders →
            </a>
        </div>

        @if($recentOrders->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="border-b border-[#E8DACB] text-[#8A6749] uppercase tracking-wider font-semibold text-[11px]">
                        <th class="pb-3 font-semibold">Order #</th>
                        <th class="pb-3 font-semibold">Customer</th>
                        <th class="pb-3 font-semibold">Total</th>
                        <th class="pb-3 font-semibold">Status</th>
                        <th class="pb-3 font-semibold">Placed At</th>
                        <th class="pb-3 font-semibold text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#EFE2D4]">
                    @foreach($recentOrders as $order)
                    <tr class="hover:bg-[#F5ECE1]/60 transition-colors">
                        <td class="py-3.5 font-mono font-bold text-[#4A301A]">{{ $order->order_number }}</td>
                        <td class="py-3.5">
                            <div class="flex items-center space-x-2.5">
                                <div class="w-7 h-7 rounded-full bg-[#EADBCC] text-[#52351E] font-bold flex items-center justify-center text-[10px] flex-shrink-0">
                                    {{ strtoupper(substr($order->customer_name, 0, 1)) }}
                                </div>
                                <div>
                                    <span class="font-semibold text-[#4A301A] block leading-tight">{{ $order->customer_name }}</span>
                                    <span class="text-[10px] text-[#8A6749]">{{ $order->city }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="py-3.5 font-semibold text-[#52351E]">
                            Rs. {{ number_format($order->total_amount, 0) }}
                        </td>
                        <td class="py-3.5">
                            @php
                                $statusClasses = [
                                    'pending' => 'bg-amber-100 text-amber-900 border border-amber-300',
                                    'confirmed' => 'bg-blue-100 text-blue-900 border border-blue-300',
                                    'shipped' => 'bg-purple-100 text-purple-900 border border-purple-300',
                                    'delivered' => 'bg-emerald-100 text-emerald-900 border border-emerald-300',
                                    'cancelled' => 'bg-rose-100 text-rose-900 border border-rose-300',
                                ];
                            @endphp
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-semibold {{ $statusClasses[$order->status] ?? 'bg-gray-100' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="py-3.5 text-[#7A5A3E]">{{ $order->created_at->format('M d, H:i') }}</td>
                        <td class="py-3.5 text-right">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="inline-flex items-center space-x-1 px-3 py-1 rounded-lg text-xs font-semibold bg-[#FAF4ED] text-[#6B4B32] border border-[#DECDBD] hover:bg-[#6B4B32] hover:text-white transition-all shadow-2xs">
                                <span>Details →</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center py-12 text-[#8A6749]">
            <span class="text-3xl block mb-2">🛍️</span>
            <p class="text-xs">No customer orders placed yet.</p>
        </div>
        @endif
    </div>

    <!-- Recent Custom Requests (4 cols) -->
    <div class="lg:col-span-4 bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-7 shadow-xs">
        <div class="flex items-center justify-between mb-5 pb-3 border-b border-[#EADBCC]">
            <div class="flex items-center space-x-2">
                <span class="text-xs text-[#B38E6A]">✦</span>
                <h2 class="font-serif-lux text-xl font-medium text-[#4A301A]">Custom Inquiries</h2>
            </div>
            <a href="{{ route('admin.custom-orders.index') }}" class="text-xs font-semibold text-[#6B4B32] hover:underline">All →</a>
        </div>

        @if($recentCustomOrders->count() > 0)
        <div class="space-y-3.5">
            @foreach($recentCustomOrders as $req)
            <div class="p-3.5 bg-[#F6ECE0] rounded-2xl border border-[#DECDBD] hover:border-[#6B4B32] transition-colors">
                <div class="flex items-center justify-between mb-1.5">
                    <span class="font-semibold text-xs text-[#4A301A]">{{ $req->name }}</span>
                    <span class="text-[10px] px-2 py-0.5 rounded-full bg-amber-100 text-amber-800 font-semibold border border-amber-200">
                        {{ ucfirst($req->status) }}
                    </span>
                </div>
                <p class="text-[11px] text-[#7A5A3E] line-clamp-2 leading-relaxed mb-2">{{ $req->category }}: {{ $req->description }}</p>
                <div class="flex items-center justify-between text-[11px] text-[#8A6749] pt-2 border-t border-[#EADBCC]/60">
                    <span>📱 {{ $req->phone }}</span>
                    <a href="{{ route('admin.custom-orders.show', $req->id) }}" class="text-[#6B4B32] font-semibold hover:underline">
                        View Inquiry →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-10 text-xs text-[#8A6749]">
            <span class="text-2xl block mb-1">🎁</span>
            <p>No custom inquiries at this moment.</p>
        </div>
        @endif
    </div>

</div>

@endsection
