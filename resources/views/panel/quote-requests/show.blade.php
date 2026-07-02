@extends('panel.layout.master' , ['title' => 'Quote Request Details'])

@section('content_head')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Quote Request Details</h3>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="kt-portlet">
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="row row-no-padding row-col-separator-xl">
                        <div class="col-md-12 col-lg-12 col-xl-6">
                            <div class="kt-widget1">
                                <div class="kt-widget1__item">
                                    <div class="kt-widget1__info">
                                        <h3 class="kt-widget1__title">Contact Person</h3>
                                        <span class="kt-widget1__desc">{{ $quoteRequest->contact_person }}</span>
                                    </div>
                                </div>
                                <div class="kt-widget1__item">
                                    <div class="kt-widget1__info">
                                        <h3 class="kt-widget1__title">Company</h3>
                                        <span class="kt-widget1__desc">{{ $quoteRequest->company_name ?: 'N/A' }}</span>
                                    </div>
                                </div>
                                <div class="kt-widget1__item">
                                    <div class="kt-widget1__info">
                                        <h3 class="kt-widget1__title">Email</h3>
                                        <span class="kt-widget1__desc">{{ $quoteRequest->email }}</span>
                                    </div>
                                </div>
                                <div class="kt-widget1__item">
                                    <div class="kt-widget1__info">
                                        <h3 class="kt-widget1__title">Phone</h3>
                                        <span class="kt-widget1__desc">{{ $quoteRequest->phone }}</span>
                                    </div>
                                </div>
                                @if($quoteRequest->service)
                                <div class="kt-widget1__item">
                                    <div class="kt-widget1__info">
                                        <h3 class="kt-widget1__title">Service</h3>
                                        <span class="kt-widget1__desc">{{ $quoteRequest->service->title }}</span>
                                    </div>
                                </div>
                                @endif
                                @if($quoteRequest->product)
                                <div class="kt-widget1__item">
                                    <div class="kt-widget1__info">
                                        <h3 class="kt-widget1__title">Product</h3>
                                        <span class="kt-widget1__desc">{{ $quoteRequest->product->title }}</span>
                                    </div>
                                </div>
                                @endif
                                <div class="kt-widget1__item">
                                    <div class="kt-widget1__info">
                                        <h3 class="kt-widget1__title">Status</h3>
                                        <span class="kt-widget1__desc">
                                            <span class="kt-badge kt-badge--{{ $quoteRequest->status === 'approved' ? 'success' : ($quoteRequest->status === 'rejected' ? 'danger' : 'warning') }} kt-badge--inline">
                                                {{ $quoteRequest->status }}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-widget1__item">
                                    <div class="kt-widget1__info">
                                        <h3 class="kt-widget1__title">Message</h3>
                                        <span class="kt-widget1__desc">{{ $quoteRequest->message }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Update Status</h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <form method="POST" action="{{ route('panel.quote-requests.updateStatus') }}" class="form-horizontal" id="statusForm">
                        @csrf
                        <input type="hidden" name="id" value="{{ $quoteRequest->id }}">
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <select name="status" class="form-control">
                                    <option value="pending" {{ $quoteRequest->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ $quoteRequest->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="rejected" {{ $quoteRequest->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-primary">Update Status</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="{{ asset('panelAssets/js/post.js') }}"></script>
<script>
    $('#statusForm').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        $.ajax({
            url: "{{ route('panel.quote-requests.updateStatus') }}",
            method: 'POST',
            data: $(form).serialize(),
            success: function(d) {
                if (d.status) {
                    toastr.success(d.message);
                } else {
                    toastr.error(d.message);
                }
            },
            error: function() {
                toastr.error('An error occurred');
            }
        });
    });
</script>
@endpush
