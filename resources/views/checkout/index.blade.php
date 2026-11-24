@extends('layouts.app')

@section('title', 'Secure Checkout — Islamic Crafts')

@section('content')

<!-- Checkout Step Tracker -->
<div class="bg-[#F6ECE0] border-b border-[#EADBCC] py-3.5 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <!-- Breadcrumb / Stepper -->
        <div class="flex items-center space-x-2 sm:space-x-4 text-xs font-medium">
            <a href="{{ route('cart.index') }}" class="text-[#8F6644] hover:text-[#4A2F17] flex items-center space-x-1 transition-colors">
                <span class="w-4 h-4 rounded-full bg-[#EADBCC] text-[#4A2F17] flex items-center justify-center text-[10px] font-bold">1</span>
                <span>Shopping Bag</span>
                <span class="text-emerald-700 font-bold">✓</span>
            </a>
            <span class="text-[#CBB199]">/</span>
            <div class="text-[#4A2F17] font-semibold flex items-center space-x-1 bg-[#FAF4ED] px-3 py-1 rounded-full border border-[#DFCBB7] shadow-2xs">
                <span class="w-4 h-4 rounded-full bg-[#6B4B32] text-white flex items-center justify-center text-[10px] font-bold">2</span>
                <span>Delivery & Payment</span>
            </div>
            <span class="text-[#CBB199]">/</span>
            <div class="text-[#A58D76] flex items-center space-x-1">
                <span class="w-4 h-4 rounded-full bg-[#EADBCC] text-[#A58D76] flex items-center justify-center text-[10px]">3</span>
                <span>Confirmation</span>
            </div>
        </div>

        <div class="hidden sm:flex items-center space-x-2 text-xs text-[#8A6749]">
            <span>🔒 256-Bit SSL Encrypted</span>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">
    
    <!-- Section Title -->
    <div class="text-center max-w-xl mx-auto mb-10 sm:mb-12">
        <div class="text-[#B38E6A] text-lg mb-1">✦</div>
        <h1 class="font-serif-lux text-3xl sm:text-4xl lg:text-5xl text-[#4A2F17] font-normal mb-2 leading-tight">
            Checkout <span class="text-[#8F6644] italic font-normal">♡</span>
        </h1>
        <p class="font-serif-lux italic text-base sm:text-lg text-[#7A5638]">
            Enter your delivery details to receive your handcrafted treasures
        </p>
    </div>

    <!-- 2 Column Checkout Layout (7 cols left + 5 cols right) -->
    <form action="{{ route('order.place') }}" method="POST" id="checkout-main-form" class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
        @csrf
        
        <!-- Left Column: Delivery Form & Payment Choice (7 cols) -->
        <div class="lg:col-span-7 space-y-6">
            
            <!-- Card 1: Customer Contact & Delivery Info -->
            <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-8 shadow-xs">
                <div class="flex items-center justify-between pb-4 border-b border-[#EADBCC] mb-6">
                    <div class="flex items-center space-x-2.5">
                        <span class="w-8 h-8 rounded-xl bg-[#F4ECE1] text-[#6B4B32] border border-[#DFCBB7] flex items-center justify-center text-sm shadow-2xs">
                            📍
                        </span>
                        <h2 class="font-serif-lux text-xl sm:text-2xl text-[#4A2F17] font-medium">
                            1. Delivery Address
                        </h2>
                    </div>
                    <span class="text-[11px] text-[#8F6644] italic">Tracked across Pakistan</span>
                </div>

                <div class="space-y-4">
                    <!-- Full Name -->
                    <div>
                        <label for="name" class="block text-xs font-semibold text-[#5C3D24] mb-1.5">
                            Full Name <span class="text-rose-600">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   required 
                                   placeholder="e.g. Ayesha Khan" 
                                   value="{{ old('name') }}"
                                   class="w-full bg-[#FAF4ED] border border-[#DFCBB7] focus:border-[#6B4B32] rounded-xl px-4 py-3 text-xs sm:text-sm text-[#4A2F17] outline-none shadow-2xs transition-colors">
                        </div>
                    </div>

                    <!-- Phone & Email Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Phone / WhatsApp -->
                        <div>
                            <label for="phone" class="block text-xs font-semibold text-[#5C3D24] mb-1.5 flex items-center justify-between">
                                <span>WhatsApp / Mobile No. <span class="text-rose-600">*</span></span>
                                <span class="text-[10px] text-[#25D366] font-normal">SMS & WhatsApp alerts</span>
                            </label>
                            <input type="tel" 
                                   name="phone" 
                                   id="phone" 
                                   required 
                                   placeholder="e.g. 03001234567" 
                                   value="{{ old('phone') }}"
                                   class="w-full bg-[#FAF4ED] border border-[#DFCBB7] focus:border-[#6B4B32] rounded-xl px-4 py-3 text-xs sm:text-sm text-[#4A2F17] outline-none shadow-2xs transition-colors">
                        </div>

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-xs font-semibold text-[#5C3D24] mb-1.5">
                                Email Address <span class="text-xs text-[#8A6749] font-normal">(Optional)</span>
                            </label>
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   placeholder="e.g. ayesha@example.com" 
                                   value="{{ old('email') }}"
                                   class="w-full bg-[#FAF4ED] border border-[#DFCBB7] focus:border-[#6B4B32] rounded-xl px-4 py-3 text-xs sm:text-sm text-[#4A2F17] outline-none shadow-2xs transition-colors">
                        </div>
                    </div>

                    <!-- City Selection with Quick Pills -->
                    <div>
                        <label for="city" class="block text-xs font-semibold text-[#5C3D24] mb-1.5">
                            City / Town <span class="text-rose-600">*</span>
                        </label>
                        <input type="text" 
                               name="city" 
                               id="city" 
                               required 
                               placeholder="e.g. Lahore / Karachi / Islamabad" 
                               value="{{ old('city') }}"
                               class="w-full bg-[#FAF4ED] border border-[#DFCBB7] focus:border-[#6B4B32] rounded-xl px-4 py-3 text-xs sm:text-sm text-[#4A2F17] outline-none shadow-2xs transition-colors mb-2">
                        
                        <!-- Quick City Selector Chips -->
                        <div class="flex flex-wrap gap-1.5 pt-1" id="quick-city-chips">
                            <span class="text-[11px] text-[#8A6749] py-1 mr-1">Quick Select:</span>
                            @foreach(['Lahore', 'Karachi', 'Islamabad', 'Rawalpindi', 'Faisalabad', 'Multan', 'Peshawar', 'Sialkot'] as $qCity)
                            <button type="button" 
                                    class="city-chip px-2.5 py-1 rounded-full text-[11px] font-medium bg-[#F6ECE0] hover:bg-[#6B4B32] hover:text-white text-[#5C3D24] border border-[#E0CFBD] transition-all"
                                    data-city="{{ $qCity }}">
                                {{ $qCity }}
                            </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Full Delivery Address -->
                    <div>
                        <label for="address" class="block text-xs font-semibold text-[#5C3D24] mb-1.5">
                            Complete Street Address <span class="text-rose-600">*</span>
                        </label>
                        <textarea name="address" 
                                  id="address" 
                                  rows="3" 
                                  required 
                                  placeholder="House/Apartment #, Street/Lane #, Sector/Area, Nearby famous landmark..." 
                                  class="w-full bg-[#FAF4ED] border border-[#DFCBB7] focus:border-[#6B4B32] rounded-xl p-3 text-xs sm:text-sm text-[#4A2F17] outline-none shadow-2xs transition-colors">{{ old('address') }}</textarea>
                    </div>

                    <!-- Order Notes -->
                    <div>
                        <label for="notes" class="block text-xs font-semibold text-[#5C3D24] mb-1.5">
                            Special Order Instructions <span class="text-xs text-[#8A6749] font-normal">(Optional)</span>
                        </label>
                        <textarea name="notes" 
                                  id="notes" 
                                  rows="2" 
                                  placeholder="e.g. Delivery timings preference, custom gift greeting note, or event date..." 
                                  class="w-full bg-[#FAF4ED] border border-[#DFCBB7] focus:border-[#6B4B32] rounded-xl p-3 text-xs text-[#4A2F17] outline-none shadow-2xs transition-colors">{{ old('notes') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Card 2: Payment Method Choice -->
            <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-8 shadow-xs">
                <div class="flex items-center justify-between pb-4 border-b border-[#EADBCC] mb-6">
                    <div class="flex items-center space-x-2.5">
                        <span class="w-8 h-8 rounded-xl bg-[#F4ECE1] text-[#6B4B32] border border-[#DFCBB7] flex items-center justify-center text-sm shadow-2xs">
                            💳
                        </span>
                        <h2 class="font-serif-lux text-xl sm:text-2xl text-[#4A2F17] font-medium">
                            2. Payment Method
                        </h2>
                    </div>
                    <span class="text-[11px] text-[#8F6644] italic">Safe & Transparent</span>
                </div>

                <div class="space-y-3">
                    
                    <!-- Option 1: Cash on Delivery (COD) -->
                    <label class="relative flex items-start space-x-3.5 p-4 rounded-2xl border-2 border-[#6B4B32] bg-[#FAF4ED] cursor-pointer transition-all hover:bg-[#F8F1E7] payment-option-card">
                        <input type="radio" name="payment_method" value="cod" checked class="mt-1 text-[#6B4B32] focus:ring-[#6B4B32]">
                        <div class="flex-grow">
                            <div class="flex items-center justify-between">
                                <span class="font-semibold text-xs sm:text-sm text-[#4A2F17] flex items-center space-x-1.5">
                                    <span>💵 Cash on Delivery (COD)</span>
                                </span>
                                <span class="text-[10px] bg-emerald-100 text-emerald-800 font-bold px-2 py-0.5 rounded-full">
                                    Most Popular
                                </span>
                            </div>
                            <p class="text-xs text-[#7A5638] mt-1">
                                Pay cash safely to the courier delivery rider when your package arrives at your home.
                            </p>
                        </div>
                    </label>

                    <!-- Option 2: Direct Bank Transfer / Raast / JazzCash -->
                    <label class="relative flex items-start space-x-3.5 p-4 rounded-2xl border border-[#DFCBB7] bg-[#FAF4ED] cursor-pointer transition-all hover:bg-[#F8F1E7] payment-option-card">
                        <input type="radio" name="payment_method" value="bank" class="mt-1 text-[#6B4B32] focus:ring-[#6B4B32]">
                        <div class="flex-grow">
                            <div class="flex items-center justify-between">
                                <span class="font-semibold text-xs sm:text-sm text-[#4A2F17]">
                                    🏦 Online Bank Transfer / Raast / JazzCash
                                </span>
                            </div>
                            <p class="text-xs text-[#7A5638] mt-1">
                                Transfer from your bank app (Meezan / HBL / Nayapay / JazzCash). Account details will appear on the receipt.
                            </p>
                        </div>
                    </label>

                    <!-- Option 3: WhatsApp Guided Checkout -->
                    <label class="relative flex items-start space-x-3.5 p-4 rounded-2xl border border-[#DFCBB7] bg-[#FAF4ED] cursor-pointer transition-all hover:bg-[#F8F1E7] payment-option-card">
                        <input type="radio" name="payment_method" value="whatsapp" class="mt-1 text-[#6B4B32] focus:ring-[#6B4B32]">
                        <div class="flex-grow">
                            <div class="flex items-center justify-between">
                                <span class="font-semibold text-xs sm:text-sm text-[#4A2F17] flex items-center space-x-1">
                                    <span>💬 1-Click WhatsApp Guided Confirmation</span>
                                </span>
                                <span class="text-[10px] bg-[#25D366]/20 text-[#128C7E] font-bold px-2 py-0.5 rounded-full">
                                    Direct Chat
                                </span>
                            </div>
                            <p class="text-xs text-[#7A5638] mt-1">
                                Order will be recorded and sent to WhatsApp where our artisan team can verify custom names & dates with you.
                            </p>
                        </div>
                    </label>

                </div>
            </div>

            <!-- Buyer Assurance Mini-Strip -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-1">
                <div class="flex items-center space-x-2.5 p-3 rounded-2xl bg-[#F6ECE0] border border-[#E8DACB] text-xs text-[#5C3D24]">
                    <span class="text-base">🔒</span>
                    <div>
                        <strong class="block text-[#4A2F17]">100% Secure</strong>
                        <span class="text-[11px] text-[#8A6749]">Private Checkout</span>
                    </div>
                </div>
                <div class="flex items-center space-x-2.5 p-3 rounded-2xl bg-[#F6ECE0] border border-[#E8DACB] text-xs text-[#5C3D24]">
                    <span class="text-base">📦</span>
                    <div>
                        <strong class="block text-[#4A2F17]">Safe Packaging</strong>
                        <span class="text-[11px] text-[#8A6749]">Fragile Bubble Wrap</span>
                    </div>
                </div>
                <div class="flex items-center space-x-2.5 p-3 rounded-2xl bg-[#F6ECE0] border border-[#E8DACB] text-xs text-[#5C3D24]">
                    <span class="text-base">🚚</span>
                    <div>
                        <strong class="block text-[#4A2F17]">Fast Dispatch</strong>
                        <span class="text-[11px] text-[#8A6749]">Tracked Courier</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column: Sticky Order Summary & Placed Items (5 cols) -->
        <div class="lg:col-span-5">
            <div class="bg-gradient-to-br from-[#FAF4ED] via-[#F8F1E7] to-[#F3E8DB] border border-[#DECDBD] rounded-3xl p-6 sm:p-7 shadow-sm sticky top-28 space-y-6">
                
                <!-- Card Header -->
                <div class="flex items-center justify-between pb-4 border-b border-[#E8DACB]">
                    <h3 class="font-serif-lux text-2xl text-[#4A2F17] font-medium flex items-center space-x-1.5">
                        <span>Your Order</span>
                        <span class="text-lg text-[#8F6644]">♡</span>
                    </h3>
                    <a href="{{ route('cart.index') }}" class="text-xs text-[#8F6644] hover:text-[#4A2F17] underline transition-colors">
                        Edit Bag
                    </a>
                </div>

                <!-- Items Snapshot List -->
                <div class="space-y-3.5 max-h-72 overflow-y-auto pr-1 divide-y divide-[#EADBCC]/60">
                    @foreach($cart as $item)
                    <div class="pt-3 first:pt-0 flex items-center justify-between gap-3">
                        
                        <div class="flex items-center space-x-3 min-w-0">
                            <!-- Image -->
                            <div class="w-14 h-14 rounded-xl bg-[#F2E5D6] border border-[#DECDBD] overflow-hidden flex-shrink-0 flex items-center justify-center">
                                @if(!empty($item['image']))
                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                                @else
                                    <span class="text-2xl">{{ $item['icon'] ?? '✨' }}</span>
                                @endif
                            </div>

                            <div class="min-w-0">
                                <h4 class="font-serif-lux text-sm sm:text-base font-semibold text-[#4A2F17] truncate leading-snug">
                                    {{ $item['name'] }}
                                </h4>
                                <div class="text-[11px] text-[#7A5638] flex items-center space-x-2 mt-0.5">
                                    <span class="bg-[#EADBCC] text-[#4A2F17] px-1.5 py-0.2 rounded-md font-semibold">Qty: {{ $item['quantity'] }}</span>
                                    <span>Rs. {{ number_format($item['price'], 0) }}</span>
                                </div>
                                @if(!empty($item['customization']))
                                    <span class="text-[10px] text-[#8F6644] italic truncate block mt-0.5">
                                        ✨ {{ $item['customization'] }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Item Total -->
                        <div class="text-xs sm:text-sm font-semibold text-[#4A2F17] flex-shrink-0 text-right">
                            Rs. {{ number_format($item['price'] * $item['quantity'], 0) }}
                        </div>

                    </div>
                    @endforeach
                </div>

                <!-- Price Totals Breakdown -->
                <div class="pt-4 border-t border-[#E8DACB] space-y-3 text-xs text-[#6F4B2E]">
                    <div class="flex justify-between items-center">
                        <span>Items Subtotal</span>
                        <span class="font-semibold text-sm text-[#4A2F17]">
                            Rs. {{ number_format($total, 0) }}
                        </span>
                    </div>

                    <div class="flex justify-between items-center">
                        <span>Nationwide Delivery</span>
                        <span class="font-medium text-emerald-800">
                            @if($total >= 2500)
                                FREE (Qualified over Rs. 2,500)
                            @else
                                Free Nationwide Delivery ✨
                            @endif
                        </span>
                    </div>

                    <div class="flex justify-between items-center text-[11px] text-[#8F6644]">
                        <span>Fragile Gift Packaging</span>
                        <span class="italic">Included (Complimentary)</span>
                    </div>

                    <!-- Grand Total -->
                    <div class="border-t-2 border-[#DECDBD] pt-4 flex justify-between items-center">
                        <div>
                            <span class="font-serif-lux text-xl sm:text-2xl text-[#4A2F17] font-semibold block leading-tight">
                                Total Due:
                            </span>
                            <span class="text-[10px] text-[#8A6749]">Payable upon delivery / confirmation</span>
                        </div>
                        <span class="font-serif-lux text-2xl sm:text-3xl text-[#52351E] font-bold">
                            Rs. {{ number_format($total, 0) }}
                        </span>
                    </div>
                </div>

                <!-- Submission Actions -->
                <div class="space-y-3 pt-2">
                    <!-- Standard Submit Button -->
                    <button type="submit" 
                            name="action" 
                            value="standard" 
                            id="btn-place-order" 
                            class="btn-luxury w-full py-4 px-6 rounded-full text-xs sm:text-sm font-semibold tracking-wide text-center flex items-center justify-center space-x-2 shadow-md hover:shadow-lg transform transition-all duration-300 hover:scale-[1.02] active:scale-95">
                        <span>Confirm & Place Order</span>
                        <span>→</span>
                    </button>

                    <!-- Direct WhatsApp Alternative Button -->
                    <button type="submit" 
                            name="action" 
                            value="whatsapp" 
                            class="w-full py-3.5 px-6 rounded-full text-xs sm:text-sm font-semibold tracking-wide text-center inline-flex items-center justify-center space-x-2 bg-[#25D366] hover:bg-[#1EBE5D] text-white transition-all shadow-sm active:scale-95">
                        <span>💬</span>
                        <span>Place & Open WhatsApp Bill</span>
                    </button>
                </div>

                <!-- Micro reassurance note -->
                <div class="text-center pt-2">
                    <p class="text-[11px] text-[#8A6749] leading-relaxed">
                        By placing your order, you agree to our handcrafted production terms. Each item is prepared with artisanal care.
                    </p>
                </div>

            </div>
        </div>

    </form>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Quick City Pills Click Handler
        const cityInput = document.getElementById('city');
        const cityChips = document.querySelectorAll('.city-chip');
        
        cityChips.forEach(chip => {
            chip.addEventListener('click', function () {
                const selectedCity = this.getAttribute('data-city');
                if (cityInput) {
                    cityInput.value = selectedCity;
                    cityInput.focus();
                }

                cityChips.forEach(c => {
                    c.classList.remove('bg-[#6B4B32]', 'text-white');
                    c.classList.add('bg-[#F6ECE0]', 'text-[#5C3D24]');
                });

                this.classList.remove('bg-[#F6ECE0]', 'text-[#5C3D24]');
                this.classList.add('bg-[#6B4B32]', 'text-white');
            });
        });

        // Payment Option Border Highlights
        const paymentRadios = document.querySelectorAll('input[name="payment_method"]');
        paymentRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                document.querySelectorAll('.payment-option-card').forEach(card => {
                    card.classList.remove('border-2', 'border-[#6B4B32]');
                    card.classList.add('border', 'border-[#DFCBB7]');
                });

                if (this.checked) {
                    const parentCard = this.closest('.payment-option-card');
                    if (parentCard) {
                        parentCard.classList.remove('border', 'border-[#DFCBB7]');
                        parentCard.classList.add('border-2', 'border-[#6B4B32]');
                    }
                }
            });
        });
    });
</script>
@endpush

@endsection
