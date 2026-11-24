@extends('admin.layouts.admin')

@section('title', 'Customer Reviews')
@section('header_title', 'Reviews & Feedback')

@section('content')

<div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-2xl p-6 shadow-sm">
    
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead>
                <tr class="border-b border-[#E8DACB] text-[#8A6749] font-semibold">
                    <th class="pb-3">Customer</th>
                    <th class="pb-3">Product</th>
                    <th class="pb-3">Rating</th>
                    <th class="pb-3">Review Text</th>
                    <th class="pb-3">Status</th>
                    <th class="pb-3">Date</th>
                    <th class="pb-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#EFE2D4]">
                @forelse($reviews as $review)
                <tr class="hover:bg-[#F5ECE1]/50">
                    <td class="py-3 font-semibold text-[#4A301A]">{{ $review->customer_name }}</td>
                    <td class="py-3 text-[#52351E]">{{ $review->product->name ?? 'General' }}</td>
                    <td class="py-3 text-[#C89B55]">{{ str_repeat('★', $review->rating) }}</td>
                    <td class="py-3 text-[#7A5A3E] max-w-sm">{{ $review->review }}</td>
                    <td class="py-3">
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold {{ $review->is_approved ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                            {{ $review->is_approved ? 'Approved' : 'Pending' }}
                        </span>
                    </td>
                    <td class="py-3 text-[#8A6749]">{{ $review->created_at->format('d M, Y') }}</td>
                    <td class="py-3 text-right space-x-2">
                        <form action="{{ route('admin.reviews.toggle-approve', $review->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-xs font-semibold {{ $review->is_approved ? 'text-amber-700' : 'text-emerald-700' }} hover:underline">
                                {{ $review->is_approved ? 'Hide' : 'Approve' }}
                            </button>
                        </form>
                        <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this review?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs font-semibold text-rose-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-8 text-[#8A6749]">
                        No reviews submitted yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $reviews->links() }}
    </div>

</div>

@endsection
