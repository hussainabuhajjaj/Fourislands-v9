@extends('panel.layout.master' , ['title' => @$title])

@push('css')
    <link href="{{asset('panelAssets/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('panelAssets/css/fancybox.min.css')}}" rel="stylesheet" type="text/css"/>

@endpush


@section('content_head')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">{{@$title}}</h3>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand fa fa-user-lock"></i>
										</span>
                <h3 class="kt-portlet__head-title">
                    {{@$title}}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('panel.partners.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            Add
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Search Form -->
            <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">

                <div class="row align-items-center">
                    <div class="col-xl-12 order-2 order-xl-1">

                        <div class="row align-items-center">
                            <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                <div class="kt-input-icon kt-input-icon--left">
                                    <input type="text" class="form-control"
                                           placeholder="search" id="generalSearch">
                                    <span class="kt-input-icon__icon kt-input-icon__icon--left">
																<span><i class="la la-search"></i></span>
															</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

            <!--end: Search Form -->
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit">

            <!--begin: Datatable -->
            <div class="kt-datatable text-center" id="ajax_data"></div>

            <!--end: Datatable -->
        </div>
    </div>

@endsection

@push('js')
    <script src="{{asset('panelAssets/js/jquery.dataTables.js')}}" type="text/javascript"></script>
    <script src={{asset('panelAssets/js/data-ajax.js')}}  type="text/javascript"></script>


    <script>$("[data-fancybox]").fancybox({});</script>
    <script src="{{asset('/panelAssets/js/fancybox.min.js')}}"></script>
    <script>


        window.data_url = '{{url('panel/partners/datatable')}}';

        window.columns = [
            {
                field: 'name',
                title: "name",
                textAlign: "center",

            },
            {
                field: 'image',
                title: "@lang('Image')",
                width: 100,
                textAlign: "center",
                template: function (data) {
                    if (data.image) {
                        return '<a href="{{ url('image/') }}/' + data.image + '" data-fancybox ><img  src="{{ url('image/') }}/' + data.image + '/80x80"  style="border-radius:50%" ></a>';
                    } else {
                        return '<a href="{{ asset('panelAssets/media/users/default.jpg') }}" data-fancybox ><img  src="{{ asset('panelAssets/media/users/default.jpg') }}" style="border-radius:50%" ></a>';
                    }

                }
            },
            {
                field: 'Actions',
                title: "Actions",
                sortable: false,
                overflow: 'visible',
                textAlign: "center",
                autoHide: false,
                width: 100,
                template: function (data) {
                    var editUrl = "{{ url('panel/partners/') }}/" + data.id + "/edit";
                    var deleteUrl = "{{ url('panel/partners/') }}/" + data.id;
                    return `
                        <input value=` + data.id + ` type="hidden" class="id">
						<div class="dropdown">
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown">
                                <i class="la la-cog"></i>
                            </a>
						  	<div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="` + editUrl + `"><i class="la la-edit"></i> @lang('trasnlate.edit') </a>
                                    <a class="dropdown-item delete" href="#" data-url="` + deleteUrl + `"><i class="la la-times"></i> @lang('translate.delete') </a>
						  	</div>
						</div>`;
                },
            }
        ];


    </script>


@endpush
