@extends('panel.layout.master' , ['title' => @$title])

@section('content_head')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-container kt-container--fluid">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">@lang('Dashboard')</h3>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #6c5ce7, #a29bfe);">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="stat-label">@lang('Inbox')</div>
                <div class="stat-value">{{$contacts_count}}</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #00cec9, #0984e3);">
                    <i class="fa fa-cube"></i>
                </div>
                <div class="stat-label">@lang('products')</div>
                <div class="stat-value">{{$product_Count}}</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #fd79a8, #e84393);">
                    <i class="fa fa-users"></i>
                </div>
                <div class="stat-label">@lang('Users')</div>
                <div class="stat-value">{{$users_count ?? 0}}</div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #fdcb6e, #e17055);">
                    <i class="fa fa-file-invoice"></i>
                </div>
                <div class="stat-label">@lang('Quote Requests')</div>
                <div class="stat-value">{{$quotes_count ?? 0}}</div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="col-lg-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="fa fa-chart-bar"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            @lang('Overview')
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="kt-widget17__item" style="background: transparent; padding: 16px; border-radius: 8px;">
                                <span class="kt-widget17__subtitle">@lang('Inbox')</span>
                                <span class="kt-widget17__desc" style="font-size: 2rem; color: #6c5ce7;">{{$contacts_count}}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="kt-widget17__item" style="background: transparent; padding: 16px; border-radius: 8px;">
                                <span class="kt-widget17__subtitle">@lang('products')</span>
                                <span class="kt-widget17__desc" style="font-size: 2rem; color: #0984e3;">{{$product_Count}}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="kt-widget17__item" style="background: transparent; padding: 16px; border-radius: 8px;">
                                <span class="kt-widget17__subtitle">@lang('Messages')</span>
                                <span class="kt-widget17__desc" style="font-size: 2rem; color: #e84393;">{{$contacts_count ?? 0}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection