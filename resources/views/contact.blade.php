@extends('layouts.app')

@section('title', 'Contact Us — Islamic Crafts')

@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    
    <div class="text-center mb-12">
        <h1 class="font-serif-lux italic text-4xl sm:text-5xl text-[#58381C] font-normal mb-2">Get in Touch ♡</h1>
        <p class="text-xs sm:text-sm text-[#8B613D] italic">We would love to hear from you or assist you with your orders</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
        
        <!-- Quick Contact Channels -->
        <div class="md:col-span-5 space-y-4">
            
            <div class="luxury-card rounded-2xl p-6 text-center">
                <span class="text-3xl block mb-2">💬</span>
                <h3 class="font-serif-lux text-xl text-[#58381C] font-medium mb-1">WhatsApp Chat</h3>
                <p class="text-xs text-[#7D5A3C] mb-4">Fastest response for inquiries, customization & tracking.</p>
                @php
                    $cleanNumber = preg_replace('/[^0-9]/', '', env('WHATSAPP_NUMBER', '923001234567'));
                @endphp
                <a href="https://wa.me/{{ $cleanNumber }}?text=Assalam-o-Alaikum!%20I%20have%20an%20inquiry%20regarding%20Islamic%20Crafts." target="_blank" class="btn-luxury px-6 py-2.5 rounded-full text-xs inline-block">
                    Chat on WhatsApp
                </a>
            </div>

            <div class="luxury-card rounded-2xl p-6 text-center">
                <span class="text-3xl block mb-2">📸</span>
                <h3 class="font-serif-lux text-xl text-[#58381C] font-medium mb-1">Instagram</h3>
                <p class="text-xs text-[#7D5A3C] mb-3">Watch behind-the-scenes creation reels & updates.</p>
                <a href="https://instagram.com" target="_blank" class="text-xs text-[#6F4B2D] font-medium hover:underline">
                    @islamiccrafts
                </a>
            </div>

            <div class="luxury-card rounded-2xl p-6 text-center">
                <span class="text-3xl block mb-2">🚚</span>
                <h3 class="font-serif-lux text-xl text-[#58381C] font-medium mb-1">Delivery Info</h3>
                <p class="text-xs text-[#7D5A3C]">We deliver safely across all major cities and towns in Pakistan via registered couriers.</p>
            </div>

        </div>

        <!-- FAQs -->
        <div class="md:col-span-7">
            <div class="luxury-card rounded-3xl p-6 sm:p-8">
                <h3 class="font-serif-lux text-2xl text-[#58381C] font-medium mb-6 pb-2 border-b border-[#EADBCC]">
                    Frequently Asked Questions
                </h3>

                <div class="space-y-4 text-xs text-[#55371E]">
                    <div class="pb-3 border-b border-[#EADBCC]">
                        <h4 class="font-semibold text-sm text-[#58381C] mb-1">How can I place an order?</h4>
                        <p class="text-[#7D5A3C] leading-relaxed">You can browse any product, customize details, and click "Add to Cart" or "Quick WhatsApp Order". During checkout, your complete order bill is generated and sent to our WhatsApp.</p>
                    </div>

                    <div class="pb-3 border-b border-[#EADBCC]">
                        <h4 class="font-semibold text-sm text-[#58381C] mb-1">How long does delivery take?</h4>
                        <p class="text-[#7D5A3C] leading-relaxed">Ready-made items are dispatched within 2-3 business days. Personalized resin and calligraphy orders take 4-7 days for proper curing and handcrafting.</p>
                    </div>

                    <div class="pb-3 border-b border-[#EADBCC]">
                        <h4 class="font-semibold text-sm text-[#58381C] mb-1">What payment methods are available?</h4>
                        <p class="text-[#7D5A3C] leading-relaxed">We accept bank transfer, EasyPaisa, JazzCash, and advance deposit for personalized orders.</p>
                    </div>

                    <div>
                        <h4 class="font-semibold text-sm text-[#58381C] mb-1">Can I customize colors and names?</h4>
                        <p class="text-[#7D5A3C] leading-relaxed">Yes! Almost all of our resin platters, calligraphy frames, and crochet accessories can be customized according to your theme.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
