@extends('panel.layout.master' , ['title' => @$title])

@push('css')

    <link href="{{asset('panelAssets/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css"/>
@endpush


@section('content_head')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">@lang('translate.Permissions_Group')</h3>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand fa fa-lock"></i>
										</span>
                <h3 class="kt-portlet__head-title">
                    @lang('translate.Permissions_Group')                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="{{ route('panel.permission.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            @lang('add')
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body kt-margin-t-20 kt-margin-b-10">


            <div class="kt-portlet__body kt-portlet__body--fit">

                <!--begin: Datatable -->
                <div class="kt-datatable text-center" id="ajax_data"></div>

                <!--end: Datatable -->
            </div>


        </div>

    </div>

@endsection



@push('js')
    <script src="{{asset('panelAssets/js/jquery.dataTables.js')}}" type="text/javascript"></script>
    <script src={{asset('panelAssets/js/data-ajax.js')}}  type="text/javascript"></script>

    <script>

        window.data_url = '{{ route('panel.permission.datatable') }}';

        window.columns = [
            {
                field: 'name',
                title: "@lang('name')",
                textAlign: "center",
            },
            {
                field: 'Actions',
                title: "@lang('Actions')",
                sortable: false,
                overflow: 'visible',
                textAlign: "center",
                autoHide: false,
                width: 100,
                template: function (data) {
                    var editUrl = "{{ url('panel/permission/') }}/" + data.id + "/edit";
                    var deleteUrl = "{{ url('panel/permission/') }}/" + data.id;
                    return `
                        <input value=` + data.id + ` type="hidden" class="id">
						<div class="dropdown">
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown">
                                <i class="la la-cog"></i>
                            </a>
						  	<div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="` + editUrl + `"><i class="fa fa-edit"></i> @lang('translate.edit')</a>
                                    <a class="dropdown-item delete" href="#" data-url="` + deleteUrl + `"><i class="fa fa-times"></i> @lang('translate.delete') </a>
						  	</div>
						</div>`;
                },
            }
        ];


    </script>


@endpush

