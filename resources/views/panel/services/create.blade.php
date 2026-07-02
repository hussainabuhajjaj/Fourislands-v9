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

    <form method="POST" action="{{ url()->current() }}" class="form-horizontal" id="form" enctype="multipart/form-data" to="{{ route('panel.services.index') }}">
    @csrf
    @if(isset($item)) @method('PUT') @endif
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
                                    <label>Service Title</label>
                                    <input class="form-control m-input" type="text" name="{{ 'title_'.$key }}"
                                           placeholder="title" required value="{{ isset($item) ? $item->getTranslation($key)->title : "" }}">

                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control m-input summernote"  type="text" name="{{ 'description_'.$key }}"
                                           placeholder="" required >
                                        {{ isset($item) ? $item->getTranslation($key)->description : "" }}
                                    </textarea>
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
                        <label>Icon Class</label>
                        <input class="form-control m-input" type="text" name="icon" placeholder="e.g. fas fa-cogs" value="{{ isset($item) ? $item->icon : '' }}">
                        <span class="form-text text-muted">Font Awesome icon class (e.g. fas fa-cogs, fas fa-truck)</span>
                    </div>
                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea class="form-control m-input" name="short_description" rows="2" placeholder="Brief excerpt for card preview">{{ isset($item) ? $item->short_description : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Features (one per line)</label>
                        <textarea class="form-control m-input" name="features" rows="4" placeholder="Feature 1&#10;Feature 2&#10;Feature 3">{{ isset($item) && $item->features ? implode("\n", $item->features) : '' }}</textarea>
                        <span class="form-text text-muted">Each line becomes a bullet point on the service page</span>
                    </div>
                    <div class="form-group">
                        <label>@lang('Image')</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imgload"
                                   name="image">
                            <label class="custom-file-label" for="imgload" id="imgload">Choose file</label>
                        </div>
                    </div>

                    <div class="img-responsive">
                        <div class="imageEditProfile text-center">
                            <img
                                src="{{ isset($item) ? url('image/' . $item->image)  : "" }}"
                                alt=""
                                id="imgshow" style="max-width: 100%">
                        </div>
                    </div>

            <div class="form-group">
                        <label>Is Home Page Service</label>
                        <div class="kt-checkbox-list">
                            <label class="kt-checkbox kt-checkbox--tick kt-checkbox--success">
                                <input name="is_home" {{ isset($item) && $item->is_home ? 'checked':'' }} type="checkbox"> Is Home
                                <span></span>
                            </label>

                        </div>
                        <span class="form-text text-muted">Check This Box If You Want To Publish To Home Page</span>
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

    <script>
		

        $("#imgload").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgshow').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

    </script>

@endpush
