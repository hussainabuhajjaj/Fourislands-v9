@extends('frontend.layouts.master')

@section('page_title', __('translate.blog'))
@section('meta_desc', strip_tags($category->name ?? '') . ' ' . __('translate.blog_desc'))

@section('content')
    <section class="relative pt-28 sm:pt-36 pb-16 sm:pb-20 bg-slate-950">
        <div class="absolute inset-0 bg-[linear-gradient(110deg,rgba(2,6,23,.94)_0%,rgba(15,23,42,.82)_48%,rgba(15,23,42,.42)_100%)]"></div>
        <div class="relative z-[2] max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-3xl sm:text-4xl font-bold text-white mb-2">@lang('translate.blog')</h1>
            <nav aria-label="breadcrumb" class="text-sm">
                <a href="{{ route('home.home') }}" class="text-white/55 hover:text-gold-500 transition-colors">@lang('translate.home')</a>
                <span class="text-white/30 mx-2">/</span>
                <span class="text-gold-500">@lang('translate.blog')</span>
            </nav>
        </div>
    </section>

    <section class="py-16 sm:py-24 bg-surface dark:bg-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <div class="lg:col-span-2">
                    @if(isset($category))
                        <div class="mb-8">
                            <span class="section-tag">{{ $category->name }}</span>
                        </div>
                    @endif

                    @if($posts->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            @foreach($posts as $post)
                                <article class="card-hover group overflow-hidden">
                                    @if($post->image)
                                        <img class="w-full h-52 object-cover transition-transform duration-500 group-hover:scale-105" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                                    @else
                                        <div class="w-full h-52 bg-gradient-to-br from-gold-100 to-gold-200 dark:from-slate-800 dark:to-slate-700 flex items-center justify-center">
                                            <svg class="w-10 h-10 text-gold-300 dark:text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/></svg>
                                        </div>
                                    @endif
                                    <div class="p-6">
                                        <div class="flex items-center gap-3 text-xs text-slate-600 dark:text-slate-400 mb-3">
                                            @if($post->category)
                                                <span class="px-2.5 py-1 rounded-full bg-gold-50 text-gold-800 dark:bg-gold-400/10 dark:text-gold-400 font-semibold">{{ $post->category->name }}</span>
                                            @endif
                                            @if($post->published_at)
                                                <span>{{ $post->published_at->isoFormat('LL') }}</span>
                                            @endif
                                        </div>
                                        <h3 class="font-heading text-lg font-bold text-navy-950 dark:text-white group-hover:text-gold-700 dark:group-hover:text-gold-400 transition-colors">
                                            <a href="{{ route('home.blog.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                                        </h3>
                                        @if($post->excerpt)
                                            <p class="mt-2 text-sm text-slate-600 dark:text-slate-300 leading-relaxed">{{ Str::limit(strip_tags($post->excerpt), 120) }}</p>
                                        @endif
                                        <a href="{{ route('home.blog.show', ['slug' => $post->slug]) }}" class="inline-flex items-center gap-2 mt-4 text-sm font-semibold text-gold-700 dark:text-gold-400 hover:text-gold-800 dark:hover:text-gold-300 transition-colors">
                                            @lang('translate.read_more')
                                            <svg class="w-3.5 h-3.5 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0-5 5m5-5H6"/></svg>
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <div class="mt-10">
                            {{ $posts->links() }}
                        </div>
                    @else
                        <div class="text-center py-16">
                            <svg class="w-16 h-16 text-slate-300 dark:text-slate-600 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/></svg>
                            <p class="text-slate-600">@lang('translate.no_data')</p>
                        </div>
                    @endif
                </div>

                <aside class="space-y-8">
                    <div class="card p-6">
                        <h4 class="font-heading text-base font-bold text-navy-950 dark:text-white mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">@lang('translate.categories')</h4>
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('home.blog.index') }}" class="text-sm text-slate-600 dark:text-slate-300 hover:text-gold-700 dark:hover:text-gold-400 transition-colors {{ !isset($category) ? 'text-gold-700 font-semibold' : '' }}">@lang('translate.all')</a>
                            </li>
                            @foreach($categories as $cat)
                                <li>
                                    <a href="{{ route('home.blog.category', ['slug' => $cat->slug]) }}" class="text-sm text-slate-600 dark:text-slate-300 hover:text-gold-700 dark:hover:text-gold-400 transition-colors {{ isset($category) && $category->id == $cat->id ? 'text-gold-700 font-semibold' : '' }}">{{ $cat->name }}</a>
                                </li>
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
                                        <a href="{{ route('home.blog.show', ['slug' => $r->slug]) }}" class="text-sm font-semibold text-navy-950 dark:text-white hover:text-gold-700 dark:hover:text-gold-400 transition-colors leading-snug">{{ Str::limit($r->title, 40) }}</a>
                                        @if($r->published_at)
                                            <p class="text-xs text-slate-600 mt-1">{{ $r->published_at->isoFormat('LL') }}</p>
                                        @endif
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
