@extends('layouts.app')

@section('title', 'Track Your Order — Islamic Crafts')

@section('content')
@php
    $waNumber = \App\Models\StoreSetting::getValue('whatsapp_number', env('WHATSAPP_NUMBER', '923001234567'));
    $cleanWa = preg_replace('/[^0-9]/', '', $waNumber);
@endphp

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">

    <!-- Luxury Header -->
    <div class="relative rounded-[2rem] bg-gradient-to-br from-[#FAF3EA] via-[#F5EADC] to-[#EFE0CE] border border-[#E2CEB9] px-6 py-10 sm:px-12 text-center shadow-sm mb-10 overflow-hidden">
        <div class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-full bg-[#FBF6EE]/90 border border-[#DFCBB7] text-[10px] font-semibold uppercase tracking-[0.2em] text-[#7D5838] mb-4">
            <span>📦</span>
            <span>Live Order Tracking</span>
        </div>
        <h1 class="font-serif-lux italic text-4xl sm:text-5xl text-[#4A2D16] font-normal mb-2">
            Track Your Keepsake <span class="text-[#9E7248]">♡</span>
        </h1>
        <p class="text-xs sm:text-sm text-[#7D5A3C] max-w-lg mx-auto mb-7">
            Enter your Order Number (e.g. <span class="font-mono font-semibold text-[#58381C]">IC-2026-0001</span>) to see live handcrafting & courier delivery status.
        </p>

        <form method="GET" action="{{ route('orders.track') }}" class="max-w-2xl mx-auto grid grid-cols-1 sm:grid-cols-12 gap-3">
            <input type="text"
                   name="order_number"
                   value="{{ $orderNumber }}"
                   required
                   placeholder="Order # (e.g. IC-2026-0001)"
                   class="sm:col-span-5 bg-[#FBF6EE] border border-[#DFCBB7] focus:border-[#6B4B32] rounded-full px-5 py-3 text-xs sm:text-sm text-[#4A2F17] outline-none">
            <input type="tel"
                   name="phone"
                   value="{{ $phone }}"
                   placeholder="Phone Number (Optional)"
                   class="sm:col-span-4 bg-[#FBF6EE] border border-[#DFCBB7] focus:border-[#6B4B32] rounded-full px-5 py-3 text-xs sm:text-sm text-[#4A2F17] outline-none">
            <button type="submit" class="sm:col-span-3 btn-luxury rounded-full py-3 px-6 text-xs font-semibold shadow-sm cursor-pointer">
                Track Order →
            </button>
        </form>
    </div>

    @if($error)
        <div class="rounded-2xl bg-rose-50 border border-rose-200 p-5 text-center text-xs sm:text-sm text-rose-800 mb-8">
            <span class="text-lg block mb-1">🔍</span>
            {{ $error }}
        </div>
    @endif

    @if($order)
        @php
            $steps = [
                'pending' => ['label' => 'Order Placed', 'icon' => '📝', 'desc' => 'Received by our studio'],
                'confirmed' => ['label' => 'Confirmed & Crafting', 'icon' => '✨', 'desc' => 'Artisans are preparing your piece'],
                'shipped' => ['label' => 'Shipped via Courier', 'icon' => '🚚', 'desc' => 'Dispatched safely across Pakistan'],
                'delivered' => ['label' => 'Delivered', 'icon' => '🎁', 'desc' => 'Arrived at your doorstep'],
            ];
            $orderRanks = ['pending' => 0, 'confirmed' => 1, 'shipped' => 2, 'delivered' => 3];
            $currentRank = $orderRanks[$order->status] ?? -1;
        @endphp

        <div class="rounded-[2rem] bg-[#FAF4ED] border border-[#E2CEB9] p-6 sm:p-9 shadow-sm space-y-8">
            <!-- Order Top Bar -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-5 border-b border-[#EADBCC]">
                <div>
                    <span class="text-[10px] font-semibold uppercase tracking-widest text-[#9A714C]">Order Reference</span>
                    <h2 class="font-serif-lux text-3xl text-[#4A2D16] font-semibold">#{{ $order->order_number }}</h2>
                    <p class="text-xs text-[#7D5A3C] mt-0.5">Placed on {{ $order->created_at->format('d F Y \a\t h:i A') }} • {{ $order->city }}</p>
                </div>
                <div class="text-left sm:text-right">
                    <span class="inline-block px-4 py-1.5 rounded-full text-xs font-semibold {{ $order->status === 'cancelled' ? 'bg-rose-100 text-rose-800 border border-rose-200' : 'bg-emerald-100 text-emerald-800 border border-emerald-200' }}">
                        Status: {{ ucfirst($order->status) }}
                    </span>
                    <p class="text-sm font-bold text-[#4A2D16] mt-1.5">Total: Rs. {{ number_format($order->total_amount, 0) }}</p>
                </div>
            </div>

            <!-- Visual 4-Step Progress Timeline -->
            @if($order->status === 'cancelled')
                <div class="rounded-2xl bg-rose-50 border border-rose-200 p-5 text-center text-xs text-rose-800">
                    This order has been marked as <strong>Cancelled</strong>. Please reach out on WhatsApp if you need any assistance.
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                    @foreach(array_values($steps) as $idx => $step)
                        @php $done = $idx <= $currentRank; @endphp
                        <div class="relative rounded-2xl p-4 border text-center transition-all {{ $done ? 'bg-gradient-to-br from-[#FBF6EE] to-[#F3E5D5] border-[#C6A47E] shadow-2xs' : 'bg-[#F5ECE1]/50 border-[#E8DACB] opacity-60' }}">
                            <div class="w-11 h-11 mx-auto rounded-full flex items-center justify-center text-lg mb-2.5 {{ $done ? 'bg-[#6B4B32] text-white shadow-sm' : 'bg-[#EADBCC] text-[#8A6749]' }}">
                                {{ $done && $idx < $currentRank ? '✓' : $step['icon'] }}
                            </div>
                            <h3 class="text-xs font-bold text-[#4A2D16] mb-0.5">{{ $step['label'] }}</h3>
                            <p class="text-[11px] text-[#7D5A3C]">{{ $step['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Items Included -->
            <div>
                <h3 class="font-serif-lux text-xl text-[#4A2D16] font-medium mb-3">Items in Your Parcel</h3>
                <div class="divide-y divide-[#EFE2D4] border border-[#E8DACB] rounded-2xl bg-[#FBF6EE] px-4">
                    @foreach($order->items as $item)
                    <div class="py-3.5 flex items-center justify-between gap-3 text-xs">
                        <div>
                            <p class="font-semibold text-[#4A2D16]">{{ $item->product_name }}</p>
                            <p class="text-[11px] text-[#8A6749]">Qty: {{ $item->quantity }} × Rs. {{ number_format($item->price, 0) }}</p>
                        </div>
                        <span class="font-bold text-[#52351E]">Rs. {{ number_format($item->price * $item->quantity, 0) }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Need Help Footer -->
            <div class="pt-4 border-t border-[#EADBCC] flex flex-col sm:flex-row items-center justify-between gap-3">
                <p class="text-xs text-[#7D5A3C]">Questions about your parcel or delivery timing?</p>
                <a href="https://wa.me/{{ $cleanWa }}?text={{ urlencode("Assalam-o-Alaikum! I am checking status for my Order #{$order->order_number}.") }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="inline-flex items-center space-x-2 px-5 py-2.5 rounded-full bg-[#25D366] hover:bg-[#1EBE5D] text-white text-xs font-semibold shadow-sm transition-all">
                    <span>💬</span>
                    <span>Chat on WhatsApp</span>
                </a>
            </div>
        </div>
    @endif

</div>
@endsection
