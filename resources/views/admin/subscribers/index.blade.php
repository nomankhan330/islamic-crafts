@extends('admin.layouts.admin')

@section('title', 'VIP Subscribers')
@section('header_title', 'VIP Craft Family & Subscribers')

@section('content')

<!-- 1. Dark Espresso VIP Subscribers Hero Header -->
<div class="relative rounded-[2rem] bg-gradient-to-br from-[#4A2E19] via-[#5B3A20] to-[#361F0E] text-[#FAF4ED] p-6 sm:p-8 mb-7 shadow-md overflow-hidden">
    <div class="pointer-events-none absolute -top-16 -right-16 w-60 h-60 rounded-full bg-[#C6A47E]/15 blur-3xl"></div>

    <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">
        <div>
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-[#FAF4ED]/10 border border-[#DFCBB7]/25 text-[10px] font-semibold uppercase tracking-[0.2em] text-[#E6C9A8] mb-3">
                <span>💌</span>
                <span>Inner Circle Audience</span>
            </div>
            <h2 class="font-serif-lux italic text-3xl sm:text-4xl text-[#FDF8F1] font-normal leading-tight">
                VIP Craft Family Directory
            </h2>
            <p class="text-xs sm:text-sm text-[#DBC4AC] mt-1.5 max-w-xl">
                Every member who unlocked the <span class="font-mono font-semibold text-[#F5DEC2]">CRAFTY10</span> invitation — ready for seasonal Eid, Ramadan & wedding collection announcements.
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-2.5">
            <button type="button"
                    id="copy-all-emails-btn"
                    data-emails="{{ $allEmails }}"
                    class="px-5 py-2.5 rounded-full bg-[#FAF4ED]/12 hover:bg-[#FAF4ED]/20 text-[#FAF4ED] border border-[#DFCBB7]/30 text-xs font-semibold transition-all inline-flex items-center space-x-2 cursor-pointer">
                <span>📋</span>
                <span id="copy-all-label">Copy All Emails</span>
            </button>

            <a href="{{ route('admin.subscribers.export') }}"
               class="px-5 py-2.5 rounded-full bg-[#FAF4ED] hover:bg-white text-[#4A2D16] text-xs font-semibold shadow-sm transition-all inline-flex items-center space-x-2">
                <span>⬇️</span>
                <span>Export CSV</span>
            </a>
        </div>
    </div>
</div>

<!-- 2. 3-Column VIP Subscriber KPI Cards -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-7">
    <div class="relative bg-gradient-to-br from-[#FAF4ED] to-[#F4E9DC] border border-[#DECDBD] rounded-3xl p-5 shadow-xs overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-[#6B4B32] to-[#C6A47E]"></div>
        <div class="flex items-center justify-between mb-2">
            <span class="text-[11px] font-semibold uppercase tracking-wider text-[#8A6749]">Total VIP Members</span>
            <span class="w-9 h-9 rounded-xl bg-[#EFE1D1] border border-[#DFCBB7] flex items-center justify-center text-base">💌</span>
        </div>
        <p class="font-serif-lux text-3xl sm:text-4xl font-bold text-[#4A301A]">{{ $stats['total'] }}</p>
        <p class="text-[11px] text-[#7A5A3E] mt-1">Active newsletter subscribers</p>
    </div>

    <div class="relative bg-gradient-to-br from-[#FAF4ED] to-[#F4E9DC] border border-[#DECDBD] rounded-3xl p-5 shadow-xs overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-emerald-500/75 to-amber-500/70"></div>
        <div class="flex items-center justify-between mb-2">
            <span class="text-[11px] font-semibold uppercase tracking-wider text-[#8A6749]">Joined This Month</span>
            <span class="w-9 h-9 rounded-xl bg-emerald-50 border border-emerald-200 flex items-center justify-center text-base">✨</span>
        </div>
        <p class="font-serif-lux text-3xl sm:text-4xl font-bold text-[#4A301A]">+{{ $stats['this_month'] }}</p>
        <p class="text-[11px] text-emerald-800 mt-1">New {{ now()->format('F Y') }} signups</p>
    </div>

    <div class="relative bg-gradient-to-br from-[#FAF4ED] to-[#F4E9DC] border border-[#DECDBD] rounded-3xl p-5 shadow-xs overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-amber-500/80 to-[#865F40]"></div>
        <div class="flex items-center justify-between mb-2">
            <span class="text-[11px] font-semibold uppercase tracking-wider text-[#8A6749]">Latest Member</span>
            <span class="w-9 h-9 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-center text-base">🕒</span>
        </div>
        <p class="font-serif-lux text-2xl sm:text-3xl font-bold text-[#4A301A] truncate">
            {{ $stats['latest'] ? $stats['latest']->created_at->diffForHumans() : 'No signups yet' }}
        </p>
        <p class="text-[11px] text-[#7A5A3E] mt-1 truncate">
            {{ $stats['latest'] ? $stats['latest']->email : 'Waiting for first subscriber' }}
        </p>
    </div>
</div>

<!-- 3. Full-Width Luxury Subscribers Directory Card -->
<div class="bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-6 sm:p-7 shadow-xs">

    <!-- Directory Toolbar: Title + Search -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6 pb-4 border-b border-[#EADBCC]">
        <div>
            <span class="text-[10px] font-semibold uppercase tracking-[0.2em] text-[#9A714C] block">Subscriber List</span>
            <h3 class="font-serif-lux text-2xl font-medium text-[#4A301A]">
                All Newsletter Members
                <span class="text-sm font-sans text-[#8A6749] font-normal">({{ $subscribers->total() }})</span>
            </h3>
        </div>

        <form action="{{ route('admin.subscribers.index') }}" method="GET" class="flex items-center space-x-2 w-full sm:w-auto">
            <div class="relative flex-grow sm:w-64">
                <input type="text"
                       name="q"
                       value="{{ $search }}"
                       placeholder="Search email address..."
                       class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-full pl-4 pr-9 py-2 text-xs text-[#432C19] placeholder-[#9E8165] outline-none focus:border-[#6B4B32] focus:ring-2 focus:ring-[#6B4B32]/15">
                @if($search)
                    <a href="{{ route('admin.subscribers.index') }}" class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-[#8A6749] hover:text-[#4A301A]" title="Clear search">×</a>
                @endif
            </div>
            <button type="submit" class="px-4 py-2 rounded-full bg-[#6B4B32] hover:bg-[#573C27] text-white text-xs font-semibold transition-colors cursor-pointer">
                Search
            </button>
        </form>
    </div>

    @if($subscribers->count() > 0)
    <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
            <thead>
                <tr class="border-b border-[#E8DACB] text-[#8A6749] uppercase tracking-wider text-[11px]">
                    <th class="pb-3 font-semibold">#</th>
                    <th class="pb-3 font-semibold">Subscriber</th>
                    <th class="pb-3 font-semibold">Voucher Tier</th>
                    <th class="pb-3 font-semibold">Joined On</th>
                    <th class="pb-3 font-semibold text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#EFE2D4]">
                @foreach($subscribers as $index => $sub)
                <tr class="hover:bg-[#F5ECE1]/60 transition-colors group">
                    <td class="py-3.5 text-[#8A6749] font-mono">
                        {{ ($subscribers->currentPage() - 1) * $subscribers->perPage() + $index + 1 }}
                    </td>
                    <td class="py-3.5">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-[#E9D5BC] to-[#D4B38F] border border-[#C9A47D] text-[#4A2D16] font-bold flex items-center justify-center text-xs flex-shrink-0">
                                {{ strtoupper(substr($sub->email, 0, 1)) }}
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="font-semibold text-[#4A301A]">{{ $sub->email }}</span>
                                <button type="button"
                                        onclick="copySingleEmail('{{ $sub->email }}', this)"
                                        class="opacity-70 group-hover:opacity-100 text-[10px] px-2 py-0.5 rounded-full bg-[#EFE2D4] hover:bg-[#6B4B32] text-[#6B4B32] hover:text-white transition-all cursor-pointer"
                                        title="Copy Email">
                                    Copy
                                </button>
                            </div>
                        </div>
                    </td>
                    <td class="py-3.5">
                        <span class="inline-flex items-center space-x-1 px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-amber-50 text-amber-900 border border-amber-200">
                            <span>🏷️</span>
                            <span>VIP • CRAFTY10</span>
                        </span>
                    </td>
                    <td class="py-3.5">
                        <span class="block text-[#4A301A] font-medium">{{ $sub->created_at->format('d M, Y') }}</span>
                        <span class="block text-[10px] text-[#8A6749]">{{ $sub->created_at->format('h:i A') }} • {{ $sub->created_at->diffForHumans() }}</span>
                    </td>
                    <td class="py-3.5 text-right">
                        <div class="inline-flex items-center space-x-2">
                            <a href="mailto:{{ $sub->email }}?subject=Exclusive%20Offer%20from%20Islamic%20Crafts"
                               class="px-3 py-1 rounded-lg text-[11px] font-semibold bg-[#FAF4ED] text-[#6B4B32] border border-[#DECDBD] hover:bg-[#6B4B32] hover:text-white transition-all">
                                ✉️ Mail
                            </a>
                            <form action="{{ route('admin.subscribers.destroy', $sub->id) }}" method="POST" class="inline" onsubmit="return confirm('Remove {{ $sub->email }} from VIP subscribers?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 rounded-lg text-[11px] font-semibold bg-rose-50 text-rose-700 border border-rose-200 hover:bg-rose-600 hover:text-white transition-all cursor-pointer">
                                    Remove
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $subscribers->links() }}
    </div>
    @else
    <div class="text-center py-14">
        <div class="w-14 h-14 mx-auto rounded-2xl bg-[#F3E6D7] border border-[#E2CCB6] flex items-center justify-center text-2xl mb-3">💌</div>
        <h4 class="font-serif-lux text-2xl text-[#4A301A] mb-1">
            {{ $search ? 'No matching subscribers found' : 'No VIP subscribers yet' }}
        </h4>
        <p class="text-xs text-[#8A6749]">
            {{ $search ? 'Try clearing your search filter.' : 'When visitors subscribe via your homepage VIP invitation banner, they will appear here.' }}
        </p>
    </div>
    @endif

</div>

<script>
document.getElementById('copy-all-emails-btn')?.addEventListener('click', function () {
    const emails = this.dataset.emails || '';
    const label = document.getElementById('copy-all-label');
    if (!emails) {
        if (label) label.textContent = 'No Emails to Copy';
        return;
    }
    navigator.clipboard.writeText(emails).then(() => {
        if (label) {
            label.textContent = 'Copied All Emails ✓';
            setTimeout(() => label.textContent = 'Copy All Emails', 2200);
        }
    });
});

function copySingleEmail(email, btn) {
    navigator.clipboard.writeText(email).then(() => {
        const orig = btn.textContent;
        btn.textContent = 'Copied ✓';
        setTimeout(() => btn.textContent = orig, 1500);
    });
}
</script>

@endsection
