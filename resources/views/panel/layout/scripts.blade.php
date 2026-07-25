<!-- begin::Global Config -->
<script>var KTAppOptions = {};</script>

<!--begin:: Vendor Plugins -->
<script src="{{ asset('panelAssets/js/jquery.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/popper.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/js.cookie.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/perfect-scrollbar.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/sticky.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/owl.carousel.js') }}" type="text/javascript"></script>

<script src="{{ asset('panelAssets/js/jquery.form.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/jquery.blockUI.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/jquery-ui.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('panelAssets/js/sweetalert2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/sweetalert2.init.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/bootstrap-select.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/summernote/dist/summernote.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/summernote.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('panelAssets/js/jquery.validate.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/jquery-validation.init.js') }}" type="text/javascript"></script>

<script src="{{ asset('panelAssets/js/scripts.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/dashboard.js') }}" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/localization/messages_ar.min.js"
        integrity="sha256-EPgqOoVBNThJb8TtkiZe177cdDIaFu6CX7d5DzLCzZ4=" crossorigin="anonymous"></script>

<script>
// Toast notification mixin
var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer);
    }
});

// Flash Messages
@if(session('success'))
Toast.fire({ icon: 'success', title: '{{ session('success') }}' });
@endif
@if(session('error'))
Toast.fire({ icon: 'error', title: '{{ session('error') }}' });
@endif
@if ($errors->any())
Toast.fire({ icon: 'error', title: '{{ $errors->first() }}' });
@endif

$('.kt-selectpicker').selectpicker();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ajaxError(function (event, jqXhr, settings, error) {
    if (jqXhr.status === 422) {
        var res = jqXhr.responseJSON;
        var msg = (res && (res.msg || res.message)) || 'Validation Error';
        if (res && res.errors) {
            var list = [];
            for (var key in res.errors) {
                if (res.errors.hasOwnProperty(key)) {
                    list.push(res.errors[key][0]);
                    $('[name="' + key + '"]').addClass('is-invalid');
                }
            }
            if (list.length) msg = list.join('<br>');
        }
        Toast.fire({ icon: 'error', title: msg });
    } else if (jqXhr.status === 401) {
        window.location.href = '{{ route('panel.login') }}';
    } else if (jqXhr.status >= 500) {
        Toast.fire({ icon: 'error', title: 'Internal Server Error' });
    }
});

$(document).on('click', '.delete', function (e) {
    e.preventDefault();
    var url = $(this).data('url');
    swal.fire({
        title: "Are You Sure ??",
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancel',
        confirmButtonText: 'Yes'
    }).then(function (result) {
        if (result.value) {

            $.ajax({
                url: url,
                method: "POST",
                data: {
                    "_method": "Delete",
                },
                success: function (response) {
                    if (response.status) {
                        Toast.fire({
                            icon: 'success',
                            title: response.message,
                        });
                        setTimeout(function () {
                            if (typeof datatable !== 'undefined' && datatable.reload) {
                                datatable.reload();
                            } else {
                                location.reload();
                            }
                        }, 800);
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: response.message,
                        });
                    }
                },
                error: function (jqXhr) {
                    var res = jqXhr.responseJSON;
                    var msg = (res && (res.msg || res.message)) || 'Error';
                    if (res && res.errors) {
                        var list = [];
                        for (var key in res.errors) {
                            if (res.errors.hasOwnProperty(key)) {
                                list.push(res.errors[key][0]);
                            }
                        }
                        if (list.length) msg = list.join('<br>');
                    }
                    Toast.fire({ icon: 'error', title: msg });
                }
            });

        }
    });
});

$('.summernote').summernote({
    toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
    ],
    popover: {
        image: [
            ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
            ['float', ['floatLeft', 'floatRight', 'floatNone']],
            ['remove', ['removeMedia']]
        ],
        link: [
            ['link', ['linkDialogShow', 'unlink']]
        ],
        table: [
            ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
            ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
        ],
        air: [
            ['color', ['color']],
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture']]
        ],
    }
});

$(document).on('input', '.is-invalid', function () {
    $(this).removeClass('is-invalid');
});
</script>