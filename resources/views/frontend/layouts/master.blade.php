@include('frontend.layouts.head')
<body>
    <a href="#main-content" class="skip-link">{{ app()->getLocale() === 'ar' ? 'تخطى إلى المحتوى' : 'Skip to content' }}</a>
    @include('frontend.layouts.header')

    <main id="main-content">
        @yield('content')
    </main>

    @include('frontend.layouts.sticky-cta')
    @include('frontend.layouts.footer')
    @include('frontend.layouts.js')
</body>
</html>
