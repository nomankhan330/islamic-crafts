@extends('admin.layouts.admin')

@section('title', 'Newsletter Subscribers')
@section('header_title', 'Newsletter Subscribers')

@section('content')

<div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-2xl p-6 shadow-sm max-w-3xl">
    
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead>
                <tr class="border-b border-[#E8DACB] text-[#8A6749] font-semibold">
                    <th class="pb-3">#</th>
                    <th class="pb-3">Email Address</th>
                    <th class="pb-3">Subscribed On</th>
                    <th class="pb-3 text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#EFE2D4]">
                @forelse($subscribers as $index => $sub)
                <tr class="hover:bg-[#F5ECE1]/50">
                    <td class="py-3 text-[#8A6749]">{{ $index + 1 }}</td>
                    <td class="py-3 font-semibold text-[#4A301A]">{{ $sub->email }}</td>
                    <td class="py-3 text-[#7A5A3E]">{{ $sub->created_at->format('d M, Y \a\t h:i A') }}</td>
                    <td class="py-3 text-right">
                        <form action="{{ route('admin.subscribers.destroy', $sub->id) }}" method="POST" class="inline" onsubmit="return confirm('Remove subscriber?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs text-rose-600 hover:underline">Remove</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-8 text-[#8A6749]">
                        No newsletter subscribers yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $subscribers->links() }}
    </div>

</div>

@endsection
