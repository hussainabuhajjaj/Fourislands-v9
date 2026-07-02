@extends('frontend.layouts.master')

@section('page_title', $q ? __('translate.search_results') . ': ' . $q : __('translate.search'))
@section('meta_desc', $q ? __('translate.search_results') . ': ' . $q : __('translate.search'))

@section('content')
    <section class="relative pt-28 sm:pt-36 pb-16 sm:pb-20 bg-slate-950">
        <div class="absolute inset-0 bg-[linear-gradient(110deg,rgba(2,6,23,.94)_0%,rgba(15,23,42,.82)_48%,rgba(15,23,42,.42)_100%)]"></div>
        <div class="relative z-[2] max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-3xl sm:text-4xl font-bold text-white mb-2">@lang('translate.search_results'): {{ $q }}</h1>
            <nav aria-label="breadcrumb" class="text-sm">
                <a href="{{ route('home.home') }}" class="text-white/55 hover:text-gold-500 transition-colors">@lang('translate.home')</a>
                <span class="text-white/30 mx-2">/</span>
                <span class="text-gold-500">@lang('translate.search')</span>
            </nav>
        </div>
    </section>

    <section class="py-16 sm:py-24 bg-white dark:bg-slate-950">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('home.search') }}" method="GET" class="mb-10">
                <div class="flex gap-3">
                    <input type="text" name="q" value="{{ $q }}" placeholder="@lang('translate.search_placeholder')" class="form-input flex-1" required minlength="2">
                    <button type="submit" class="btn-primary shrink-0">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </button>
                </div>
            </form>

            @if($total > 0)
                <p class="text-sm text-slate-500 dark:text-slate-400 mb-8">{{ $total }} @lang('translate.results_found')</p>

                @if($services->count() > 0)
                    <div class="mb-10">
                        <h3 class="font-heading text-xl font-bold text-navy-950 dark:text-white mb-4">@lang('translate.services')</h3>
                        <div class="space-y-3">
                            @foreach($services as $service)
                                <a href="{{ route('home.services.show', $service->id) }}" class="card block p-4 hover:border-sky-200 dark:hover:border-sky-700 transition-colors no-underline">
                                    <h4 class="font-semibold text-navy-950 dark:text-white">{{ $service->title }}</h4>
                                    <p class="text-sm text-slate-600 dark:text-slate-300 mt-1">{{ Str::limit(strip_tags($service->description), 150) }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($products->count() > 0)
                    <div class="mb-10">
                        <h3 class="font-heading text-xl font-bold text-navy-950 dark:text-white mb-4">@lang('translate.products')</h3>
                        <div class="space-y-3">
                            @foreach($products as $product)
                                <a href="{{ route('home.products.show', $product->id) }}" class="card block p-4 hover:border-sky-200 dark:hover:border-sky-700 transition-colors no-underline">
                                    <h4 class="font-semibold text-navy-950 dark:text-white">{{ $product->title }}</h4>
                                    <p class="text-sm text-slate-600 dark:text-slate-300 mt-1">{{ Str::limit(strip_tags($product->description), 150) }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($posts->count() > 0)
                    <div class="mb-10">
                        <h3 class="font-heading text-xl font-bold text-navy-950 dark:text-white mb-4">@lang('translate.blog')</h3>
                        <div class="space-y-3">
                            @foreach($posts as $post)
                                <a href="{{ route('home.blog.show', $post->slug) }}" class="card block p-4 hover:border-sky-200 dark:hover:border-sky-700 transition-colors no-underline">
                                    <h4 class="font-semibold text-navy-950 dark:text-white">{{ $post->title }}</h4>
                                    <p class="text-sm text-slate-600 dark:text-slate-300 mt-1">{{ Str::limit(strip_tags($post->excerpt ?: $post->content), 150) }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($faqs->count() > 0)
                    <div class="mb-10">
                        <h3 class="font-heading text-xl font-bold text-navy-950 dark:text-white mb-4">@lang('translate.faq')</h3>
                        <div class="space-y-3">
                            @foreach($faqs as $faq)
                                <a href="{{ route('home.faq') }}" class="card block p-4 hover:border-sky-200 dark:hover:border-sky-700 transition-colors no-underline">
                                    <h4 class="font-semibold text-navy-950 dark:text-white">{{ $faq->question }}</h4>
                                    <p class="text-sm text-slate-600 dark:text-slate-300 mt-1">{{ Str::limit(strip_tags($faq->answer), 150) }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            @else
                <div class="text-center py-16">
                    <svg class="w-16 h-16 text-slate-300 dark:text-slate-600 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <p class="text-slate-500 text-lg mb-2">@lang('translate.no_results')</p>
                    <p class="text-sm text-slate-400">@lang('translate.try_different_keywords')</p>
                </div>
            @endif
        </div>
    </section>
@endsection
