@extends('admin.layouts.admin')

@section('title', 'Edit: ' . $product->name)
@section('header_title', 'Edit: ' . $product->name)

@section('content')

<!-- Header Bar -->
<div class="flex items-center justify-between mb-8">
    <div class="flex items-center space-x-3">
        <a href="{{ route('admin.products.index') }}" class="w-9 h-9 rounded-xl bg-[#FAF4ED] border border-[#DECDBD] text-[#5C3D24] hover:bg-[#6B4B32] hover:text-white flex items-center justify-center transition-colors shadow-2xs" title="Back to Products">
            ←
        </a>
        <div>
            <h2 class="font-serif-lux text-2xl sm:text-3xl font-medium text-[#4A2F17]">
                {{ $product->name }}
            </h2>
            <div class="flex items-center space-x-2 text-xs text-[#8A6749] mt-0.5">
                <span class="font-mono">SKU: {{ $product->sku }}</span>
                <span>•</span>
                <span>Category: {{ $product->category->name ?? 'Uncategorized' }}</span>
            </div>
        </div>
    </div>

    <!-- Live Store Preview Button -->
    <a href="{{ route('products.show', $product->slug) }}" target="_blank" class="px-4 py-2 rounded-xl text-xs font-semibold bg-[#FAF4ED] text-[#5C3D24] border border-[#DFCBB7] hover:bg-[#EADBCC] transition-colors inline-flex items-center space-x-1.5 shadow-2xs">
        <span>Preview on Store</span>
        <span>↗</span>
    </a>
</div>

