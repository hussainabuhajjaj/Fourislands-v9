<!DOCTYPE html>

<html lang="en">
<!-- begin::Head -->
    <title>{{ $title }}</title>
    @include('panel.layout.head')
    @stack('css')
<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile kt-header-mobile--fixed">
    <div class="kt-header-mobile__logo">
        <a href="index.html">
            <img alt="Logo" src="{{ asset('panelAssets/media/logos/logo-light.png') }}"/>
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler">
            <span></span></button>
        <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                    class="flaticon-more"></i></button>
    </div>
</div>

<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

        @include('panel.layout.sidebar')

        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

            <!-- begin:: Header -->
                @include('panel.layout.header')
            <!-- end:: Header -->
            <div class="kt-content kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                <!-- begin:: Content Head -->
                @yield('content_head')

                <!-- end:: Content Head -->

                <!-- begin:: Content -->
                <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">

                    @yield('content')

                </div>

                <!-- end:: Content -->
            </div>

        </div>
    </div>
</div>

<!-- end:: Page -->

<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>
<!-- end::Scrolltop -->


@include('panel.layout.scripts')
@stack('js')

<script>
$(document).ready(function () {
    $('.kt-page--loading').removeClass('kt-page--loading');

    // Clear validation state on input
    $(document).on('input', '.is-invalid', function () {
        $(this).removeClass('is-invalid');
    });

    // Override jQuery Validate submitHandler for #form to use AJAX
    var $form = $('#form');
    if ($form.length) {
        var validator = $form.validate();
        if (validator) {
            validator.settings.submitHandler = function (form) {
                var $f = $(form);
                $('.summernote').each(function () {
                    $(this).summernote("code",
                        $(this).summernote('code')
                            .replace(/(<div)/igm, '<p')
                            .replace(/<\/div>/igm, '</p>')
                            .replace(/<p><\/p>/igm, '')
                    );
                });

                if (!window.is_all_images_uploaded) {
                    swal('warning', 'Please Wait Until Uploading the images', '');
                    return;
                }

                var saveBtn = $('#m_login_signin_submit');
                saveBtn.html('<i class="fa fa-spinner fa-pulse fa-fw"></i>').prop('disabled', true);
                var formData = new FormData(form);
                var url = $f.attr('action');
                var redirectUrl = $f.attr('to');
                var method = $f.attr('method');

                if (window.images !== undefined && window.images !== null) {
                    formData.append('images', JSON.stringify(window.images));
                }
                if (window.repeater) {
                    formData.append('list', JSON.stringify($('#m_repeater_1').repeaterVal()['']));
                }

                $.ajax({
                    url: url,
                    method: method,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        saveBtn.html('Save').prop('disabled', false);
                        if (response.status) {
                            Toast.fire({ icon: 'success', title: response.message });
                            setTimeout(function () {
                                window.location = redirectUrl;
                            }, 1000);
                        } else {
                            Toast.fire({ icon: 'error', title: response.message });
                        }
                    },
                    error: function (jqXhr) {
                        saveBtn.html('Save').prop('disabled', false);
                        getErrors(jqXhr, '/panel/index');
                    }
                });
            };
        }
    }
});
</script>
</body>

<!-- end::Body -->
</html>
