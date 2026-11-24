<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->order_number }} — Islamic Crafts</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #FAF4ED; color: #432C19; }
        .font-serif-lux { font-family: 'Cormorant Garamond', serif; }
        @media print {
            body { background: #ffffff !important; }
            .no-print { display: none !important; }
            .invoice-sheet { box-shadow: none !important; border: none !important; margin: 0 !important; padding: 0 !important; }
        }
    </style>
</head>
<body class="py-8 px-4">

    <!-- Action Bar (Hidden on Print) -->
    <div class="no-print max-w-3xl mx-auto mb-5 flex items-center justify-between">
        <a href="{{ route('admin.orders.show', $order->id) }}" class="text-xs font-semibold text-[#6B4B32] hover:underline">
            ← Back to Order Details
        </a>
        <button onclick="window.print()" class="px-5 py-2.5 rounded-full bg-[#6B4B32] hover:bg-[#52351E] text-white text-xs font-semibold shadow-sm cursor-pointer">
            🖨️ Print Luxury Invoice
        </button>
    </div>

    <!-- Branded Printable Invoice Sheet -->
    <div class="invoice-sheet max-w-3xl mx-auto bg-white border border-[#E2CEB9] rounded-3xl p-8 sm:p-12 shadow-md">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4 pb-6 border-b-2 border-[#EADBCC]">
            <div>
                <h1 class="font-serif-lux italic text-4xl text-[#4A2D16] font-semibold leading-none">Islamic Crafts ♡</h1>
                <p class="text-[11px] uppercase tracking-[0.2em] text-[#8A6749] mt-1.5">Handmade with Love, Crafted with Elegance</p>
                <p class="text-xs text-[#7D5A3C] mt-2">
                    WhatsApp: +{{ preg_replace('/[^0-9]/', '', \App\Models\StoreSetting::getValue('whatsapp_number', env('WHATSAPP_NUMBER', '923001234567'))) }} • {{ \App\Models\StoreSetting::getValue('contact_email', 'salam@islamiccrafts.com') }}
                </p>
            </div>
            <div class="sm:text-right">
                <span class="inline-block px-3 py-1 rounded-full bg-[#FAF4ED] border border-[#DFCBB7] text-[10px] font-bold uppercase tracking-widest text-[#6B4B32]">
                    Official Invoice / Packing Slip
                </span>
                <p class="font-mono text-lg font-bold text-[#4A2D16] mt-2">#{{ $order->order_number }}</p>
                <p class="text-xs text-[#8A6749]">Date: {{ $order->created_at->format('d F Y') }}</p>
            </div>
        </div>

        <!-- Customer & Shipping -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 py-6 border-b border-[#EFE2D4] text-xs">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-widest text-[#9A714C] mb-1.5">Billed & Shipped To</p>
                <p class="font-bold text-sm text-[#4A2D16]">{{ $order->customer_name }}</p>
                <p class="text-[#5C3D24] mt-0.5">{{ $order->customer_phone }}</p>
                @if($order->customer_email)
                    <p class="text-[#7D5A3C]">{{ $order->customer_email }}</p>
                @endif
                <p class="text-[#5C3D24] mt-1.5 leading-relaxed">{{ $order->customer_address }}, {{ $order->city }}</p>
            </div>
            <div class="sm:text-right">
                <p class="text-[10px] font-bold uppercase tracking-widest text-[#9A714C] mb-1.5">Order Summary</p>
                <p class="text-[#5C3D24]"><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                @if($order->coupon_code)
                    <p class="text-emerald-700 mt-1"><strong>Promo Code:</strong> {{ $order->coupon_code }}</p>
                @endif
                @if($order->notes)
                    <p class="text-[#7D5A3C] mt-2 text-[11px] leading-relaxed">{{ $order->notes }}</p>
                @endif
            </div>
        </div>

        <!-- Items Table -->
        <div class="py-6">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="border-b border-[#DFCBB7] text-[#8A6749] uppercase tracking-wider text-[10px]">
                        <th class="pb-3 font-semibold">Craft Item</th>
                        <th class="pb-3 font-semibold text-center">Qty</th>
                        <th class="pb-3 font-semibold text-right">Unit Price</th>
                        <th class="pb-3 font-semibold text-right">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#F0E4D7]">
                    @php $subtotal = 0; @endphp
                    @foreach($order->items as $item)
                        @php $lineTotal = $item->price * $item->quantity; $subtotal += $lineTotal; @endphp
                        <tr>
                            <td class="py-3.5">
                                <span class="font-semibold text-[#4A2D16] block">{{ $item->product_name }}</span>
                                @if($item->customization_details)
                                    <span class="text-[11px] text-[#8A6749] italic">Personalization: {{ $item->customization_details }}</span>
                                @endif
                            </td>
                            <td class="py-3.5 text-center font-medium">{{ $item->quantity }}</td>
                            <td class="py-3.5 text-right">Rs. {{ number_format($item->price, 0) }}</td>
                            <td class="py-3.5 text-right font-semibold text-[#4A2D16]">Rs. {{ number_format($lineTotal, 0) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Totals -->
        <div class="border-t-2 border-[#EADBCC] pt-5 flex justify-end">
            <div class="w-full sm:w-64 space-y-2 text-xs">
                <div class="flex justify-between text-[#7D5A3C]">
                    <span>Subtotal</span>
                    <span>Rs. {{ number_format($subtotal, 0) }}</span>
                </div>
                @if($order->discount_amount > 0)
                <div class="flex justify-between text-emerald-700 font-semibold">
                    <span>Discount ({{ $order->coupon_code }})</span>
                    <span>- Rs. {{ number_format($order->discount_amount, 0) }}</span>
                </div>
                @endif
                <div class="flex justify-between text-[#7D5A3C]">
                    <span>Packaging & Delivery</span>
                    <span>Complimentary</span>
                </div>
                <div class="flex justify-between pt-2.5 border-t border-[#DFCBB7] text-base font-bold text-[#4A2D16]">
                    <span>Grand Total</span>
                    <span>Rs. {{ number_format($order->total_amount, 0) }}</span>
                </div>
            </div>
        </div>

        <!-- Thank You Footer -->
        <div class="mt-10 pt-6 border-t border-dashed border-[#DFCBB7] text-center">
            <p class="font-serif-lux italic text-xl text-[#58381C]">JazakAllah Khair for supporting handmade art ♡</p>
            <p class="text-[11px] text-[#8A6749] mt-1">Handle resin & floral keepsakes with gentle care. Tag us {{ \App\Models\StoreSetting::getValue('instagram_handle', '@islamiccrafts') }} in your unboxing!</p>
        </div>

    </div>
</body>
</html>
