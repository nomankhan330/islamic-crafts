@extends('layouts.app')

@section('title', 'Your Shopping Bag ♡ — Islamic Crafts')

@section('content')

<!-- Breadcrumb -->
<div class="bg-[#F6ECE0] border-b border-[#EADBCC] py-3.5 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto flex items-center space-x-2 text-xs text-[#7A5638]">
        <a href="{{ route('home') }}" class="hover:text-[#4A2F17] transition-colors">Home</a>
        <span>/</span>
        <span class="text-[#4A2F17] font-medium">Shopping Bag</span>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">
    
    <!-- Section Header -->
    <div class="text-center max-w-xl mx-auto mb-10 sm:mb-12">
        <div class="text-[#B38E6A] text-lg mb-1">✦</div>
        <h1 class="font-serif-lux text-3xl sm:text-4xl lg:text-5xl text-[#4A2F17] font-normal mb-2 leading-tight">
            Shopping Bag <span class="text-[#8F6644] italic font-normal">♡</span>
        </h1>
        <p class="font-serif-lux italic text-base sm:text-lg text-[#7A5638]">
            Review your handcrafted selections before proceeding to checkout
        </p>
    </div>

    @if(empty($cart))
        <!-- Empty State (Luxury Design) -->
        <div class="max-w-2xl mx-auto bg-gradient-to-br from-[#FAF4ED] to-[#F5ECE1] border border-[#E8DACB] rounded-3xl p-10 sm:p-14 text-center shadow-[0_10px_30px_-5px_rgba(79,53,32,0.06)]">
            <div class="w-20 h-20 sm:w-24 sm:h-24 mx-auto rounded-full bg-[#EFE3D4] flex items-center justify-center text-4xl sm:text-5xl mb-6 shadow-inner text-[#7D5838]">
                🛍️
            </div>
            
            <h3 class="font-serif-lux text-2xl sm:text-3xl text-[#4A2F17] font-medium mb-3">
                Your shopping bag is empty
            </h3>
            
            <p class="text-xs sm:text-sm text-[#7A5638] max-w-md mx-auto mb-8 leading-relaxed">
                You haven't added any handcrafted items yet. Explore our bespoke resin keepsakes, everlasting florals, and cozy crochet collection.
            </p>

            <!-- Quick Category Explore Links -->
            <div class="flex flex-wrap justify-center gap-2.5 mb-8">
                <a href="{{ route('category.show', 'resin-collection') }}" class="px-4 py-2 rounded-full text-xs font-medium bg-[#FAF4ED] text-[#5C3D24] border border-[#DECDBD] hover:border-[#6B4B32] transition-colors">
                    ✨ Resin Collection
                </a>
                <a href="{{ route('category.show', 'floral-collection') }}" class="px-4 py-2 rounded-full text-xs font-medium bg-[#FAF4ED] text-[#5C3D24] border border-[#DECDBD] hover:border-[#6B4B32] transition-colors">
                    🌸 Floral Collection
                </a>
                <a href="{{ route('category.show', 'crochet-collection') }}" class="px-4 py-2 rounded-full text-xs font-medium bg-[#FAF4ED] text-[#5C3D24] border border-[#DECDBD] hover:border-[#6B4B32] transition-colors">
                    🧶 Crochet Collection
                </a>
            </div>

            <a href="{{ route('products.index') }}" class="btn-luxury inline-flex items-center space-x-2 px-8 py-3.5 rounded-full text-xs sm:text-sm font-semibold tracking-wide shadow-md hover:shadow-lg transform transition-all duration-300 hover:scale-105">
                <span>Explore All Crafts</span>
                <span>→</span>
            </a>
        </div>

    @else
        <!-- Cart Layout: 2 Columns (8 cols left + 4 cols right) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
            
            <!-- Left Column: Items Table / Card List (8 cols) -->
            <div class="lg:col-span-8 space-y-6">

                <!-- Free Delivery Progress Meter -->
                @php
                    $freeShippingThreshold = 2500;
                    $percentToFreeShipping = min(100, round(($total / $freeShippingThreshold) * 100));
                    $amountLeft = max(0, $freeShippingThreshold - $total);
                @endphp
                <div class="bg-gradient-to-r from-[#F6ECE0] via-[#F8F1E7] to-[#F1E4D3] border border-[#E4D4C3] rounded-2xl p-4 sm:p-5 shadow-2xs">
                    <div class="flex items-center justify-between text-xs sm:text-sm font-medium text-[#4A2F17] mb-2.5">
                        <div class="flex items-center space-x-2">
                            <span class="text-base">🚚</span>
                            @if($amountLeft > 0)
                                <span>Add <strong class="text-[#6B4B32] font-bold">Rs. {{ number_format($amountLeft, 0) }}</strong> more for <strong class="text-emerald-800">FREE Nationwide Delivery!</strong></span>
                            @else
                                <span class="text-emerald-800 font-bold">🎉 Congratulations! You qualify for FREE Nationwide Delivery!</span>
                            @endif
                        </div>
                        <span class="text-xs text-[#8F6644] font-semibold">{{ $percentToFreeShipping }}%</span>
                    </div>
                    <!-- Meter Bar -->
                    <div class="w-full bg-[#E5D5C4] rounded-full h-2 overflow-hidden">
                        <div class="bg-[#6B4B32] h-full rounded-full transition-all duration-500 ease-out" style="width: {{ $percentToFreeShipping }}%;"></div>
                    </div>
                </div>

                <!-- Cart Items Container -->
                <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl overflow-hidden shadow-xs">
                    <!-- Table Header on desktop -->
                    <div class="hidden sm:grid sm:grid-cols-12 gap-4 px-6 py-4 bg-[#F5ECE1] border-b border-[#EADBCC] text-xs font-semibold text-[#6B4B32] tracking-wider uppercase">
                        <div class="col-span-6">Handcrafted Item</div>
                        <div class="col-span-2 text-center">Price</div>
                        <div class="col-span-2 text-center">Quantity</div>
                        <div class="col-span-2 text-right">Subtotal</div>
                    </div>

                    <!-- Items Rows -->
                    <div class="divide-y divide-[#EADBCC]" id="cart-items-wrapper">
                        @foreach($cart as $key => $item)
                        <div class="p-5 sm:p-6 sm:grid sm:grid-cols-12 gap-4 items-center transition-colors hover:bg-[#F8F2E9]/60 cart-row" id="cart-row-{{ $key }}">
                            
                            <!-- Product Info (col 6) -->
                            <div class="sm:col-span-6 flex items-start sm:items-center space-x-4 mb-4 sm:mb-0">
                                <!-- Image with Silk Frame -->
                                <div class="w-20 h-20 sm:w-22 sm:h-22 rounded-2xl bg-[#F2E5D6] border border-[#DECDBD] overflow-hidden flex-shrink-0 relative group">
                                    @if(!empty($item['image']))
                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-108">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-3xl">
                                            {{ $item['icon'] ?? '✨' }}
                                        </div>
                                    @endif
                                </div>

                                <div class="flex-grow min-w-0">
                                    <span class="inline-block text-[10px] tracking-wider uppercase font-semibold text-[#8F6644] bg-[#F5ECE1] px-2 py-0.5 rounded-full mb-1">
                                        {{ $item['category'] ?? 'Craft' }}
                                    </span>

                                    <h4 class="font-serif-lux text-base sm:text-lg text-[#4A2F17] font-medium leading-snug truncate">
                                        @if(!empty($item['slug']))
                                            <a href="{{ route('products.show', $item['slug']) }}" class="hover:text-[#8F6644] transition-colors">
                                                {{ $item['name'] }}
                                            </a>
                                        @else
                                            {{ $item['name'] }}
                                        @endif
                                    </h4>

                                    @if(!empty($item['customization']))
                                        <div class="text-[11px] text-[#8F6644] italic bg-[#FAF4ED] border border-[#DECDBD] rounded-lg px-2.5 py-1 mt-1.5 inline-block">
                                            ✨ {{ $item['customization'] }}
                                        </div>
                                    @endif

                                    <!-- Mobile Price & Remove link -->
                                    <div class="flex sm:hidden items-center justify-between mt-2 pt-2 border-t border-[#EADBCC]/60 text-xs text-[#7A5638]">
                                        <span>Unit: Rs. {{ number_format($item['price'], 0) }}</span>
                                        <form action="{{ route('cart.remove', $key) }}" method="POST" class="ajax-cart-remove" data-key="{{ $key }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-rose-700 hover:text-rose-900 font-medium text-xs">
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Unit Price (col 2) -->
                            <div class="hidden sm:block sm:col-span-2 text-center text-xs sm:text-sm font-medium text-[#6B4B32]">
                                Rs. {{ number_format($item['price'], 0) }}
                            </div>

                            <!-- Quantity Stepper Controls (col 2) -->
                            <div class="sm:col-span-2 flex items-center justify-between sm:justify-center my-3 sm:my-0">
                                <span class="sm:hidden text-xs text-[#7A5638] font-medium">Quantity:</span>

                                <div class="inline-flex items-center border border-[#DECDBD] rounded-full bg-[#FAF4ED] shadow-2xs overflow-hidden">
                                    <button type="button" 
                                            class="qty-stepper-btn px-2.5 py-1 text-xs text-[#5C3D24] hover:bg-[#EADBCC] transition-colors focus:outline-none" 
                                            data-action="decrease" 
                                            data-key="{{ $key }}"
                                            title="Decrease quantity">
                                        −
                                    </button>

                                    <span class="qty-display w-8 text-center text-xs font-semibold text-[#4A2F17]" id="qty-val-{{ $key }}">
                                        {{ $item['quantity'] }}
                                    </span>

                                    <button type="button" 
                                            class="qty-stepper-btn px-2.5 py-1 text-xs text-[#5C3D24] hover:bg-[#EADBCC] transition-colors focus:outline-none" 
                                            data-action="increase" 
                                            data-key="{{ $key }}"
                                            title="Increase quantity">
                                        +
                                    </button>
                                </div>
                            </div>

                            <!-- Subtotal & Remove (col 2) -->
                            <div class="sm:col-span-2 flex items-center justify-between sm:justify-end sm:space-x-4">
                                <span class="sm:hidden text-xs text-[#7A5638] font-medium">Subtotal:</span>

                                <div class="text-right">
                                    <div class="font-serif-lux text-base sm:text-lg font-semibold text-[#4A2F17]" id="subtotal-val-{{ $key }}">
                                        Rs. {{ number_format($item['price'] * $item['quantity'], 0) }}
                                    </div>
                                </div>

                                <!-- Desktop Delete Button -->
                                <form action="{{ route('cart.remove', $key) }}" method="POST" class="hidden sm:block ajax-cart-remove" data-key="{{ $key }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-[#A58D76] hover:text-rose-600 hover:bg-rose-50 rounded-full transition-colors" title="Remove item">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>

                        </div>
                        @endforeach
                    </div>

                    <!-- Cart Footer Actions -->
                    <div class="px-6 py-4 bg-[#F5ECE1] border-t border-[#EADBCC] flex flex-col sm:flex-row items-center justify-between gap-4">
                        <a href="{{ route('products.index') }}" class="inline-flex items-center space-x-2 text-xs font-semibold text-[#6B4B32] hover:text-[#4A2F17] transition-colors">
                            <span>←</span>
                            <span>Continue Browsing Handcrafted Items</span>
                        </a>

                        <div class="flex items-center space-x-2 text-xs text-[#8A6749]">
                            <span class="text-emerald-700">✓</span>
                            <span>Handmade with pure elegance & careful packaging</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column: Sticky Luxury Order Summary Card (4 cols) -->
            <div class="lg:col-span-4">
                <div class="bg-gradient-to-br from-[#FAF4ED] via-[#F8F1E7] to-[#F3E8DB] border border-[#DECDBD] rounded-3xl p-6 sm:p-7 shadow-sm sticky top-28">
                    
                    <!-- Header -->
                    <div class="flex items-center justify-between pb-4 border-b border-[#E8DACB] mb-5">
                        <h3 class="font-serif-lux text-2xl text-[#4A2F17] font-medium flex items-center space-x-1.5">
                            <span>Order Summary</span>
                            <span class="text-lg text-[#8F6644]">♡</span>
                        </h3>
                        <span class="text-xs text-[#8F6644] font-medium" id="summary-items-count">
                            {{ count($cart) }} {{ count($cart) === 1 ? 'item' : 'items' }}
                        </span>
                    </div>

                    <!-- Breakdown Table -->
                    <div class="space-y-3.5 text-xs text-[#6F4B2E] mb-6">
                        <div class="flex justify-between items-center">
                            <span>Bag Subtotal</span>
                            <span class="font-semibold text-sm text-[#4A2F17]" id="summary-subtotal">
                                Rs. {{ number_format($total, 0) }}
                            </span>
                        </div>

                        <div class="flex justify-between items-center">
                            <span>Nationwide Delivery</span>
                            <span class="font-medium text-emerald-800" id="summary-shipping">
                                @if($total >= 2500)
                                    FREE (Over Rs. 2,500)
                                @else
                                    Calculated at Checkout
                                @endif
                            </span>
                        </div>

                        <div class="flex justify-between items-center text-[11px] text-[#8F6644]">
                            <span>Packaging & Handling</span>
                            <span class="italic">Gift-Grade Included (Free)</span>
                        </div>

                        <!-- Promo Code Dropdown/Accordion -->
                        <div class="pt-3 border-t border-[#E8DACB]/60">
                            <label class="block text-[11px] font-semibold text-[#5C3D24] mb-1.5">Have a Coupon or Voucher Code?</label>
                            <div class="flex items-center space-x-2">
                                <input type="text" placeholder="e.g. ELEGANCE10" class="flex-grow bg-[#FAF4ED] border border-[#DFCBB7] rounded-xl px-3 py-2 text-xs uppercase text-[#4A2F17] outline-none focus:border-[#6B4B32]">
                                <button type="button" onclick="alert('Coupon feature will be verified during final checkout payment.')" class="px-3.5 py-2 rounded-xl text-xs font-semibold bg-[#EADBCC] hover:bg-[#6B4B32] hover:text-white text-[#5C3D24] transition-colors">
                                    Apply
                                </button>
                            </div>
                        </div>

                        <!-- Grand Total -->
                        <div class="border-t-2 border-[#DECDBD] pt-4 flex justify-between items-center">
                            <div>
                                <span class="font-serif-lux text-xl sm:text-2xl text-[#4A2F17] font-semibold block leading-tight">
                                    Estimated Total
                                </span>
                                <span class="text-[10px] text-[#8A6749]">Includes all applicable crafts tax</span>
                            </div>
                            <span class="font-serif-lux text-2xl sm:text-3xl text-[#52351E] font-bold" id="summary-grand-total">
                                Rs. {{ number_format($total, 0) }}
                            </span>
                        </div>
                    </div>

                    <!-- Call to Action Buttons -->
                    <div class="space-y-3">
                        <a href="{{ route('checkout') }}" class="btn-luxury w-full py-3.5 px-4 rounded-full text-xs sm:text-sm font-semibold tracking-wide text-center block shadow-md hover:shadow-lg transform transition-all duration-300 hover:scale-[1.02]">
                            Proceed to Checkout →
                        </a>

                        <!-- Direct WhatsApp 1-Click Order Link -->
                        <a href="https://wa.me/923001234567?text=Assalam-o-Alaikum!%20I%20want%20to%20confirm%20my%20order%20from%20Islamic%20Crafts%20for%20total%20Rs.%20{{ number_format($total, 0) }}" target="_blank" class="w-full py-3 px-4 rounded-full text-xs font-semibold tracking-wide text-center inline-flex items-center justify-center space-x-2 bg-[#25D366] hover:bg-[#1EBE5D] text-white transition-all shadow-sm">
                            <span>💬</span>
                            <span>Order Directly on WhatsApp</span>
                        </a>
                    </div>

                    <!-- Security and Quality Trust Badges -->
                    <div class="mt-6 pt-5 border-t border-[#E8DACB] space-y-2.5 text-[11px] text-[#7A5638]">
                        <div class="flex items-center space-x-2">
                            <span class="text-xs">🔒</span>
                            <span>256-Bit SSL Encrypted & Secure Checkout</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-xs">🚚</span>
                            <span>Nationwide Delivery via Trusted Couriers</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-xs">✨</span>
                            <span>Handmade with Love & Fragile Packaging</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Cross-Sell: "You May Also Love ♡" Section -->
        @if(!empty($recommendedProducts) && $recommendedProducts->count() > 0)
        <div class="mt-16 sm:mt-20 pt-12 border-t border-[#EADBCC]">
            <div class="text-center mb-10">
                <div class="flex items-center justify-center space-x-4 mb-1">
                    <div class="h-[1px] w-12 sm:w-20 bg-[#D4C1AB]"></div>
                    <h2 class="font-serif-lux italic text-2xl sm:text-3xl text-[#52351E] font-normal tracking-wide">
                        You May Also Adore
                    </h2>
                    <div class="h-[1px] w-12 sm:w-20 bg-[#D4C1AB]"></div>
                </div>
                <p class="text-xs text-[#8A6749]">Handcrafted gems that pair beautifully with your current bag</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
                @foreach($recommendedProducts as $recProduct)
                <div class="product-card rounded-2xl overflow-hidden flex flex-col justify-between group">
                    <div class="relative bg-[#F3E8DB] aspect-square flex items-center justify-center overflow-hidden">
                        @if($recProduct->primary_image_url)
                            <img src="{{ $recProduct->primary_image_url }}" alt="{{ $recProduct->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                            <span class="text-4xl">{{ $recProduct->category->icon ?? '✨' }}</span>
                        @endif
                    </div>

                    <div class="p-3.5 sm:p-4 text-center flex flex-col items-center flex-grow justify-between">
                        <div class="mb-3">
                            <h4 class="font-serif-lux text-sm sm:text-base text-[#52351E] font-medium line-clamp-1 mb-0.5">
                                <a href="{{ route('products.show', $recProduct->slug) }}" class="hover:text-[#8F6644]">
                                    {{ $recProduct->name }}
                                </a>
                            </h4>
                            <div class="text-xs font-semibold text-[#785539]">
                                Rs. {{ number_format($recProduct->current_price, 0) }}
                            </div>
                        </div>

                        <form action="{{ route('cart.add') }}" method="POST" class="w-full ajax-add-cart">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $recProduct->id }}">
                            <button type="submit" class="w-full btn-luxury py-2 px-3 rounded-xl text-xs font-medium tracking-wide">
                                + Add to Bag
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    @endif

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

        // --- Stepper Quantity Adjustment via AJAX ---
        document.querySelectorAll('.qty-stepper-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const action = this.getAttribute('data-action');
                const key = this.getAttribute('data-key');
                const qtyDisplay = document.getElementById('qty-val-' + key);
                if (!qtyDisplay) return;

                let currentQty = parseInt(qtyDisplay.textContent.trim()) || 1;
                let newQty = action === 'increase' ? currentQty + 1 : currentQty - 1;

                if (newQty < 1) {
                    if (confirm('Remove this item from your bag?')) {
                        removeCartItem(key);
                    }
                    return;
                }

                // Call server via fetch
                fetch("{{ url('cart/update') }}/" + key, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ quantity: newQty })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        qtyDisplay.textContent = data.item_quantity;
                        const subtotalEl = document.getElementById('subtotal-val-' + key);
                        if (subtotalEl) subtotalEl.textContent = data.item_subtotal;

                        const summarySubtotal = document.getElementById('summary-subtotal');
                        if (summarySubtotal) summarySubtotal.textContent = data.formatted_total;

                        const summaryGrand = document.getElementById('summary-grand-total');
                        if (summaryGrand) summaryGrand.textContent = data.formatted_total;

                        // Update navbar count
                        const navCount = document.getElementById('nav-cart-count');
                        if (navCount) navCount.textContent = data.count;
                    }
                })
                .catch(err => {
                    console.error('Update error:', err);
                    location.reload();
                });
            });
        });

        // --- Remove Item via AJAX ---
        function removeCartItem(key) {
            fetch("{{ url('cart/remove') }}/" + key, {
                method: 'DELETE',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const row = document.getElementById('cart-row-' + key);
                    if (row) {
                        row.style.opacity = '0';
                        setTimeout(() => {
                            row.remove();
                            if (data.cart_empty) {
                                location.reload();
                            } else {
                                const summarySubtotal = document.getElementById('summary-subtotal');
                                if (summarySubtotal) summarySubtotal.textContent = data.formatted_total;
                                const summaryGrand = document.getElementById('summary-grand-total');
                                if (summaryGrand) summaryGrand.textContent = data.formatted_total;
                                const navCount = document.getElementById('nav-cart-count');
                                if (navCount) navCount.textContent = data.count;
                            }
                        }, 300);
                    }
                }
            })
            .catch(err => {
                console.error('Remove error:', err);
                location.reload();
            });
        }

        document.querySelectorAll('.ajax-cart-remove').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const key = this.getAttribute('data-key');
                if (confirm('Are you sure you want to remove this item?')) {
                    removeCartItem(key);
                }
            });
        });
    });
</script>
@endpush

@endsection
