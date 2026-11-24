@extends('layouts.app')

@section('title', 'Order Confirmed — Islamic Crafts')

@section('content')

<!-- Stepper Bar (Step 3: Confirmation) -->
<div class="bg-[#F6ECE0] border-b border-[#EADBCC] py-3.5 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <div class="flex items-center space-x-2 sm:space-x-4 text-xs font-medium">
            <span class="text-[#8F6644] flex items-center space-x-1">
                <span>1. Shopping Bag</span>
                <span class="text-emerald-700 font-bold">✓</span>
            </span>
            <span class="text-[#CBB199]">/</span>
            <span class="text-[#8F6644] flex items-center space-x-1">
                <span>2. Delivery & Payment</span>
                <span class="text-emerald-700 font-bold">✓</span>
            </span>
            <span class="text-[#CBB199]">/</span>
            <div class="text-[#4A2F17] font-semibold flex items-center space-x-1 bg-[#FAF4ED] px-3 py-1 rounded-full border border-[#DFCBB7] shadow-2xs">
                <span class="w-4 h-4 rounded-full bg-emerald-700 text-white flex items-center justify-center text-[10px] font-bold">✓</span>
                <span>3. Order Confirmed</span>
            </div>
        </div>

        <div class="hidden sm:flex items-center space-x-2 text-xs text-emerald-800 font-medium">
            <span>🎉 Order Recorded Successfully</span>
        </div>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">
    
    <!-- Success Banner -->
    <div class="bg-gradient-to-br from-[#FAF4ED] via-[#F8F1E7] to-[#F3E8DB] border border-[#DECDBD] rounded-3xl p-8 sm:p-10 text-center shadow-sm mb-8">
        
        <!-- Big Checkmark -->
        <div class="w-16 h-16 sm:w-20 sm:h-20 mx-auto rounded-full bg-emerald-100 border-2 border-emerald-300 text-emerald-800 flex items-center justify-center text-3xl sm:text-4xl mb-4 shadow-sm">
            ✓
        </div>

        <div class="text-[#B38E6A] text-base mb-1">✦</div>
        <h1 class="font-serif-lux text-3xl sm:text-4xl text-[#4A2F17] font-normal mb-2 leading-tight">
            JazakAllah Khair! Order Placed <span class="text-[#8F6644] italic">♡</span>
        </h1>
        <p class="font-serif-lux italic text-base sm:text-lg text-[#7A5638] max-w-lg mx-auto mb-6">
            Thank you for choosing Islamic Crafts. Your handcrafted creations are being prepared with artisanal love and precision.
        </p>

        <!-- Order Number Badge -->
        <div class="inline-flex items-center space-x-2 bg-[#FAF4ED] border border-[#DFCBB7] rounded-full px-5 py-2 shadow-2xs">
            <span class="text-xs text-[#8A6749]">Order Tracking #:</span>
            <span class="font-mono text-xs sm:text-sm font-bold text-[#4A2F17]">{{ $order->order_number }}</span>
        </div>

        <!-- WhatsApp Sync Notification -->
        @if(session('wa_url'))
        <div class="mt-6 max-w-md mx-auto">
            <a href="{{ session('wa_url') }}" target="_blank" class="w-full py-3.5 px-6 rounded-full text-xs sm:text-sm font-semibold tracking-wide inline-flex items-center justify-center space-x-2 bg-[#25D366] hover:bg-[#1EBE5D] text-white transition-all shadow-md transform hover:scale-[1.02]">
                <span>💬</span>
                <span>Send Order Receipt to WhatsApp Now</span>
                <span>→</span>
            </a>
            <p class="text-[11px] text-[#8A6749] mt-2">
                Click above to instantly notify our artisan workshop on WhatsApp with your invoice!
            </p>
        </div>
        @endif
    </div>

    <!-- Order Details Invoice Card -->
    <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-8 shadow-xs mb-8" id="printable-invoice">
        
        <!-- Header info -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 border-b border-[#EADBCC] gap-4 mb-6">
            <div>
                <span class="font-serif-lux text-2xl font-medium text-[#4A2F17] italic">Islamic Crafts</span>
                <span class="block text-xs text-[#8A6749] mt-0.5">Handmade with love, crafted with elegance</span>
            </div>

            <div class="text-left sm:text-right text-xs text-[#7A5638] space-y-1">
                <div><strong>Date:</strong> {{ $order->created_at->format('d M, Y — h:i A') }}</div>
                <div><strong>Status:</strong> <span class="bg-amber-100 text-amber-800 font-semibold px-2 py-0.5 rounded-full text-[10px] uppercase">{{ $order->status }}</span></div>
            </div>
        </div>

        <!-- Customer & Delivery Summary -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pb-6 border-b border-[#EADBCC] mb-6 text-xs text-[#6F4B2E]">
            <div class="bg-[#F6ECE0] p-4 rounded-2xl border border-[#E8DACB]">
                <h4 class="font-semibold text-[#4A2F17] mb-2 text-sm flex items-center space-x-1">
                    <span>👤 Customer Information</span>
                </h4>
                <p><strong>Name:</strong> {{ $order->customer_name }}</p>
                <p class="mt-1"><strong>Phone:</strong> {{ $order->customer_phone }}</p>
                @if($order->customer_email)
                    <p class="mt-1"><strong>Email:</strong> {{ $order->customer_email }}</p>
                @endif
            </div>

            <div class="bg-[#F6ECE0] p-4 rounded-2xl border border-[#E8DACB]">
                <h4 class="font-semibold text-[#4A2F17] mb-2 text-sm flex items-center space-x-1">
                    <span>📍 Delivery Destination</span>
                </h4>
                <p><strong>City:</strong> {{ $order->city }}</p>
                <p class="mt-1"><strong>Address:</strong> {{ $order->customer_address }}</p>
                @if($order->notes)
                    <p class="mt-1 text-[11px] text-[#8F6644] italic"><strong>Notes:</strong> {{ $order->notes }}</p>
                @endif
            </div>
        </div>

        <!-- Items Table -->
        <div class="mb-6">
            <h4 class="font-serif-lux text-lg text-[#4A2F17] font-medium mb-3">Items Ordered</h4>
            <div class="divide-y divide-[#EADBCC] border-y border-[#EADBCC]">
                @foreach($order->items as $item)
                <div class="py-3.5 flex items-center justify-between gap-4 text-xs">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 rounded-xl bg-[#F2E5D6] border border-[#DECDBD] overflow-hidden flex-shrink-0 flex items-center justify-center text-lg">
                            @if($item->product && $item->product->primary_image_url)
                                <img src="{{ $item->product->primary_image_url }}" alt="{{ $item->product_name }}" class="w-full h-full object-cover">
                            @else
                                ✨
                            @endif
                        </div>
                        <div>
                            <span class="font-medium text-[#4A2F17] block text-sm">{{ $item->product_name }}</span>
                            <span class="text-[#8A6749]">Qty: {{ $item->quantity }} × Rs. {{ number_format($item->price, 0) }}</span>
                            @if($item->customization_details)
                                <span class="block text-[10px] text-[#8F6644] italic mt-0.5">✨ {{ $item->customization_details }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="font-semibold text-[#4A2F17] text-sm text-right">
                        Rs. {{ number_format($item->price * $item->quantity, 0) }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Total Breakdown -->
        <div class="flex justify-end text-xs text-[#6F4B2E]">
            <div class="w-full sm:w-64 space-y-2">
                <div class="flex justify-between">
                    <span>Subtotal:</span>
                    <span class="font-semibold">Rs. {{ number_format($order->total_amount, 0) }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Nationwide Delivery:</span>
                    <span class="font-medium text-emerald-800">FREE ✨</span>
                </div>
                <div class="border-t-2 border-[#DECDBD] pt-2 flex justify-between font-serif-lux text-xl font-bold text-[#4A2F17]">
                    <span>Total Amount:</span>
                    <span>Rs. {{ number_format($order->total_amount, 0) }}</span>
                </div>
            </div>
        </div>

    </div>

    <!-- Actions Bar -->
    <div class="flex flex-wrap items-center justify-between gap-4">
        <a href="{{ route('home') }}" class="btn-luxury px-6 py-3 rounded-full text-xs font-semibold tracking-wide inline-flex items-center space-x-2">
            <span>←</span>
            <span>Back to Home</span>
        </a>

        <div class="flex items-center space-x-3">
            <button type="button" onclick="window.print()" class="px-5 py-2.5 rounded-full text-xs font-semibold bg-[#FAF4ED] text-[#5C3D24] border border-[#DECDBD] hover:bg-[#EADBCC] transition-colors shadow-2xs">
                <span>🖨️ Print Receipt</span>
            </button>
            <a href="{{ route('products.index') }}" class="px-5 py-2.5 rounded-full text-xs font-semibold bg-[#FAF4ED] text-[#5C3D24] border border-[#DECDBD] hover:bg-[#EADBCC] transition-colors shadow-2xs">
                <span>Shop More</span>
            </a>
        </div>
    </div>

</div>

@endsection
