@extends('frontend.layouts.master')
<style>
    .myfilter img {

        filter: hue-rotate(173deg) grayscale(0.10) brightness(0.50);

    }

    .myfilter {

        position: relative;

    }

    .myfilter:after {

        position: absolute;
        content: '';
        display: block;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;

        background: null, 0%, 0%);

        mix-blend-mode: overlay

    }
</style>

@section('content')

{{--    <!-- Lines -->--}}
{{--    <section class="content-lines-wrapper">--}}
{{--        <div class="content-lines-inner">--}}
{{--            <div class="content-lines"></div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- Header Banner -->
    <section class="banner-header banner-img bg-img bg-fixed pb-0" data-background="{{asset('NewFront/img/1.jpg')}}"
             data-overlay-light="1"></section>
    <!-- Projects -->
    <section class="projects ">
        <div class="container">
            <div class="row">
                <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                    @if(app()->getLocale() == 'ar')
                    <h2 class="section-title">منتـــجا <span>تنا</span></h2>
                    @else
                    <h2 class="section-title">Our <span>Products</span></h2>
                    @endif
                </div>
            </div>
            <div class="row">
                @if(count($products) > 0)
                @foreach(@$products as $item)
                    <div class="col-md-3 animate-box overlay--dark" data-animate-effect="fadeInUp">
                        <div class="item">
                                <div class="myfilter">
                                <img class="img-fluid mx-auto d-block"
                                     src="{{ url('image/' . @$item->image . '/300x300' ) }}">
                            </div>

                            <div class="con">
                                <h5><a style="font-weight:700 !important" href="{{route('home.products.show',@$item->id)}}">{{@$item->title}}</a></h5>
                             
                                <div class="line"></div>
                                <a href="{{route('home.products.show',@$item->id)}}"><i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                    <div class="col-md-6 animate-box" data-animate-effect="fadeInUp">
                        NO Data
                    </div>
                    @endif
            </div>
        </div>
    </section>
    {{--    <!-- Promo video - Testiominals -->--}}
    {{--    <section class="testimonials">--}}
    {{--        <div class="background bg-img bg-fixed section-padding pb-0" data-background="img/banner2.jpg" data-overlay-dark="3">--}}
    {{--            <div class="container">--}}
    {{--                <div class="row">--}}
    {{--                    <!-- Promo video -->--}}
    {{--                    <div class="col-md-6">--}}
    {{--                        <div class="vid-area">--}}
    {{--                            <div class="vid-icon">--}}
    {{--                                <a class="play-button vid" href="https://youtu.be/RziCmLzpFNY">--}}
    {{--                                    <svg class="circle-fill">--}}
    {{--                                        <circle cx="43" cy="43" r="39" stroke="#fff" stroke-width=".5"></circle>--}}
    {{--                                    </svg>--}}
    {{--                                    <svg class="circle-track">--}}
    {{--                                        <circle cx="43" cy="43" r="39" stroke="none" stroke-width="1" fill="none"></circle>--}}
    {{--                                    </svg> <span class="polygon">--}}
    {{--                                            <i class="ti-control-play"></i>--}}
    {{--                                        </span> </a>--}}
    {{--                            </div>--}}
    {{--                            <div class="cont mt-15 mb-30">--}}
    {{--                                <h5>View promo video</h5>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <!-- Testiominals -->--}}
    {{--                    <div class="col-md-5 offset-md-1">--}}
    {{--                        <div class="testimonials-box animate-box" data-animate-effect="fadeInUp">--}}
    {{--                            <div class="head-box">--}}
    {{--                                <h4>What Client's Say?</h4>--}}
    {{--                            </div>--}}
    {{--                            <div class="owl-carousel owl-theme">--}}
    {{--                                <div class="item"> <span class="quote"><img src="img/quot.png" alt=""></span>--}}
    {{--                                    <p>Architect dapibus augue metus the nec feugiat erat hendrerit nec. Duis ve ante the lemon sanleo nec feugiat erat hendrerit necuis ve ante.</p>--}}
    {{--                                    <div class="info">--}}
    {{--                                        <div class="author-img"> <img src="img/team/1.jpg" alt=""> </div>--}}
    {{--                                        <div class="cont">--}}
    {{--                                            <h6>Jason Brown</h6> <span>Crowne Plaza Owner</span>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="item"> <span class="quote">--}}
    {{--                                            <img src="img/quot.png" alt="">--}}
    {{--                                        </span>--}}
    {{--                                    <p>Interior dapibus augue metus the nec feugiat erat hendrerit nec. Duis ve ante the lemon sanleo nec feugiat erat hendrerit necuis ve ante.</p>--}}
    {{--                                    <div class="info">--}}
    {{--                                        <div class="author-img"> <img src="img/team/2.jpg" alt=""> </div>--}}
    {{--                                        <div class="cont">--}}
    {{--                                            <h6>Emily White</h6> <span>Armada Owner</span>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="item"> <span class="quote">--}}
    {{--                                            <img src="img/quot.png" alt="">--}}
    {{--                                        </span>--}}
    {{--                                    <p>Urban dapibus augue metus the nec feugiat erat hendrerit nec. Duis ve ante the lemon sanleo nec feugiat erat hendrerit necuis ve ante.</p>--}}
    {{--                                    <div class="info">--}}
    {{--                                        <div class="author-img"> <img src="img/team/4.jpg" alt=""> </div>--}}
    {{--                                        <div class="cont">--}}
    {{--                                            <h6>Jesica Smith</h6> <span>Alsa Manager</span>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
@stop

