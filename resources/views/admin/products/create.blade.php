@extends('admin.layouts.admin')

@section('title', 'Add New Craft Item')
@section('header_title', 'Create Handcrafted Product')

@section('content')

<!-- Header Bar -->
<div class="flex items-center justify-between mb-8">
    <div class="flex items-center space-x-3">
        <a href="{{ route('admin.products.index') }}" class="w-9 h-9 rounded-xl bg-[#FAF4ED] border border-[#DECDBD] text-[#5C3D24] hover:bg-[#6B4B32] hover:text-white flex items-center justify-center transition-colors shadow-2xs" title="Back to Products">
            ←
        </a>
        <div>
            <h2 class="font-serif-lux text-2xl sm:text-3xl font-medium text-[#4A2F17]">
                Add New Product
            </h2>
            <p class="text-xs text-[#8A6749] mt-0.5">Upload a new resin, floral, or crochet masterpiece to your catalog</p>
        </div>
    </div>
</div>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

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
                           value="{{ old('name') }}" 
                           required 
                           placeholder="e.g. Personalized Gold Foil Resin Platter"
                           class="w-full bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl px-4 py-3 text-xs sm:text-sm text-[#432C19] outline-none shadow-2xs transition-colors">
                    @error('name') <p class="text-rose-600 text-[11px] mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Category & Stock Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Category -->
                    <div>
                        <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Category *</label>
                        <select name="category_id" required class="w-full bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl px-3.5 py-3 text-xs text-[#432C19] outline-none shadow-2xs">
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->parent ? '— ' . $cat->name : $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-rose-600 text-[11px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Stock Quantity -->
                    <div>
                        <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Initial Stock *</label>
                        <input type="number" 
                               name="stock" 
                               value="{{ old('stock', 10) }}" 
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
                               value="{{ old('price') }}" 
                               required
                               placeholder="e.g. 1800"
                               class="w-full bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl px-4 py-3 text-xs text-[#432C19] outline-none shadow-2xs font-semibold">
                        @error('price') <p class="text-rose-600 text-[11px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Sale Price -->
                    <div>
                        <label class="block text-xs font-semibold text-[#52351E] mb-1.5 flex items-center justify-between">
                            <span>Sale / Promo Price</span>
                            <span class="text-[10px] text-[#8A6749] font-normal">Optional</span>
                        </label>
                        <input type="number" 
                               step="0.01" 
                               name="sale_price" 
                               value="{{ old('sale_price') }}"
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
                           value="{{ old('short_description') }}"
                           placeholder="e.g. Preserved botanicals encased in crystal-clear epoxy resin."
                           class="w-full bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl px-4 py-2.5 text-xs text-[#432C19] outline-none shadow-2xs">
                </div>

                <!-- Full Craftsmanship Description -->
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Full Product Details & Care Instructions *</label>
                    <textarea name="description" 
                              rows="6" 
                              required
                              placeholder="Describe materials, handmade processes, dimensions, packaging details, and care guidelines..."
                              class="w-full bg-[#FAF4ED] border border-[#DECDBD] focus:border-[#6B4B32] rounded-xl p-4 text-xs text-[#432C19] outline-none shadow-2xs leading-relaxed">{{ old('description') }}</textarea>
                    @error('description') <p class="text-rose-600 text-[11px] mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

        </div>

        <!-- Right Column: Media & Visibility Controls (5 cols) -->
        <div class="lg:col-span-5 space-y-6">
            
            <!-- Card 2: Visual Media Upload (Master & Multiple Gallery) -->
            <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-7 shadow-xs space-y-6">
                <div class="border-b border-[#EADBCC] pb-3 flex items-center justify-between">
                    <div>
                        <h3 class="font-serif-lux text-xl font-medium text-[#4A2F17]">Product Imagery</h3>
                        <p class="text-[11px] text-[#8A6749]">Master cover photo + multiple gallery angles</p>
                    </div>
                    <span class="text-[11px] text-[#6B4B32] font-semibold bg-[#F5ECE1] border border-[#DECDBD] px-2.5 py-1 rounded-full">
                        HD Studio
                    </span>
                </div>

                <!-- 1. Master / Primary Featured Image -->
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-semibold text-[#52351E]">
                            ★ Master Cover Image <span class="text-rose-600">*</span>
                        </label>
                        <span class="text-[10px] text-[#8F6644] font-medium">Primary Storefront Display</span>
                    </div>

                    <!-- Modern Interactive Master Dropzone -->
                    <div id="master-dropzone" class="relative border-2 border-dashed border-[#DFCBB7] hover:border-[#6B4B32] rounded-2xl bg-[#F6ECE0]/60 p-4 text-center transition-colors cursor-pointer group">
                        <input type="file" 
                               name="primary_image" 
                               id="primary-image-input" 
                               accept="image/jpeg,image/png,image/webp,image/jpg"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        
                        <div id="master-preview-empty" class="py-3 flex flex-col items-center justify-center space-y-2">
                            <div class="w-12 h-12 rounded-full bg-[#FAF4ED] border border-[#DFCBB7] text-[#6B4B32] flex items-center justify-center text-xl shadow-2xs group-hover:scale-110 transition-transform">
                                📷
                            </div>
                            <div>
                                <span class="text-xs font-semibold text-[#4A2F17] block">Click to upload Master Image or drag & drop</span>
                                <span class="text-[10px] text-[#8A6749] block mt-0.5">JPG, PNG, WebP up to 5MB (Square 1:1 recommended)</span>
                            </div>
                        </div>

                        <!-- Live Master Preview Container -->
                        <div id="master-preview-filled" class="hidden flex items-center space-x-3 p-1">
                            <div class="w-16 h-16 rounded-xl bg-white border border-[#DECDBD] overflow-hidden flex-shrink-0 shadow-xs">
                                <img id="master-preview-img" src="" alt="Master Preview" class="w-full h-full object-cover">
                            </div>
                            <div class="text-left flex-grow min-w-0">
                                <span class="text-xs font-bold text-[#4A2F17] truncate block" id="master-filename">image.jpg</span>
                                <span class="text-[10px] text-emerald-800 font-semibold bg-emerald-50 px-2 py-0.5 rounded-full inline-block mt-0.5">✓ Master Cover Selected</span>
                                <span class="text-[10px] text-[#8A6749] block mt-1 hover:underline cursor-pointer">Click to change</span>
                            </div>
                        </div>
                    </div>
                    @error('primary_image') <p class="text-rose-600 text-[11px] mt-1">{{ $message }}</p> @enderror
                    @error('image') <p class="text-rose-600 text-[11px] mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- 2. Additional Gallery Images (Multiple) -->
                <div class="space-y-2 pt-2 border-t border-[#EADBCC]">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-semibold text-[#52351E]">
                            🖼️ Multiple Gallery Photos
                        </label>
                        <span class="text-[10px] text-[#8F6644] font-medium">Extra Angles & Closeups</span>
                    </div>

                    <!-- Modern Interactive Multi-Image Dropzone -->
                    <div id="gallery-dropzone" class="relative border-2 border-dashed border-[#DFCBB7] hover:border-[#6B4B32] rounded-2xl bg-[#F6ECE0]/60 p-4 text-center transition-colors cursor-pointer group">
                        <input type="file" 
                               name="gallery_images[]" 
                               id="gallery-images-input" 
                               multiple 
                               accept="image/jpeg,image/png,image/webp,image/jpg"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        
                        <div class="py-3 flex flex-col items-center justify-center space-y-2">
                            <div class="w-12 h-12 rounded-full bg-[#FAF4ED] border border-[#DFCBB7] text-[#6B4B32] flex items-center justify-center text-xl shadow-2xs group-hover:scale-110 transition-transform">
                                🖼️
                            </div>
                            <div>
                                <span class="text-xs font-semibold text-[#4A2F17] block">Choose Multiple Gallery Images</span>
                                <span class="text-[10px] text-[#8A6749] block mt-0.5">Hold Ctrl / Shift to pick 2, 3, or more photos at once</span>
                            </div>
                        </div>
                    </div>

                    <!-- Live Multi-Preview Thumbnails Strip -->
                    <div id="gallery-preview-container" class="hidden pt-2">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[11px] font-semibold text-[#52351E]" id="gallery-preview-count">0 photos selected</span>
                            <button type="button" id="clear-gallery-btn" class="text-[10px] text-rose-700 hover:underline">Clear all</button>
                        </div>
                        <div id="gallery-preview-grid" class="grid grid-cols-4 sm:grid-cols-5 gap-2"></div>
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
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="mt-0.5 rounded border-[#DFCBB7] text-[#6B4B32] focus:ring-[#6B4B32]">
                        <div>
                            <span class="font-semibold text-[#4A2F17] block">Active / Publish to Store Immediately</span>
                            <span class="text-[11px] text-[#8A6749]">Product will be visible to website visitors.</span>
                        </div>
                    </label>

                    <!-- Featured on Homepage -->
                    <label class="flex items-start space-x-3 p-3 rounded-2xl bg-[#F6ECE0] border border-[#EADBCC] cursor-pointer hover:bg-[#F3E7D9] transition-colors">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="mt-0.5 rounded border-[#DFCBB7] text-[#6B4B32] focus:ring-[#6B4B32]">
                        <div>
                            <span class="font-semibold text-[#4A2F17] block">Feature in "Our Bestsellers"</span>
                            <span class="text-[11px] text-[#8A6749]">Highlight this item in the home page showcase.</span>
                        </div>
                    </label>

                    <!-- Customizable -->
                    <label class="flex items-start space-x-3 p-3 rounded-2xl bg-[#F6ECE0] border border-[#EADBCC] cursor-pointer hover:bg-[#F3E7D9] transition-colors">
                        <input type="checkbox" name="is_customizable" value="1" {{ old('is_customizable', true) ? 'checked' : '' }} class="mt-0.5 rounded border-[#DFCBB7] text-[#6B4B32] focus:ring-[#6B4B32]">
                        <div>
                            <span class="font-semibold text-[#4A2F17] block">Customizable Item</span>
                            <span class="text-[11px] text-[#8A6749]">Allows customers to type custom names, dates, or messages.</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Action Buttons Card -->
            <div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 shadow-xs space-y-3">
                <button type="submit" class="btn-luxury w-full py-3.5 px-4 rounded-full text-xs sm:text-sm font-semibold tracking-wide text-center flex items-center justify-center space-x-2 shadow-md hover:shadow-lg transform transition-all duration-300 hover:scale-[1.02]">
                    <span>+ Publish Product to Catalog</span>
                </button>

                <a href="{{ route('admin.products.index') }}" class="w-full py-3 px-4 rounded-full text-xs font-semibold text-[#7A5638] bg-[#F6ECE0] hover:bg-[#EADBCC] border border-[#DFCBB7] transition-all text-center block">
                    Cancel & Return to Catalog
                </a>
            </div>

        </div>

    </div>
</form>

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
                    galleryCount.textContent = `${files.length} photo${files.length > 1 ? 's' : ''} ready to upload`;
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
