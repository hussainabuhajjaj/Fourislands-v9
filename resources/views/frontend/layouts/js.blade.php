{{--<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>--}}
{{--<!-- inject:js-->--}}
{{--<script src="{{ asset('panelAssets/js/sweetalert2.min.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('panelAssets/js/sweetalert2.init.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('/panelAssets/js/post.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('/frontend/js/custom.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{asset('frontend/js/plugins.min.js')}}"></script>--}}
{{--<script src="{{asset('frontend/js/script.min.js')}}"></script>--}}
{{--<!-- endinject-->--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/localization/messages_ar.min.js"--}}
{{--        integrity="sha256-EPgqOoVBNThJb8TtkiZe177cdDIaFu6CX7d5DzLCzZ4=" crossorigin="anonymous"></script>--}}

<!-- jQuery -->


<script src="{{asset('NewFront/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('NewFront/js/jquery-migrate-3.0.0.min.js')}}"></script>
<script src="{{asset('NewFront/js/modernizr-2.6.2.min.js')}}"></script>
<script src="{{asset('NewFront/js/pace.js')}}"></script>
<script src="{{asset('NewFront/js/popper.min.js')}}"></script>
<script src="{{asset('NewFront/js/bootstrap.min.js')}}"></script>
<script src="{{asset('NewFront/js/scrollIt.min.js')}}"></script>
<script src="{{asset('NewFront/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('NewFront/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('NewFront/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('NewFront/js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('NewFront/js/YouTubePopUp.js')}}"></script>
<script src="{{asset('NewFront/js/custom.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@stack('front_js')
<script>


   // Navbar scrolling background
    $(window).on("scroll",function () {
        var bodyScroll = $(window).scrollTop(),
            navbar = $(".navbar"),
            logo = $(".navbar .logo > img");
        navbar.addClass("nav-scroll");
         if(bodyScroll > 100){
           logo.attr('src', '{{asset('logo.png')}}');

         }else{
             navbar.removeClass("nav-scroll");
             logo.attr('src', '{{asset('logo.png')}}');
         }
    });

 
	
	
    $(document).ready(function(){
        $('.floatingButton').on('click',
            function(e){
                e.preventDefault();
                $(this).toggleClass('open');
                if($(this).children('.fa').hasClass('fa-plus'))
                {
                    $(this).children('.fa').removeClass('fa-plus');
                    $(this).children('.fa').addClass('fa-close');
                }
                else if ($(this).children('.fa').hasClass('fa-close'))
                {
                    $(this).children('.fa').removeClass('fa-close');
                    $(this).children('.fa').addClass('fa-plus');
                }
                $('.floatingMenu').stop().slideToggle();
            }
        );
        $(this).on('click', function(e) {
            var container = $(".floatingButton");

            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && $('.floatingButtonWrap').has(e.target).length === 0)
            {
                if(container.hasClass('open'))
                {
                    container.removeClass('open');
                }
                if (container.children('.fa').hasClass('fa-close'))
                {
                    container.children('.fa').removeClass('fa-close');
                    container.children('.fa').addClass('fa-plus');
                }
                $('.floatingMenu').hide();
            }
        });
    });

    $(document).ready(function () {
        $(".nav li a").on("click", function () {
            $(".nav").find(".active").removeClass("active");
            $(this).parent().addClass("active");
        });
    });
    // Slider
    $(document).ready(function() {
        // var owl = $('.header .owl-carousel');
        // Projects owlCarousel
        $('.projects .owl-carousel').owlCarousel({
            loop: true
            , margin: 30
            , mouseDrag: true
            , autoplay: false
            , dots: true
            , autoplayHoverPause:true
            , smartSpeed: 1500
            , responsiveClass: true
            @if(app()->getLocale() == 'ar')
            ,  rtl:true
            @endif
            , responsive: {
                0: {
                    items: 1
                    , }
                , 600: {
                    items: 2
                }
                , 1000: {
                    items: 2
                }
            }
        });
        $('.team .owl-carousel').owlCarousel({
            loop: false
            , center:true
            , margin: 30
            , mouseDrag: true
            , dots: true
            , smartSpeed: 1000
            , responsiveClass: true
            @if(app()->getLocale() == 'ar')
            , rtl:true
            @endif
            , responsive: {
                0: {
                    items: 2
                    , }
                , 600: {
                    items: 6
                }
                , 1000: {
                    items: 6
                }
            }
        });


        // Testimonials owlCarousel
        $('.testimonials .owl-carousel').owlCarousel({
            loop:true,
            margin: 30,
            mouseDrag:true,
            autoplay: false,
            dots: true,
            nav: false,
            navText: ["<span class='lnr ti-angle-left'></span>","<span class='lnr ti-angle-right'></span>"],
            responsiveClass:true,
            rtl:false  ,
            responsive:{
                0:{
                    items:1,
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });


        // Clients owlCarousel
        $('.clients .owl-carousel').owlCarousel({
            loop: true
            , margin: 30
            , mouseDrag: true
            , autoplay: true
            , dots: false
            , responsiveClass: true
            ,  rtl:false
            , responsive: {
                0: {
                    margin: 10
                    , items: 3
                }
                , 600: {
                    items: 3
                }
                , 1000: {
                    items: 5
                }
            }
        });

        // Blog Home owlCarousel
        $('.bauen-blog .owl-carousel').owlCarousel({
            loop: true
            , margin: 30
			,center:true
            , mouseDrag: true
            , autoplay: false
            , dots: true
            , responsiveClass: true
            ,  rtl:false
            , responsive: {
                0: {
                    items: 3
                    , }
                , 600: {
                    items: 3
                }
                , 1000: {
                    items: 3
                }
            }
        });
        // Blog Home owlCarousel
        $('.projects .owl-carousel').owlCarousel({
            loop: true
            , margin: 30
            , mouseDrag: true
            , autoplay: false
            , dots: true
            , responsiveClass: true
            ,  rtl:false
            , responsive: {
                0: {
                    items: 1
                    , }
                , 600: {
                    items: 2
                }
                , 1000: {
                    items: 2
                }
            }
        });

        // Slider owlCarousel
        $('.slider-fade .owl-carousel').owlCarousel({
            items: 1,
            loop:true,
            dots: false,
            margin: 0,
            autoplay: true,
            smartSpeed: 500,
            animateOut: 'fadeOut',
            nav: true,
            rtl:false,
            navText: ['<i class="ti-angle-left" aria-hidden="true"></i>', '<i class="ti-angle-right" aria-hidden="true"></i>']
        });
        owl.on('changed.owl.carousel', function(event) {
            var item = event.item.index - 2;     // Position of the current item
            $('h4').removeClass('animated fadeInUp');
            $('h1').removeClass('animated fadeInUp');
            $('p').removeClass('animated fadeInUp');
            $('.butn-light').removeClass('animated fadeInUp');
            $('.owl-item').not('.cloned').eq(item).find('h4').addClass('animated fadeInUp');
            $('.owl-item').not('.cloned').eq(item).find('h1').addClass('animated fadeInUp');
            $('.owl-item').not('.cloned').eq(item).find('p').addClass('animated fadeInUp');
            $('.owl-item').not('.cloned').eq(item).find('.butn-light').addClass('animated fadeInUp');
        });
    });
</script>

