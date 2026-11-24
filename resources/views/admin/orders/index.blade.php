@extends('admin.layouts.admin')

@section('title', 'Orders Management')
@section('header_title', 'Customer Orders & Fulfillment')

@section('content')

<!-- 1. Dark Espresso Orders Command Header -->
<div class="relative rounded-[2rem] bg-gradient-to-br from-[#4A2E19] via-[#5B3A20] to-[#361F0E] text-[#FAF4ED] p-6 sm:p-8 mb-7 shadow-md overflow-hidden">
    <div class="pointer-events-none absolute -top-16 -right-16 w-60 h-60 rounded-full bg-[#C6A47E]/15 blur-3xl"></div>

    <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">
        <div>
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-[#FAF4ED]/10 border border-[#DFCBB7]/25 text-[10px] font-semibold uppercase tracking-[0.2em] text-[#E6C9A8] mb-3">
                <span class="w-1.5 h-1.5 rounded-full {{ $counts['pending'] > 0 ? 'bg-amber-400 animate-pulse' : 'bg-emerald-400' }}"></span>
                <span>Order Fulfillment Desk</span>
            </div>
            <h2 class="font-serif-lux italic text-3xl sm:text-4xl text-[#FDF8F1] font-normal leading-tight">
                Customer Orders & Dispatch
            </h2>
            <p class="text-xs sm:text-sm text-[#DBC4AC] mt-1.5 max-w-xl">
                Track every handcrafted order from confirmation to safe doorstep delivery across Pakistan.
                Active Revenue: <strong class="text-[#F7DFC2]">Rs. {{ number_format($totalRevenue, 0) }}</strong>
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-2.5">
            <a href="{{ route('admin.orders.export') }}"
               class="px-5 py-2.5 rounded-full bg-[#FAF4ED] hover:bg-white text-[#4A2D16] text-xs font-semibold shadow-sm transition-all inline-flex items-center space-x-2">
                <span>⬇️</span>
                <span>Export CSV</span>
            </a>
            <a href="{{ route('home') }}" target="_blank"
               class="px-4 py-2.5 rounded-full bg-[#FAF4ED]/12 hover:bg-[#FAF4ED]/20 text-[#FAF4ED] border border-[#DFCBB7]/30 text-xs font-semibold transition-all">
                View Storefront ↗
            </a>
        </div>
    </div>
</div>

<!-- 2. 4 Clickable KPI Stat Cards -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 mb-7">
    <a href="{{ route('admin.orders.index') }}" class="group relative bg-gradient-to-br from-[#FAF4ED] to-[#F4E9DC] border border-[#DECDBD] hover:border-[#B8926A] rounded-3xl p-5 shadow-xs hover:shadow-md transition-all hover:-translate-y-0.5 overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-[#6B4B32] to-[#C6A47E]"></div>
        <div class="flex items-center justify-between mb-2">
            <span class="text-[10px] sm:text-[11px] font-semibold uppercase tracking-wider text-[#8A6749]">All Orders</span>
            <span class="w-9 h-9 rounded-xl bg-[#EFE1D1] border border-[#DFCBB7] flex items-center justify-center text-base">🛍️</span>
        </div>
        <p class="font-serif-lux text-3xl font-bold text-[#4A301A]">{{ $counts['all'] }}</p>
        <p class="text-[11px] text-[#7A5A3E] mt-1">Rs. {{ number_format($totalRevenue, 0) }} total sales</p>
    </a>

    <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}" class="group relative bg-gradient-to-br from-[#FAF4ED] to-[#F4E9DC] border border-[#DECDBD] hover:border-amber-400 rounded-3xl p-5 shadow-xs hover:shadow-md transition-all hover:-translate-y-0.5 overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-amber-500 to-amber-300"></div>
        <div class="flex items-center justify-between mb-2">
            <span class="text-[10px] sm:text-[11px] font-semibold uppercase tracking-wider text-[#8A6749]">Pending</span>
            <span class="w-9 h-9 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-center text-base">⏱️</span>
        </div>
        <p class="font-serif-lux text-3xl font-bold text-amber-900">{{ $counts['pending'] }}</p>
        <p class="text-[11px] text-amber-800 mt-1">Awaiting confirmation</p>
    </a>

    <a href="{{ route('admin.orders.index', ['status' => 'shipped']) }}" class="group relative bg-gradient-to-br from-[#FAF4ED] to-[#F4E9DC] border border-[#DECDBD] hover:border-purple-400 rounded-3xl p-5 shadow-xs hover:shadow-md transition-all hover:-translate-y-0.5 overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-purple-500 to-indigo-400"></div>
        <div class="flex items-center justify-between mb-2">
            <span class="text-[10px] sm:text-[11px] font-semibold uppercase tracking-wider text-[#8A6749]">Shipped</span>
            <span class="w-9 h-9 rounded-xl bg-purple-50 border border-purple-200 flex items-center justify-center text-base">🚚</span>
        </div>
        <p class="font-serif-lux text-3xl font-bold text-purple-900">{{ $counts['shipped'] }}</p>
        <p class="text-[11px] text-purple-800 mt-1">On the way via courier</p>
    </a>

    <a href="{{ route('admin.orders.index', ['status' => 'delivered']) }}" class="group relative bg-gradient-to-br from-[#FAF4ED] to-[#F4E9DC] border border-[#DECDBD] hover:border-emerald-400 rounded-3xl p-5 shadow-xs hover:shadow-md transition-all hover:-translate-y-0.5 overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-emerald-500 to-teal-400"></div>
        <div class="flex items-center justify-between mb-2">
            <span class="text-[10px] sm:text-[11px] font-semibold uppercase tracking-wider text-[#8A6749]">Delivered</span>
            <span class="w-9 h-9 rounded-xl bg-emerald-50 border border-emerald-200 flex items-center justify-center text-base">✅</span>
        </div>
        <p class="font-serif-lux text-3xl font-bold text-emerald-900">{{ $counts['delivered'] }}</p>
        <p class="text-[11px] text-emerald-800 mt-1">Completed with love</p>
    </a>
</div>

<!-- 3. Main Orders Table Card -->
<div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-7 shadow-xs">

    <!-- Filter Tabs & Search Bar -->
    <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-4 border-b border-[#EADBCC] pb-5 mb-6">
        <div class="flex flex-wrap items-center gap-2">
            @php
                $tabs = [
                    '' => ['label' => 'All', 'count' => $counts['all']],
                    'pending' => ['label' => 'Pending', 'count' => $counts['pending']],
                    'confirmed' => ['label' => 'Confirmed', 'count' => $counts['confirmed']],
                    'shipped' => ['label' => 'Shipped', 'count' => $counts['shipped']],
                    'delivered' => ['label' => 'Delivered', 'count' => $counts['delivered']],
                    'cancelled' => ['label' => 'Cancelled', 'count' => $counts['cancelled']],
                ];
            @endphp
            @foreach($tabs as $val => $tab)
                @php $isActive = request('status', '') === $val; @endphp
                <a href="{{ route('admin.orders.index', array_filter(['status' => $val, 'search' => request('search')])) }}"
                   class="inline-flex items-center space-x-1.5 px-3.5 py-1.5 rounded-full text-xs font-semibold transition-all {{ $isActive ? 'bg-[#6B4B32] text-white shadow-xs' : 'bg-[#F5ECE1] text-[#7A5A3E] border border-[#E6D6C5] hover:bg-[#EADBCC]' }}">
                    <span>{{ $tab['label'] }}</span>
                    <span class="text-[10px] px-1.5 py-0.2 rounded-full {{ $isActive ? 'bg-white/20 text-white' : 'bg-[#EADBCC] text-[#5C3D24]' }}">
                        {{ $tab['count'] }}
                    </span>
                </a>
            @endforeach
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('admin.orders.index') }}" class="flex items-center gap-2 w-full xl:w-auto">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif
            <div class="relative flex-grow xl:w-64">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Order #, name, phone, city..."
                       class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-full pl-4 pr-8 py-2 text-xs text-[#432C19] placeholder-[#9E8165] outline-none focus:border-[#6B4B32] focus:ring-2 focus:ring-[#6B4B32]/15">
                @if(request('search'))
                    <a href="{{ route('admin.orders.index', array_filter(['status' => request('status')])) }}" class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-[#8A6749] hover:text-[#4A301A]" title="Clear">×</a>
                @endif
            </div>
            <button type="submit" class="bg-[#6B4B32] hover:bg-[#573C27] text-white px-4 py-2 rounded-full text-xs font-semibold transition-colors cursor-pointer">
                Search
            </button>
        </form>
    </div>

    <!-- Orders Table -->
    @if($orders->count() > 0)
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead>
                <tr class="border-b border-[#E8DACB] text-[#8A6749] uppercase tracking-wider text-[11px]">
                    <th class="pb-3 font-semibold">Order</th>
                    <th class="pb-3 font-semibold">Customer</th>
                    <th class="pb-3 font-semibold">Items</th>
                    <th class="pb-3 font-semibold">Total</th>
                    <th class="pb-3 font-semibold">Status</th>
                    <th class="pb-3 font-semibold">Placed On</th>
                    <th class="pb-3 font-semibold text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#EFE2D4]">
                @foreach($orders as $order)
                @php
                    $waPhone = preg_replace('/[^0-9]/', '', $order->customer_phone);
                    if (str_starts_with($waPhone, '0')) {
                        $waPhone = '92' . substr($waPhone, 1);
                    }
                    $badge = [
                        'pending' => 'bg-amber-100 text-amber-900 border border-amber-300',
                        'confirmed' => 'bg-blue-100 text-blue-900 border border-blue-300',
                        'shipped' => 'bg-purple-100 text-purple-900 border border-purple-300',
                        'delivered' => 'bg-emerald-100 text-emerald-900 border border-emerald-300',
                        'cancelled' => 'bg-rose-100 text-rose-900 border border-rose-300',
                    ];
                @endphp
                <tr class="hover:bg-[#F5ECE1]/60 transition-colors">
                    <td class="py-4">
                        <span class="font-mono font-bold text-[#4A301A] bg-[#F3E7D9] border border-[#E2CCB6] px-2.5 py-1 rounded-lg inline-block">
                            #{{ $order->order_number }}
                        </span>
                    </td>
                    <td class="py-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-[#E9D5BC] to-[#D4B38F] border border-[#C9A47D] text-[#4A2D16] font-bold flex items-center justify-center text-xs flex-shrink-0">
                                {{ strtoupper(substr($order->customer_name, 0, 1)) }}
                            </div>
                            <div>
                                <span class="font-semibold text-[#4A301A] block leading-tight">{{ $order->customer_name }}</span>
                                <span class="text-[10px] text-[#8A6749] block mt-0.5">{{ $order->customer_phone }} • {{ $order->city }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="py-4">
                        <span class="px-2.5 py-1 rounded-full bg-[#F5ECE1] border border-[#E6D6C5] text-[#5C3D24] font-semibold text-[11px]">
                            {{ $order->items->sum('quantity') }} {{ $order->items->sum('quantity') === 1 ? 'item' : 'items' }}
                        </span>
                    </td>
                    <td class="py-4">
                        <span class="font-bold text-[#4A301A] text-[13px]">Rs. {{ number_format($order->total_amount, 0) }}</span>
                    </td>
                    <td class="py-4">
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-semibold {{ $badge[$order->status] ?? 'bg-gray-100' }}">
                            ● {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="py-4">
                        <span class="block text-[#4A301A] font-medium">{{ $order->created_at->format('d M, Y') }}</span>
                        <span class="block text-[10px] text-[#8A6749]">{{ $order->created_at->format('h:i A') }} • {{ $order->created_at->diffForHumans() }}</span>
                    </td>
                    <td class="py-4 text-right">
                        <div class="inline-flex items-center space-x-1.5">
                            @if($waPhone)
                            <a href="https://wa.me/{{ $waPhone }}?text={{ urlencode("Assalam-o-Alaikum {$order->customer_name}! Regarding your Islamic Crafts order #{$order->order_number}:") }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               title="WhatsApp Customer"
                               class="px-2.5 py-1.5 rounded-lg text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-600 hover:text-white transition-all">
                                💬
                            </a>
                            @endif
                            <a href="{{ route('admin.orders.show', $order->id) }}"
                               class="px-3.5 py-1.5 rounded-lg text-[11px] font-semibold bg-[#FAF4ED] text-[#6B4B32] border border-[#DECDBD] hover:bg-[#6B4B32] hover:text-white transition-all shadow-2xs">
                                View Order →
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $orders->links() }}
    </div>
    @else
    <div class="text-center py-14">
        <div class="w-14 h-14 mx-auto rounded-2xl bg-[#F3E6D7] border border-[#E2CCB6] flex items-center justify-center text-2xl mb-3">🛍️</div>
        <h4 class="font-serif-lux text-2xl text-[#4A301A] mb-1">No orders found</h4>
        <p class="text-xs text-[#8A6749]">
            {{ request('search') || request('status') ? 'Try clearing your filter or search query.' : 'Customer orders will appear here as soon as someone checks out.' }}
        </p>
    </div>
    @endif

</div>

@endsection
