@extends('admin.layouts.admin')

@section('title', 'Promo Codes & Coupons')
@section('header_title', 'Promo Codes & Discounts')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

    <!-- Left: Create Promo Code Form (4 cols) -->
    <div class="lg:col-span-4 bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 shadow-xs h-fit">
        <div class="flex items-center space-x-2 mb-4 pb-3 border-b border-[#EADBCC]">
            <span class="text-xl">🏷️</span>
            <div>
                <h2 class="font-serif-lux text-xl font-semibold text-[#4A301A] leading-tight">Create Promo Code</h2>
                <p class="text-[11px] text-[#8A6749]">For VIP offers, Eid, Ramadan & Weddings</p>
            </div>
        </div>

        <form action="{{ route('admin.coupons.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Coupon Code *</label>
                <input type="text" name="code" value="{{ old('code') }}" required placeholder="e.g. NIKKAH15" class="w-full uppercase font-mono bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2.5 text-xs text-[#432C19] outline-none focus:border-[#6B4B32]">
                @error('code')
                    <p class="text-rose-600 text-[11px] mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Discount Type</label>
                    <select name="type" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-3 py-2.5 text-xs text-[#432C19] outline-none">
                        <option value="percent">Percentage (%)</option>
                        <option value="fixed">Flat Amount (Rs.)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Value *</label>
                    <input type="number" name="value" value="{{ old('value', 10) }}" min="1" step="1" required class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-3.5 py-2.5 text-xs text-[#432C19] outline-none">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Min Order (Rs.)</label>
                    <input type="number" name="min_order_amount" value="{{ old('min_order_amount', 0) }}" min="0" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-3.5 py-2.5 text-xs text-[#432C19] outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Max Uses</label>
                    <input type="number" name="max_uses" value="{{ old('max_uses') }}" min="1" placeholder="Unlimited" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-3.5 py-2.5 text-xs text-[#432C19] outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Expiry Date (Optional)</label>
                <input type="date" name="expires_at" value="{{ old('expires_at') }}" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2.5 text-xs text-[#432C19] outline-none">
            </div>

            <button type="submit" class="w-full bg-[#6B4B32] hover:bg-[#573C27] text-white py-2.5 rounded-xl text-xs font-semibold tracking-wide transition-colors cursor-pointer shadow-sm">
                + Create Promo Code
            </button>
        </form>
    </div>

    <!-- Right: Promo Codes List (8 cols) -->
    <div class="lg:col-span-8 bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 shadow-xs">
        <div class="flex items-center justify-between mb-5 pb-3 border-b border-[#EADBCC]">
            <h2 class="font-serif-lux text-2xl font-semibold text-[#4A301A]">Active & Saved Promo Codes ({{ $coupons->total() }})</h2>
        </div>

        @if($coupons->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="border-b border-[#E8DACB] text-[#8A6749] uppercase tracking-wider text-[11px]">
                        <th class="pb-3 font-semibold">Code</th>
                        <th class="pb-3 font-semibold">Discount</th>
                        <th class="pb-3 font-semibold">Min Order</th>
                        <th class="pb-3 font-semibold text-center">Usage</th>
                        <th class="pb-3 font-semibold text-center">Status</th>
                        <th class="pb-3 font-semibold text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#EFE2D4]">
                    @foreach($coupons as $coupon)
                    <tr class="hover:bg-[#F5ECE1]/60">
                        <td class="py-3.5">
                            <span class="font-mono font-bold text-[#4A301A] bg-[#F3E7D9] border border-[#DEC7AF] px-2.5 py-1 rounded-lg">{{ $coupon->code }}</span>
                            @if($coupon->expires_at)
                                <span class="block text-[10px] text-[#8A6749] mt-1">Expires: {{ $coupon->expires_at->format('d M Y') }}</span>
                            @endif
                        </td>
                        <td class="py-3.5 font-bold text-emerald-800">
                            {{ $coupon->type === 'percent' ? number_format($coupon->value, 0) . '% OFF' : 'Rs. ' . number_format($coupon->value, 0) . ' OFF' }}
                        </td>
                        <td class="py-3.5 text-[#7A5A3E]">
                            {{ $coupon->min_order_amount > 0 ? 'Rs. ' . number_format($coupon->min_order_amount, 0) : 'No minimum' }}
                        </td>
                        <td class="py-3.5 text-center font-mono text-[#52351E]">
                            {{ $coupon->used_count }} / {{ $coupon->max_uses ?? '∞' }}
                        </td>
                        <td class="py-3.5 text-center">
                            <form action="{{ route('admin.coupons.toggle-active', $coupon) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-2.5 py-1 rounded-full text-[10px] font-semibold cursor-pointer {{ $coupon->is_active ? 'bg-emerald-100 text-emerald-800 border border-emerald-200' : 'bg-stone-200 text-stone-600' }}">
                                    {{ $coupon->is_active ? '● Active' : '○ Paused' }}
                                </button>
                            </form>
                        </td>
                        <td class="py-3.5 text-right">
                            <form action="{{ route('admin.coupons.destroy', $coupon) }}" method="POST" onsubmit="return confirm('Delete promo code {{ $coupon->code }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs font-semibold text-rose-600 hover:underline cursor-pointer">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 pt-4 border-t border-[#EADBCC]">
            {{ $coupons->links() }}
        </div>
        @else
        <div class="text-center py-12 text-xs text-[#8A6749]">No promo codes created yet.</div>
        @endif
    </div>

</div>

@endsection
