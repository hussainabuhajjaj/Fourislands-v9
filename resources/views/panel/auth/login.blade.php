<!DOCTYPE html>

<html dir="rtl" lang="ar">
<head>
    <meta charset="utf-8" />
    <title>Dashboard Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href="{{ asset('panelAssets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('panelAssets/css/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('panelAssets/css/modern-theme.css') }}" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <style>
        * { font-family: 'Cairo', sans-serif; }
        body.login-page {
            background: #0f0f1a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-bg-decoration {
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background:
                radial-gradient(ellipse at 20% 50%, rgba(108,92,231,0.15) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 20%, rgba(162,155,254,0.1) 0%, transparent 50%),
                radial-gradient(ellipse at 50% 80%, rgba(253,121,168,0.08) 0%, transparent 50%);
            z-index: 0;
            animation: loginBgFloat 20s ease-in-out infinite alternate;
        }
        @keyframes loginBgFloat {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(-30px, -30px) rotate(3deg); }
        }
        .login-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            margin: 20px;
            background: rgba(255,255,255,0.03);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-radius: 20px;
            border: 1px solid rgba(255,255,255,0.06);
            padding: 48px 40px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.4);
            animation: fadeInUp 0.6s ease;
        }
        .login-card .logo {
            text-align: center;
            margin-bottom: 32px;
        }
        .login-card .logo h2 {
            font-size: 1.8rem;
            font-weight: 900;
            background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
            letter-spacing: -1px;
        }
        .login-card .logo p {
            color: rgba(255,255,255,0.4);
            font-size: 0.85rem;
            margin-top: 6px;
        }
        .login-card .form-group {
            margin-bottom: 18px;
        }
        .login-card .form-group label {
            color: rgba(255,255,255,0.6);
            font-size: 0.8rem;
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
        }
        .login-card .form-control {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            color: #fff;
            padding: 12px 16px;
            border-radius: 10px;
            width: 100%;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        .login-card .form-control:focus {
            background: rgba(255,255,255,0.08);
            border-color: #6c5ce7;
            box-shadow: 0 0 0 3px rgba(108,92,231,0.15);
            outline: none;
        }
        .login-card .form-control::placeholder {
            color: rgba(255,255,255,0.3);
        }
        .login-card .kt-checkbox {
            color: rgba(255,255,255,0.5);
            font-size: 0.85rem;
        }
        .login-card .kt-checkbox > span {
            border-color: rgba(255,255,255,0.2);
            background: transparent;
            border-radius: 4px;
        }
        .login-card .kt-checkbox > input:checked ~ span {
            background: #6c5ce7;
            border-color: #6c5ce7;
        }
        .login-card .btn-submit {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(108,92,231,0.35);
            letter-spacing: 0.5px;
        }
        .login-card .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(108,92,231,0.45);
        }
        .login-card .btn-submit:active {
            transform: translateY(0);
        }
        .login-card .extra-links {
            margin-top: 20px;
            text-align: center;
        }
        .login-card .extra-links a {
            color: rgba(255,255,255,0.4);
            font-size: 0.8rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .login-card .extra-links a:hover {
            color: #a29bfe;
        }
    </style>
</head>

<body class="login-page">
    <div class="login-bg-decoration"></div>

    <div class="login-card">
        <div class="logo">
            <h2>{{ getSetting('site_name') ?? 'Dashboard' }}</h2>
            <p>تسجيل الدخول إلى لوحة التحكم</p>
        </div>

        <form id="login-form" action="{{ route('panel.login') }}" method="post">
            @csrf
            <div class="form-group">
                <label>البريد الإلكتروني</label>
                <input class="form-control" type="email" placeholder="example@email.com" name="email" required>
            </div>

            <div class="form-group">
                <label>كلمة المرور</label>
                <input class="form-control" type="password" placeholder="••••••••" name="password" required>
            </div>

            <div class="form-group" style="margin-bottom: 24px;">
                <label class="kt-checkbox" style="margin-bottom: 0;">
                    <input type="checkbox" name="remember"> تذكرني
                    <span></span>
                </label>
            </div>

            <button type="submit" class="btn-submit" id="login-submit">تسجيل الدخول</button>

            <div class="extra-links">
                <a href="javascript:;">نسيت كلمة المرور؟</a>
            </div>
        </form>
        <div id="login-error" style="display:none; margin-top: 16px; padding: 12px; border-radius: 10px; background: rgba(232,67,147,0.1); color: #e84393; text-align: center; font-size: 0.85rem;"></div>
    </div>

<script src="{{ asset('panelAssets/js/jquery.js') }}" type="text/javascript"></script>
<script src="{{ asset('panelAssets/js/sweetalert2.min.js') }}" type="text/javascript"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var Toast = Swal.mixin({
        toast: true, position: 'top-end', showConfirmButton: false, timer: 4000, timerProgressBar: true,
        didOpen: (toast) => { toast.addEventListener('mouseenter', Swal.stopTimer); toast.addEventListener('mouseleave', Swal.resumeTimer); }
    });

    $(document).ready(function () {
        $('#login-form').on('submit', function (e) {
            e.preventDefault();
            var btn = $('#login-submit');
            var errorDiv = $('#login-error');
            var form = $(this);

            btn.html('<i class="fa fa-spinner fa-pulse fa-fw"></i>').prop('disabled', true);
            errorDiv.hide().removeClass('show');

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                success: function (response) {
                    if (response.redirectUrl) {
                        window.location.href = response.redirectUrl;
                    } else {
                        window.location.reload();
                    }
                },
                error: function (jqXhr) {
                    btn.html('تسجيل الدخول').prop('disabled', false);
                    var msg = '';
                    if (jqXhr.responseJSON) {
                        msg = jqXhr.responseJSON.msg || jqXhr.responseJSON.message || '';
                        if (jqXhr.responseJSON.errors) {
                            var errors = jqXhr.responseJSON.errors;
                            for (var key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    msg += (msg ? '\n' : '') + errors[key][0];
                                    $('[name="' + key + '"]').addClass('is-invalid');
                                }
                            }
                        }
                    }
                    if (!msg) msg = 'حدث خطأ غير متوقع';
                    Toast.fire({ icon: 'error', title: msg });
                }
            });
        });

        $(document).on('input', '.is-invalid', function () {
            $(this).removeClass('is-invalid');
        });
    });
</script>

</body>
</html>