<!-- Main Edit Form -->
<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left Column: Core Product Info (7 cols) -->
        <div class="lg:col-span-7 space-y-6">
            
            <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-8 shadow-xs space-y-5">
                <div class="border-b border-[#EADBCC] pb-3 mb-2 flex items-center justify-between">
                    <h3 class="font-serif-lux text-xl font-medium text-[#4A2F17]">Product Details</h3>
                    <span class="text-xs text-[#8F6644] italic">Fields marked * are mandatory</span>
                </div>

                <!-- Product Name -->
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Product Title *</label>
                    <input type="text" 
                           name="name" 
                           value="{{ old('name', $product->name) }}" 
                           required 
                           class="w-full bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl px-4 py-3 text-xs sm:text-sm text-[#432C19] outline-none shadow-2xs transition-colors">
                    @error('name') <p class="text-rose-600 text-[11px] mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Category & Stock Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Category -->
                    <div>
                        <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Category *</label>
                        <select name="category_id" required class="w-full bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl px-3.5 py-3 text-xs text-[#432C19] outline-none shadow-2xs">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->parent ? '— ' . $cat->name : $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-rose-600 text-[11px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Stock Quantity -->
                    <div>
                        <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Inventory / Available Stock *</label>
                        <input type="number" 
                               name="stock" 
                               value="{{ old('stock', $product->stock) }}" 
                               min="0" 
                               required
                               class="w-full bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl px-4 py-3 text-xs text-[#432C19] outline-none shadow-2xs">
                        @error('stock') <p class="text-rose-600 text-[11px] mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Pricing Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Regular Price -->
                    <div>
                        <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Regular Price (PKR) *</label>
                        <input type="number" 
                               step="0.01" 
                               name="price" 
                               value="{{ old('price', $product->price) }}" 
                               required
                               class="w-full bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl px-4 py-3 text-xs text-[#432C19] outline-none shadow-2xs font-semibold">
                        @error('price') <p class="text-rose-600 text-[11px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Sale Price -->
                    <div>
                        <label class="block text-xs font-semibold text-[#52351E] mb-1.5 flex items-center justify-between">
                            <span>Sale / Discounted Price</span>
                            <span class="text-[10px] text-[#8A6749] font-normal">Optional</span>
                        </label>
                        <input type="number" 
                               step="0.01" 
                               name="sale_price" 
                               value="{{ old('sale_price', $product->sale_price) }}"
                               placeholder="Leave empty for regular price"
                               class="w-full bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl px-4 py-3 text-xs text-[#432C19] outline-none shadow-2xs">
                        @error('sale_price') <p class="text-rose-600 text-[11px] mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Short Summary / Tagline -->
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Short Summary / Tagline</label>
                    <input type="text" 
                           name="short_description" 
                           value="{{ old('short_description', $product->short_description) }}"
                           placeholder="e.g. Handmade gold foil floral resin earrings with stainless steel hooks."
                           class="w-full bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl px-4 py-2.5 text-xs text-[#432C19] outline-none shadow-2xs">
                </div>

                <!-- Full Craftsmanship Description -->
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Full Product Details & Dimensions *</label>
                    <textarea name="description" 
                              rows="6" 
                              required
                              class="w-full bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl p-4 text-xs text-[#432C19] outline-none shadow-2xs leading-relaxed">{{ old('description', $product->description) }}</textarea>
                    @error('description') <p class="text-rose-600 text-[11px] mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

        </div>

        <!-- Right Column: Media & Visibility Controls (5 cols) -->
        <div class="lg:col-span-5 space-y-6">
            
            <!-- Card 2: Visual Media Upload & Gallery Management -->
            <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-7 shadow-xs space-y-6">
                <div class="border-b border-[#EADBCC] pb-3 flex items-center justify-between">
                    <div>
                        <h3 class="font-serif-lux text-xl font-medium text-[#4A2F17]">Product Gallery</h3>
                        <p class="text-[11px] text-[#8A6749]">Manage Master photo and multiple gallery views</p>
                    </div>
                    <span class="text-[11px] text-[#6B4B32] font-semibold bg-[#F5ECE1] border border-[#DECDBD] px-2.5 py-1 rounded-full">
                        {{ $product->images->count() }} Photos
                    </span>
                </div>

                <!-- Current Images Grid -->
                <div>
                    <label class="block text-[11px] font-semibold text-[#8A6749] mb-2.5 uppercase tracking-wider">
                        Current Gallery Photos
                    </label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        @forelse($product->images as $img)
                        <div class="relative rounded-2xl bg-[#F4ECE1] border-2 {{ $img->is_primary ? 'border-[#6B4B32] shadow-xs' : 'border-[#DECDBD]' }} overflow-hidden p-1.5 flex flex-col justify-between group">
                            <!-- Thumbnail -->
                            <div class="aspect-square rounded-xl overflow-hidden bg-white mb-2 relative">
                                <img src="{{ $img->url }}" alt="Gallery photo" class="w-full h-full object-cover">
                                @if($img->is_primary)
                                    <span class="absolute top-1.5 left-1.5 text-[9px] font-bold uppercase tracking-wider bg-[#6B4B32] text-white px-2 py-0.5 rounded-full shadow-sm">
                                        ★ Master
                                    </span>
                                @endif
                            </div>

                            <!-- Actions Strip -->
                            <div class="flex items-center justify-between pt-1 border-t border-[#EADBCC] text-[10px]">
                                @if(!$img->is_primary)
                                    <button type="submit" 
                                            form="make-primary-form-{{ $img->id }}"
                                            class="text-[#6B4B32] font-semibold hover:underline flex items-center space-x-1"
                                            title="Set as master display photo">
                                        <span>★</span>
                                        <span>Set Master</span>
                                    </button>
                                @else
                                    <span class="text-emerald-800 font-semibold text-[10px]">✓ Master</span>
                                @endif

                                @if($product->images->count() > 1)
                                    <button type="submit" 
                                            form="delete-img-form-{{ $img->id }}"
                                            onclick="return confirm('Are you sure you want to delete this photo from the gallery?');"
                                            class="text-rose-700 hover:text-rose-900 p-0.5 rounded hover:bg-rose-50 transition-colors ml-auto"
                                            title="Delete image">
                                        🗑
                                    </button>
                                @endif
                            </div>
                        </div>
                        @empty
                        <div class="col-span-3 text-center py-6 text-xs text-[#8A6749]">
                            No images currently attached.
                        </div>
                        @endforelse
                    </div>
                </div>

                <!-- Replace Master Image Dropzone -->
                <div class="pt-4 border-t border-[#EADBCC] space-y-2">
                    <label class="block text-xs font-semibold text-[#52351E]">
                        ★ Replace Master Cover Image
                    </label>
                    <div id="master-dropzone" class="relative border-2 border-dashed border-[#DFCBB7] hover:border-[#6B4B32] rounded-2xl bg-[#F6ECE0]/60 p-4 text-center transition-colors cursor-pointer group">
                        <input type="file" 
                               name="primary_image" 
                               id="primary-image-input" 
                               accept="image/jpeg,image/png,image/webp,image/jpg"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        
                        <div id="master-preview-empty" class="py-2 flex flex-col items-center justify-center space-y-1">
                            <span class="text-xl">📷</span>
                            <span class="text-xs font-semibold text-[#4A2F17]">Click to select replacement Master photo</span>
                            <span class="text-[10px] text-[#8A6749]">Leave empty to keep current master photo</span>
                        </div>

                        <div id="master-preview-filled" class="hidden flex items-center space-x-3 p-1">
                            <div class="w-14 h-14 rounded-xl bg-white border border-[#DECDBD] overflow-hidden flex-shrink-0 shadow-xs">
                                <img id="master-preview-img" src="" alt="Master Preview" class="w-full h-full object-cover">
                            </div>
                            <div class="text-left flex-grow min-w-0">
                                <span class="text-xs font-bold text-[#4A2F17] truncate block" id="master-filename">image.jpg</span>
                                <span class="text-[10px] text-emerald-800 font-semibold bg-emerald-50 px-2 py-0.5 rounded-full inline-block">✓ Ready to replace</span>
                            </div>
                        </div>
                    </div>
                    @error('primary_image') <p class="text-rose-600 text-[11px] mt-1">{{ $message }}</p> @enderror
                    @error('image') <p class="text-rose-600 text-[11px] mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Add Multiple New Gallery Photos -->
                <div class="pt-4 border-t border-[#EADBCC] space-y-2">
                    <label class="block text-xs font-semibold text-[#52351E]">
                        🖼️ Add More Gallery Photos (Multiple)
                    </label>
                    <div id="gallery-dropzone" class="relative border-2 border-dashed border-[#DFCBB7] hover:border-[#6B4B32] rounded-2xl bg-[#F6ECE0]/60 p-4 text-center transition-colors cursor-pointer group">
                        <input type="file" 
                               name="gallery_images[]" 
                               id="gallery-images-input" 
                               multiple 
                               accept="image/jpeg,image/png,image/webp,image/jpg"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        
                        <div class="py-2 flex flex-col items-center justify-center space-y-1">
                            <span class="text-xl">🖼️</span>
                            <span class="text-xs font-semibold text-[#4A2F17]">Upload Multiple New Photos</span>
                            <span class="text-[10px] text-[#8A6749]">Select 1 or more extra photos to append to this gallery</span>
                        </div>
                    </div>

                    <!-- Live Multi-Preview Strip -->
                    <div id="gallery-preview-container" class="hidden pt-2">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[11px] font-semibold text-[#52351E]" id="gallery-preview-count">0 photos selected</span>
                            <button type="button" id="clear-gallery-btn" class="text-[10px] text-rose-700 hover:underline">Clear</button>
                        </div>
                        <div id="gallery-preview-grid" class="grid grid-cols-4 gap-2"></div>
                    </div>
                    @error('gallery_images.*') <p class="text-rose-600 text-[11px] mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Card 3: Visibility & Flags -->
            <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-7 shadow-xs space-y-4">
                <div class="border-b border-[#EADBCC] pb-3">
                    <h3 class="font-serif-lux text-xl font-medium text-[#4A2F17]">Storefront Settings</h3>
                </div>

                <div class="space-y-3.5 text-xs text-[#52351E]">
                    <!-- Active Status -->
                    <label class="flex items-start space-x-3 p-3 rounded-2xl bg-[#F6ECE0] border border-[#EADBCC] cursor-pointer hover:bg-[#F3E7D9] transition-colors">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }} class="mt-0.5 rounded border-[#DFCBB7] text-[#6B4B32] focus:ring-[#6B4B32]">
                        <div>
                            <span class="font-semibold text-[#4A2F17] block">Active / Visible on Store</span>
                            <span class="text-[11px] text-[#8A6749]">Uncheck to hide this product without deleting it.</span>
                        </div>
                    </label>

                    <!-- Featured on Homepage -->
                    <label class="flex items-start space-x-3 p-3 rounded-2xl bg-[#F6ECE0] border border-[#EADBCC] cursor-pointer hover:bg-[#F3E7D9] transition-colors">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }} class="mt-0.5 rounded border-[#DFCBB7] text-[#6B4B32] focus:ring-[#6B4B32]">
                        <div>
                            <span class="font-semibold text-[#4A2F17] block">Feature in "Our Bestsellers"</span>
                            <span class="text-[11px] text-[#8A6749]">Shows on home page in the 4 bestsellers row.</span>
                        </div>
                    </label>

                    <!-- Customizable -->
                    <label class="flex items-start space-x-3 p-3 rounded-2xl bg-[#F6ECE0] border border-[#EADBCC] cursor-pointer hover:bg-[#F3E7D9] transition-colors">
                        <input type="checkbox" name="is_customizable" value="1" {{ old('is_customizable', $product->is_customizable) ? 'checked' : '' }} class="mt-0.5 rounded border-[#DFCBB7] text-[#6B4B32] focus:ring-[#6B4B32]">
                        <div>
                            <span class="font-semibold text-[#4A2F17] block">Customizable Item</span>
                            <span class="text-[11px] text-[#8A6749]">Allows customers to type custom names or dates.</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Action Buttons Card -->
            <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 shadow-xs space-y-3">
                <button type="submit" class="btn-luxury w-full py-3.5 px-4 rounded-full text-xs sm:text-sm font-semibold tracking-wide text-center flex items-center justify-center space-x-2 shadow-md hover:shadow-lg transform transition-all duration-300 hover:scale-[1.02]">
                    <span>✓ Save & Update Product</span>
                </button>

                <a href="{{ route('admin.products.index') }}" class="w-full py-3 px-4 rounded-full text-xs font-semibold text-[#7A5638] bg-[#F6ECE0] hover:bg-[#EADBCC] border border-[#DFCBB7] transition-all text-center block">
                    Cancel & Return to Catalog
                </a>
            </div>

        </div>

    </div>
