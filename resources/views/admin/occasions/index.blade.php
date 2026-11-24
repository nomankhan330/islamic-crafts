@extends('admin.layouts.admin')

@section('title', 'Shop by Occasion Management')
@section('header_title', 'Shop by Occasion')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

    <!-- Left: Add New Occasion Card (4 cols) -->
    <div class="lg:col-span-4 bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 shadow-sm h-fit">
        <div class="flex items-center space-x-2 mb-4 pb-3 border-b border-[#EADBCC]">
            <span class="text-xl">💍</span>
            <div>
                <h2 class="font-serif-lux text-xl font-semibold text-[#4A301A] leading-tight">Add Occasion Card</h2>
                <p class="text-[11px] text-[#8A6749]">Displayed in Homepage "Shop by Occasion"</p>
            </div>
        </div>

        <form action="{{ route('admin.occasions.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="grid grid-cols-4 gap-3">
                <div class="col-span-1">
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Icon</label>
                    <input type="text" name="icon" value="{{ old('icon', '✨') }}" placeholder="💍" class="w-full text-center text-lg bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-2 py-2 text-[#432C19] outline-none focus:border-[#6B4B32]">
                </div>
                <div class="col-span-3">
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Title *</label>
                    <input type="text" name="title" value="{{ old('title') }}" required placeholder="e.g. Nikkah & Wedding" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2.5 text-xs text-[#432C19] outline-none focus:border-[#6B4B32]">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Short Description</label>
                <textarea name="description" rows="2" placeholder="Bespoke resin Nikkah platters, pen stands..." class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2.5 text-xs text-[#432C19] outline-none focus:border-[#6B4B32] resize-none">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Button Label</label>
                    <input type="text" name="link_text" value="{{ old('link_text', 'Explore') }}" placeholder="Explore Nikkah" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-3.5 py-2.5 text-xs text-[#432C19] outline-none focus:border-[#6B4B32]">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $occasions->count() + 1) }}" min="0" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-3.5 py-2.5 text-xs text-[#432C19] outline-none focus:border-[#6B4B32]">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Destination Link URL *</label>
                <input type="text" name="link_url" value="{{ old('link_url', '/products') }}" required placeholder="/category/resin-collection or /custom-orders" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2.5 text-xs text-[#432C19] outline-none focus:border-[#6B4B32]">
                <p class="text-[10px] text-[#8A6749] mt-1">e.g. <code>/custom-orders?category=nikkah</code>, <code>/products</code>, <code>/category/resin-collection</code></p>
            </div>

            <button type="submit" class="w-full bg-[#6B4B32] hover:bg-[#573C27] text-white py-2.5 rounded-xl text-xs font-semibold tracking-wide transition-colors cursor-pointer shadow-sm">
                + Add Occasion Card
            </button>
        </form>
    </div>

    <!-- Right: Occasions Cards Management (8 cols) -->
    <div class="lg:col-span-8 space-y-4">
        <div class="flex items-center justify-between">
            <h2 class="font-serif-lux text-2xl font-semibold text-[#4A301A]">Homepage Occasion Cards ({{ $occasions->count() }})</h2>
            <a href="{{ route('home') }}" target="_blank" class="text-xs font-semibold text-[#6B4B32] hover:underline">Preview on Storefront ↗</a>
        </div>

        @if($occasions->isEmpty())
            <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-10 text-center text-xs text-[#8A6749]">
                No occasion cards yet. Create your first card on the left!
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($occasions as $occasion)
                <div class="bg-[#FAF4ED] border {{ $occasion->is_active ? 'border-[#E8DACB]' : 'border-rose-200 opacity-75' }} rounded-2xl p-5 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex items-start justify-between gap-2 mb-3">
                            <div class="flex items-center space-x-3">
                                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-[#F4DFC8] to-[#E8CCB0] border border-[#DCBF9F] flex items-center justify-center text-xl">
                                    {{ $occasion->icon ?: '✨' }}
                                </div>
                                <div>
                                    <h3 class="font-serif-lux text-xl font-semibold text-[#4A301A] leading-tight">{{ $occasion->title }}</h3>
                                    <span class="text-[10px] font-mono text-[#8A6749]">Order #{{ $occasion->sort_order }}</span>
                                </div>
                            </div>

                            <form action="{{ route('admin.occasions.toggle-active', $occasion) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-2.5 py-1 rounded-full text-[10px] font-semibold cursor-pointer {{ $occasion->is_active ? 'bg-emerald-100 text-emerald-800 hover:bg-emerald-200' : 'bg-stone-200 text-stone-600 hover:bg-stone-300' }}">
                                    {{ $occasion->is_active ? '● Active' : '○ Hidden' }}
                                </button>
                            </form>
                        </div>

                        <p class="text-xs text-[#7D5A3C] leading-relaxed mb-3">{{ $occasion->description }}</p>

                        <div class="text-[11px] bg-[#F5ECE1] border border-[#E8DACB] rounded-xl px-3 py-2 text-[#5C3D24] mb-4 truncate">
                            <span class="font-semibold">{{ $occasion->link_text }} →</span>
                            <span class="text-[#8A6749] ml-1">{{ $occasion->link_url }}</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-3 border-t border-[#EFE2D4]">
                        <button type="button"
                                onclick="openEditOccasionModal({{ json_encode($occasion) }})"
                                class="text-xs font-semibold text-[#6B4B32] hover:text-[#4A2D16] cursor-pointer">
                            ✏️ Edit Card
                        </button>

                        <form action="{{ route('admin.occasions.destroy', $occasion) }}" method="POST" onsubmit="return confirm('Delete this occasion card?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs font-semibold text-rose-600 hover:text-rose-800 cursor-pointer">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<!-- Edit Occasion Modal -->
<div id="edit-occasion-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/50 backdrop-blur-xs">
    <div class="w-full max-w-md bg-[#FAF4ED] border border-[#DFCBB7] rounded-3xl p-6 shadow-2xl">
        <div class="flex items-center justify-between mb-4 pb-3 border-b border-[#EADBCC]">
            <h3 class="font-serif-lux text-2xl font-semibold text-[#4A301A]">Edit Occasion Card</h3>
            <button type="button" onclick="closeEditOccasionModal()" class="text-xl text-[#8A6749] hover:text-[#4A301A] cursor-pointer">×</button>
        </div>

        <form id="edit-occasion-form" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-4 gap-3">
                <div class="col-span-1">
                    <label class="block text-xs font-semibold text-[#52351E] mb-1">Icon</label>
                    <input type="text" name="icon" id="edit-occ-icon" class="w-full text-center text-lg bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-2 py-2 outline-none">
                </div>
                <div class="col-span-3">
                    <label class="block text-xs font-semibold text-[#52351E] mb-1">Title *</label>
                    <input type="text" name="title" id="edit-occ-title" required class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2 text-xs outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1">Description</label>
                <textarea name="description" id="edit-occ-desc" rows="2" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2 text-xs outline-none resize-none"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1">Button Label</label>
                    <input type="text" name="link_text" id="edit-occ-link-text" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-3 py-2 text-xs outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1">Sort Order</label>
                    <input type="number" name="sort_order" id="edit-occ-order" min="0" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-3 py-2 text-xs outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1">Destination Link URL *</label>
                <input type="text" name="link_url" id="edit-occ-url" required class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2 text-xs outline-none">
            </div>

            <div class="flex justify-end space-x-2 pt-2">
                <button type="button" onclick="closeEditOccasionModal()" class="px-4 py-2 rounded-xl text-xs font-semibold text-[#7A5A3E] bg-[#EFE2D4] cursor-pointer">Cancel</button>
                <button type="submit" class="px-5 py-2 rounded-xl text-xs font-semibold text-white bg-[#6B4B32] hover:bg-[#573C27] cursor-pointer">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditOccasionModal(item) {
    const modal = document.getElementById('edit-occasion-modal');
    const form = document.getElementById('edit-occasion-form');
    form.action = "{{ url('/admin/occasions') }}/" + item.id;
    document.getElementById('edit-occ-icon').value = item.icon || '✨';
    document.getElementById('edit-occ-title').value = item.title || '';
    document.getElementById('edit-occ-desc').value = item.description || '';
    document.getElementById('edit-occ-link-text').value = item.link_text || '';
    document.getElementById('edit-occ-url').value = item.link_url || '';
    document.getElementById('edit-occ-order').value = item.sort_order ?? 0;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeEditOccasionModal() {
    const modal = document.getElementById('edit-occasion-modal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>
@endsection
