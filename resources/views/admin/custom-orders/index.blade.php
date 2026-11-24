@extends('admin.layouts.admin')

@section('title', 'Custom Order Requests')
@section('header_title', 'Custom Order Inquiries')

@section('content')

<div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-2xl p-6 shadow-sm">
    
    <!-- Inquiries Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead>
                <tr class="border-b border-[#E8DACB] text-[#8A6749] font-semibold">
                    <th class="pb-3">Client Name</th>
                    <th class="pb-3">Phone</th>
                    <th class="pb-3">Category</th>
                    <th class="pb-3">Budget</th>
                    <th class="pb-3">Description</th>
                    <th class="pb-3">Status</th>
                    <th class="pb-3">Date</th>
                    <th class="pb-3 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#EFE2D4]">
                @forelse($requests as $req)
                <tr class="hover:bg-[#F5ECE1]/50">
                    <td class="py-3 font-semibold text-[#4A301A]">{{ $req->name }}</td>
                    <td class="py-3 text-[#7A5A3E]">{{ $req->phone }}</td>
                    <td class="py-3 font-medium">{{ $req->category }}</td>
                    <td class="py-3 text-[#52351E] font-medium">{{ $req->budget ?: 'Flexible' }}</td>
                    <td class="py-3 text-[#7A5A3E] max-w-xs truncate">{{ $req->description }}</td>
                    <td class="py-3">
                        @php
                            $badge = [
                                'new' => 'bg-amber-100 text-amber-800',
                                'replied' => 'bg-blue-100 text-blue-800',
                                'completed' => 'bg-emerald-100 text-emerald-800',
                            ];
                        @endphp
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-semibold {{ $badge[$req->status] ?? 'bg-gray-100' }}">
                            {{ ucfirst($req->status) }}
                        </span>
                    </td>
                    <td class="py-3 text-[#8A6749]">{{ $req->created_at->format('d M, Y') }}</td>
                    <td class="py-3 text-right">
                        <a href="{{ route('admin.custom-orders.show', $req->id) }}" class="bg-[#F2E5D5] hover:bg-[#E7D6C3] text-[#52351E] px-3 py-1.5 rounded-lg font-semibold inline-block">
                            View Details →
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-8 text-[#8A6749]">
                        No custom order requests yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $requests->links() }}
    </div>

</div>

@endsection
