@extends('admin.layouts.admin')

@section('title', 'Order #' . $order->order_number)
@section('header_title', 'Order Details: #' . $order->order_number)

@section('content')

<div class="max-w-5xl space-y-6">
    
    <!-- Top Actions Card -->
    <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-2xl p-6 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
        <div>
            <span class="text-xs text-[#8A6749]">Placed on: {{ $order->created_at->format('l, d F Y \a\t h:i A') }}</span>
            <div class="flex items-center space-x-3 mt-1">
                <span class="font-serif-lux text-2xl font-bold text-[#4A301A]">#{{ $order->order_number }}</span>
                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                    Status: {{ ucfirst($order->status) }}
                </span>
            </div>
        </div>

        <!-- Status Change Form & Print Invoice -->
        <div class="flex flex-wrap items-center gap-2.5">
            <a href="{{ route('admin.orders.invoice', $order->id) }}" target="_blank" class="px-4 py-2 rounded-xl text-xs font-semibold bg-[#F3E7D9] hover:bg-[#E7D4BE] text-[#52351E] border border-[#DEC7AF] transition-colors inline-flex items-center space-x-1.5">
                <span>🖨️</span>
                <span>Print Invoice</span>
            </a>

            <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" class="flex items-center gap-2">
                @csrf
                @method('PATCH')
                <select name="status" class="bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2 text-xs font-semibold text-[#432C19] outline-none">
                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ $order->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                <button type="submit" class="bg-[#6B4B32] hover:bg-[#573C27] text-white px-4 py-2 rounded-xl text-xs font-semibold cursor-pointer">
                    Update Status
                </button>
            </form>
        </div>
    </div>

    <!-- Customer Details & Shipping Details -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Customer Info -->
        <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-2xl p-6 shadow-sm">
            <h3 class="font-serif-lux text-lg font-semibold text-[#4A301A] mb-3 border-b border-[#E8DACB] pb-2">Customer Information</h3>
            <div class="space-y-2 text-xs text-[#52351E]">
                <p><strong class="text-[#8A6749]">Name:</strong> {{ $order->customer_name }}</p>
                <p><strong class="text-[#8A6749]">Phone:</strong> {{ $order->customer_phone }}</p>
                <p><strong class="text-[#8A6749]">Email:</strong> {{ $order->customer_email ?? 'Not provided' }}</p>
                <p><strong class="text-[#8A6749]">City:</strong> {{ $order->city }}</p>
                <p><strong class="text-[#8A6749]">Shipping Address:</strong><br>{{ $order->customer_address }}</p>
            </div>
        </div>

        <!-- Order Notes -->
        <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-2xl p-6 shadow-sm">
            <h3 class="font-serif-lux text-lg font-semibold text-[#4A301A] mb-3 border-b border-[#E8DACB] pb-2">Order Notes / Customization</h3>
            <p class="text-xs text-[#52351E] whitespace-pre-wrap leading-relaxed">
                {{ $order->notes ?: 'No special customization instructions entered by customer.' }}
            </p>
        </div>

    </div>

    <!-- Ordered Items Table -->
    <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-2xl p-6 shadow-sm">
        <h3 class="font-serif-lux text-lg font-semibold text-[#4A301A] mb-4">Ordered Items</h3>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="border-b border-[#E8DACB] text-[#8A6749] font-semibold">
                        <th class="pb-3 w-16">Item</th>
                        <th class="pb-3">Product Name</th>
                        <th class="pb-3 text-center">Qty</th>
                        <th class="pb-3">Price</th>
                        <th class="pb-3 text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#EFE2D4]">
                    @foreach($order->items as $item)
                    <tr class="hover:bg-[#F5ECE1]/40">
                        <td class="py-3">
                            <div class="w-12 h-12 rounded-xl bg-[#F0E3D3] overflow-hidden flex items-center justify-center border border-[#E0CFBD]">
                                @if($item->product && $item->product->primary_image_url)
                                    <img src="{{ $item->product->primary_image_url }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                                @else
                                    <span>✨</span>
                                @endif
                            </div>
                        </td>
                        <td class="py-3">
                            <span class="font-semibold text-[#4A301A] block">{{ $item->product_name }}</span>
                            @if($item->customization_details)
                                <span class="text-[11px] text-[#8A6749] block">Note: {{ $item->customization_details }}</span>
                            @endif
                        </td>
                        <td class="py-3 text-center font-semibold">{{ $item->quantity }}</td>
                        <td class="py-3 text-[#52351E]">Rs. {{ number_format($item->price, 0) }}</td>
                        <td class="py-3 text-right font-bold text-[#52351E]">Rs. {{ number_format($item->price * $item->quantity, 0) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="border-t-2 border-[#E8DACB] text-sm font-bold text-[#4A301A]">
                        <td colspan="4" class="pt-4 text-right">Grand Total:</td>
                        <td class="pt-4 text-right text-base text-[#6B4B32]">Rs. {{ number_format($order->total_amount, 0) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Back to Orders -->
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.orders.index') }}" class="text-xs text-[#8A6749] hover:underline">
            ← Back to All Orders
        </a>
        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Permanently remove this order?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-xs text-rose-600 hover:underline">Delete Order</button>
        </form>
    </div>

</div>

@endsection
