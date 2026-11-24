@extends('admin.layouts.admin')

@section('title', 'Order #' . $order->order_number)
@section('header_title', 'Order Details: #' . $order->order_number)

@section('content')
@php
    $waPhone = preg_replace('/[^0-9]/', '', $order->customer_phone);
    if (str_starts_with($waPhone, '0')) {
        $waPhone = '92' . substr($waPhone, 1);
    }

    $statusBadge = [
        'pending' => 'bg-amber-400/20 text-amber-200 border-amber-300/40',
        'confirmed' => 'bg-blue-400/20 text-blue-200 border-blue-300/40',
        'shipped' => 'bg-purple-400/20 text-purple-200 border-purple-300/40',
        'delivered' => 'bg-emerald-400/20 text-emerald-200 border-emerald-300/40',
        'cancelled' => 'bg-rose-400/20 text-rose-200 border-rose-300/40',
    ];

    $steps = [
        'pending' => ['label' => 'Order Placed', 'icon' => '📝'],
        'confirmed' => ['label' => 'Confirmed & Crafting', 'icon' => '✨'],
        'shipped' => ['label' => 'Shipped via Courier', 'icon' => '🚚'],
        'delivered' => ['label' => 'Delivered', 'icon' => '🎁'],
    ];
    $rankMap = ['pending' => 0, 'confirmed' => 1, 'shipped' => 2, 'delivered' => 3];
    $currentRank = $rankMap[$order->status] ?? -1;

    $itemsSubtotal = $order->items->sum(fn($i) => $i->price * $i->quantity);
    $trackingUrl = route('orders.track', ['order_number' => $order->order_number]);
@endphp

