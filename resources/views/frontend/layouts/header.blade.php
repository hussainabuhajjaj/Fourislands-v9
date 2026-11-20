@php($isRtl = app()->getLocale() === 'ar')

<div id="scrollTop" class="fixed {{ $isRtl ? 'left-4 sm:left-8' : 'right-4 sm:right-8' }} bottom-4 sm:bottom-8 w-11 h-11 rounded-full bg-surface dark:bg-navy-800 shadow-lg z-[9999] flex items-center justify-center opacity-0 invisible translate-y-3 transition-all duration-300 cursor-pointer hover:-translate-y-1 hover:shadow-xl hover:bg-gold-500">
    <i class="fas fa-arrow-up text-navy-900 dark:text-white text-sm"></i>
</div>

<div id="preloader" class="fixed inset-0 bg-navy-900 z-[99999] flex items-center justify-center transition-opacity duration-500">
    <div class="w-9 h-9 border-[3px] border-white/20 border-t-gold-500 rounded-full animate-spin"></div>
</div>

<nav id="navbar" class="fixed inset-x-0 top-0 z-[9990]">
    <div class="mx-auto max-w-7xl px-4 pt-4 sm:px-6 lg:px-8">
        <div class="nav-shell relative flex h-[64px] items-center justify-center rounded-lg px-4 lg:h-[72px] lg:px-5">
            <div class="nav-brand-slot hidden max-w-[28%] sm:block {{ $isRtl ? 'nav-brand-slot-rtl text-right' : 'nav-brand-slot-ltr text-left' }}">
                <a class="inline-flex items-center gap-3 no-underline {{ $isRtl ? 'flex-row-reverse' : '' }}" href="{{ route('home.home') }}" aria-label="@lang('translate.home')">
                    <img id="navLogo" class="h-8 w-auto shrink-0 lg:h-10" src="{{ asset('logo.png') }}" alt="Four Islands">
                    <span class="hidden min-w-0 leading-tight sm:block">
                        <span class="block truncate text-sm font-extrabold text-white">@lang('translate.fourislands')</span>
                        <span class="block truncate text-[10px] font-bold uppercase tracking-[1.5px] text-white/60">@lang('translate.prof')</span>
                    </span>
                </a>
            </div>

            <div class="hidden items-center justify-center gap-1 lg:flex" aria-label="Primary navigation">
                <a class="nav-link {{ request()->routeIs('home.home', 'plain.home.home') ? 'active' : '' }}" href="{{ route('home.home') }}">@lang('translate.home')</a>
                <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ route('home.home') }}/about">@lang('translate.about')</a>
                <a class="nav-link {{ request()->routeIs('home.services.*', 'plain.home.services.*') ? 'active' : '' }}" href="{{ route('home.services.index') }}">@lang('translate.services')</a>
                <a class="nav-link {{ request()->routeIs('home.products.*', 'plain.home.products.*') ? 'active' : '' }}" href="{{ route('home.products.index') }}">@lang('translate.products')</a>
                <a class="nav-link {{ request()->routeIs('home.faq', 'plain.home.faq') ? 'active' : '' }}" href="{{ route('home.faq') }}">@lang('translate.faq')</a>
                <a class="nav-link {{ request()->routeIs('home.blog.*', 'plain.home.blog.*') ? 'active' : '' }}" href="{{ route('home.blog.index') }}">@lang('translate.blog')</a>
                <a class="nav-link {{ request()->routeIs('home.contacts.*', 'plain.home.contacts.*') ? 'active' : '' }}" href="{{ route('home.contacts.index') }}">@lang('translate.contact')</a>
                <a href="{{ route('home.search') }}" class="nav-link nav-icon-link" aria-label="@lang('translate.search')">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </a>
            </div>

            <div class="nav-actions-slot hidden max-w-[28%] items-center gap-2 lg:flex {{ $isRtl ? 'nav-actions-slot-rtl' : 'nav-actions-slot-ltr' }}">
                <a class="nav-cta" href="{{ route('home.quote-requests.index') }}">@lang('translate.get_quote')</a>
                <button id="themeToggle" class="theme-toggle-btn" type="button" aria-label="Toggle theme">
                    <svg id="sunIcon" class="h-4 w-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <svg id="moonIcon" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                </button>
                <a class="lang-link" href="{{ LaravelLocalization::getLocalizedURL($isRtl ? 'en' : 'ar', null, [], true) }}">{{ $isRtl ? 'English' : 'العربية' }}</a>
            </div>

            <div class="mobile-brand-center sm:hidden">
                <a href="{{ route('home.home') }}" aria-label="@lang('translate.home')">
                    <img class="h-9 w-auto" src="{{ asset('logo.png') }}" alt="Four Islands">
                </a>
            </div>

            <button id="mobileToggle" class="mobile-toggle {{ $isRtl ? 'mobile-toggle-rtl' : 'mobile-toggle-ltr' }} lg:hidden" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="mobileMenu">
                <span class="mobile-toggle-line"></span>
                <span class="mobile-toggle-line"></span>
                <span class="mobile-toggle-line"></span>
            </button>
        </div>
    </div>

    <div id="mobileMenu" class="fixed inset-0 z-40 hidden lg:hidden">
        <div class="flex min-h-full flex-col items-center justify-center gap-6 px-6 text-center">
            <a class="mobile-link" href="{{ route('home.home') }}">@lang('translate.home')</a>
            <a class="mobile-link" href="{{ route('home.home') }}/about">@lang('translate.about')</a>
            <a class="mobile-link" href="{{ route('home.services.index') }}">@lang('translate.services')</a>
            <a class="mobile-link" href="{{ route('home.products.index') }}">@lang('translate.products')</a>
            <a class="mobile-link" href="{{ route('home.faq') }}">@lang('translate.faq')</a>
            <a class="mobile-link" href="{{ route('home.blog.index') }}">@lang('translate.blog')</a>
            <a class="mobile-link" href="{{ route('home.search') }}">@lang('translate.search')</a>
            <a class="mobile-link" href="{{ route('home.contacts.index') }}">@lang('translate.contact')</a>
            <a class="nav-cta mt-3 px-8 py-3 text-base" href="{{ route('home.quote-requests.index') }}">@lang('translate.get_quote')</a>
            <button id="themeToggleMobile" class="theme-toggle-btn" type="button" aria-label="Toggle theme">
                <svg id="sunIconM" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                <svg id="moonIconM" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
            </button>
            <a class="lang-link" href="{{ LaravelLocalization::getLocalizedURL($isRtl ? 'en' : 'ar', null, [], true) }}">{{ $isRtl ? 'English' : 'العربية' }}</a>
        </div>
    </div>
</nav>
