@extends('admin.layouts.admin')

@section('title', 'Studio Lookbook Management')
@section('header_title', 'Studio Lookbook Gallery')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

    <!-- Left: Add New Lookbook Photo (4 cols) -->
    <div class="lg:col-span-4 bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 shadow-sm h-fit">
        <div class="flex items-center space-x-2 mb-4 pb-3 border-b border-[#EADBCC]">
            <span class="text-xl">📸</span>
            <div>
                <h2 class="font-serif-lux text-xl font-semibold text-[#4A301A] leading-tight">Add Lookbook Photo</h2>
                <p class="text-[11px] text-[#8A6749]">"Crafted in Our Studio, Loved in Your Homes"</p>
            </div>
        </div>

        <form action="{{ route('admin.lookbook.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Upload Dropzone with Live Preview -->
            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Upload Studio Photo *</label>
                <label for="lookbook-image-input" class="block border-2 border-dashed border-[#D6BEA5] hover:border-[#6B4B32] rounded-2xl p-4 text-center bg-[#F5ECE1]/60 cursor-pointer transition-colors">
                    <img id="lookbook-preview-img" src="" alt="" class="hidden w-full h-36 object-cover rounded-xl mb-2">
                    <div id="lookbook-upload-placeholder">
                        <span class="text-2xl block mb-1">🖼️</span>
                        <span class="text-xs font-semibold text-[#5C3D24] block">Click to upload photo</span>
                        <span class="text-[10px] text-[#8A6749]">JPG, PNG or WEBP (max 4MB)</span>
                    </div>
                    <input type="file" name="image" id="lookbook-image-input" accept="image/*" class="hidden">
                </label>
                @error('image')
                    <p class="text-rose-600 text-[11px] mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1">Or Use Image Path / URL</label>
                <input type="text" name="image_path" value="{{ old('image_path') }}" placeholder="e.g. images/luxury-resin-tray-hd.jpg" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-3.5 py-2 text-xs text-[#432C19] outline-none focus:border-[#6B4B32]">
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Photo Caption *</label>
                <input type="text" name="caption" value="{{ old('caption') }}" required placeholder="e.g. Gold Leaf Nikkah Platter" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2.5 text-xs text-[#432C19] outline-none focus:border-[#6B4B32]">
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Instagram Handle</label>
                    <input type="text" name="handle" value="{{ old('handle', '@islamiccrafts') }}" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-3 py-2 text-xs text-[#432C19] outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $items->count() + 1) }}" min="0" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-3 py-2 text-xs text-[#432C19] outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Click Link URL</label>
                <input type="text" name="link_url" value="{{ old('link_url', 'https://instagram.com') }}" placeholder="https://instagram.com/..." class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2 text-xs text-[#432C19] outline-none">
            </div>

            <button type="submit" class="w-full bg-[#6B4B32] hover:bg-[#573C27] text-white py-2.5 rounded-xl text-xs font-semibold tracking-wide transition-colors cursor-pointer shadow-sm">
                + Add to Lookbook
            </button>
        </form>
    </div>

    <!-- Right: Visual Lookbook Gallery Grid (8 cols) -->
    <div class="lg:col-span-8 space-y-4">
        <div class="flex items-center justify-between">
            <h2 class="font-serif-lux text-2xl font-semibold text-[#4A301A]">Studio Lookbook Photos ({{ $items->count() }})</h2>
            <a href="{{ route('home') }}" target="_blank" class="text-xs font-semibold text-[#6B4B32] hover:underline">Preview on Storefront ↗</a>
        </div>

        @if($items->isEmpty())
            <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-10 text-center text-xs text-[#8A6749]">
                No lookbook photos yet. Upload your first studio photo on the left!
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
                @foreach($items as $item)
                <div class="bg-[#FAF4ED] border {{ $item->is_active ? 'border-[#E8DACB]' : 'border-rose-200 opacity-75' }} rounded-2xl overflow-hidden shadow-sm flex flex-col justify-between">
                    <div class="relative aspect-square bg-[#F2E7DA] overflow-hidden">
                        <img src="{{ $item->image_url }}" alt="{{ $item->caption }}" class="w-full h-full object-cover">
                        <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded-full bg-[#3A2210]/80 text-[#FAF4ED] text-[10px] font-mono">
                            #{{ $item->sort_order }}
                        </span>
                        <form action="{{ route('admin.lookbook.toggle-active', $item) }}" method="POST" class="absolute top-2.5 right-2.5">
                            @csrf
                            <button type="submit" class="px-2.5 py-0.5 rounded-full text-[10px] font-semibold cursor-pointer shadow-xs {{ $item->is_active ? 'bg-emerald-500 text-white' : 'bg-stone-600 text-white' }}">
                                {{ $item->is_active ? 'Visible' : 'Hidden' }}
                            </button>
                        </form>
                    </div>

                    <div class="p-4">
                        <h3 class="font-semibold text-xs text-[#4A301A] line-clamp-1 mb-0.5">{{ $item->caption }}</h3>
                        <p class="text-[11px] text-[#8A6749] mb-3">{{ $item->handle ?: '@islamiccrafts' }}</p>

                        <div class="flex items-center justify-between pt-2.5 border-t border-[#EFE2D4]">
                            <button type="button"
                                    onclick="openEditLookbookModal({{ json_encode($item) }})"
                                    class="text-xs font-semibold text-[#6B4B32] hover:text-[#4A2D16] cursor-pointer">
                                ✏️ Edit
                            </button>

                            <form action="{{ route('admin.lookbook.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this lookbook photo?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs font-semibold text-rose-600 hover:text-rose-800 cursor-pointer">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<!-- Edit Lookbook Modal -->
<div id="edit-lookbook-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/50 backdrop-blur-xs">
    <div class="w-full max-w-md bg-[#FAF4ED] border border-[#DFCBB7] rounded-3xl p-6 shadow-2xl">
        <div class="flex items-center justify-between mb-4 pb-3 border-b border-[#EADBCC]">
            <h3 class="font-serif-lux text-2xl font-semibold text-[#4A301A]">Edit Lookbook Photo</h3>
            <button type="button" onclick="closeEditLookbookModal()" class="text-xl text-[#8A6749] hover:text-[#4A301A] cursor-pointer">×</button>
        </div>

        <form id="edit-lookbook-form" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1">Caption *</label>
                <input type="text" name="caption" id="edit-lb-caption" required class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2 text-xs outline-none">
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1">Replace Photo (optional)</label>
                <input type="file" name="image" accept="image/*" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-3 py-2 text-xs outline-none">
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1">Or Image Path / URL</label>
                <input type="text" name="image_path" id="edit-lb-path" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2 text-xs outline-none">
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1">Handle</label>
                    <input type="text" name="handle" id="edit-lb-handle" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-3 py-2 text-xs outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1">Sort Order</label>
                    <input type="number" name="sort_order" id="edit-lb-order" min="0" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-3 py-2 text-xs outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1">Click Link URL</label>
                <input type="text" name="link_url" id="edit-lb-url" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2 text-xs outline-none">
            </div>

            <div class="flex justify-end space-x-2 pt-2">
                <button type="button" onclick="closeEditLookbookModal()" class="px-4 py-2 rounded-xl text-xs font-semibold text-[#7A5A3E] bg-[#EFE2D4] cursor-pointer">Cancel</button>
                <button type="submit" class="px-5 py-2 rounded-xl text-xs font-semibold text-white bg-[#6B4B32] hover:bg-[#573C27] cursor-pointer">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('lookbook-image-input')?.addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (!file) return;
    const preview = document.getElementById('lookbook-preview-img');
    const placeholder = document.getElementById('lookbook-upload-placeholder');
    preview.src = URL.createObjectURL(file);
    preview.classList.remove('hidden');
    if (placeholder) placeholder.classList.add('hidden');
});

function openEditLookbookModal(item) {
    const modal = document.getElementById('edit-lookbook-modal');
    const form = document.getElementById('edit-lookbook-form');
    form.action = "{{ url('/admin/lookbook') }}/" + item.id;
    document.getElementById('edit-lb-caption').value = item.caption || '';
    document.getElementById('edit-lb-path').value = item.image_path || '';
    document.getElementById('edit-lb-handle').value = item.handle || '@islamiccrafts';
    document.getElementById('edit-lb-url').value = item.link_url || '';
    document.getElementById('edit-lb-order').value = item.sort_order ?? 0;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeEditLookbookModal() {
    const modal = document.getElementById('edit-lookbook-modal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>
@endsection
