@extends('admin.layouts.admin')

@section('title', 'Admin Dashboard')
@section('header_title', 'Overview & Analytics')

@section('content')

<!-- Stat Cards Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <!-- Total Revenue -->
    <div class="bg-gradient-to-br from-[#FAF4ED] to-[#F5ECE1] border border-[#DECDBD] rounded-3xl p-6 shadow-xs hover:shadow-md transition-all hover:-translate-y-1">
        <div class="flex items-center justify-between mb-3">
            <span class="text-xs font-semibold uppercase tracking-wider text-[#8A6749]">Total Sales</span>
            <div class="w-10 h-10 rounded-2xl bg-[#EFE1D1] border border-[#DFCBB7] flex items-center justify-center text-lg shadow-inner">
                💰
            </div>
        </div>
        <p class="font-serif-lux text-3xl sm:text-4xl font-bold text-[#4A301A] leading-tight">
            Rs. {{ number_format($stats['total_revenue'], 0) }}
        </p>
        <p class="text-[11px] text-emerald-800 mt-2 font-medium flex items-center space-x-1">
            <span>✓</span>
            <span>Completed orders revenue</span>
        </p>
    </div>

    <!-- Total Orders -->
    <div class="bg-gradient-to-br from-[#FAF4ED] to-[#F5ECE1] border border-[#DECDBD] rounded-3xl p-6 shadow-xs hover:shadow-md transition-all hover:-translate-y-1">
        <div class="flex items-center justify-between mb-3">
            <span class="text-xs font-semibold uppercase tracking-wider text-[#8A6749]">Customer Orders</span>
            <div class="w-10 h-10 rounded-2xl bg-[#EFE1D1] border border-[#DFCBB7] flex items-center justify-center text-lg shadow-inner">
                🛍️
            </div>
        </div>
        <p class="font-serif-lux text-3xl sm:text-4xl font-bold text-[#4A301A] leading-tight">
            {{ $stats['total_orders'] }}
        </p>
        <p class="text-[11px] text-amber-800 mt-2 font-medium flex items-center space-x-1">
            <span>⏱️</span>
            <span>{{ $stats['pending_orders'] }} orders pending dispatch</span>
        </p>
    </div>

    <!-- Active Catalog -->
    <div class="bg-gradient-to-br from-[#FAF4ED] to-[#F5ECE1] border border-[#DECDBD] rounded-3xl p-6 shadow-xs hover:shadow-md transition-all hover:-translate-y-1">
        <div class="flex items-center justify-between mb-3">
            <span class="text-xs font-semibold uppercase tracking-wider text-[#8A6749]">Handmade Catalog</span>
            <div class="w-10 h-10 rounded-2xl bg-[#EFE1D1] border border-[#DFCBB7] flex items-center justify-center text-lg shadow-inner">
                📦
            </div>
        </div>
        <p class="font-serif-lux text-3xl sm:text-4xl font-bold text-[#4A301A] leading-tight">
            {{ $stats['total_products'] }}
        </p>
        <p class="text-[11px] text-[#8A6749] mt-2 font-medium flex items-center space-x-1">
            <span>✨</span>
            <span>Resin, floral & crochet crafts</span>
        </p>
    </div>

    <!-- Custom Order Requests -->
    <div class="bg-gradient-to-br from-[#FAF4ED] to-[#F5ECE1] border border-[#DECDBD] rounded-3xl p-6 shadow-xs hover:shadow-md transition-all hover:-translate-y-1">
        <div class="flex items-center justify-between mb-3">
            <span class="text-xs font-semibold uppercase tracking-wider text-[#8A6749]">Custom Inquiries</span>
            <div class="w-10 h-10 rounded-2xl bg-[#EFE1D1] border border-[#DFCBB7] flex items-center justify-center text-lg shadow-inner">
                🎁
            </div>
        </div>
        <p class="font-serif-lux text-3xl sm:text-4xl font-bold text-[#4A301A] leading-tight">
            {{ $stats['pending_inquiries'] }}
        </p>
        <p class="text-[11px] text-rose-800 mt-2 font-medium flex items-center space-x-1">
            <span>💬</span>
            <span>Awaiting customer quotation</span>
        </p>
    </div>

