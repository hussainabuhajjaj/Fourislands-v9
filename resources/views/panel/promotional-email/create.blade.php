@extends('panel.layout.master' , ['title' => 'Compose'])


@push('css')
    <link href="{{ asset('panelAssets/js/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('panelAssets/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css"/>
@endpush

@section('content_head')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Compose</h3>
            </div>
        </div>
    </div>

@endsection
@section('content')
    <div class="row">

        <div class="col-md-8">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__head">

                </div>
                <div class="kt-portlet__body">

                    <div class="tab-content">
                        <form id="form" action="{{ route('panel.promotional-emails.store') }}" method="post"
                              enctype="multipart/form-data" to="{{ route('panel.promotional-emails.index') }}">
                            @csrf
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" name="subject" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control summernote" name="message" rows="5" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="attachments">cover image (optional)</label>
                                <input type="file" class="form-control-file"  id="cover_image"
                                       name="cover_image">
                            </div>
                            <div class="form-group">
                                <label for="attachments">Attachments (optional)</label>
                                <input type="file" class="form-control-file" multiple id="attachments"
                                       name="attachments[]">
                            </div>
                            <div class="form-group">

                                <label for="recipients">Recipients</label>
                                <select class="form-control kt-selectpicker" multiple="multiple" id="recipients"
                                        name="recipients[]">
                                    @foreach($users as $user)
                                        <option value="{{ $user->email }}">{{ $user->name }} ({{ $user->email }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="scheduled_at">Scheduled Date and Time:</label>
                                <input type="datetime-local" class="form-control" id="scheduled_at" name="scheduled_at"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date (optional)</label>
                                <input type="datetime-local" min="2018-06-07T00:00" step="1" class="form-control"
                                       name="start_date">
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date (optional)</label>
                                <input type="datetime-local" min="2018-06-07T00:00" step="1" class="form-control"
                                       name="end_date">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                </div>



                @endsection


                @push('js')

                    <script src="{{ asset('panelAssets/js/summernote/dist/summernote.js') }}"
                            type="text/javascript"></script>
                    <script src="{{ asset('panelAssets/js/summernote.min.js') }}" type="text/javascript"></script>
                    <script src="{{ asset('panelAssets/js/post.js') }}"></script>

    @endpush
