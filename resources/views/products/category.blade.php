@extends('layouts.app')

@section('title', $category->name . ' — Islamic Crafts')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- Category Hero Banner -->
    <div class="luxury-card rounded-3xl p-8 sm:p-12 text-center mb-10 bg-gradient-to-b from-[#F7EEE3] to-[#F1E5D6]">
        <span class="text-4xl block mb-2">{{ $category->icon ?? '✨' }}</span>
        <h1 class="font-serif-lux text-3xl sm:text-5xl text-[#58381C] font-normal mb-3">
            {{ $category->name }}
        </h1>
        <p class="font-serif-lux italic text-base sm:text-lg text-[#7A5333] max-w-xl mx-auto">
            {{ $category->description ?? 'Handmade with love, crafted with elegance.' }}
        </p>

        <!-- Subcategories Pills -->
        @if($subcategories->isNotEmpty())
            <div class="flex flex-wrap items-center justify-center gap-2 mt-6">
                @foreach($subcategories as $sub)
                    <a href="{{ route('category.show', $sub->slug) }}" class="text-xs px-4 py-1.5 rounded-full border border-[#D5C2AC] bg-[#FAF4ED] text-[#55371E] hover:bg-[#6F4B2D] hover:text-[#FAF4ED] transition-colors {{ request()->is('category/' . $sub->slug) ? 'bg-[#6F4B2D] text-white' : '' }}">
                        {{ $sub->name }}
                    </a>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Products in Category -->
    @if($products->isEmpty())
        <div class="luxury-card rounded-2xl p-12 text-center my-8">
            <span class="text-4xl block mb-3">🌸</span>
            <h3 class="font-serif-lux text-2xl text-[#58381C] mb-2">New additions coming soon!</h3>
            <p class="text-xs text-[#8A6749] mb-6">We are currently crafting new designs for {{ $category->name }}. You can also order custom designs!</p>
            <a href="{{ route('custom-orders') }}" class="btn-luxury px-6 py-2.5 rounded-full text-xs">Request Custom Order</a>
        </div>
    @else
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5">
            @foreach($products as $product)
            <div class="luxury-card rounded-2xl overflow-hidden flex flex-col justify-between group">
                
                <a href="{{ route('products.show', $product->slug) }}" class="relative bg-[#EFE3D4] h-52 sm:h-60 flex items-center justify-center overflow-hidden">
                    @if($product->primary_image_url)
                        <img src="{{ $product->primary_image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    @else
                        <div class="flex flex-col items-center justify-center text-center p-4">
                            <span class="text-4xl mb-2">{{ $product->category->icon ?? '✨' }}</span>
                            <span class="font-serif-lux italic text-xs text-[#8A6749]">{{ $product->category->name }}</span>
                        </div>
                    @endif

                    @if($product->is_customizable)
                        <span class="absolute top-2 right-2 bg-[#FAF4ED]/90 text-[#6F4B2D] text-[9px] font-semibold px-2 py-0.5 rounded-full border border-[#D5C2AC]">
                            Custom ✨
                        </span>
                    @endif
                </a>

                <div class="p-4 text-center flex flex-col items-center flex-grow justify-between">
                    <div>
                        <h4 class="font-serif-lux text-sm sm:text-base text-[#55371E] font-medium line-clamp-1 mb-1">
                            <a href="{{ route('products.show', $product->slug) }}" class="hover:text-[#B89254] transition-colors">
                                {{ $product->name }}
                            </a>
                        </h4>
                        
                        <div class="text-xs sm:text-sm font-medium text-[#785333] mb-3">
                            <span>Rs. {{ number_format($product->current_price, 0) }}</span>
                            @if($product->sale_price)
                                <span class="text-[11px] text-[#A8917A] line-through ml-1">Rs. {{ number_format($product->price, 0) }}</span>
                            @endif
                        </div>
                    </div>

                    <form action="{{ route('cart.add') }}" method="POST" class="w-full">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="w-full btn-luxury py-2 px-3 rounded-xl text-xs font-medium tracking-wide">
                            Add to Cart
                        </button>
                    </form>
                </div>

            </div>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $products->links() }}
        </div>
    @endif

</div>

@endsection
