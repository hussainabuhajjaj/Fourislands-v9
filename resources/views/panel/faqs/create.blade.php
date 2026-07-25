@extends('panel.layout.master' , ['title' => @$title])

@push('css')
    <link href="{{asset('panelAssets/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css"/>
@endpush

@section('content_head')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">{{@$title}} </h3>
            </div>
        </div>
    </div>
@endsection

@section('content')

    @php
        $item = isset($item) ? $item: null;
    @endphp

    <form method="POST" action="{{ url()->current() }}" class="form-horizontal" id="form" to="{{ route('panel.faq.index') }}">
    @csrf
    @if(isset($item))
        @method('PUT')
    @endif
    <div class="row">

        <div class="col-md-8">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-toolbar">
                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-line-2x"
                            role="tablist">
                            @php $i=1; @endphp
                            @foreach(locales() as $key=>$language)
                                <li class="nav-item">
                                    <a class="nav-link {{$i==1?'active':''}}" data-toggle="tab"
                                       href="#kt_tabs_{{$i}}" role="tab">
                                        {{__('translate.'.$key)}}
                                    </a>
                                </li>
                                @php $i++; @endphp
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <div class="tab-content">
                        @php $i=1; @endphp
                        @foreach(locales() as $key=>$language)

                            <div class="tab-pane {{$i==1?'active':''}}" id="kt_tabs_{{$i}}" role="tabpanel">

                                <div class="form-group">
                                    <label>Question</label>
                                    <input class="form-control m-input" type="text" name="{{ 'question_'.$key }}"
                                           placeholder="Question" required value="{{ isset($item) ? $item->translateOrNew($key)->question : "" }}">
                                </div>
                                <div class="form-group">
                                    <label>Answer</label>
                                    <textarea class="form-control m-input summernote" name="{{ 'answer_'.$key }}"
                                              placeholder="Answer" required>{{ isset($item) ? $item->translateOrNew($key)->answer : "" }}</textarea>
                                </div>

                            </div>

                            @php $i++; @endphp

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="kt-portlet">
                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label>Ordering</label>
                        <input class="form-control m-input" type="number" name="ordering"
                               placeholder="Ordering" value="{{ isset($item) ? $item->ordering : "0" }}">
                    </div>
                </div>
            </div>

            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label" style="width: 100%;">
                        <button type="submit" style="width: 100%;" id="m_login_signin_submit" class="btn btn-brand">
                            Save
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </form>

@endsection

@push('js')
    <script src="{{ asset('panelAssets/js/post.js') }}"></script>
@endpush
