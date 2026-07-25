@extends('panel.layout.master' , ['title' => @$title])

@push('css')
    <link href="{{asset('panelAssets/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css"/>
@endpush

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

    <form method="POST" action="{{ url()->current() }}" class="form-horizontal" id="form" enctype="multipart/form-data" to="{{ route('panel.testimonials.index') }}">
        @csrf
        @if(isset($item))
        @method('PUT')
    @endif
        <div class="row">
            <div class="col-md-8">
                <div class="kt-portlet">
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control m-input" type="text" name="name" placeholder="Client name" required value="{{ isset($item) ? $item->name : '' }}">
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <input class="form-control m-input" type="text" name="position" placeholder="e.g. CEO" value="{{ isset($item) ? $item->position : '' }}">
                        </div>
                        <div class="form-group">
                            <label>Company</label>
                            <input class="form-control m-input" type="text" name="company" placeholder="Company name" value="{{ isset($item) ? $item->company : '' }}">
                        </div>
                        <div class="form-group">
                            <label>Testimonial</label>
                            <textarea class="form-control m-input" name="content" rows="5" required placeholder="Client testimonial text">{{ isset($item) ? $item->content : '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Rating (1-5)</label>
                            <input class="form-control m-input" type="number" name="rating" min="1" max="5" value="{{ isset($item) ? $item->rating : '5' }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="kt-portlet">
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label>Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="imgload" name="image">
                                <label class="custom-file-label" for="imgload">Choose file</label>
                            </div>
                        </div>
                        @if(isset($item) && $item->image)
                            <div class="img-responsive">
                                <div class="imageEditProfile text-center">
                                    <img src="{{ url('image/' . $item->image) }}" alt="" id="imgshow" style="max-width: 100%">
                                </div>
                            </div>
                        @endif
                        <div class="form-group mt-3">
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
    <script>
        $("#imgload").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) { $('#imgshow').attr('src', e.target.result); };
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
@endpush
