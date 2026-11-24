@extends('admin.layouts.admin')

@section('title', 'Orders Management')
@section('header_title', 'Customer Orders')

@section('content')

<div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-2xl p-6 shadow-sm">
    
    <!-- Filter Tabs -->
    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-[#E8DACB] pb-4 mb-6">
        <div class="flex flex-wrap items-center gap-2">
            @php
                $tabs = [
                    '' => 'All (' . $counts['all'] . ')',
                    'pending' => 'Pending (' . $counts['pending'] . ')',
                    'confirmed' => 'Confirmed (' . $counts['confirmed'] . ')',
                    'shipped' => 'Shipped (' . $counts['shipped'] . ')',
                    'delivered' => 'Delivered (' . $counts['delivered'] . ')',
                    'cancelled' => 'Cancelled (' . $counts['cancelled'] . ')',
                ];
            @endphp
            @foreach($tabs as $val => $label)
                <a href="{{ route('admin.orders.index', ['status' => $val]) }}" class="px-3.5 py-1.5 rounded-full text-xs font-semibold transition-colors {{ request('status', '') === $val ? 'bg-[#6B4B32] text-white' : 'bg-[#F5ECE1] text-[#7A5A3E] hover:bg-[#EADBCC]' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        <!-- Search Order -->
        <form method="GET" action="{{ route('admin.orders.index') }}" class="flex items-center gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Order #, name, phone..." class="bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-3 py-1.5 text-xs text-[#432C19] outline-none">
            <button type="submit" class="bg-[#6B4B32] text-white px-3 py-1.5 rounded-xl text-xs font-semibold">Search</button>
        </form>
    </div>

    <!-- Orders Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead>
                <tr class="border-b border-[#E8DACB] text-[#8A6749] font-semibold">
                    <th class="pb-3">Order Number</th>
                    <th class="pb-3">Customer</th>
                    <th class="pb-3">Contact</th>
                    <th class="pb-3">City</th>
                    <th class="pb-3">Items</th>
                    <th class="pb-3">Total</th>
                    <th class="pb-3">Status</th>
                    <th class="pb-3">Placed On</th>
                    <th class="pb-3 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#EFE2D4]">
                @forelse($orders as $order)
                <tr class="hover:bg-[#F5ECE1]/50">
                    <td class="py-3 font-semibold text-[#4A301A]">#{{ $order->order_number }}</td>
                    <td class="py-3 font-medium">{{ $order->customer_name }}</td>
                    <td class="py-3 text-[#7A5A3E]">{{ $order->customer_phone }}</td>
                    <td class="py-3 text-[#7A5A3E]">{{ $order->city }}</td>
                    <td class="py-3 font-medium">{{ $order->items->sum('quantity') }} items</td>
                    <td class="py-3 font-bold text-[#52351E]">Rs. {{ number_format($order->total_amount, 0) }}</td>
                    <td class="py-3">
                        @php
                            $badge = [
                                'pending' => 'bg-amber-100 text-amber-800',
                                'confirmed' => 'bg-blue-100 text-blue-800',
                                'shipped' => 'bg-purple-100 text-purple-800',
                                'delivered' => 'bg-emerald-100 text-emerald-800',
                                'cancelled' => 'bg-rose-100 text-rose-800',
                            ];
                        @endphp
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-semibold {{ $badge[$order->status] ?? 'bg-gray-100' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="py-3 text-[#8A6749]">{{ $order->created_at->format('d M, Y H:i') }}</td>
                    <td class="py-3 text-right">
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="bg-[#F2E5D5] hover:bg-[#E7D6C3] text-[#52351E] px-3 py-1.5 rounded-lg font-semibold inline-block">
                            View Order →
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center py-8 text-[#8A6749]">
                        No orders found in this section.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $orders->links() }}
    </div>

</div>

@endsection
