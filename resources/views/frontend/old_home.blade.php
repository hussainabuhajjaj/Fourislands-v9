@include('frontend.layouts.head')
<body>


<!-- header area -->
@include('frontend.layouts.header')
<!-- end: .header -->

{{--<div class="intro-one">--}}
{{--    <div class="intro-one--contents">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-5 col-md-12">--}}
{{--                    <h1 class="display-3">Make Business with Experienced <span>Partners</span></h1>--}}
{{--                    <p>Deserunt dolore voluptatem assumenda quae possimus sunt dignissimos tempora officia. Lorem--}}
{{--                        ipsum dolor sit amet consectetur adipisicing dolore.</p>--}}
{{--                    <a href="#" class="btn btn-secondary">Explore More</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div><!-- ends: .container -->--}}
{{--    </div><!-- ends: .intro-one-contents -->--}}
{{--    <div class="intro-one--img">--}}
{{--        <img src="{{asset('frontend/img/slider_3.png')}}" alt="">--}}
{{--    </div><!-- ends: .intro-one-img -->--}}
{{--</div><!-- ends: .intro-one -->--}}
<div id="rev_slider_15_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="slider1"
     data-source="gallery"
     style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
    <!-- START REVOLUTION SLIDER 5.4.8.1 fullwidth mode -->
    {{--    @dd($sliders[1])--}}

    <div id="rev_slider_15_1" class="rev_slider fullwidthabanner dark-overlay" style="display:none;"
         data-version="5.4.8.1">
        <ul>    <!-- SLIDE  -->
            @foreach($sliders as $slider)
                {{--                @dd(@$slider->image->path)--}}

                <li data-index="rs-36" data-transition="fade,slotfade-horizontal" data-slotamount="default,default"
                    data-hideafterloop="0" data-hideslideonmobile="off" data-easein="Elastic.easeOut,default"
                    data-easeout="Elastic.easeIn,default" data-masterspeed="300,default" data-delay="6010"
                    data-rotate="0,0"
                    data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3=""
                    data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                    data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{ url('image/' .  @$slider->imageObject->path) }}" alt="" data-bgposition="center center"
                         data-kenburns="on"
                         data-duration="3000" data-ease="Power3.easeOut" data-scalestart="130" data-scaleend="100"
                         data-rotatestart="0" data-rotateend="0" data-blurstart="15" data-blurend="0"
                         data-offsetstart="0 0"
                         data-offsetend="0 0" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->
                    <div id="rrzm_36" class="rev_row_zone rev_row_zone_middle" style="z-index: 5;">

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption  "
                             id="slide-36-layer-2"
                             data-x=""
                             data-y="center" data-voffset="-210"
                             data-width="['auto']"
                             data-height="['auto']"

                             data-type="row"
                             data-columnbreak="3"
                             data-responsive_offset="on"
                             data-responsive="off"
                             data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"+5670","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                             data-margintop="[0,0,0,0]"
                             data-marginright="[0,0,0,0]"
                             data-marginbottom="[0,0,0,0]"
                             data-marginleft="[0,0,0,0]"
                             data-textAlign="['inherit','inherit','inherit','inherit']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[0,0,0,0]"
                             data-paddingleft="[0,0,0,0]"

                             style="z-index: 5; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;">
                            <!-- LAYER NR. 2 -->
                            <div class="tp-caption  "
                                 id="slide-36-layer-3"
                                 data-x="100"
                                 data-y="100"
                                 data-width="['auto']"
                                 data-height="['auto']"

                                 data-type="column"
                                 data-responsive_offset="on"
                                 data-responsive="off"
                                 data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"+5670","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                 data-columnwidth="75%"
                                 data-verticalalign="top"
                                 data-margintop="[0,0,0,0]"
                                 data-marginright="[0,0,0,0]"
                                 data-marginbottom="[0,0,0,0]"
                                 data-marginleft="[0,0,0,0]"
                                 data-textAlign="['inherit','inherit','inherit','inherit']"
                                 data-paddingtop="[0,0,0,0]"
                                 data-paddingright="[0,0,0,0]"
                                 data-paddingbottom="[0,0,0,0]"
                                 data-paddingleft="[0,0,0,0]"

                                 style="z-index: 6; width: 100%;">
                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption  tp-no-events   tp-resizeme"
                                     id="slide-36-layer-5"
                                     data-x=""
                                     data-y=""
                                     data-height="['auto']"

                                     data-type="text"
                                     data-responsive_offset="on"
                                     data-fontsize="['50', '45', '40', '32']"
                                     data-lineheight="['64', '55', '43', '38']"
                                     data-frames='[{"delay":"+0","split":"chars","splitdelay":0.05,"speed":2000,"split_direction":"forward","frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"+2570","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power2.easeIn"}]'
                                     data-margintop="[0,0,0,0]"
                                     data-marginright="[0,0,0,0]"
                                     data-marginbottom="[30,30,30,30]"
                                     data-marginleft="[0,0,0,0]"
                                     data-textAlign="['inherit','inherit','inherit','inherit']"
                                     data-paddingtop="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"

                                     style="z-index: 7; max-width: 930px; white-space: normal; font-size: 60px; line-height: 70px; font-weight: 600; color: #ffffff; letter-spacing: 0px; display: block;pointer-events:none;">
                                    {{@$slider->title}}
                                </div>

                                <!-- LAYER NR. 4 -->
                                <div class="tp-caption   tp-resizeme"
                                     id="slide-36-layer-6"
                                     data-x=""
                                     data-y=""
                                     data-height="['auto']"

                                     data-fontsize="['20', '20', '18', '16']"
                                     data-lineheight="['36', '36', '24', '22']"

                                     data-type="text"
                                     data-responsive_offset="on"

                                     data-frames='[{"delay":"+2600","speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"+1870","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                     data-margintop="[0,0,0,0]"
                                     data-marginright="[0,0,0,0]"
                                     data-marginbottom="[35,35,35,35]"
                                     data-marginleft="[0,0,0,0]"
                                     data-textAlign="['inherit','inherit','inherit','inherit']"
                                     data-paddingtop="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"

                                     style="z-index: 8; max-width: 731px; white-space: normal; font-size: 20px; line-height: 36px; font-weight: 400; color: #ffffff; letter-spacing: 0px; display: block;">
                                    {{@$slider->short_description}}
                                </div>

                                <!-- LAYER NR. 5 -->
                                <div class="tp-caption"
                                     id="slide-36-layer-10"
                                     data-x=""
                                     data-y=""
                                     data-width="['auto']"
                                     data-height="['auto']"

                                     data-type="text"
                                     data-responsive_offset="on"

                                     data-frames='[{"delay":"+3600","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"+2070","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                     data-margintop="[0,0,0,0]"
                                     data-marginright="[0,0,0,0]"
                                     data-marginbottom="[0,0,0,0]"
                                     data-marginleft="[0,0,0,0]"
                                     data-textAlign="['inherit','inherit','inherit','inherit']"
                                     data-paddingtop="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"

                                     style="z-index: 9; white-space: normal; display: inline-block;">
                                    <a href="#" class="btn btn-secondary btn--rounded">Learn More</a></div>

                                <!-- LAYER NR. 6 -->
                                <div class="tp-caption"
                                     id="slide-36-layer-11"
                                     data-x=""
                                     data-y=""
                                     data-width="['auto']"
                                     data-height="['auto']"

                                     data-type="text"
                                     data-responsive_offset="on"

                                     data-frames='[{"delay":"+3800","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"+1870","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                     data-margintop="[0,0,0,0]"
                                     data-marginright="[0,0,0,0]"
                                     data-marginbottom="[0,0,0,0]"
                                     data-marginleft="[30,30,30,30]"
                                     data-textAlign="['inherit','inherit','inherit','inherit']"
                                     data-paddingtop="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"

                                     style="z-index: 10; white-space: normal; display: inline-block;">
                                    {{--                                <a href="#" class="btn btn-outline-light btn--rounded">Learn More</a></div>--}}
                                </div>

                                <!-- LAYER NR. 7 -->
                                <div class="tp-caption  "
                                     id="slide-36-layer-4"
                                     data-x="100"
                                     data-y="100"
                                     data-width="['auto']"
                                     data-height="['auto']"

                                     data-type="column"
                                     data-responsive_offset="on"

                                     data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"+5670","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                     data-columnwidth="25%"
                                     data-verticalalign="top"
                                     data-margintop="[0,0,0,0]"
                                     data-marginright="[0,0,0,0]"
                                     data-marginbottom="[0,0,0,0]"
                                     data-marginleft="[0,0,0,0]"
                                     data-textAlign="['inherit','inherit','inherit','inherit']"
                                     data-paddingtop="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"

                                     style="z-index: 11; width: 100%;"></div>
                            </div>
                        </div>
                    @endforeach
                </li>
                <!-- SLIDE  -->
        </ul>
        <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
    </div>
</div><!-- END REVOLUTION SLIDER -->
@if($about = pages()->where('id','36')->first())
    <section class="section-padding">
        <div class="container" id="{{replace_space_str($about->title)}}">
            <div class="row align-items-center">
                <div class="col-lg-5 margin-md-60">
                    <div class="m-bottom-35">

                        <div class="divider divider-simple text-left">
                            <h2 class="m-bottom-20">{{$about->title}}</h2>
                        </div>

                    </div>
                    <p>

                        {!! $about->content !!}

                    </p>
                    {{--                <button type="button" class="btn btn-secondary btn-icon icon-left m-top-30"><i--}}
                    {{--                        class="la la-file"></i> Company Brochure--}}
                    {{--                </button>--}}
                </div><!-- ends: .col-lg-5 -->
                <div class="col-lg-6 offset-lg-1">

                    <div class="video-single">
                        <figure>
                            <div class="v_img">
                                <img src=" {{ asset('/logo.png')}}" alt="" class="rounded">
                            </div>
                            <figcaption
                                class="d-flex justify-content-center align-items-center shape-wrapper img-shape-one">
                                {{--                            <a href="https://www.youtube.com/watch?v=omaTcIbwt9c" class="video-iframe play-btn play-btn--lg play-btn--primary"><img src="{{asset('frontend/mg/svg/play-)}}ibtn.svg" alt="" class="svg"></a>--}}
                            </figcaption>
                        </figure>
                    </div><!-- ends: .video-single -->

                </div><!-- ends: .col-lg-6 -->
            </div><!-- ends: .row -->
        </div>
    </section><!-- ends: section -->
@endif

@if($about = pages()->where('id','35')->first())

    <section class="section-bg p-top-100 p-bottom-110">
        <div class="container" id="{{replace_space_str($about->title)}}">
            <div class="row">
                <div class="col-lg-12 margin-md-60">
                    <div class="m-bottom-30">

                        <div class="divider divider-simple text-left">
                            <h2 class="m-bottom-20">
                                {!! $about->title !!}
                            </h2>
                        </div>

                    </div>
                    <p>
                        {!! $about->content !!}
                    </p>


                    {{--                <div class="m-top-30">--}}
                    {{--                    <ul class="arrow--list2">--}}

                    {{--                        <li class="list-item arrow-list5 d-flex align-content-center color-dark"><span><i--}}
                    {{--                                    class="la la-angle-right"></i></span> Client-Focused--}}
                    {{--                        </li>--}}


                    {{--                        <li class="list-item arrow-list5 d-flex align-content-center color-dark"><span><i--}}
                    {{--                                    class="la la-angle-right"></i></span> Leadership--}}
                    {{--                        </li>--}}


                    {{--                        <li class="list-item arrow-list5 d-flex align-content-center color-dark"><span><i--}}
                    {{--                                    class="la la-angle-right"></i></span> Execution Excellencr--}}
                    {{--                        </li>--}}


                    {{--                        <li class="list-item arrow-list5 d-flex align-content-center color-dark"><span><i--}}
                    {{--                                    class="la la-angle-right"></i></span> Aspiration--}}
                    {{--                        </li>--}}

                    {{--                    </ul>--}}
                    {{--                </div>--}}
                </div><!-- ends: .col-lg-6 -->

            </div>
        </div>
    </section><!-- ends: section -->
@endif
<section class=" p-top-100 p-bottom-80">
    <div class="container" id="service">
        <div class="row">
            <div class="col-lg-12">
                <div class="m-bottom-50">

                    <div class="divider text-center">
                        <h1>@lang('translate.service_we')</h1>

                    </div>

                </div>
            </div>


            <div class="icon-boxes icon-box--sixteen col-lg-12">
                <div class="row">
                    @if($services->count() > 0)
                        @foreach($services as $item)
                            <div class="col-lg-4 col-md-6">
                                <div class="icon-box icon-box-15 text-center">
                                    <img src="{{ url('image/' . @$item->image . '/300x300') }}" alt="">
                                @php

                                    @endphp
                                    <h6>{!! @$item->title !!}</h6>
                                    <p>{!! @$item->description !!}</p>
                                </div><!-- ends: .icon-box -->

                            </div><!-- ends: .col-lg-4 -->
                        @endforeach
                    @else
                        <h1 class="text-info text-center">No Services Found !</h1>
                    @endif
                </div><!-- ends: .row -->
            </div><!-- ends: .icon-boxes -->

        </div>
    </div><!-- ends: .container -->
    <section class="section-bg shop-products p-top-100 p-bottom-110" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="m-bottom-50">

                        <div class="divider text-center">
                            <h1>@lang('translate.our_products')</h1>
                            <p class="mx-auto"></p>
                        </div>

                    </div>
                </div><!-- ends: .col-lg-12 -->

                <div class="col-lg-12">
                    <div class="product-grid">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="card card-product">
                                        <figure class="text-center">
                                            <img class="img-responsive"
                                                 src="{{ url('image/' . $product->image . '/400x300') }}" alt="">
                                        </figure>
                                        <div class="card-body">
                                            <h4><a class="text-success" href="#">{{$product->title}}</a></h4>
                                        </div>
                                    </div><!-- End: .card -->
                                </div><!-- ends: .col-lg-4 -->
                            @endforeach
                        </div>
                    </div><!-- ends: .col-lg-4 -->
                    <div class="divider text-center">
                        <h1 class="text-success">@lang('translate.more_prod')</h1>
                        {{--                        <h1>@lang('translate.more_prod')</h1>--}}
                        <p class="mx-auto"></p>
                    </div>
                    {{--                        <div class="text-center m-top-30">--}}
                    {{--                            <a href="#" class="btn btn-outline-secondary">All Products</a>--}}
                    {{--                        </div>--}}
                </div>
            </div><!-- ends: .col-lg-12 -->
        </div>
        </div>
    </section><!-- ends:  -->

</section><!-- ends: .section-padding -->

@if($partners->count() > 0)
    <section class="carousel-wrapper bgimage logo-carousel">
        <div class="bg_image_holder">
            <img src="{{asset('frontend/img/logo-wrapper-bg.jpg')}}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 d-flex justify-content-center flex-column margin-md-60">
                    <h1 class="color-dark">@lang('translate.our_partners')</h1>
                </div><!-- ends: .col-lg-5 -->
                <div class="col-lg-6 offset-lg-1">

                    <div class="logo-carousel-two owl-carousel">
                        @foreach($partners as $partner)
                            <div class="carousel-single">
                                <div class="logo-box">
                                    <img src="{{ url('image/' . @$partner->image ) }}" alt="">
                                </div><!-- ends: .logo-box -->
                            </div><!-- end: .carousel-single -->
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@else
    <div class="divider text-center">
        <h1>@lang('translate.coming_soon')<i class="fa fa-spinner fa-spin"></i></h1>
        {{--        <p class="mx-auto"></p>--}}
    </div>
@endif

{{--<section class="p-top-70 p-bottom-100 border-bottom clients-logo-area">--}}

{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="logo-carousel-four owl-carousel owl-loaded owl-drag">--}}
{{--                    <!-- ends: .carousel-single -->--}}
{{--                    <!-- ends: .carousel-single -->--}}
{{--                    <!-- ends: .carousel-single -->--}}
{{--                    <!-- ends: .carousel-single -->--}}
{{--                    <!-- ends: .carousel-single -->--}}
{{--                    <div class="owl-stage-outer">--}}
{{--                        <div class="owl-stage" style="transform: translate3d(-1110px, 0px, 0px); transition: all 0.10s ease 0s; width: 3330px;">--}}
{{--                            @foreach($partners as $partner)--}}
{{--                            <div class="owl-item cloned" style="width: 222px;">--}}
{{--                                <div class="carousel-single">--}}
{{--                                    <img src="{{url($partner->image)}}" alt="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @endforeach--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="owl-nav disabled">--}}
{{--                        <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span>--}}
{{--                        </button>--}}
{{--                        <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="owl-dots disabled"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</section>--}}
{{--<section class="p-top-100 p-bottom-105">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="m-bottom-50">--}}

{{--                    <div class="divider text-center">--}}
{{--                        <h1>Our Core Value</h1>--}}
{{--                        <p class="mx-auto">Investiga tiones demonstr averunt lectres legere me lius quod qua legunt--}}
{{--                            saepius Clarias estre etiam.</p>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <section class="accordion-styles accordion--three">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-5">--}}

{{--                    <div class="image-carousel-two owl-carousel">--}}

{{--                        <div class="carousel-single">--}}
{{--                            <figure>--}}
{{--                                <img src="{{asset('frontend/img/img2.jpg')}}" alt="">--}}
{{--                            </figure>--}}
{{--                        </div><!-- end: .carousel-single -->--}}


{{--                        <div class="carousel-single">--}}
{{--                            <figure>--}}
{{--                                <img src="{{asset('frontend/img/img2-1.jpg')}}" alt="">--}}
{{--                            </figure>--}}
{{--                        </div><!-- end: .carousel-single -->--}}


{{--                        <div class="carousel-single">--}}
{{--                            <figure>--}}
{{--                                <img src="{{asset('frontend/img/img2.jpg')}}" alt="">--}}
{{--                            </figure>--}}
{{--                        </div><!-- end: .carousel-single -->--}}

{{--                    </div>--}}

{{--                </div><!-- ends: .col-lg-5 -->--}}
{{--                <div class="col-lg-6 offset-lg-1">--}}


{{--                    <div class="accordion accordion_four" id="accordion_four">--}}
{{--                        <div class="accordion-single">--}}
{{--                            <div class="accordion-heading" id="accordion_four_heading1">--}}
{{--                                <h6 class="mb-0">--}}
{{--                                    <a href="#" class="bg-gray-light" data-toggle="collapse"--}}
{{--                                       data-target="#accordion_four_collapse1"--}}
{{--                                       aria-expanded="true" aria-controls="accordion_four_collapse1">--}}
{{--                                        <i class="la la-cog"></i> Our Standards of Business Conduct--}}
{{--                                    </a>--}}
{{--                                </h6>--}}
{{--                            </div>--}}

{{--                            <div id="accordion_four_collapse1" class="collapse show"--}}
{{--                                 aria-labelledby="accordion_four_heading1"--}}
{{--                                 data-parent="#accordion_four">--}}
{{--                                <div class="accordion-contents">--}}
{{--                                    <p>Investig ationes demons trave runt letoes legere lius quod waunt saepius claritas--}}
{{--                                        Investig--}}
{{--                                        ationes demon trave rungt saepius clari kestas Investig avaina ationes--}}
{{--                                        demon.</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div><!-- Ends: .accordion-single -->--}}

{{--                        <div class="accordion-single">--}}
{{--                            <div class="accordion-heading" id="accordion_four_heading2">--}}
{{--                                <h6 class="mb-0">--}}
{{--                                    <a href="#" class="collapsed bg-gray-light" data-toggle="collapse"--}}
{{--                                       data-target="#accordion_four_collapse2"--}}
{{--                                       aria-expanded="false" aria-controls="accordion_four_collapse2">--}}
{{--                                        <i class="la la-bar-chart"></i> Our Supplier Code of Conduct--}}
{{--                                    </a>--}}
{{--                                </h6>--}}
{{--                            </div>--}}
{{--                            <div id="accordion_four_collapse2" class="collapse"--}}
{{--                                 aria-labelledby="accordion_four_heading2" data-parent="#accordion_four">--}}
{{--                                <div class="accordion-contents">--}}
{{--                                    <p>Investig ationes demons trave runt letoes legere lius quod waunt saepius claritas--}}
{{--                                        Investig--}}
{{--                                        ationes demon trave rungt saepius clari kestas Investig avaina ationes--}}
{{--                                        demon.</p>--}}
{{--                                </div>--}}
{{--                            </div><!-- Ends: .collapse -->--}}
{{--                        </div><!-- Ends: .accordion-single -->--}}

{{--                        <div class="accordion-single">--}}
{{--                            <div class="accordion-heading" id="accordion_four_heading3">--}}
{{--                                <h6 class="mb-0">--}}
{{--                                    <a href="#" class="collapsed bg-gray-light" data-toggle="collapse"--}}
{{--                                       data-target="#accordion_four_collapse3"--}}
{{--                                       aria-expanded="false" aria-controls="accordion_four_collapse3">--}}
{{--                                        <i class="la la-briefcase"></i> Our Business Conduct Office--}}
{{--                                    </a>--}}
{{--                                </h6>--}}
{{--                            </div>--}}
{{--                            <div id="accordion_four_collapse3" class="collapse"--}}
{{--                                 aria-labelledby="accordion_four_heading3" data-parent="#accordion_four">--}}
{{--                                <div class="accordion-contents">--}}
{{--                                    <p>Investig ationes demons trave runt letoes legere lius quod waunt saepius claritas--}}
{{--                                        Investig--}}
{{--                                        ationes demon trave rungt saepius clari kestas Investig avaina ationes--}}
{{--                                        demon.</p>--}}
{{--                                </div>--}}
{{--                            </div><!-- End: .collapse -->--}}
{{--                        </div><!-- Ends: .accordion-single -->--}}

{{--                        <div class="accordion-single">--}}
{{--                            <div class="accordion-heading" id="accordion_four_heading4">--}}
{{--                                <h6 class="mb-0">--}}
{{--                                    <a href="#" class="collapsed bg-gray-light" data-toggle="collapse"--}}
{{--                                       data-target="#accordion_four_collapse4"--}}
{{--                                       aria-expanded="false" aria-controls="accordion_four_collapse4">--}}
{{--                                        <i class="la la-headphones"></i> Supporting Our People--}}
{{--                                    </a>--}}
{{--                                </h6>--}}
{{--                            </div>--}}
{{--                            <div id="accordion_four_collapse4" class="collapse"--}}
{{--                                 aria-labelledby="accordion_four_heading4" data-parent="#accordion_four">--}}
{{--                                <div class="accordion-contents">--}}
{{--                                    <p>Investig ationes demons trave runt letoes legere lius quod waunt saepius claritas--}}
{{--                                        Investig--}}
{{--                                        ationes demon trave rungt saepius clari kestas Investig avaina ationes--}}
{{--                                        demon.</p>--}}
{{--                                </div>--}}
{{--                            </div><!-- End: .collapse -->--}}
{{--                        </div><!-- Ends: .accordion-single -->--}}
{{--                    </div><!-- Ends: #accordion_four -->--}}

{{--                </div><!-- ends: .col-lg-6 -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section><!-- ends: .accordion-styles -->--}}

{{--</section>--}}


<section class="quotes-wrapper quotes-with-image p-top-80 p-bottom-80">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6">
                <img src="{{asset('frontend/img/sb3_img.png')}}" alt="">
            </div>
            <div class="col-lg-6">
                <div>

                    <!-- start blockquote -->
                    <blockquote class="blockquote5">
                        <p class="strong">{{getSetting('ceo_speech')}}.</p>


                        <span class="author-sign">CEO : Mohammed Saif Alsaifi</span>
                    </blockquote><!-- end: blockquote -->

                </div>
            </div>
        </div>
    </div>
</section><!-- ends: .quotes-wrapper -->
<section class="contact--four" id="contact">

    <div class="list-inline-wrapper p-top-80 p-bottom-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="icon-list--three d-flex list--inline">

                        <li class="d-flex align-items-center">
                            <div class="icon"><span><i class="la la-headphones"></i></span></div>
                            <div class="contents">
                                <h6><a target="_blank"
                                       href="https://api.whatsapp.com/send?phone=https://api.whatsapp.com/send?phone=0096592211339">{{getSetting('phone')}}</a>
                                </h6>
                                <span class="sub-text">sun-thu 8am - 18pm</span>
                            </div>
                        </li>


                        <li class="d-flex align-items-center">
                            <div class="icon"><span><i class="la la-envelope"></i></span></div>
                            <div class="contents">
                                <h6><a href="mailto:{{getSetting('email')}}">{{getSetting('email')}}</a></h6>
                                <span class="sub-text">Free enquiry</span>
                            </div>
                        </li>


                        <li class="d-flex align-items-center">
                            <div class="icon"><span><i class="la la-map-marker"></i></span></div>
                            <div class="contents">
                                <h6>Kuwait - Kuwait</h6>
                                <span class="sub-text">FourIslands For General Trading And Contracting</span>
                            </div>
                        </li>

                    </ul><!-- ends: .icon-list--three -->
                </div>
            </div>
        </div>
    </div><!-- ends: .list-inline -->
    <section class="p-top-110 p-bottom-50">
        <h2 class="text-center">@lang('translate.our_branches')</h2>
        <div class="address-blocks">
            <div class="container">
                <div class="row">
                    @if($addresses)
                        @foreach($addresses as $address)
                            <div class="col-lg-3 col-md-6">
                                <div class="adress">
                                    <img src="{{ url('image/' . $address->image . '/') }}" alt="img/ukf.png">
                                    <p class="nam">{{$address->city}}</p>
                                    <p>{{$address->address}}</p>
                                    <p>{{$address->email}}</p>
                                    <p>{{$address->phone}}</p>
                                </div><!-- end: .address -->

                            </div><!-- ends: .col-lg-3 -->
                        @endforeach
                    @else
                        <div></div>
                    @endif

                </div>
            </div><!-- ends: .container -->
        </div><!-- ends: .address-blocks -->

    </section><!-- ends: section -->

    <div class="p-top-80 p-bottom-80 section-bg">

        <div class="form-wrapper section-bg contact--from4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="divider text-center m-bottom-50">
                            <h1 class="color-dark m-0">@lang('translate.contact_us')</h1>
                        </div>


                        <div class="form-wrapper">
                            <form action="{{route('contacts.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 m-bottom-30">
                                        <input type="text" name="name" placeholder="@lang('translate.name')"
                                               class="form-control fc--rounded border-0" required>
                                    </div>
                                    <div class="col-lg-4 col-md-6 m-bottom-30">
                                        <input type="text" name="phone" placeholder="@lang('translate.phone')"
                                               class="form-control fc--rounded border-0" required>
                                    </div>
                                    <div class="col-lg-4 col-md-6 m-bottom-30">
                                        <input type="text" name="subject" placeholder="@lang('translate.subject')"
                                               class="form-control fc--rounded border-0" required>
                                    </div>
                                    <div class="col-lg-12 m-bottom-30">
                                        <input type="email" name="email" placeholder="@lang('translate.email')"
                                               class="form-control fc--rounded border-0" required>
                                    </div>
                                    <div class="col-lg-12 m-bottom-20">
                                        <textarea name="message" class="form-control  fc--rounded border-0" rows="7"
                                                  placeholder="@lang('translate.message')" required></textarea>
                                    </div>
                                    <div class="col-lg-12 text-center m-top-30">
                                        <button
                                            class="btn btn-outline-success btn--rounded">@lang('translate.submit')</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- end: .form-wrapper -->

                    </div>
                </div>
            </div>
        </div><!-- ends: .form-wrapper -->
    </div>
</section><!-- ends: .contact--four -->
<section class="google_map ">

    {{--        <div class="map" id="map1"></div><!-- end: .map -->--}}
    <div class="map-responsive">
        <iframe src="https://maps.google.com/maps?q=kuwait%20%2C%20kuwait&t=&z=15&ie=UTF8&iwloc=&output=embed"
                width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

    <style>
        .map-responsive {
            overflow: hidden;
            padding-bottom: 40%;
            position: relative;
            height: 0;
        }

        .map-responsive iframe {
            left: 0;
            top: 0;
            height: 80%;
            width: 100%;
            position: absolute;
        }

        /*.mapouter {*/
        /*    position: sticky;*/
        /*    text-align: right;*/
        /*    height: 379px;*/
        /*    width: 1073px;*/
        /*}*/

        /*.gmap_canvas {*/
        /*    overflow: hidden;*/
        /*    background: none !important;*/
        /*    height: 379px;*/
        /*    width: 1200px;*/
        /*}*/
    </style>
    </div>
</section>
<!-- ends .google_map -->

@include('frontend.layouts.footer')
<div class="go_top">
    <span class="la la-angle-up"></span>
</div>
@include('frontend.layouts.js')
</body>

</html>
