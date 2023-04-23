@extends('frontend.layouts.master')
@section('content')
    <header class="header slider-fade">
        <div class="owl-carousel owl-theme">
        @foreach($sliders as $slider)
            <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
                <div class="text-left item bg-img" data-overlay-dark="5"
                     data-background="{{ url('image/' .  @$slider->imageObject->path) }}">
                    <div class="v-bottom caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="o-hidden">
                                        <h1 style="font-weight:700 !important;">{{@$slider->title}}</h1>
                                        <hr>
                                        <p style="font-weight:700 !important;">
                                            {{@$slider->short_description}}

                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </header>
    <!-- Lines -->
    {{--<section class="content-lines-wrapper">--}}
    {{--    <div class="content-lines-inner">--}}
    {{--        <div class="content-lines"></div>--}}
    {{--    </div>--}}
    {{--</section>--}}
    <!-- About -->
    <section class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInUp">
                    @if($about = pages()->where('id','36')->first())

                        <h2 class="section-title">{{$about->title}} <span></span>
                        </h2>
                        <p>
                            {!! $about->content !!}
                        </p>

                    @endif
                </div>
                <div class="col-md-6 animate-box" data-animate-effect="fadeInUp">
                    <div class="">
                        <div class="img"><img src="{{asset('logo.png')}}" class="img-fluid" alt=""></div>
                       
                </div>
            </div>
        </div>
		</div>
    </section>
    <!-- Projects -->
    <section class="bauen-blog section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(app()->getLocale() == 'ar')
                        <h2 class="section-title">منتجـــا <span>  تنا</span></h2>
                    @else
                        <h2 class="section-title"> Our<span>services</span></h2>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        @if($services->count() > 0)
                            @foreach($services as $item)
                        <div class="item">
                                 <div class="myfilter">
                                <img class="img-fluid mx-auto d-block"
                                     src="{{ url('image/' . @$item->image . '/500x300' ) }}">
                            </div>
                            <div class="con">
                                <h5 class="text-bold" ><a href="{{route('home.services.show',@$item->id)}}" style="font-weight:700 !important;">{{@$item->title}}</a></h5>
                                <div class="line"></div>
                               
                            </div>
                    </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services -->
  		  <section class="clients"> 
            <div class="container "> 
                <div class="row">
                <div class="col-md-12 mt-3">
                    <h2 class="section-title"> @lang('translate.our_partners') <span> @lang('translate.partner') </span></h2>
                </div>
           		 </div>
				            <div class="row">

                    <div class="col-md-12 owl-carousel owl-theme"> 
                            @if($partners->count() > 0)
                            @foreach($partners as $partner)
						<div class="clients-logo text-center"> 
                            <a href="#0"><img src="{{ url('image/' . @$partner->image .'/100x100' ) }}" alt=""></a> 
							<h5 style="color:#000">{{@$partner->name}}</h5>
                        </div> 
                    @endforeach
						@endif
                    
                    </div> 
                </div>    
			  </div> 

           
        </section>
    <!-- Clients -->
    {{--    <section class="clients">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-7 owl-carousel owl-theme">--}}
    {{--                    <div class="clients-logo">--}}
    {{--                        <a href="#0"><img src="{{asset('NewFront/img/clients/1.png')}}" alt=""></a>--}}
    {{--                    </div>--}}
    {{--                    <div class="clients-logo">--}}
    {{--                        <a href="#0"><img src="{{asset('NewFront/img/clients/1.png')}}" alt=""></a>--}}
    {{--                    </div>--}}
    {{--                    <div class="clients-logo">--}}
    {{--                        <a href="#0"><img src="{{asset('NewFront/img/clients/1.png')}}" alt=""></a>--}}
    {{--                    </div>--}}
    {{--                    <div class="clients-logo">--}}
    {{--                        <a href="#0"><img src="{{asset('NewFront/img/clients/1.png')}}" alt=""></a>--}}
    {{--                    </div>--}}
    {{--                    <div class="clients-logo">--}}
    {{--                        <a href="#0"><img src="{{asset('NewFront/')}}img/clients/5.png" alt=""></a>--}}
    {{--                    </div>--}}
    {{--                    <div class="clients-logo">--}}
    {{--                        <a href="#0"><img src="{{asset('NewFront/')}}img/clients/6.png" alt=""></a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!-- Footer -->
@stop


