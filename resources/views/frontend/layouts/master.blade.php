@include('frontend.layouts.head')
<body>
    @include('frontend.layouts.header')

    <main id="main-content">
        @yield('content')
    </main>

    @include('frontend.layouts.sticky-cta')
    @include('frontend.layouts.footer')
    @include('frontend.layouts.js')
</body>
</html>
