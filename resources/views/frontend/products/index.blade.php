@extends('frontend.layouts.master')

@section('page_title', __('translate.products'))
@section('meta_desc', __('translate.products_desc'))

@section('content')
    <section class="relative pt-28 sm:pt-36 pb-16 sm:pb-20 bg-cover bg-center" data-background="{{ asset('NewFront/img/1.jpg') }}">
        <div class="absolute inset-0 bg-gradient-to-br from-navy-900/90 via-navy-900/70 to-navy-900/60"></div>
        <div class="relative z-[2] max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-3xl sm:text-4xl font-bold text-white mb-2">@lang('translate.ourproducts')</h1>
            <nav aria-label="breadcrumb" class="text-sm">
                <a href="{{ route('home.home') }}" class="text-white/55 hover:text-gold-500 transition-colors">@lang('translate.home')</a>
                <span class="text-white/30 mx-2">/</span>
                <span class="text-gold-500">@lang('translate.products')</span>
            </nav>
        </div>
    </section>

    <section class="py-16 sm:py-24 bg-surface dark:bg-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
                <span class="section-tag">@lang('translate.our_products')</span>
                <h2 class="section-title text-navy-950 dark:text-white">@lang('translate.ourproducts')</h2>
                <p class="section-desc mx-auto">@lang('translate.products_desc')</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($products as $item)
                    <a href="{{ route('home.products.show', ['id' => $item->id]) }}" class="card-hover group block no-underline overflow-hidden">
                        @if(@$item->image)
                            <img class="w-full h-52 object-cover transition-transform duration-500 group-hover:scale-105" src="{{ asset(@$item->image) }}" alt="{{ $item->title }}" onerror="this.src='{{ asset('NewFront/img/1.jpg') }}'">
                        @else
                            <div class="w-full h-52 bg-gradient-to-br from-gold-50 to-gold-100 dark:from-slate-800 dark:to-slate-700 flex items-center justify-center">
                                <svg class="w-12 h-12 text-gold-600 dark:text-gold-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                            </div>
                        @endif
                        <div class="p-6">
                            <h5 class="font-heading text-base font-bold text-navy-950 dark:text-white group-hover:text-gold-700 dark:group-hover:text-gold-400 transition-colors mb-2">{{ $item->title }}</h5>
                            <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">{{ Str::limit(strip_tags($item->description), 100) }}</p>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-16">
                        <svg class="w-12 h-12 text-slate-300 dark:text-slate-600 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        <p class="text-slate-600">@lang('translate.no_data')</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@stop
