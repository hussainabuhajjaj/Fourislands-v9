@include('frontend.layouts.head')
<body>


@include('frontend.layouts.header')
<!-- Slider -->
<!-- Content -->
<div class="content-wrapper">


    @yield('content')
@include('frontend.layouts.footer')

</div>
@include('frontend.layouts.js')

</body>

</html>
