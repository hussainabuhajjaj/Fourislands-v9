
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.css">
@extends('frontend.layouts.master')
@section('content')
    <style>
        #mapBox {
            position: static;
            width: 100%;
        }
    </style>
    <style>
        .marker {
            background-image: url('{{asset('pin.png')}}');
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }

        .mapboxgl-popup {
            max-width: 200px;
        }

        .mapboxgl-popup-content {
            text-align: center;
            font-family: 'Open Sans', sans-serif;
        }
    </style>
    <!-- Lines -->
    {{--<section class="content-lines-wrapper">--}}
    {{--    <div class="content-lines-inner">--}}
    {{--        <div class="content-lines"></div>--}}
    {{--    </div>--}}
    {{--</section>--}}
    <!-- Header Banner -->
    <section class="banner-header banner-img valign bg-img bg-fixed" data-overlay-light="1"
             data-background="{{asset('NewFront/img/1.jpg')}}"></section>

      <section class="testimonials section-padding2">
        <div class="container">
            <div class="row">
                @if(app()->getLocale() == "ar")
                    <h2 class="section-title">عناويـ <span>ـننا</span></h2>
                @else
                    <h2 class="section-title">Our <span>Branches</span></h2>
                @endif
            </div>
            <div class="row">
                @if($branches != '' && $branches->count() > 0)
                    @foreach($branches as $branch)
                        <div class="col-md-4">
                            <div class="item testimonials-box" style="background: #f4f4f4">
                                <span class="quote"><img src="{{ url('image/' . $branch->image . '/200x200') }}" alt=""></span>
{{--                                <p>Architect dapibus augue metus the nec feugiat erat hendrerit nec. Duis veante the--}}
{{--                                    lemon sanleo nec feugiat erat hendrerit necuis veante. Design inilla duiman at elit--}}
{{--                                    finibus viverra.</p>--}}
                                <div class="info">
                                    <div class="author-img"><img src="{{ url('image/' . $branch->image . '/200x200') }}" alt=""></div>
                                    <div class="cont">

                                        <h6>{{$branch->city}}</h6>
                                        <span>{{$branch->address}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
            </div>
        </div>
    </section>


    <!-- Contact -->
    <section class="section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                    @if(app()->getLocale() == 'ar')
                        <h2 class="section-title">تواصل <span>معنا</span></h2>
                    @else
                        <h2 class="section-title">Contact <span>Us</span></h2>
                    @endif
                </div>
            </div>
            <div class="row mb-90">

                <div class="col-md-4 mb-30 animate-box" data-animate-effect="fadeInUp">
                    @if(app()->getLocale()=='ar')

                        <p><b>تفاصيل التواصل</b></p>
                    @else
                        <p style="font-weight:700;">Contact Details</p>
                    @endif
                    <p><b>@lang('translate.phone') :</b> {{getSetting('phone')}}</p>
                    <p><b>@lang('translate.email') :</b> {{getSetting('email')}}</p>
{{--                    <p><b>@lang('translate.address'):</b> {{getSetting('address')}}</p>--}}
                </div>
                <div class="col-md-6 animate-box" data-animate-effect="fadeInUp">
                    @if(app()->getLocale() == 'ar')
                        <p><b>تواصل معنا</b></p>
                    @else
                        <p><b>Contact Us</b></p>
                    @endif
                    <form id="target" method="post" action="" class="row">
                        @csrf


                        <div class="col-md-12">
                            <input type="text" name="name" id="name" placeholder="Full Name">
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="phone" id="phone" placeholder="phone">
                        </div>
                        <div class="col-md-12">
                            <input type="email" name="email" id="email" placeholder="Your Email">
                        </div>
                        <div class="col-md-12">
                            <input type="text" name="subject" id="subject" placeholder="subject">
                        </div>
                        <div class="col-md-12">
                            <textarea name="message" id="message" cols="40" rows="4"
                                      placeholder="Your Message"></textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="butn-dark mt-15"><a><span>@lang('translate.send')</span></a></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Map Section-->
            <div class="row">
                <div class="col-md-12 mb-30 animate-box" data-animate-effect="fadeInUp">
                    <div id="bauen-contactMap"></div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.all.js"></script>
    <script src="{{asset('panelAssets/js/post.js')}}"></script>
    @push('front_js')
        <script src="https://www.google.com/recaptcha/api.js"></script>

        <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>

        <script>
            function resetForm() {
                document.getElementById("target").reset();
            }
            $("#target").submit(function (event) {

                event.preventDefault();

                let name = $('#name').val();
                let email = $('#email').val();
                let mobile_number = $('#phone').val();
                let subject = $('#subject').val();
                let message = $('#message').val();

                $.ajax({
                    url: "{{route('home.contacts.store')}}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        name: name,
                        email: email,
                        phone: mobile_number,
                        subject: subject,
                        message: message,
                    },
                    success: function (response) {
                        resetForm();
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'center',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: response.message
                        })
                    },
                    error: function (xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'center',
                            showConfirmButton: true,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'warning',
                            title: err.message
                        })
                    }

                });


            });
        </script>
        <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoiaHVzc2FpbjE5OTMxNyIsImEiOiJja3FtbWNtODIwNGZjMnBucGV1cWpoYTE5In0.OePEbx6NBUzRLkTStHiy-g';

            var map = new mapboxgl.Map({
                container: 'bauen-contactMap',
                style: 'mapbox://styles/mapbox/light-v10',
                center: [-0.100, -0.60],
                zoom: 2
            });
            map.addControl(new mapboxgl.NavigationControl());
            map.on('load', function () {
                // Add a GeoJSON source with 3 points.
                map.addSource('points', {
                    'type': 'geojson',
                    'data': {
                        'type': 'FeatureCollection',
                        'features': [

                            {
                                'type': 'Feature',
                                'properties': {},
                                'geometry': {
                                    'type': 'Point',
                                    'coordinates': [6.1432, 46.2044]
                                }
                            },
                            {
                                'type': 'Feature',
                                'properties': {
                                    'title': 'Kuwait',
                                    'description': 'Qibla, Dawliya complex, office 61, Ground Floor'
                                },
                                'geometry': {
                                    'type': 'Point',
                                    'coordinates': [47.4818, 29.3117]
                                },

                            }
                        ]
                    }
                });
                // Add a circle layer
                map.addLayer({
                    'id': 'circle',
                    'type': 'circle',
                    'source': 'points',
                    'paint': {
                        'circle-color': '#4264fb',
                        'circle-radius': 8,
                        'circle-stroke-width': 2,
                        'circle-stroke-color': '#ffffff'
                    }
                });

                // Center the map on the coordinates of any clicked circle from the 'circle' layer.
                map.on('click', 'circle', function (e) {
                    map.flyTo({
                        center: e.features[0].geometry.coordinates
                    });
                });

                // Change the cursor to a pointer when the it enters a feature in the 'circle' layer.
                map.on('mouseenter', 'circle', function () {
                    map.getCanvas().style.cursor = 'pointer';
                });

                // Change it back to a pointer when it leaves.
                map.on('mouseleave', 'circle', function () {
                    map.getCanvas().style.cursor = '';
                });
            });

        </script>
        {{--<script>--}}
        {{--    // TO MAKE THE MAP APPEAR YOU MUST--}}
        {{--    // ADD YOUR ACCESS TOKEN FROM--}}
        {{--    // https://account.mapbox.com--}}
        {{--    mapboxgl.accessToken = 'pk.eyJ1IjoiaHVzc2FpbjE5OTMxNyIsImEiOiJja3FtbWNtODIwNGZjMnBucGV1cWpoYTE5In0.OePEbx6NBUzRLkTStHiy-g';--}}

        {{--    var geojson = {--}}
        {{--        'type': 'FeatureCollection',--}}
        {{--        'features': [--}}
        {{--            {--}}
        {{--                'type': 'Feature',--}}
        {{--                'geometry': {--}}
        {{--                    'type': 'Point',--}}
        {{--                    'coordinates': [47.4818,29.3117]--}}
        {{--                },--}}
        {{--                'properties': {--}}
        {{--                    'title': 'Kuwait',--}}
        {{--                    'description': 'Qibla, Dawliya complex, office 61, Ground Floor'--}}
        {{--                }--}}
        {{--            },--}}
        {{--            {--}}
        {{--                'type': 'Feature',--}}
        {{--                'geometry': {--}}
        {{--                    'type': 'Point',--}}
        {{--                    'coordinates': [6.1432, 46.2044]--}}
        {{--                },--}}
        {{--                'properties': {--}}
        {{--                    'title': 'Switzerland',--}}
        {{--                    'description': 'Geneva'--}}
        {{--                }--}}
        {{--            }--}}
        {{--        ]--}}
        {{--    };--}}

        {{--    var map = new mapboxgl.Map({--}}
        {{--        container: 'bauen-contactMap',--}}
        {{--        style: 'mapbox://styles/mapbox/light-v9',--}}
        {{--        center: [-60,60],--}}
        {{--        zoom: 3--}}
        {{--    });--}}

        {{--    // add markers to map--}}
        {{--    geojson.features.forEach(function (marker) {--}}
        {{--// create a HTML element for each feature--}}
        {{--        var el = document.createElement('div');--}}
        {{--        el.className = 'marker';--}}

        {{--// make a marker for each feature and add it to the map--}}
        {{--        new mapboxgl.Marker(el)--}}
        {{--            .setLngLat(marker.geometry.coordinates)--}}
        {{--            .setPopup(--}}
        {{--                new mapboxgl.Popup({ offset: 25 }) // add popups--}}
        {{--                    .setHTML(--}}
        {{--                        '<h3>' +--}}
        {{--                        marker.properties.title +--}}
        {{--                        '</h3><p>' +--}}
        {{--                        marker.properties.description +--}}
        {{--                        '</p>'--}}
        {{--                    )--}}
        {{--            ).addTo(map);--}}
        {{--    });--}}

        {{--    var nav = new mapboxgl.NavigationControl();--}}
        {{--    map.addControl(nav, 'top-left');--}}



        {{--</script>--}}

    @endpush
@stop


