@extends('frontend.layouts.master')

@section('content')
    {{--    <!-- Lines -->--}}
    {{--    <section class="content-lines-wrapper">--}}
    {{--        <div class="content-lines-inner">--}}
    {{--            <div class="content-lines"></div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!-- Header Banner -->
    <section class="banner-header banner-img valign bg-img bg-fixed" data-overlay-light="3"
             data-background="{{ url('image/' . @$services ->image . '/300x300') }}"></section>
    <!-- Services Page -->
    <section class="section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-title2">{{$services->title}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="row mb-30">
                
                
                        <div class="col-md-12 gallery-item">
                            <a href="{{url('image/'. @$services->image )}}" title="{{@$services->title}}"
                               class="img-zoom">
                                <div class="gallery-box">
                                    <div class="gallery-img">
                                        <img src="{{url('image/'. @$services->image . '/1080x600')}}"
                                             class="img-fluid mx-auto d-block" alt="{{@$services->title}}"></div>
                                </div>
                                </a>
                        </div>
                    </div>
					<div>
					</div>
					                    {!!$services->description!!}
					

                </div>
                <div class="col-md-4 sidebar-side">
                    <aside class="sidebar blog-sidebar">
                        <div class="sidebar-widget services">
                            <div class="widget-inner">
                                <div class="sidebar-title">
                                    <h4>@lang('translate.AllServices')</h4>
                                </div>

                                <ul>
                                    @foreach(@$allservices as $item)
                                        <li class="{{ request()->route()->getName() == 'home.services.show', $item->id ? 'active' : '' }}">
                                            <a href="{{route('home.services.show',@$item->id)}}">{{@$item->title}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>

        </div>
    </section>

@stop