</form>

<!-- Standalone Action Forms for Individual Gallery Images -->
@foreach($product->images as $img)
    @if(!$img->is_primary)
        <form id="make-primary-form-{{ $img->id }}" 
              action="{{ route('admin.products.images.make-primary', [$product, $img]) }}" 
              method="POST" 
              class="hidden">
            @csrf
        </form>
    @endif

    @if($product->images->count() > 1)
        <form id="delete-img-form-{{ $img->id }}" 
              action="{{ route('admin.products.images.destroy', [$product, $img]) }}" 
              method="POST" 
              class="hidden">
            @csrf
            @method('DELETE')
        </form>
    @endif
@endforeach

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // --- 1. Master Image Preview ---
        const primaryInput = document.getElementById('primary-image-input');
        const masterEmpty = document.getElementById('master-preview-empty');
        const masterFilled = document.getElementById('master-preview-filled');
        const masterImg = document.getElementById('master-preview-img');
        const masterFilename = document.getElementById('master-filename');

        if (primaryInput) {
            primaryInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        masterImg.src = e.target.result;
                        masterFilename.textContent = file.name;
                        masterEmpty.classList.add('hidden');
                        masterFilled.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // --- 2. Multiple Gallery Images Preview ---
        const galleryInput = document.getElementById('gallery-images-input');
        const galleryContainer = document.getElementById('gallery-preview-container');
        const galleryGrid = document.getElementById('gallery-preview-grid');
        const galleryCount = document.getElementById('gallery-preview-count');
        const clearBtn = document.getElementById('clear-gallery-btn');

        if (galleryInput && galleryGrid) {
            galleryInput.addEventListener('change', function () {
                const files = Array.from(this.files);
                if (files.length > 0) {
                    galleryGrid.innerHTML = '';
                    galleryCount.textContent = `${files.length} new photo${files.length > 1 ? 's' : ''} to append`;
                    galleryContainer.classList.remove('hidden');

                    files.forEach(file => {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const thumbDiv = document.createElement('div');
                            thumbDiv.className = 'aspect-square rounded-xl bg-white border border-[#DECDBD] overflow-hidden shadow-2xs relative group';
                            thumbDiv.innerHTML = `
                                <img src="${e.target.result}" alt="${file.name}" class="w-full h-full object-cover">
                                <span class="absolute bottom-0 inset-x-0 bg-black/60 text-white text-[9px] px-1 py-0.5 truncate text-center">${file.name}</span>
                            `;
                            galleryGrid.appendChild(thumbDiv);
                        };
                        reader.readAsDataURL(file);
                    });
                } else {
                    galleryContainer.classList.add('hidden');
                }
            });

            if (clearBtn) {
                clearBtn.addEventListener('click', function () {
                    galleryInput.value = '';
                    galleryGrid.innerHTML = '';
                    galleryContainer.classList.add('hidden');
                });
            }
        }
    });
</script>
@endpush

@endsection
