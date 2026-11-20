@extends('frontend.layouts.master')

@section('page_title', __('translate.services'))
@section('meta_desc', __('translate.services_desc'))

@section('content')
    <section class="relative pt-28 sm:pt-36 pb-16 sm:pb-20 bg-cover bg-center" data-background="{{ asset('NewFront/img/1.jpg') }}">
        <div class="absolute inset-0 bg-gradient-to-br from-navy-900/90 via-navy-900/70 to-navy-900/60"></div>
        <div class="relative z-[2] max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-3xl sm:text-4xl font-bold text-white mb-2">@lang('translate.ourservices')</h1>
            <nav aria-label="breadcrumb" class="text-sm">
                <a href="{{ route('home.home') }}" class="text-white/55 hover:text-gold-500 transition-colors">@lang('translate.home')</a>
                <span class="text-white/30 mx-2">/</span>
                <span class="text-gold-500">@lang('translate.services')</span>
            </nav>
        </div>
    </section>

    <section class="py-16 sm:py-24 bg-surface dark:bg-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
                <span class="section-tag">@lang('translate.what_we_do')</span>
                <h2 class="section-title text-navy-950 dark:text-white">@lang('translate.ourservices')</h2>
                <p class="section-desc mx-auto">@lang('translate.services_desc')</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($services as $item)
                    <a href="{{ route('home.services.show', ['id' => $item->id]) }}" class="card-hover group block no-underline overflow-hidden">
                        @if(@$item->image)
                            <img class="w-full h-52 object-cover transition-transform duration-500 group-hover:scale-105" src="{{ asset(@$item->image) }}" alt="{{ $item->title }}" onerror="this.src='{{ asset('NewFront/img/1.jpg') }}'">
                        @elseif($item->icon)
                            <div class="w-full h-52 bg-gradient-to-br from-sky-50 to-sky-100 dark:from-slate-800 dark:to-slate-700 flex items-center justify-center transition-colors">
                                <i class="{{ $item->icon }} text-5xl text-sky-400 dark:text-sky-500"></i>
                            </div>
                        @else
                            <div class="w-full h-52 bg-gradient-to-br from-navy-100 dark:from-slate-800 to-navy-200 dark:to-slate-700 flex items-center justify-center">
                                <i class="fas fa-cogs text-4xl text-navy-300 dark:text-slate-500"></i>
                            </div>
                        @endif
                        <div class="p-6">
                            <h5 class="font-heading text-lg font-bold text-navy-950 dark:text-white group-hover:text-sky-700 dark:group-hover:text-sky-300 transition-colors mb-2">{{ $item->title }}</h5>
                            <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">{{ $item->short_description ?: Str::limit(strip_tags($item->description), 120) }}</p>
                            <span class="inline-flex items-center gap-2 mt-4 text-sm font-semibold text-sky-700 dark:text-sky-300 group-hover:text-sky-800 dark:hover:text-sky-200 transition-colors">
                                @lang('translate.read_more')
                                <svg class="h-3.5 w-3.5 rtl:rotate-180 transition-transform group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0-5 5m5-5H6"/></svg>
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-16">
                        <i class="fas fa-concierge-bell text-4xl text-slate-300 dark:text-slate-600 mb-4"></i>
                        <p class="text-slate-600">@lang('translate.no_data')</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@stop
