{{--<footer class="footer6 footer--bw">--}}
{{--    <div class="footer__big">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12 col-md-12 col-sm-12 justify-content-center">--}}
{{--                    <div class="widget text_widget">--}}
{{--                        <img class="footer_logo" src="{{asset('frontend/img/logo.png')}}" alt="logo">--}}
{{--                        <p>Nunc placerat mi id nisi interdum they mtolis. Praesient is pharetra justo ught scel--}}
{{--                            erisque the mattis lhreo quam nterdum mollisy.</p>--}}
{{--                        <a href="#">Read More About <span class="la la-chevron-right"></span></a>--}}
{{--                    </div><!-- ends: .widget -->--}}
{{--                </div><!-- ends: .col-lg-3 -->--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div><!-- ends: .footer__big -->--}}
{{--    <div class="footer__small bg-dark text-center text-default">--}}
{{--        <p>©2020 Four Islands. All rights reserved. Created by <a href="#">Hussain Abu Hajjaj</a></p>--}}
{{--    </div><!-- ends: .footer__small -->--}}
{{--</footer>--}}

<footer class="main-footer dark">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-30">
                <div class="item fotcont">
                    <div class="fothead">
                        <h6>@lang('translate.phone')</h6>
                    </div>
                    <p>{{getSetting('phone')}}</p>
                </div>
            </div>
            <div class="col-md-4 mb-30">
                <div class="item fotcont">
                    <div class="fothead">
                        <h6>@lang('translate.email')</h6>
                    </div>
                    <p>{{getSetting('email')}}</p>
                </div>
            </div>
            <div class="col-md-4 mb-30">
                <div class="item fotcont">
                    <div class="fothead">
                        <h6>Our Address</h6>
                    </div>
                    <p>{{getSetting('address')}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="text-left">
                        <p>© 2021 four islands est. All right reserved.</p>
                    </div>
                </div>
    		  <div class="col-md-4 abot">
                        <div class="social-icon">
                            <a href="{{getSetting('facebook')}}"><i class="ti-facebook"></i></a>
                            <a href="{{getSetting('twitter')}}"><i class="ti-twitter"></i></a>
                            <a href="{{getSetting('instagram')}}"><i class="ti-instagram"></i></a>
                        </div>
                    </div>
                <div class="col-md-4">
                    <p class="right"><a href="#">Terms &amp; Conditions</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
