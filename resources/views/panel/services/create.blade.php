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

    {!! Form::open(['method'=>isset($item) ? 'PUT' : 'POST', 'url'=> url()->current() ,'to'=>url()->current() ,  'class'=>'form-horizontal','id'=>'form']) !!}

    @csrf
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
    {!! Form::close() !!}

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

        var KTFormControls = function () {
            // Private functions

            var demo1 = function () {
                $("#form").validate({
                    // define validation rules
                    rules: {
                        name: {
                            required: true,
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 6
                        },
                        password_confirmation: {
                            required: true,
                            equalTo: "#password",
                        },
                    },

                    //display error alert on form submit
                    invalidHandler: function (event, validator) {
                        var alert = $('#kt_form_1_msg');
                        alert.removeClass('kt--hide').show();
                    },

                    submitHandler: function (form) {
                        form[0].submit(); // submit the form
                    }
                });
            };


            return {
                // public functions
                init: function () {
                    demo1();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTFormControls.init();
        });




    </script>

@endpush
