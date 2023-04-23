<!-- Preloader -->
<div id="preloader"></div>
<!-- Progress scroll to top -->
<div class="progress-wrap cursor-pointer">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg ">
    <div class="container">
        <!-- Logo -->
        <a class="logo" href="{{url('/')}}"> <img src="{{asset('logo.png')}}" alt=""> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="icon-bar"><i class="ti-line-double"></i></span></button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link active"
                                        href="{{route('home.home')}}">@lang('translate.home')</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('about')}}">@lang('translate.about')</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.services.index')}}">@lang('translate.services')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.products.index')}}">@lang('translate.products')</a>
                </li>
                {{--                <li class="nav-item"><a class="nav-link" href="services.html">@lang('translate.services')</a></li>--}}

                <li class="nav-item"><a class="nav-link"
                                        href="{{route('home.contacts.index')}}">@lang('translate.contact')</a></li>
            </ul>
        </div>
    </div>
</nav>