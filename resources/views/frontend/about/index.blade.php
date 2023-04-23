@extends('frontend.layouts.master')

@section('content')

    {{--    <section class="content-lines-wrapper">--}}
    {{--        <div class="content-lines-inner">--}}
    {{--            <div class="content-lines"></div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!-- Header Banner -->
    <section class="banner-header banner-img valign bg-img bg-fixed" data-overlay-light="3" data-background="{{asset('NewFront/img/about.jpg')}}"></section>
    <!-- About -->
    @if($about = pages()->where('id','36')->first())

        <section class="about section-padding2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInUp">
                        <h2 class="section-title">{{@$about->title}} <span></span></h2>
                        <p></p>
                        <p>{!! @$about->content !!}</p>
                    </div>
                    <div class="col-md-6 animate-box" data-animate-effect="fadeInUp">
                        <div class="about">
                            <div class="img"><img src="{{asset('/logo.png')}}" class="img-fluid" alt="{{asset('logo.png')}}"></div>
                           
                        </div>
                    </div>

                    <div class="row">
                        @if(@$mission =pages()->where('id','35')->first())
                        <div class="col-lg-6">
                            <h6 class="section-title">{{@$mission->title}} <span></span></h6>

                            <p class="text-center text-wrap">
                            <p>{!! @$mission->content !!}</p>

                            </p>
                        </div>
                        @endif
					
					       @if(@$vision =pages()->where('id','37')->first())
                        <div class="col-lg-6">
                            <h6 class="section-title">{{@$vision->title}} <span></span></h6>

                            <p class="text-center text-wrap">
                            <p>{!! @$vision->content !!}</p>

                            </p>
                        </div>
                        @endif
                   
{{--                        <div class="col-lg-4 ">--}}
{{--                            <h6 class="section-title">{{@$about->title}} <span></span></h6>--}}

{{--                            <p class="text-center text-wrap">--}}
{{--                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus adipisci alias, aliquid aspernatur cumque error expedita fuga fugiat, hic laboriosam maiores nisi quae quo repellat sequi sit soluta vel veniam?</span><span>Adipisci aliquid architecto asperiores, blanditiis delectus fugiat in laboriosam molestias mollitia neque placeat possimus quasi quidem quisquam, ratione tempora, voluptatibus. Blanditiis consequuntur dolor labore laudantium quos, saepe tempora vel vitae?</span><span>Delectus doloremque et fuga maiores nihil non nostrum numquam officia praesentium quis sequi, suscipit totam ut. Aperiam dolores expedita obcaecati optio perspiciatis? Delectus hic, iure laborum quia repellat ut. Fugiat.</span>--}}
{{--                            </p>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </section>

    @endif
@stop
