@php
    $phone = getSetting('phone') ?: '+965 2225 5565';
    $tel = preg_replace('/[^0-9+]/', '', $phone);
@endphp

<div class="fixed inset-x-0 bottom-4 z-[9980] px-4 sm:hidden">
    <div class="mx-auto flex max-w-md items-center gap-2 rounded-lg border border-white/10 bg-slate-950/95 p-2 shadow-none backdrop-blur-md">
        <a href="{{ route('home.quote-requests.index') }}" class="flex-1 rounded-md bg-sky-700 px-4 py-3 text-center text-sm font-extrabold text-white no-underline transition-colors hover:bg-sky-800">
            @lang('translate.get_quote')
        </a>
        <a href="tel:{{ $tel }}" class="flex h-11 w-11 shrink-0 items-center justify-center rounded-md border border-white/15 text-white no-underline transition-colors hover:bg-white/10" aria-label="@lang('translate.phone')">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106a1.125 1.125 0 0 0-1.173.417l-.97 1.293a1.125 1.125 0 0 1-1.21.38 12.035 12.035 0 0 1-7.143-7.143 1.125 1.125 0 0 1 .38-1.21l1.293-.97c.363-.272.527-.74.417-1.173L6.963 3.102A1.125 1.125 0 0 0 5.872 2.25H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
        </a>
    </div>
</div>

<div class="fixed bottom-6 z-[9980] hidden lg:block {{ app()->getLocale() === 'ar' ? 'left-6' : 'right-6' }}">
    <a href="{{ route('home.quote-requests.index') }}" class="inline-flex items-center gap-2 rounded-md bg-sky-700 px-5 py-3 text-sm font-extrabold text-white no-underline shadow-none transition-colors hover:bg-sky-800">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M5 11h14M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2Z"/></svg>
        @lang('translate.get_quote')
    </a>
</div>
