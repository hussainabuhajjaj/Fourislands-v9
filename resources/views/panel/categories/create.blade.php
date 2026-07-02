@extends('panel.layout.master' , ['title' => @$title])

@section('content_head')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-container kt-container--fluid">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">{{@$title}}</h3>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @php $item = isset($item) ? $item : null; @endphp

    <form method="POST" action="{{ url()->current() }}" class="form-horizontal" id="form" to="{{ route('panel.categories.index') }}">
        @csrf
        @if(isset($item)) @method('PUT') @endif
        <div class="row">
            <div class="col-md-8">
                <div class="kt-portlet kt-portlet--tabs">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-line-2x" role="tablist">
                                @php $i=1; @endphp
                                @foreach(locales() as $key=>$language)
                                    <li class="nav-item">
                                        <a class="nav-link {{$i==1?'active':''}}" data-toggle="tab" href="#kt_tabs_{{$i}}" role="tab">{{__('translate.'.$key)}}</a>
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
                                        <label>Name</label>
                                        <input class="form-control m-input" type="text" name="{{ 'name_'.$key }}" placeholder="Category name" required value="{{ isset($item) ? $item->getTranslation($key)->name : '' }}">
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
                            <label>Slug</label>
                            <input class="form-control m-input" type="text" name="slug" placeholder="url-slug" value="{{ isset($item) ? $item->slug : '' }}">
                            <span class="form-text text-muted">Leave empty to auto-generate from English name</span>
                        </div>
                        <div class="form-group">
                            <label>Ordering</label>
                            <input class="form-control m-input" type="number" name="ordering" placeholder="0" value="{{ isset($item) ? $item->ordering : '0' }}">
                        </div>
                        <div class="form-group">
                            <label class="kt-checkbox kt-checkbox--tick kt-checkbox--success">
                                <input name="is_active" type="checkbox" value="1" {{ isset($item) && !$item->is_active ? '' : 'checked' }}> Active
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label" style="width: 100%;">
                            <button type="submit" style="width: 100%;" class="btn btn-brand">Save</button>
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
