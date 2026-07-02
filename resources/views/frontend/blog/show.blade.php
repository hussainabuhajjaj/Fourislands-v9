@extends('frontend.layouts.master')

@section('page_title', $post->title)
@section('meta_desc', strip_tags($post->excerpt ?: Str::limit($post->content, 160)))

@section('content')
    <section class="relative pt-28 sm:pt-36 pb-16 sm:pb-20 bg-slate-950">
        <div class="absolute inset-0 bg-[linear-gradient(110deg,rgba(2,6,23,.94)_0%,rgba(15,23,42,.82)_48%,rgba(15,23,42,.42)_100%)]"></div>
        <div class="relative z-[2] max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-3xl sm:text-4xl font-bold text-white mb-2">{{ $post->title }}</h1>
            <nav aria-label="breadcrumb" class="text-sm">
                <a href="{{ route('home.home') }}" class="text-white/55 hover:text-gold-500 transition-colors">@lang('translate.home')</a>
                <span class="text-white/30 mx-2">/</span>
                <a href="{{ route('home.blog.index') }}" class="text-white/55 hover:text-gold-500 transition-colors">@lang('translate.blog')</a>
                <span class="text-white/30 mx-2">/</span>
                <span class="text-gold-500">{{ Str::limit($post->title, 30) }}</span>
            </nav>
        </div>
    </section>

    <section class="py-16 sm:py-24 bg-white dark:bg-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <article class="lg:col-span-2">
                    @if($post->image)
                        <img class="w-full rounded-xl mb-8" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                    @endif

                    <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500 dark:text-slate-400 mb-6">
                        @if($post->category)
                            <span class="px-3 py-1 rounded-full bg-sky-50 text-sky-700 dark:bg-sky-500/10 dark:text-sky-300 font-semibold text-xs">{{ $post->category->name }}</span>
                        @endif
                        @if($post->published_at)
                            <span>{{ $post->published_at->isoFormat('LL') }}</span>
                        @endif
                    </div>

                    <div class="prose prose-slate dark:prose-invert max-w-none leading-relaxed">
                        {!! $post->content !!}
                    </div>

                    <div class="mt-10 pt-6 border-t border-slate-200 dark:border-slate-700">
                        <a href="{{ route('home.blog.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-sky-700 hover:text-sky-800 transition-colors">
                            <svg class="w-4 h-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            @lang('translate.back_to_blog')
                        </a>
                    </div>
                </article>

                <aside class="space-y-8">
                    <div class="card p-6">
                        <h4 class="font-heading text-base font-bold text-navy-950 dark:text-white mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">@lang('translate.categories')</h4>
                        <ul class="space-y-2">
                            @foreach($categories as $cat)
                                <li><a href="{{ route('home.blog.category', $cat->slug) }}" class="text-sm text-slate-600 dark:text-slate-300 hover:text-sky-700 transition-colors">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card p-6">
                        <h4 class="font-heading text-base font-bold text-navy-950 dark:text-white mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">@lang('translate.recent_posts')</h4>
                        <ul class="space-y-4">
                            @foreach($recent as $r)
                                <li class="flex gap-3">
                                    @if($r->image)
                                        <img class="w-14 h-14 rounded-md object-cover shrink-0" src="{{ asset($r->image) }}" alt="{{ $r->title }}">
                                    @endif
                                    <div>
                                        <a href="{{ route('home.blog.show', $r->slug) }}" class="text-sm font-semibold text-navy-950 dark:text-white hover:text-sky-700 transition-colors leading-snug">{{ Str::limit($r->title, 40) }}</a>
                                        <p class="text-xs text-slate-500 mt-1">{{ $r->published_at->format('M d, Y') }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
