<!DOCTYPE html>
<html {{ app()->getLocale() == 'ar' ? 'dir="rtl" lang="ar"' : 'lang="en"' }}>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@hasSection('page_title') @yield('page_title') | @endif @lang('translate.fourislands') - @lang('translate.prof')</title>
    <meta name="description" content="@hasSection('meta_desc') @yield('meta_desc') @else @lang('translate.meta_desc') @endif">

    <meta property="og:title" content="@hasSection('page_title') @yield('page_title') | @endif @lang('translate.fourislands') - @lang('translate.prof')">
    <meta property="og:description" content="@hasSection('meta_desc') @yield('meta_desc') @else @lang('translate.meta_desc') @endif">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('logo.png') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@hasSection('page_title') @yield('page_title') | @endif @lang('translate.fourislands') - @lang('translate.prof')">
    <meta name="twitter:description" content="@hasSection('meta_desc') @yield('meta_desc') @else @lang('translate.meta_desc') @endif">

    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
    <link rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
    <link rel="alternate" hreflang="x-default" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">

    @php
        $orgPhone = getSetting('phone') ?: '+965 2225 5565';
        $orgEmail = getSetting('email') ?: 'info@fourislands.com';
        $orgAddress = getSetting('address') ?: 'Kuwait - Qibla';
        $foundingYear = 1987;
    @endphp

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Organization",
        "name": "Four Islands EST. for General Trading and Contracting",
        "alternateName": "مؤسسة الجزر الأربعة للتجارة العامة والمقاولات",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('logo.png') }}",
        "description": "@lang('translate.meta_desc')",
        "foundingDate": "{{ $foundingYear }}",
        "telephone": "{{ $orgPhone }}",
        "email": "{{ $orgEmail }}",
        "address": {
            "@@type": "PostalAddress",
            "streetAddress": "{{ $orgAddress }}",
            "addressCountry": "KW"
        },
        "sameAs": [
            @if(getSetting('facebook'))
                "{{ getSetting('facebook') }}",
            @endif
            @if(getSetting('twitter'))
                "{{ getSetting('twitter') }}",
            @endif
            @if(getSetting('instagram'))
                "{{ getSetting('instagram') }}",
            @endif
            @if(getSetting('linkedin'))
                "{{ getSetting('linkedin') }}"
            @endif
        ]
    }
    </script>

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "LocalBusiness",
        "name": "Four Islands EST. for General Trading and Contracting",
        "alternateName": "مؤسسة الجزر الأربعة للتجارة العامة والمقاولات",
        "image": "{{ asset('logo.png') }}",
        "url": "{{ url('/') }}",
        "telephone": "{{ $orgPhone }}",
        "email": "{{ $orgEmail }}",
        "foundingDate": "{{ $foundingYear }}",
        "description": "@lang('translate.meta_desc')",
        "address": {
            "@@type": "PostalAddress",
            "streetAddress": "{{ $orgAddress }}",
            "addressCountry": "KW"
        },
        "areaServed": { "@@type": "Country", "name": "KW" },
        "hasOfferCatalog": {
            "@@type": "OfferCatalog",
            "name": "@lang('translate.ourservices')",
            "itemListElement": [
                @foreach(\App\Models\Service::translatedIn(app()->getLocale())->get() as $svc)
                    { "@@type": "Offer", "itemOffered": { "@@type": "Service", "name": "{{ $svc->title }}" } }@if(!$loop->last),@endif
                @endforeach
            ]
        }
    }
    </script>

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "WebSite",
        "url": "{{ url('/') }}",
        "potentialAction": {
            "@@type": "SearchAction",
            "target": {
                "@@type": "EntryPoint",
                "urlTemplate": "{{ url('/') }}/{{ app()->getLocale() }}/search?q={search_term}"
            },
            "query-input": "required name=search_term"
        }
    }
    </script>

    <script>
        (function() {
            var theme = localStorage.getItem('theme');
            if (!theme) theme = 'light';
            if (theme === 'dark') document.documentElement.classList.add('dark');
        })();
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('NewFront/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('NewFront/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @stack('front_css')

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
