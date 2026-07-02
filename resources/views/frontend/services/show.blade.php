@extends('frontend.layouts.master')

@section('page_title', $services->title)
@section('meta_desc', $services->short_description ?: strip_tags($services->description))

@push('front_css')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "{{ $services->title }}",
    "description": "{{ $services->short_description ?: strip_tags($services->description) }}",
    "provider": {
        "@type": "Organization",
        "name": "Four Islands EST. for General Trading and Contracting"
    }
}
</script>
@endpush

@section('content')
    <section class="relative pt-28 sm:pt-36 pb-16 sm:pb-20 bg-cover bg-center" data-background="{{ asset(@$services->image) }}">
        <div class="absolute inset-0 bg-gradient-to-br from-navy-900/90 via-navy-900/70 to-navy-900/60"></div>
        <div class="relative z-[2] max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3 mb-2">
                @if($services->icon)
                    <span class="w-12 h-12 rounded-lg bg-white/10 flex items-center justify-center">
                        <i class="{{ $services->icon }} text-xl text-sky-300"></i>
                    </span>
                @endif
                <h1 class="font-heading text-3xl sm:text-4xl font-bold text-white">{{ $services->title }}</h1>
            </div>
            <nav aria-label="breadcrumb" class="text-sm">
                <a href="{{ route('home.home') }}" class="text-white/55 hover:text-gold-500 transition-colors">@lang('translate.home')</a>
                <span class="text-white/30 mx-2">/</span>
                <a href="{{ route('home.services.index') }}" class="text-white/55 hover:text-gold-500 transition-colors">@lang('translate.services')</a>
                <span class="text-white/30 mx-2">/</span>
                <span class="text-gold-500">{{ $services->title }}</span>
            </nav>
        </div>
    </section>

    <section class="py-16 sm:py-24 bg-white dark:bg-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <div class="lg:col-span-2 space-y-8">
                    @if($services->short_description)
                        <p class="text-lg leading-relaxed text-slate-600 dark:text-slate-300 font-semibold">{{ $services->short_description }}</p>
                    @endif

                    @if(@$services->image)
                        <div>
                            <img src="{{ asset(@$services->image) }}"
                                 class="w-full rounded-xl" alt="{{ $services->title }}"
                                 onerror="this.style.display='none'">
                        </div>
                    @endif

                    <div class="prose prose-slate dark:prose-invert max-w-none leading-relaxed">
                        {!! $services->description !!}
                    </div>

                    @if($services->features && count($services->features) > 0)
                        <div class="bg-slate-50 dark:bg-slate-900 rounded-xl p-6 sm:p-8">
                            <h3 class="font-heading text-xl font-bold text-navy-950 dark:text-white mb-5">@lang('translate.key_features')</h3>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @foreach($services->features as $feature)
                                    <li class="flex items-start gap-3 text-sm text-slate-600 dark:text-slate-300">
                                        <svg class="w-5 h-5 text-sky-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        {{ $feature }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('home.contacts.index') }}" class="btn-primary">
                            @lang('translate.get_quote')
                            <svg class="w-4 h-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0-5 5m5-5H6"/></svg>
                        </a>
                        <a href="{{ route('home.services.index') }}" class="inline-flex items-center gap-2 bg-transparent text-navy-900 dark:text-white border-2 border-slate-200 dark:border-slate-700 rounded-lg px-5 py-3 text-sm font-semibold hover:border-sky-700 hover:text-sky-700 transition-all">
                            <svg class="w-4 h-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            @lang('translate.ourservices')
                        </a>
                    </div>
                </div>

                <div class="space-y-8">
                    <div class="card p-6">
                        <h4 class="font-heading text-base font-bold text-navy-950 dark:text-white mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">@lang('translate.AllServices')</h4>
                        <ul class="space-y-0">
                            @foreach($allservices as $item)
                                <li class="py-2.5 border-b border-slate-100 dark:border-slate-800 last:border-0">
                                    <a href="{{ route('home.services.show', $item->id) }}" class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-300 hover:text-sky-700 transition-colors {{ $item->id == $services->id ? 'text-sky-700 font-semibold' : '' }}">
                                        @if($item->icon)
                                            <i class="{{ $item->icon }} text-sky-600 w-4 text-center"></i>
                                        @else
                                            <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                        @endif
                                        {{ $item->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card p-6">
                        <h4 class="font-heading text-base font-bold text-navy-950 dark:text-white mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">@lang('translate.contact_us')</h4>
                        <p class="text-sm text-slate-600 dark:text-slate-300 mb-4">@lang('translate.lead_desc')</p>
                        <a href="{{ route('home.contacts.index') }}" class="btn-primary w-full justify-center text-sm">
                            @lang('translate.get_quote')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