<div class="space-y-6">

    <!-- 1. Dark Espresso Order Command Hero Header -->
    <div class="relative rounded-[2rem] bg-gradient-to-br from-[#4A2E19] via-[#5B3A20] to-[#361F0E] text-[#FAF4ED] p-6 sm:p-8 shadow-md overflow-hidden">
        <div class="pointer-events-none absolute -top-16 -right-16 w-64 h-64 rounded-full bg-[#C6A47E]/15 blur-3xl"></div>

        <div class="relative flex flex-col xl:flex-row xl:items-center justify-between gap-6">
            <div>
                <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center space-x-1 text-[11px] font-medium text-[#DBC4AC] hover:text-white mb-2 transition-colors">
                    <span>←</span>
                    <span>Back to All Orders</span>
                </a>
                <div class="flex flex-wrap items-center gap-3">
                    <h2 class="font-serif-lux text-3xl sm:text-4xl font-semibold text-[#FDF8F1] tracking-wide">
                        #{{ $order->order_number }}
                    </h2>
                    <span class="px-3.5 py-1 rounded-full text-xs font-semibold border {{ $statusBadge[$order->status] ?? 'bg-white/10 text-white border-white/20' }}">
                        ● {{ ucfirst($order->status) }}
                    </span>
                </div>
                <p class="text-xs text-[#DBC4AC] mt-1.5">
                    Placed on {{ $order->created_at->format('l, d F Y \a\t h:i A') }}
                    <span class="text-[#C6A47E] mx-1">•</span>
                    <span>{{ $order->created_at->diffForHumans() }}</span>
                </p>
            </div>

            <!-- Right Actions: Print, WhatsApp, Status Update -->
            <div class="flex flex-wrap items-center gap-2.5">
                <a href="{{ route('admin.orders.invoice', $order->id) }}" target="_blank"
                   class="px-4 py-2.5 rounded-full bg-[#FAF4ED] hover:bg-white text-[#4A2D16] text-xs font-semibold shadow-sm transition-all inline-flex items-center space-x-1.5">
                    <span>🖨️</span>
                    <span>Print Invoice</span>
                </a>

                @if($waPhone)
                <a href="https://wa.me/{{ $waPhone }}?text={{ urlencode("Assalam-o-Alaikum {$order->customer_name}! Regarding your Islamic Crafts order #{$order->order_number} (Status: " . ucfirst($order->status) . "). Track live here: {$trackingUrl}") }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="px-4 py-2.5 rounded-full bg-[#25D366] hover:bg-[#1EBE5D] text-white text-xs font-semibold shadow-sm transition-all inline-flex items-center space-x-1.5">
                    <span>💬</span>
                    <span>WhatsApp Client</span>
                </a>
                @endif

                <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" class="flex items-center gap-2 bg-[#FAF4ED]/10 border border-[#DFCBB7]/25 rounded-full p-1 pl-3">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="bg-transparent text-xs font-semibold text-[#FDF8F1] outline-none cursor-pointer pr-1">
                        <option value="pending" class="text-[#4A2D16]" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" class="text-[#4A2D16]" {{ $order->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="shipped" class="text-[#4A2D16]" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="delivered" class="text-[#4A2D16]" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="cancelled" class="text-[#4A2D16]" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    <button type="submit" class="px-4 py-1.5 rounded-full bg-[#C6A47E] hover:bg-[#D5B590] text-[#361F0E] text-xs font-bold transition-colors cursor-pointer">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- 2. Visual Order Fulfillment Stepper -->
    <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-5 sm:p-6 shadow-xs">
        @if($order->status === 'cancelled')
            <div class="flex items-center justify-center space-x-2 text-rose-700 text-xs font-semibold py-2">
                <span>⛔</span>
                <span>This order has been marked as Cancelled.</span>
            </div>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4">
                @foreach(array_values($steps) as $idx => $step)
                    @php $done = $idx <= $currentRank; @endphp
                    <div class="flex items-center space-x-3 p-3 rounded-2xl border transition-all {{ $done ? 'bg-gradient-to-br from-[#FBF6EE] to-[#F3E5D5] border-[#C9AC8E]' : 'bg-[#F5ECE1]/40 border-[#E8DACB] opacity-60' }}">
                        <div class="w-9 h-9 rounded-full flex items-center justify-center text-sm flex-shrink-0 {{ $done ? 'bg-[#6B4B32] text-white shadow-2xs' : 'bg-[#EADBCC] text-[#8A6749]' }}">
                            {{ $done && $idx < $currentRank ? '✓' : $step['icon'] }}
                        </div>
                        <div class="min-w-0">
                            <span class="text-[10px] font-mono uppercase text-[#9A714C] block">Step 0{{ $idx + 1 }}</span>
                            <span class="text-xs font-bold text-[#4A301A] truncate block">{{ $step['label'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- 3. Main 2-Column Dossier Grid (8 + 4 cols) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

        <!-- Left Column: Ordered Items + Notes (8 cols) -->
        <div class="lg:col-span-8 space-y-6">

            <!-- Ordered Items Card -->
            <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-7 shadow-xs">
                <div class="flex items-center justify-between mb-5 pb-3 border-b border-[#EADBCC]">
                    <div>
                        <span class="text-[10px] font-semibold uppercase tracking-[0.2em] text-[#9A714C] block">Parcel Contents</span>
                        <h3 class="font-serif-lux text-2xl font-semibold text-[#4A301A]">
                            Ordered Items ({{ $order->items->sum('quantity') }})
                        </h3>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-[#F3E7D9] border border-[#E2CCB6] text-xs font-bold text-[#5C3D24]">
                        Rs. {{ number_format($order->total_amount, 0) }}
                    </span>
                </div>

                <div class="divide-y divide-[#EFE2D4]">
                    @foreach($order->items as $item)
                    <div class="py-4 first:pt-0 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="flex items-center space-x-4 min-w-0">
                            <div class="w-16 h-16 rounded-2xl bg-[#F0E3D3] overflow-hidden flex items-center justify-center border border-[#DECDBD] flex-shrink-0 shadow-2xs">
                                @if($item->product && $item->product->primary_image_url)
                                    <img src="{{ $item->product->primary_image_url }}" alt="{{ $item->product_name }}" class="w-full h-full object-cover">
                                @else
                                    <span class="text-2xl">✨</span>
                                @endif
                            </div>

                            <div class="min-w-0">
                                <h4 class="font-serif-lux text-lg font-semibold text-[#4A301A] leading-tight">
                                    {{ $item->product_name }}
                                </h4>
                                <div class="flex flex-wrap items-center gap-2 mt-1 text-[11px] text-[#7A5A3E]">
                                    <span class="px-2 py-0.5 rounded-md bg-[#F2E5D5] text-[#4A301A] font-semibold">Qty: {{ $item->quantity }}</span>
                                    <span>× Rs. {{ number_format($item->price, 0) }} each</span>
                                </div>
                                @if($item->customization_details)
                                    <div class="mt-2 inline-flex items-center space-x-1.5 px-2.5 py-1 rounded-lg bg-amber-50 border border-amber-200 text-[11px] text-amber-900">
                                        <span>✨</span>
                                        <span><strong>Personalization:</strong> {{ $item->customization_details }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="text-left sm:text-right flex-shrink-0">
                            <span class="text-[10px] uppercase tracking-wider text-[#9A714C] block">Subtotal</span>
                            <span class="font-bold text-base text-[#4A301A]">Rs. {{ number_format($item->price * $item->quantity, 0) }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Financial Breakdown -->
                <div class="mt-6 pt-5 border-t-2 border-[#EADBCC] flex justify-end">
                    <div class="w-full sm:w-72 space-y-2.5 text-xs">
                        <div class="flex justify-between text-[#7A5A3E]">
                            <span>Items Subtotal</span>
                            <span class="font-semibold text-[#4A301A]">Rs. {{ number_format($itemsSubtotal, 0) }}</span>
                        </div>
                        @if($order->discount_amount > 0)
                        <div class="flex justify-between text-emerald-700 font-semibold">
                            <span>Promo Discount ({{ $order->coupon_code }})</span>
                            <span>- Rs. {{ number_format($order->discount_amount, 0) }}</span>
                        </div>
                        @endif
                        <div class="flex justify-between text-[#7A5A3E]">
                            <span>Delivery & Fragile Packaging</span>
                            <span class="text-emerald-700 font-medium">Complimentary</span>
                        </div>
                        <div class="flex justify-between items-baseline pt-3 border-t border-[#DECDBD]">
                            <span class="font-serif-lux text-xl font-bold text-[#4A301A]">Grand Total</span>
                            <span class="font-serif-lux text-2xl font-bold text-[#6B4B32]">Rs. {{ number_format($order->total_amount, 0) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Notes / Special Instructions -->
            <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 shadow-xs">
                <div class="flex items-center space-x-2 mb-3 pb-2 border-b border-[#EADBCC]">
                    <span>📝</span>
                    <h3 class="font-serif-lux text-xl font-semibold text-[#4A301A]">Order Notes & Customization</h3>
                </div>
                <div class="rounded-2xl bg-[#F5ECE1] border border-[#E4D1BD] p-4 text-xs text-[#52351E] leading-relaxed whitespace-pre-line">
                    {{ trim((string) $order->notes) ?: 'No special instructions were added by the customer.' }}
                </div>
            </div>

        </div>

        <!-- Right Column: Client Profile & Quick Tools (4 cols) -->
        <div class="lg:col-span-4 space-y-6">

            <!-- Client Profile & Shipping Card -->
            <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 shadow-xs">
                <div class="flex items-center space-x-3.5 pb-4 mb-4 border-b border-[#EADBCC]">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#6B4B32] to-[#4A2D16] text-[#FAF4ED] font-serif-lux text-xl font-bold flex items-center justify-center flex-shrink-0 shadow-sm">
                        {{ strtoupper(substr($order->customer_name, 0, 1)) }}
                    </div>
                    <div class="min-w-0">
                        <span class="text-[10px] font-semibold uppercase tracking-widest text-[#9A714C] block">Customer Profile</span>
                        <h3 class="font-serif-lux text-2xl font-semibold text-[#4A301A] truncate leading-tight">{{ $order->customer_name }}</h3>
                    </div>
                </div>

                <div class="space-y-3 text-xs">
                    <div class="flex items-center justify-between p-3 rounded-xl bg-[#F5ECE1] border border-[#E6D6C5]">
                        <div>
                            <span class="text-[10px] uppercase tracking-wider text-[#8A6749] block">Mobile / WhatsApp</span>
                            <span class="font-semibold text-[#4A301A]">{{ $order->customer_phone }}</span>
                        </div>
                        <a href="tel:{{ $order->customer_phone }}" class="px-2.5 py-1 rounded-lg bg-[#FAF4ED] border border-[#DECDBD] text-[10px] font-semibold text-[#6B4B32] hover:bg-[#6B4B32] hover:text-white transition-colors">
                            📞 Call
                        </a>
                    </div>

                    <div class="p-3 rounded-xl bg-[#F5ECE1] border border-[#E6D6C5]">
                        <span class="text-[10px] uppercase tracking-wider text-[#8A6749] block">Email Address</span>
                        @if($order->customer_email)
                            <a href="mailto:{{ $order->customer_email }}" class="font-semibold text-[#6B4B32] hover:underline break-all">{{ $order->customer_email }}</a>
                        @else
                            <span class="text-[#8A6749] italic">Not provided</span>
                        @endif
                    </div>

                    <div class="p-3.5 rounded-xl bg-[#F5ECE1] border border-[#E6D6C5]">
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-[10px] uppercase tracking-wider text-[#8A6749]">Shipping Destination</span>
                            <span class="px-2 py-0.5 rounded-full bg-[#EADBCC] text-[#4A301A] text-[10px] font-bold">📍 {{ $order->city }}</span>
                        </div>
                        <p class="text-[#4A301A] font-medium leading-relaxed">{{ $order->customer_address }}</p>
                    </div>
                </div>
            </div>

            <!-- Tracking Link Share & Danger Zone -->
            <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 shadow-xs space-y-4">
                <div>
                    <h4 class="font-serif-lux text-lg font-semibold text-[#4A301A] mb-1">Live Customer Tracking Link</h4>
                    <p class="text-[11px] text-[#8A6749] mb-3">Share this link so {{ explode(' ', $order->customer_name)[0] }} can track live parcel status anytime.</p>
                    <div class="flex items-center gap-2">
                        <a href="{{ $trackingUrl }}" target="_blank" class="flex-grow text-center py-2 px-3 rounded-xl bg-[#F3E7D9] hover:bg-[#E7D4BE] text-[#52351E] border border-[#DEC7AF] text-xs font-semibold transition-colors">
                            📦 Open Tracking Page ↗
                        </a>
                        <button type="button" onclick="copyTrackingLink('{{ $trackingUrl }}', this)" class="py-2 px-3.5 rounded-xl bg-[#6B4B32] hover:bg-[#573C27] text-white text-xs font-semibold transition-colors cursor-pointer">
                            Copy
                        </button>
                    </div>
                </div>

                <div class="pt-4 border-t border-[#EADBCC] flex items-center justify-between">
                    <span class="text-[11px] text-[#8A6749]">Need to remove this order?</span>
                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Permanently remove Order #{{ $order->order_number }}?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-600 text-rose-700 hover:text-white border border-rose-200 text-xs font-semibold transition-colors cursor-pointer">
                            🗑️ Delete Order
                        </button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>

<script>
function copyTrackingLink(url, btn) {
    navigator.clipboard.writeText(url).then(() => {
        const orig = btn.textContent;
        btn.textContent = 'Copied ✓';
        setTimeout(() => btn.textContent = orig, 1800);
    });
}
</script>

@endsection
