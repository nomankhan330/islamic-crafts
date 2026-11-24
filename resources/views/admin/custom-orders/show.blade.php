@extends('admin.layouts.admin')

@section('title', 'Custom Inquiry: ' . $customOrder->name . ' — Islamic Crafts Admin')
@section('header_title', 'Inquiry Details: ' . $customOrder->name)

@section('content')

<!-- Back Link & Top Title Bar -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
    <div class="flex items-center space-x-3">
        <a href="{{ route('admin.custom-orders.index') }}" class="w-9 h-9 rounded-xl bg-[#FAF4ED] border border-[#DECDBD] text-[#5C3D24] hover:bg-[#6B4B32] hover:text-white flex items-center justify-center transition-colors shadow-2xs" title="Back to Custom Inquiries">
            ←
        </a>
        <div>
            <div class="flex items-center space-x-2">
                <span class="text-xs font-bold uppercase tracking-wider text-[#8F6644]">Custom Inquiry #{{ str_pad($customOrder->id, 3, '0', STR_PAD_LEFT) }}</span>
                <span class="text-xs text-[#DECDBD]">•</span>
                <span class="text-xs text-[#8A6749]">{{ $customOrder->created_at->format('d M, Y — h:i A') }}</span>
            </div>
            <h2 class="font-serif-lux text-2xl sm:text-3xl font-medium text-[#4A2F17] mt-0.5">
                {{ $customOrder->name }}
            </h2>
        </div>
    </div>

    <!-- Direct WhatsApp Action Button -->
    @php
        $cleanClientPhone = preg_replace('/[^0-9]/', '', $customOrder->phone);
        if (str_starts_with($cleanClientPhone, '0')) {
            $cleanClientPhone = '92' . substr($cleanClientPhone, 1);
        }
        $replyMessage = "Assalam-o-Alaikum {$customOrder->name}! This is Islamic Crafts regarding your custom {$customOrder->category} inquiry. We loved your vision and would be delighted to bring it to life! ♡";
    @endphp
    <div class="flex items-center space-x-3">
        <a href="https://wa.me/{{ $cleanClientPhone }}?text={{ urlencode($replyMessage) }}" 
           target="_blank" 
           class="inline-flex items-center space-x-2 px-5 py-2.5 rounded-full text-xs font-semibold text-white bg-[#25D366] hover:bg-[#1EBE5D] transition-all shadow-sm hover:shadow-md">
            <span>💬</span>
            <span>Chat on WhatsApp</span>
            <span class="text-[10px] opacity-80">(Opens in New Tab)</span>
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
    
    <!-- Left Column: Inquiry Core Details & Reference Photo (7 cols) -->
    <div class="lg:col-span-7 space-y-6">
        
        <!-- Card 1: Client Overview -->
        <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-7 shadow-xs space-y-5">
            <div class="border-b border-[#EADBCC] pb-3 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-[#8C6240] to-[#593920] text-white text-xs font-bold flex items-center justify-center border-2 border-[#E7D6C4] shadow-2xs">
                        {{ strtoupper(substr($customOrder->name, 0, 2)) }}
                    </div>
                    <div>
                        <h3 class="font-serif-lux text-xl font-medium text-[#4A2F17]">Client Contact & Meta</h3>
                        <p class="text-[11px] text-[#8A6749]">Direct client communication coordinates</p>
                    </div>
                </div>

                <!-- Status Badge -->
                @php
                    $statusStyles = [
                        'new' => 'bg-amber-100 text-amber-900 border-amber-200',
                        'replied' => 'bg-blue-100 text-blue-900 border-blue-200',
                        'completed' => 'bg-emerald-100 text-emerald-900 border-emerald-200',
                    ];
                @endphp
                <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider border {{ $statusStyles[$customOrder->status] ?? 'bg-stone-100 text-stone-800' }}">
                    ● {{ ucfirst($customOrder->status) }}
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs text-[#52351E]">
                <div class="p-3.5 rounded-2xl bg-[#F6ECE0] border border-[#EADBCC]">
                    <span class="text-[10px] uppercase tracking-wider text-[#8A6749] font-bold block mb-1">WhatsApp Phone</span>
                    <a href="https://wa.me/{{ $cleanClientPhone }}" target="_blank" class="font-semibold text-sm text-[#4A2F17] hover:text-emerald-800 flex items-center space-x-1.5">
                        <span>📱</span>
                        <span>{{ $customOrder->phone }}</span>
                        <span class="text-[10px] text-emerald-700 font-normal">↗</span>
                    </a>
                </div>

                <div class="p-3.5 rounded-2xl bg-[#F6ECE0] border border-[#EADBCC]">
                    <span class="text-[10px] uppercase tracking-wider text-[#8A6749] font-bold block mb-1">Email Address</span>
                    @if($customOrder->email)
                        <a href="mailto:{{ $customOrder->email }}" class="font-semibold text-xs text-[#4A2F17] hover:underline flex items-center space-x-1.5 truncate">
                            <span>✉️</span>
                            <span class="truncate">{{ $customOrder->email }}</span>
                        </a>
                    @else
                        <span class="text-[#8A6749] italic">Not provided</span>
                    @endif
                </div>

                <div class="p-3.5 rounded-2xl bg-[#F6ECE0] border border-[#EADBCC]">
                    <span class="text-[10px] uppercase tracking-wider text-[#8A6749] font-bold block mb-1">Requested Category</span>
                    <span class="font-semibold text-xs text-[#4A2F17] flex items-center space-x-1.5">
                        <span>🎨</span>
                        <span>{{ $customOrder->category }}</span>
                    </span>
                </div>

                <div class="p-3.5 rounded-2xl bg-[#F6ECE0] border border-[#EADBCC]">
                    <span class="text-[10px] uppercase tracking-wider text-[#8A6749] font-bold block mb-1">Client's Budget</span>
                    <span class="font-bold text-xs text-[#6B4B32] flex items-center space-x-1.5">
                        <span>💰</span>
                        <span>{{ $customOrder->budget ?: 'Not specified' }}</span>
                    </span>
                </div>
            </div>
        </div>

        <!-- Card 2: Custom Requirements & Vision -->
        <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-7 shadow-xs space-y-3">
            <div class="border-b border-[#EADBCC] pb-3 flex items-center justify-between">
                <h3 class="font-serif-lux text-xl font-medium text-[#4A2F17]">Client Requirements & Vision</h3>
                <span class="text-[11px] text-[#8F6644]">Bespoke Order Specifications</span>
            </div>

            <div class="bg-[#F6ECE0] p-4 sm:p-5 rounded-2xl border border-[#DFCBB7] text-xs sm:text-sm text-[#432C19] leading-relaxed whitespace-pre-wrap font-sans">
                {{ $customOrder->description }}
            </div>
        </div>

        <!-- Card 3: Attached Reference / Inspiration Photo -->
        <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-7 shadow-xs space-y-4">
            <div class="border-b border-[#EADBCC] pb-3 flex items-center justify-between">
                <div>
                    <h3 class="font-serif-lux text-xl font-medium text-[#4A2F17]">Attached Reference Photo</h3>
                    <p class="text-[11px] text-[#8A6749]">Inspiration picture uploaded by customer</p>
                </div>
                @if($customOrder->reference_image_url)
                    <span class="text-[10px] text-emerald-800 bg-emerald-50 border border-emerald-200 px-2.5 py-0.5 rounded-full font-semibold">
                        ✓ Photo Available
                    </span>
                @else
                    <span class="text-[10px] text-[#8A6749] bg-[#F6ECE0] px-2.5 py-0.5 rounded-full">
                        No Photo
                    </span>
                @endif
            </div>

            @if($customOrder->reference_image_url)
                <div class="space-y-3">
                    <div class="w-full max-w-md rounded-2xl bg-[#F6ECE0] border-2 border-[#DFCBB7] overflow-hidden p-2 group relative">
                        <img id="admin-reference-img" 
                             src="{{ $customOrder->reference_image_url }}" 
                             alt="Customer Reference Photo" 
                             class="w-full max-h-96 object-contain rounded-xl transition-transform duration-500 group-hover:scale-102">
                    </div>

                    <div class="flex items-center space-x-3 pt-1">
                        <a href="{{ $customOrder->reference_image_url }}" 
                           target="_blank" 
                           class="inline-flex items-center space-x-1.5 px-4 py-2 rounded-xl text-xs font-semibold text-[#5C3D24] bg-[#FAF4ED] hover:bg-[#F3E7D9] border border-[#DECDBD] transition-all shadow-2xs">
                            <span>🔍</span>
                            <span>Open Full Size in New Tab</span>
                            <span class="text-[10px]">↗</span>
                        </a>

                        <a href="{{ $customOrder->reference_image_url }}" 
                           download 
                           class="inline-flex items-center space-x-1.5 px-4 py-2 rounded-xl text-xs font-semibold text-[#5C3D24] bg-[#FAF4ED] hover:bg-[#F3E7D9] border border-[#DECDBD] transition-all shadow-2xs">
                            <span>⬇️</span>
                            <span>Download File</span>
                        </a>
                    </div>
                </div>
            @else
                <div class="p-6 text-center rounded-2xl bg-[#F6ECE0] border border-[#EADBCC] text-xs text-[#8A6749]">
                    <span class="text-3xl block mb-1">🖼️</span>
                    <span>Client did not attach any reference photo for this inquiry.</span>
                </div>
            @endif
        </div>

    </div>

    <!-- Right Column: Status Control & Studio Actions (5 cols) -->
    <div class="lg:col-span-5 space-y-6 lg:sticky lg:top-28">
        
        <!-- Status Management Card -->
        <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 shadow-xs space-y-4">
            <div class="border-b border-[#EADBCC] pb-3">
                <h3 class="font-serif-lux text-xl font-medium text-[#4A2F17]">Inquiry Status</h3>
                <p class="text-xs text-[#8A6749]">Track communication and fulfillment progress</p>
            </div>

            <form action="{{ route('admin.custom-orders.update-status', $customOrder->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-2">Change Status:</label>
                    <div class="space-y-2">
                        <label class="flex items-center space-x-3 p-3 rounded-xl border {{ $customOrder->status === 'new' ? 'border-[#6B4B32] bg-[#F4ECE1]' : 'border-[#DECDBD] bg-[#FAF4ED]' }} cursor-pointer hover:bg-[#F6ECE0] transition-colors">
                            <input type="radio" name="status" value="new" {{ $customOrder->status === 'new' ? 'checked' : '' }} class="text-[#6B4B32] focus:ring-[#6B4B32]">
                            <div>
                                <span class="text-xs font-bold text-[#4A2F17] block">🟡 New Inquiry</span>
                                <span class="text-[10px] text-[#8A6749]">Just arrived, awaiting initial artisan reply.</span>
                            </div>
                        </label>

                        <label class="flex items-center space-x-3 p-3 rounded-xl border {{ $customOrder->status === 'replied' ? 'border-[#6B4B32] bg-[#F4ECE1]' : 'border-[#DECDBD] bg-[#FAF4ED]' }} cursor-pointer hover:bg-[#F6ECE0] transition-colors">
                            <input type="radio" name="status" value="replied" {{ $customOrder->status === 'replied' ? 'checked' : '' }} class="text-[#6B4B32] focus:ring-[#6B4B32]">
                            <div>
                                <span class="text-xs font-bold text-[#4A2F17] block">🔵 Contacted / In Discussion</span>
                                <span class="text-[10px] text-[#8A6749]">Artisan has sent WhatsApp mockup preview.</span>
                            </div>
                        </label>

                        <label class="flex items-center space-x-3 p-3 rounded-xl border {{ $customOrder->status === 'completed' ? 'border-[#6B4B32] bg-[#F4ECE1]' : 'border-[#DECDBD] bg-[#FAF4ED]' }} cursor-pointer hover:bg-[#F6ECE0] transition-colors">
                            <input type="radio" name="status" value="completed" {{ $customOrder->status === 'completed' ? 'checked' : '' }} class="text-[#6B4B32] focus:ring-[#6B4B32]">
                            <div>
                                <span class="text-xs font-bold text-[#4A2F17] block">🟢 Finalized & Delivered</span>
                                <span class="text-[10px] text-[#8A6749]">Order crafted and successfully shipped.</span>
                            </div>
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn-luxury w-full py-3 px-4 rounded-full text-xs font-semibold tracking-wide shadow-sm hover:shadow-md transition-all">
                    ✓ Update Status
                </button>
            </form>
        </div>

        <!-- Danger Zone Card -->
        <div class="bg-[#FAF4ED] border border-rose-200 rounded-3xl p-6 shadow-2xs space-y-3">
            <h4 class="text-xs font-bold uppercase tracking-wider text-rose-800">Danger Zone</h4>
            <p class="text-[11px] text-[#8A6749]">Delete this customer inquiry permanently from your database.</p>
            <form action="{{ route('admin.custom-orders.destroy', $customOrder->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this custom inquiry?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full py-2.5 px-4 rounded-full text-xs font-semibold text-rose-700 bg-rose-50 hover:bg-rose-100 border border-rose-200 transition-colors">
                    🗑 Delete Customer Inquiry
                </button>
            </form>
        </div>

    </div>

</div>

@endsection