</div>

<!-- Recent Orders & Custom Requests Tables -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-8 items-start">
    
    <!-- Recent Orders (8 cols) -->
    <div class="lg:col-span-8 bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-8 shadow-xs">
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
                    <tr class="hover:bg-[#F8F2E9]/60 transition-colors">
                        <td class="py-3.5 font-mono font-bold text-[#4A301A]">{{ $order->order_number }}</td>
                        <td class="py-3.5">
                            <span class="font-semibold text-[#4A301A] block">{{ $order->customer_name }}</span>
                            <span class="text-[10px] text-[#8A6749]">{{ $order->city }}</span>
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
            <p>No customer orders placed yet.</p>
        </div>
        @endif
    </div>

    <!-- Recent Custom Requests (4 cols) -->
    <div class="lg:col-span-4 bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-7 shadow-xs flex flex-col justify-between">
        <div>
            <div class="flex items-center justify-between mb-5 pb-3 border-b border-[#EADBCC]">
                <div class="flex items-center space-x-2">
                    <span class="text-xs text-[#B38E6A]">✦</span>
                    <h2 class="font-serif-lux text-xl font-medium text-[#4A301A]">Custom Orders</h2>
                </div>
                <a href="{{ route('admin.custom-orders.index') }}" class="text-xs font-semibold text-[#6B4B32] hover:underline">All →</a>
            </div>

            @if($recentCustomOrders->count() > 0)
            <div class="space-y-3.5">
                @foreach($recentCustomOrders as $req)
                <div class="p-3.5 bg-[#F6ECE0] rounded-2xl border border-[#DECDBD] hover:border-[#6B4B32] transition-colors">
                    <div class="flex items-center justify-between mb-1.5">
                        <span class="font-semibold text-xs text-[#4A301A]">{{ $req->name }}</span>
                        <span class="text-[10px] px-2 py-0.2 rounded-full bg-amber-100 text-amber-800 font-semibold border border-amber-200">
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

        <div class="mt-6 pt-4 border-t border-[#E8DACB]">
            <a href="{{ route('admin.products.create') }}" class="btn-luxury w-full py-3 rounded-xl text-xs font-semibold tracking-wide text-center flex items-center justify-center space-x-2 shadow-sm">
                <span>+ Create New Product</span>
            </a>
        </div>
    </div>

</div>

<!-- Quick Actions Banner -->
<div class="bg-gradient-to-r from-[#F6ECE0] via-[#F8F1E7] to-[#F1E4D3] border border-[#DECDBD] rounded-3xl p-6 sm:p-7 flex flex-col sm:flex-row items-center justify-between gap-5 shadow-2xs">
    <div>
        <h3 class="font-serif-lux text-2xl font-semibold text-[#4A2F17] flex items-center space-x-2">
            <span>Storefront Synchronization</span>
            <span class="text-base">✨</span>
        </h3>
        <p class="text-xs text-[#7A5A3E] mt-1 max-w-xl">
            All bestseller items from the original studio design (Resin Earrings, Resin Keychains, Nikkah Platter, Crochet Bag) are synced and live on the customer homepage with zero pixelation!
        </p>
    </div>
    <div class="flex items-center space-x-3 flex-shrink-0">
        <a href="{{ route('admin.products.index') }}" class="px-5 py-2.5 rounded-full text-xs font-semibold bg-[#FAF4ED] text-[#52351E] border border-[#DECDBD] hover:bg-[#EADBCC] transition-colors shadow-2xs">
            Manage Catalog
        </a>
        <a href="{{ route('home') }}" target="_blank" class="btn-luxury px-5 py-2.5 rounded-full text-xs font-semibold tracking-wide transition-all shadow-sm inline-flex items-center space-x-1.5">
            <span>Preview Store</span>
            <span>↗</span>
        </a>
    </div>
</div>

@endsection
