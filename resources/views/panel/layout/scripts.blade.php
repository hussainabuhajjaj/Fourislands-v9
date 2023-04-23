<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {};
</script>

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
    $('.kt-selectpicker').selectpicker();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                            swal.fire({
                                type: 'success',
                                title: response.message,
                                confirmButtonText: 'Agree'
                            }).then(function (result) {
                                datatable.reload();
                            })
                        }else {
                            swal.fire({
                                type: 'error',
                                title: response.message,
                                text : response.errors_object,
                                confirmButtonText: 'Agree'
                            });
                        }
                    },
                });

            }
        });


    });
$('.summernote').summernote({
  toolbar: [
    // [groupName, [list of button]]
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
</script>
