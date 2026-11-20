@extends('frontend.layouts.master')

@section('page_title', __('translate.about_us'))
@section('meta_desc', __('translate.meta_desc'))

@section('content')
    <section class="relative pt-28 sm:pt-36 pb-16 sm:pb-20 bg-cover bg-center" data-background="{{ asset('NewFront/img/about.jpg') }}">
        <div class="absolute inset-0 bg-gradient-to-br from-navy-900/90 via-navy-900/70 to-navy-900/60"></div>
        <div class="relative z-[2] max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-3xl sm:text-4xl font-bold text-white mb-2">@lang('translate.about')</h1>
            <nav aria-label="breadcrumb" class="text-sm">
                <a href="{{ route('home.home') }}" class="text-white/55 hover:text-gold-500 transition-colors">@lang('translate.home')</a>
                <span class="text-white/30 mx-2">/</span>
                <span class="text-gold-500">@lang('translate.about')</span>
            </nav>
        </div>
    </section>

    @if($about = pages()->where('id', '36')->first())
        <section class="py-16 sm:py-24 bg-surface dark:bg-slate-950">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
                    <div>
                        <span class="section-tag">@lang('translate.about_us')</span>
                        <h2 class="section-title text-navy-950 dark:text-white">{{ $about->title }}</h2>
                        <div class="text-navy-600 dark:text-navy-300 text-base leading-relaxed space-y-4">{!! $about->content !!}</div>
                    </div>
                    <div class="text-center">
                        <img src="{{ asset('/logo.png') }}" class="max-w-[80%] mx-auto" alt="Four Islands">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-14 sm:mt-20">
                    @if($mission = pages()->where('id', '35')->first())
                        <div class="card p-6 sm:p-8">
                            <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-gradient-to-br from-gold-500/10 to-gold-500/5 text-gold-500 text-lg mb-4">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <h4 class="font-heading text-xl mb-4">{{ $mission->title }}</h4>
                            <div class="text-navy-600 dark:text-navy-300 leading-relaxed text-sm">{!! $mission->content !!}</div>
                        </div>
                    @endif
                    @if($vision = pages()->where('id', '37')->first())
                        <div class="card p-6 sm:p-8">
                            <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-gradient-to-br from-gold-500/10 to-gold-500/5 text-gold-500 text-lg mb-4">
                                <i class="fas fa-eye"></i>
                            </div>
                            <h4 class="font-heading text-xl mb-4">{{ $vision->title }}</h4>
                            <div class="text-navy-600 dark:text-navy-300 leading-relaxed text-sm">{!! $vision->content !!}</div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    <section class="py-16 sm:py-24 bg-navy-900 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_40%,rgba(197,163,90,0.1)_0%,transparent_50%),radial-gradient(circle_at_80%_60%,rgba(197,163,90,0.08)_0%,transparent_50%)]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-[1]">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
                <div class="text-center">
                    <div class="font-heading text-3xl sm:text-4xl font-bold text-gold-500">1987</div>
                    <div class="text-xs sm:text-sm text-white/55 uppercase tracking-wider mt-2">@lang('translate.established')</div>
                </div>
                <div class="text-center">
                    <div class="font-heading text-3xl sm:text-4xl font-bold text-gold-500">30+</div>
                    <div class="text-xs sm:text-sm text-white/55 uppercase tracking-wider mt-2">@lang('translate.countries_served')</div>
                </div>
                <div class="text-center">
                    <div class="font-heading text-3xl sm:text-4xl font-bold text-gold-500">{{ date('Y') - 1987 }}+</div>
                    <div class="text-xs sm:text-sm text-white/55 uppercase tracking-wider mt-2">@lang('translate.years_exp')</div>
                </div>
                <div class="text-center">
                    <div class="font-heading text-3xl sm:text-4xl font-bold text-gold-500">100%</div>
                    <div class="text-xs sm:text-sm text-white/55 uppercase tracking-wider mt-2">@lang('translate.satisfaction')</div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 sm:py-24 bg-alt dark:bg-slate-900">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="section-tag">@lang('translate.contact_us')</span>
            <h2 class="section-title text-navy-950 dark:text-white">@lang('translate.lead_title')</h2>
            <p class="text-slate-600 dark:text-slate-300 text-base max-w-xl mx-auto mb-8">@lang('translate.lead_desc')</p>
            <a href="{{ route('home.contacts.index') }}" class="btn-primary">
                @lang('translate.get_quote')
                <svg class="h-4 w-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0-5 5m5-5H6"/></svg>
            </a>
        </div>
    </section>
@stop
