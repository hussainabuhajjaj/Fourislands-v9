@extends('frontend.layouts.master')

@section('page_title', __('translate.thank_you_title'))
@section('meta_desc', __('translate.thank_you_desc'))

@section('content')
    @php
        $phone = getSetting('phone') ?: '+965 2225 5565';
        $whatsapp = getSetting('whatsapp') ?: $phone;
        $waNumber = preg_replace('/[^0-9]/', '', $whatsapp);
        $utmSource = request()->get('utm_source', 'thank_you_page');
        $utmMedium = request()->get('utm_medium', 'direct');
        $utmCampaign = request()->get('utm_campaign', 'quote_followup');
    @endphp

    <section class="relative pt-28 sm:pt-36 pb-16 sm:pb-20 bg-cover bg-center" data-background="{{ asset('NewFront/img/1.jpg') }}">
        <div class="absolute inset-0 bg-gradient-to-br from-navy-900/90 via-navy-900/70 to-navy-900/60"></div>
        <div class="relative z-[2] max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <span class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-green-500/20 text-green-400 mb-6">
                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </span>
                <h1 class="font-heading text-3xl sm:text-4xl font-bold text-white mb-4">@lang('translate.thank_you_title')</h1>
                <p class="text-lg text-slate-300 max-w-xl mx-auto">@lang('translate.thank_you_desc')</p>
            </div>
        </div>
    </section>

    <section class="py-16 sm:py-24 bg-white dark:bg-slate-950">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="card p-8 sm:p-12">
                <span class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-emerald-100 dark:bg-emerald-500/10 text-emerald-600 mb-6">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </span>
                <h2 class="font-heading text-2xl font-bold text-navy-950 dark:text-white mb-4">@lang('translate.thank_you_title')</h2>
                <p class="text-slate-600 dark:text-slate-300 leading-relaxed mb-8">@lang('translate.thank_you_body')</p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode(__('translate.whatsapp_thank_you')) }}&utm_source={{ $utmSource }}&utm_medium={{ $utmMedium }}&utm_campaign={{ $utmCampaign }}"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center justify-center gap-2 rounded-lg bg-green-600 hover:bg-green-700 text-white px-6 py-3.5 text-sm font-bold transition-all no-underline">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        @lang('translate.chat_whatsapp')
                    </a>
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}"
                       class="inline-flex items-center justify-center gap-2 rounded-lg bg-sky-700 hover:bg-sky-800 text-white px-6 py-3.5 text-sm font-bold transition-all no-underline">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106a1.125 1.125 0 0 0-1.173.417l-.97 1.293a1.125 1.125 0 0 1-1.21.38 12.035 12.035 0 0 1-7.143-7.143 1.125 1.125 0 0 1 .38-1.21l1.293-.97c.363-.272.527-.74.417-1.173L6.963 3.102A1.125 1.125 0 0 0 5.872 2.25H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
                        @lang('translate.call_us')
                    </a>
                </div>

                <div class="mt-8 pt-8 border-t border-slate-200 dark:border-slate-700">
                    <a href="{{ route('home.home') }}" class="text-sm text-sky-700 hover:text-sky-800 font-semibold no-underline">
                        &larr; @lang('translate.back_to_home')
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "WebPage",
        "name": "@lang('translate.thank_you_title')",
        "description": "@lang('translate.thank_you_desc')",
        "potentialAction": {
            "@type": "ContactPoint",
            "telephone": "{{ $phone }}",
            "contactType": "customer support"
        }
    }
    </script>

    <script>
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({ event: 'conversion', form_name: 'quote_request_conversion' });
    </script>
@endsection
