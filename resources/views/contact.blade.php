@extends('layouts.app')

@section('title', 'Contact Us — Islamic Crafts')

@section('content')
@php
    $cleanNumber = preg_replace('/[^0-9]/', '', env('WHATSAPP_NUMBER', '923001234567'));
    $displayNumber = '+' . substr($cleanNumber, 0, 2) . ' ' . substr($cleanNumber, 2, 3) . ' ' . substr($cleanNumber, 5);
@endphp

<div class="relative overflow-hidden">
    <!-- Subtle Ambient Background Accents -->
    <div class="pointer-events-none absolute -top-24 -left-24 w-96 h-96 rounded-full bg-[#E9D5BC]/35 blur-3xl"></div>
    <div class="pointer-events-none absolute top-40 -right-24 w-80 h-80 rounded-full bg-[#DFC3A3]/25 blur-3xl"></div>

    <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">

        <!-- Luxury Hero Header -->
        <div class="relative rounded-[2rem] bg-gradient-to-br from-[#FAF3EA] via-[#F5EADC] to-[#EFE0CE] border border-[#E2CEB9] px-6 py-12 sm:px-12 sm:py-14 text-center shadow-sm overflow-hidden mb-10">
            <div class="pointer-events-none absolute top-4 left-6 text-[#C9AE90]/40 text-2xl select-none">✦</div>
            <div class="pointer-events-none absolute bottom-4 right-8 text-[#C9AE90]/40 text-2xl select-none">✦</div>

            <div class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-full bg-[#FBF6EE]/90 border border-[#DFCBB7] text-[10px] sm:text-[11px] font-semibold uppercase tracking-[0.2em] text-[#7D5838] mb-5 shadow-2xs">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Atelier Concierge & Customer Care</span>
            </div>

            <h1 class="font-serif-lux italic text-4xl sm:text-5xl lg:text-6xl text-[#4A2D16] font-normal tracking-tight mb-3">
                Get in Touch <span class="text-[#9E7248]">♡</span>
            </h1>

            <p class="max-w-xl mx-auto text-xs sm:text-sm text-[#7D5A3C] leading-relaxed mb-7">
                Whether you're tracking an order, dreaming up a custom Nikkah keepsake, or planning wedding favors — our artisans are always happy to assist you personally.
            </p>

            <!-- Live Trust Pills -->
            <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-3 text-[11px] font-medium text-[#5C3D24]">
                <span class="inline-flex items-center space-x-1.5 px-3.5 py-1.5 rounded-full bg-[#FBF6EE]/90 border border-[#E4D1BD]">
                    <span>⚡</span>
                    <span>Avg. Reply: Under 15 mins</span>
                </span>
                <span class="inline-flex items-center space-x-1.5 px-3.5 py-1.5 rounded-full bg-[#FBF6EE]/90 border border-[#E4D1BD]">
                    <span>🕙</span>
                    <span>Mon – Sat, 10 AM – 9 PM PKT</span>
                </span>
                <span class="inline-flex items-center space-x-1.5 px-3.5 py-1.5 rounded-full bg-[#FBF6EE]/90 border border-[#E4D1BD]">
                    <span>🚚</span>
                    <span>Nationwide Tracked Delivery</span>
                </span>
            </div>
        </div>

        <!-- 3-Column Luxury Contact Channels -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 sm:gap-6 mb-12">

            <!-- WhatsApp Featured Card -->
            <div class="group relative rounded-3xl bg-gradient-to-br from-[#4D311B] via-[#5C3B22] to-[#3E2513] text-[#FAF4ED] p-7 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between overflow-hidden">
                <div class="pointer-events-none absolute -right-8 -top-8 w-32 h-32 rounded-full bg-[#C6A47E]/15 blur-2xl"></div>
                <div>
                    <div class="flex items-center justify-between mb-5">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-500/20 border border-emerald-400/30 flex items-center justify-center text-emerald-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.52 3.48A11.86 11.86 0 0012.06 0C5.47 0 .1 5.37.1 11.96c0 2.11.55 4.17 1.6 5.98L0 24l6.23-1.63a11.9 11.9 0 005.83 1.49h.01c6.59 0 11.96-5.37 11.96-11.96 0-3.2-1.25-6.2-3.51-8.42zM12.07 21.84h-.01a9.9 9.9 0 01-5.05-1.38l-.36-.22-3.7.97.99-3.61-.24-.37a9.89 9.89 0 01-1.52-5.27c0-5.46 4.44-9.9 9.9-9.9 2.64 0 5.13 1.03 7 2.9a9.83 9.83 0 012.9 7c0 5.46-4.44 9.88-9.91 9.88zm5.43-7.41c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.49-1.77-1.66-2.07-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.61-.92-2.2-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.22 3.08c.15.2 2.1 3.21 5.09 4.5.71.31 1.27.49 1.7.63.72.23 1.37.2 1.88.12.57-.09 1.76-.72 2.01-1.41.25-.7.25-1.29.17-1.41-.07-.12-.27-.2-.57-.35z"/>
                            </svg>
                        </div>
                        <span class="inline-flex items-center space-x-1.5 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-emerald-500/20 text-emerald-200 border border-emerald-400/30">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>Fastest Reply</span>
                        </span>
                    </div>
                    <h3 class="font-serif-lux text-2xl font-medium text-[#FDF8F1] mb-1.5">WhatsApp Concierge</h3>
                    <p class="text-xs text-[#DFCBB7] leading-relaxed mb-4">
                        Direct chat with our studio team for quick inquiries, resin color matching, digital previews & order tracking.
                    </p>
                    <p class="text-xs font-semibold tracking-wide text-[#F3DEC7] mb-5">{{ $displayNumber }}</p>
                </div>
                <a href="https://wa.me/{{ $cleanNumber }}?text=Assalam-o-Alaikum!%20I%20have%20an%20inquiry%20regarding%20Islamic%20Crafts."
                   target="_blank"
                   rel="noopener noreferrer"
                   class="w-full inline-flex items-center justify-center space-x-2 px-5 py-3 rounded-full bg-[#FAF4ED] text-[#4A2D16] hover:bg-white text-xs font-semibold transition-all duration-200 shadow-sm">
                    <span>Chat on WhatsApp</span>
                    <span class="transition-transform duration-200 group-hover:translate-x-1">→</span>
                </a>
            </div>

            <!-- Instagram Atelier Card -->
            <div class="group rounded-3xl bg-[#FAF4ED] border border-[#E2CEB9] p-7 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-5">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#F4DFC8] to-[#E8CCB0] border border-[#DCBF9F] flex items-center justify-center text-[#5C3B22]">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/>
                                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
                            </svg>
                        </div>
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-semibold bg-[#F2E6D8] text-[#7A5434] border border-[#E3CEB8]">
                            Behind the Scenes
                        </span>
                    </div>
                    <h3 class="font-serif-lux text-2xl font-medium text-[#4A2D16] mb-1.5">Instagram Studio</h3>
                    <p class="text-xs text-[#7D5A3C] leading-relaxed mb-4">
                        Explore fresh resin pours, handmade crochet reels, real customer unboxings & seasonal Nikkah launches.
                    </p>
                    <p class="text-xs font-semibold text-[#5C3B22] mb-5">@islamiccrafts</p>
                </div>
                <a href="https://instagram.com"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="w-full inline-flex items-center justify-center space-x-2 px-5 py-3 rounded-full bg-[#F3E7D9] hover:bg-[#6B4B32] text-[#58381C] hover:text-white border border-[#DEC7AF] text-xs font-semibold transition-all duration-200">
                    <span>Follow Our Journey</span>
                    <span class="transition-transform duration-200 group-hover:translate-x-1">↗</span>
                </a>
            </div>

            <!-- Nationwide Delivery & Email Card -->
            <div class="group rounded-3xl bg-[#FAF4ED] border border-[#E2CEB9] p-7 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-5">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#F4DFC8] to-[#E8CCB0] border border-[#DCBF9F] flex items-center justify-center text-[#5C3B22]">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-semibold bg-[#F2E6D8] text-[#7A5434] border border-[#E3CEB8]">
                            All Pakistan
                        </span>
                    </div>
                    <h3 class="font-serif-lux text-2xl font-medium text-[#4A2D16] mb-1.5">Email & Delivery</h3>
                    <p class="text-xs text-[#7D5A3C] leading-relaxed mb-4">
                        Safe fragile-box delivery across Karachi, Lahore, Islamabad & all towns in Pakistan via tracked couriers.
                    </p>
                    <p class="text-xs font-semibold text-[#5C3B22] mb-5">salam@islamiccrafts.com</p>
                </div>
                <a href="mailto:salam@islamiccrafts.com"
                   class="w-full inline-flex items-center justify-center space-x-2 px-5 py-3 rounded-full bg-[#F3E7D9] hover:bg-[#6B4B32] text-[#58381C] hover:text-white border border-[#DEC7AF] text-xs font-semibold transition-all duration-200">
                    <span>Send an Email</span>
                    <span class="transition-transform duration-200 group-hover:translate-x-1">→</span>
                </a>
            </div>
        </div>

        <!-- Main Split: Direct Message Form + Interactive FAQ Accordion -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start mb-12">

            <!-- Left: Quick Direct Message Studio -->
            <div class="lg:col-span-7">
                <div class="rounded-[2rem] bg-[#FAF4ED] border border-[#E2CEB9] p-6 sm:p-9 shadow-sm">
                    <div class="flex items-center justify-between mb-6 pb-4 border-b border-[#E9D9C7]">
                        <div>
                            <span class="text-[10px] font-semibold uppercase tracking-[0.18em] text-[#9A714C] block mb-1">Direct Studio Line</span>
                            <h2 class="font-serif-lux text-3xl text-[#4A2D16] font-normal">Send Us a Message</h2>
                        </div>
                        <span class="hidden sm:inline-flex items-center px-3 py-1 rounded-full text-[10px] font-semibold bg-[#F3E6D7] text-[#6B4B32] border border-[#E2CCB6]">
                            ✨ Instant WhatsApp Hand-off
                        </span>
                    </div>

                    <form id="contact-message-form" class="space-y-5">
                        <!-- Topic Selector Pills -->
                        <div>
                            <label class="block text-xs font-semibold text-[#58381C] mb-2.5">What can we help you with?</label>
                            <div class="flex flex-wrap gap-2" id="contact-topic-pills">
                                @foreach(['General Inquiry', 'Order Tracking', 'Custom Gift Idea', 'Wedding / Bulk Favors'] as $idx => $topic)
                                    <button type="button"
                                            data-topic="{{ $topic }}"
                                            class="contact-topic-btn px-3.5 py-2 rounded-full text-xs font-medium border transition-all duration-200 cursor-pointer {{ $idx === 0 ? 'bg-[#6B4B32] text-white border-[#6B4B32] shadow-xs' : 'bg-[#F5ECE1] text-[#6B4B32] border-[#DFCBB7] hover:border-[#6B4B32]' }}">
                                        {{ $topic }}
                                    </button>
                                @endforeach
                            </div>
                            <input type="hidden" id="contact-topic" value="General Inquiry">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="contact-name" class="block text-xs font-semibold text-[#58381C] mb-1.5">Your Name <span class="text-rose-500">*</span></label>
                                <input type="text" id="contact-name" required placeholder="e.g. Ayesha Khan"
                                       class="w-full bg-[#FBF6EE] border border-[#DFCBB7] rounded-xl px-4 py-3 text-xs sm:text-sm text-[#432C19] placeholder-[#A88B6E] outline-none focus:border-[#6B4B32] focus:ring-2 focus:ring-[#6B4B32]/15 transition-all">
                            </div>
                            <div>
                                <label for="contact-phone" class="block text-xs font-semibold text-[#58381C] mb-1.5">Phone / WhatsApp <span class="text-rose-500">*</span></label>
                                <input type="tel" id="contact-phone" required placeholder="e.g. 0300 1234567"
                                       class="w-full bg-[#FBF6EE] border border-[#DFCBB7] rounded-xl px-4 py-3 text-xs sm:text-sm text-[#432C19] placeholder-[#A88B6E] outline-none focus:border-[#6B4B32] focus:ring-2 focus:ring-[#6B4B32]/15 transition-all">
                            </div>
                        </div>

                        <div>
                            <label for="contact-message" class="block text-xs font-semibold text-[#58381C] mb-1.5">Your Message <span class="text-rose-500">*</span></label>
                            <textarea id="contact-message" rows="4" required placeholder="Tell us your question, order number, or the gift you have in mind..."
                                      class="w-full bg-[#FBF6EE] border border-[#DFCBB7] rounded-xl px-4 py-3 text-xs sm:text-sm text-[#432C19] placeholder-[#A88B6E] outline-none focus:border-[#6B4B32] focus:ring-2 focus:ring-[#6B4B32]/15 transition-all resize-none"></textarea>
                        </div>

                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 pt-1">
                            <p class="text-[11px] text-[#8B6749]">
                                Opens your formatted message in a new WhatsApp tab for instant reply.
                            </p>
                            <button type="submit"
                                    class="btn-luxury px-7 py-3.5 rounded-full text-xs font-semibold inline-flex items-center justify-center space-x-2 shadow-sm hover:shadow-md transition-all cursor-pointer">
                                <span>Send Message via WhatsApp</span>
                                <span>→</span>
                            </button>
                        </div>
                    </form>

                    <!-- Inline Success Banner (hidden until submit) -->
                    <div id="contact-success-card" class="hidden mt-5 rounded-2xl bg-emerald-50/90 border border-emerald-200 p-4 flex items-start space-x-3">
                        <span class="text-lg leading-none">✅</span>
                        <div class="text-xs text-emerald-900">
                            <p class="font-semibold mb-0.5">JazakAllah Khair! Your message is ready on WhatsApp.</p>
                            <p class="text-emerald-700">If the tab didn't open automatically, <a id="contact-fallback-link" href="#" target="_blank" rel="noopener noreferrer" class="underline font-semibold">click here to open WhatsApp</a>.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Interactive Accordion FAQs -->
            <div class="lg:col-span-5">
                <div class="rounded-[2rem] bg-[#FAF4ED] border border-[#E2CEB9] p-6 sm:p-8 shadow-sm">
                    <div class="mb-6 pb-4 border-b border-[#E9D9C7]">
                        <span class="text-[10px] font-semibold uppercase tracking-[0.18em] text-[#9A714C] block mb-1">Helpful Answers</span>
                        <h2 class="font-serif-lux text-3xl text-[#4A2D16] font-normal">Frequently Asked Questions</h2>
                    </div>

                    @php
                        $faqs = [
                            [
                                'q' => 'How can I place an order?',
                                'a' => 'Browse any product, add your personalization details, and click "Add to Shopping Bag" or "Instant Order via WhatsApp". At checkout, your complete order summary is confirmed directly with our team.'
                            ],
                            [
                                'q' => 'How long does crafting & delivery take?',
                                'a' => 'Ready-made pieces dispatch within 2–3 business days. Personalized resin platters and calligraphy frames take 4–7 days for proper multi-layer curing and hand-finishing.'
                            ],
                            [
                                'q' => 'What payment methods are available?',
                                'a' => 'We accept Bank Transfer, EasyPaisa, and JazzCash. For personalized/custom items, a small advance deposit confirms your crafting slot.'
                            ],
                            [
                                'q' => 'Can I customize colors, names & dates?',
                                'a' => 'Yes! Almost all resin Nikkah platters, keychains, bookmarks, and crochet accessories can be customized to match your exact wedding or gifting theme.'
                            ],
                            [
                                'q' => 'Do you take bulk Nikkah or Eid favor orders?',
                                'a' => 'Absolutely! We offer special discounted packages for bulk Nikkah favors, Dua cards, resin keychains, and Eid gift boxes. Reach out 2 weeks in advance for best availability.'
                            ],
                        ];
                    @endphp

                    <div class="space-y-3" id="faq-accordion">
                        @foreach($faqs as $idx => $faq)
                            <div class="faq-item rounded-2xl border {{ $idx === 0 ? 'border-[#C9AC8E] bg-[#FBF6EE]' : 'border-[#E6D5C3] bg-[#F6EDE2]/60' }} transition-all duration-200 overflow-hidden">
                                <button type="button"
                                        class="faq-trigger w-full px-4 py-3.5 text-left flex items-center justify-between gap-3 cursor-pointer"
                                        aria-expanded="{{ $idx === 0 ? 'true' : 'false' }}">
                                    <span class="text-xs sm:text-[13px] font-semibold text-[#4A2D16] leading-snug">{{ $faq['q'] }}</span>
                                    <span class="faq-icon flex-shrink-0 w-6 h-6 rounded-full bg-[#EFE2D2] text-[#58381C] flex items-center justify-center text-sm font-medium transition-transform duration-200 {{ $idx === 0 ? 'rotate-45' : '' }}">+</span>
                                </button>
                                <div class="faq-panel px-4 pb-4 text-xs text-[#7D5A3C] leading-relaxed {{ $idx === 0 ? '' : 'hidden' }}">
                                    {{ $faq['a'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom Custom Orders Studio CTA Banner -->
        <div class="rounded-[2rem] bg-gradient-to-r from-[#F5E9DA] via-[#FAF3EA] to-[#F2E4D3] border border-[#E2CEB9] p-7 sm:p-10 flex flex-col md:flex-row items-center justify-between gap-6 shadow-sm">
            <div class="text-center md:text-left">
                <span class="inline-block text-[10px] font-semibold uppercase tracking-[0.2em] text-[#9A714C] mb-1.5">✦ Bespoke Personalization</span>
                <h3 class="font-serif-lux italic text-2xl sm:text-3xl text-[#4A2D16] mb-1">Have a Custom Design or Inspiration Photo?</h3>
                <p class="text-xs sm:text-sm text-[#7D5A3C]">Upload your reference photo in our Custom Orders Studio and receive a tailored quote from our artisans.</p>
            </div>
            <a href="{{ route('custom-orders') }}"
               class="btn-luxury flex-shrink-0 px-7 py-3.5 rounded-full text-xs font-semibold inline-flex items-center space-x-2 shadow-sm hover:shadow-md transition-all">
                <span>Open Custom Orders Studio</span>
                <span>→</span>
            </a>
        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Topic Pill Selection
    const topicBtns = document.querySelectorAll('.contact-topic-btn');
    const topicInput = document.getElementById('contact-topic');

    topicBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            topicBtns.forEach(b => {
                b.classList.remove('bg-[#6B4B32]', 'text-white', 'border-[#6B4B32]', 'shadow-xs');
                b.classList.add('bg-[#F5ECE1]', 'text-[#6B4B32]', 'border-[#DFCBB7]');
            });
            btn.classList.remove('bg-[#F5ECE1]', 'text-[#6B4B32]', 'border-[#DFCBB7]');
            btn.classList.add('bg-[#6B4B32]', 'text-white', 'border-[#6B4B32]', 'shadow-xs');
            topicInput.value = btn.dataset.topic;
        });
    });

    // Contact Form -> Open WhatsApp in New Tab + Toast
    const form = document.getElementById('contact-message-form');
    const successCard = document.getElementById('contact-success-card');
    const fallbackLink = document.getElementById('contact-fallback-link');
    const whatsappNumber = @json($cleanNumber);

    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const name = document.getElementById('contact-name').value.trim();
            const phone = document.getElementById('contact-phone').value.trim();
            const topic = topicInput.value;
            const message = document.getElementById('contact-message').value.trim();

            if (!name || !phone || !message) return;

            const text = `Assalam-o-Alaikum Islamic Crafts! 🤍\n\n*Topic:* ${topic}\n*Name:* ${name}\n*Phone:* ${phone}\n\n*Message:*\n${message}`;
            const waUrl = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(text)}`;

            fallbackLink.href = waUrl;
            successCard.classList.remove('hidden');
            window.open(waUrl, '_blank', 'noopener,noreferrer');

            if (typeof window.showNoticeToast === 'function') {
                window.showNoticeToast('Message ready! Opening WhatsApp in a new tab 💛');
            }

            form.reset();
        });
    }

    // Smooth FAQ Accordion
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const trigger = item.querySelector('.faq-trigger');
        const panel = item.querySelector('.faq-panel');
        const icon = item.querySelector('.faq-icon');

        trigger.addEventListener('click', () => {
            const isOpen = !panel.classList.contains('hidden');

            // Close all others
            faqItems.forEach(other => {
                other.querySelector('.faq-panel').classList.add('hidden');
                other.querySelector('.faq-icon').classList.remove('rotate-45');
                other.querySelector('.faq-trigger').setAttribute('aria-expanded', 'false');
                other.classList.remove('border-[#C9AC8E]', 'bg-[#FBF6EE]');
                other.classList.add('border-[#E6D5C3]', 'bg-[#F6EDE2]/60');
            });

            if (!isOpen) {
                panel.classList.remove('hidden');
                icon.classList.add('rotate-45');
                trigger.setAttribute('aria-expanded', 'true');
                item.classList.remove('border-[#E6D5C3]', 'bg-[#F6EDE2]/60');
                item.classList.add('border-[#C9AC8E]', 'bg-[#FBF6EE]');
            }
        });
    });
});
</script>
@endsection
