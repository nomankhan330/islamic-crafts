@extends('admin.layouts.admin')

@section('title', 'Storefront Settings')
@section('header_title', 'Storefront Settings')

@section('content')

<div class="max-w-4xl space-y-6">

    <!-- Espresso Header -->
    <div class="relative rounded-[2rem] bg-gradient-to-br from-[#4A2E19] via-[#5B3A20] to-[#361F0E] text-[#FAF4ED] p-6 sm:p-8 shadow-md overflow-hidden">
        <div class="pointer-events-none absolute -top-16 -right-16 w-56 h-56 rounded-full bg-[#C6A47E]/15 blur-3xl"></div>
        <div class="relative">
            <span class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-[#FAF4ED]/10 border border-[#DFCBB7]/25 text-[10px] font-semibold uppercase tracking-[0.2em] text-[#E6C9A8] mb-3">
                <span>⚙️</span>
                <span>Studio Configuration</span>
            </span>
            <h2 class="font-serif-lux italic text-3xl text-[#FDF8F1] font-normal">Manage Storefront Details</h2>
            <p class="text-xs sm:text-sm text-[#DBC4AC] mt-1">Update your WhatsApp concierge number, Instagram links, delivery rules, and announcement bar anytime.</p>
        </div>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-8 shadow-xs space-y-6">
        @csrf

        <!-- Contact & Social -->
        <div>
            <h3 class="font-serif-lux text-xl font-semibold text-[#4A301A] pb-2 mb-4 border-b border-[#EADBCC]">Contact & Social Channels</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">WhatsApp Number (with country code) *</label>
                    <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $settings['whatsapp_number']) }}" required placeholder="923001234567" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2.5 text-xs text-[#432C19] outline-none focus:border-[#6B4B32]">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Contact Email</label>
                    <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email']) }}" placeholder="salam@islamiccrafts.com" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2.5 text-xs text-[#432C19] outline-none focus:border-[#6B4B32]">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Instagram Handle</label>
                    <input type="text" name="instagram_handle" value="{{ old('instagram_handle', $settings['instagram_handle']) }}" placeholder="@islamiccrafts" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2.5 text-xs text-[#432C19] outline-none focus:border-[#6B4B32]">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Instagram Profile URL</label>
                    <input type="text" name="instagram_url" value="{{ old('instagram_url', $settings['instagram_url']) }}" placeholder="https://instagram.com/islamiccrafts" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2.5 text-xs text-[#432C19] outline-none focus:border-[#6B4B32]">
                </div>
            </div>
        </div>

        <!-- Delivery & Studio -->
        <div>
            <h3 class="font-serif-lux text-xl font-semibold text-[#4A301A] pb-2 mb-4 border-b border-[#EADBCC]">Shipping & Studio Hours</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Free Delivery Above (Rs.)</label>
                    <input type="number" name="free_delivery_threshold" value="{{ old('free_delivery_threshold', $settings['free_delivery_threshold']) }}" min="0" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2.5 text-xs text-[#432C19] outline-none focus:border-[#6B4B32]">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Standard Delivery Fee (Rs.)</label>
                    <input type="number" name="delivery_fee" value="{{ old('delivery_fee', $settings['delivery_fee']) }}" min="0" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2.5 text-xs text-[#432C19] outline-none focus:border-[#6B4B32]">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Studio Hours</label>
                    <input type="text" name="studio_hours" value="{{ old('studio_hours', $settings['studio_hours']) }}" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2.5 text-xs text-[#432C19] outline-none focus:border-[#6B4B32]">
                </div>
            </div>
        </div>

        <!-- Announcement Banner -->
        <div>
            <h3 class="font-serif-lux text-xl font-semibold text-[#4A301A] pb-2 mb-4 border-b border-[#EADBCC]">Top Announcement Bar</h3>
            <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Storefront Announcement Text</label>
            <input type="text" name="announcement_text" value="{{ old('announcement_text', $settings['announcement_text']) }}" class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2.5 text-xs text-[#432C19] outline-none focus:border-[#6B4B32]">
        </div>

        <div class="pt-2 flex justify-end">
            <button type="submit" class="btn-luxury px-7 py-3 rounded-full text-xs font-semibold shadow-sm cursor-pointer">
                Save Storefront Settings ✨
            </button>
        </div>
    </form>

</div>

@endsection
