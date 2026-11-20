@extends('frontend.layouts.master')

@section('page_title', $products->title)
@section('meta_desc', strip_tags(Str::limit($products->description, 160)))

@push('front_css')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@type": "Product",
    "name": "{{ $products->title }}",
    "description": "{{ strip_tags(Str::limit($products->description, 200)) }}",
    "offers": {
        "@type": "Offer",
        "availability": "https://schema.org/InStock",
        "seller": {
            "@type": "Organization",
            "name": "Four Islands EST. for General Trading and Contracting"
        }
    }
}
</script>
@endpush

@section('content')
    <section class="relative pt-28 sm:pt-36 pb-16 sm:pb-20 bg-cover bg-center" data-background="{{ asset(@$products->image) }}">
        <div class="absolute inset-0 bg-gradient-to-br from-navy-900/90 via-navy-900/70 to-navy-900/60"></div>
        <div class="relative z-[2] max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-3xl sm:text-4xl font-bold text-white mb-2">{{ $products->title }}</h1>
            <nav aria-label="breadcrumb" class="text-sm">
                <a href="{{ route('home.home') }}" class="text-white/55 hover:text-gold-500 transition-colors">@lang('translate.home')</a>
                <span class="text-white/30 mx-2">/</span>
                <a href="{{ route('home.products.index') }}" class="text-white/55 hover:text-gold-500 transition-colors">@lang('translate.products')</a>
                <span class="text-white/30 mx-2">/</span>
                <span class="text-gold-500">{{ $products->title }}</span>
            </nav>
        </div>
    </section>

    <section class="py-16 sm:py-24 bg-surface dark:bg-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <div class="lg:col-span-2 space-y-8">
                    @if(@$products->image)
                        <img src="{{ asset(@$products->image) }}"
                             class="w-full rounded-xl" alt="{{ $products->title }}"
                             onerror="this.style.display='none'">
                    @endif
                    <div class="prose prose-slate dark:prose-invert max-w-none leading-relaxed">{!! $products->description !!}</div>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('home.contacts.index') }}" class="btn-primary">
                            @lang('translate.inquire')
                            <svg class="w-4 h-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0-5 5m5-5H6"/></svg>
                        </a>
                        <a href="{{ route('home.products.index') }}" class="inline-flex items-center gap-2 bg-transparent text-navy-900 dark:text-white border-2 border-slate-200 dark:border-slate-700 rounded-lg px-5 py-3 text-sm font-semibold hover:border-gold-600 hover:text-gold-700 dark:hover:text-gold-400 transition-all">
                            <svg class="w-4 h-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            @lang('translate.ourproducts')
                        </a>
                    </div>
                </div>

                <div class="space-y-8">
                    <div class="card p-6">
                        <h4 class="font-heading text-base font-bold text-navy-950 dark:text-white mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">@lang('translate.AllProducts')</h4>
                        <ul class="space-y-0">
                            @foreach($allProducts as $item)
                                <li class="py-2.5 border-b border-slate-100 dark:border-slate-800 last:border-0">
                                    <a href="{{ route('home.products.show', ['id' => $item->id]) }}" class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-300 hover:text-gold-700 dark:hover:text-gold-400 transition-colors {{ $item->id == $products->id ? 'text-gold-700 font-semibold' : '' }}">
                                        <svg class="w-3.5 h-3.5 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
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
