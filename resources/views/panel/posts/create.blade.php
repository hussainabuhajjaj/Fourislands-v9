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

    <form method="POST" action="{{ url()->current() }}" class="form-horizontal" id="form" enctype="multipart/form-data" to="{{ route('panel.posts.index') }}">
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
                                        <label>Title</label>
                                        <input class="form-control m-input" type="text" name="{{ 'title_'.$key }}" placeholder="Title" required value="{{ isset($item) ? $item->getTranslation($key)->title : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Excerpt</label>
                                        <textarea class="form-control m-input" name="{{ 'excerpt_'.$key }}" rows="3" placeholder="Short excerpt">{{ isset($item) ? $item->getTranslation($key)->excerpt : '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea class="form-control m-input summernote" name="{{ 'content_'.$key }}" placeholder="Post content" required>{{ isset($item) ? $item->getTranslation($key)->content : '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <input class="form-control m-input" type="text" name="{{ 'meta_title_'.$key }}" placeholder="SEO title" value="{{ isset($item) ? $item->getTranslation($key)->meta_title : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea class="form-control m-input" name="{{ 'meta_description_'.$key }}" rows="2" placeholder="SEO description">{{ isset($item) ? $item->getTranslation($key)->meta_description : '' }}</textarea>
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
                            <label>Category</label>
                            <select class="form-control m-input" name="category_id">
                                <option value="">-- None --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ isset($item) && $item->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input class="form-control m-input" type="text" name="slug" placeholder="url-slug" value="{{ isset($item) ? $item->slug : '' }}">
                        </div>
                        <div class="form-group">
                            <label>Published At</label>
                            <input class="form-control m-input" type="date" name="published_at" value="{{ isset($item) && $item->published_at ? $item->published_at->format('Y-m-d') : date('Y-m-d') }}">
                        </div>
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
                            <label class="kt-checkbox kt-checkbox--tick kt-checkbox--success">
                                <input name="is_published" type="checkbox" value="1" {{ isset($item) ? ($item->is_published ? 'checked' : '') : 'checked' }}> Published
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
