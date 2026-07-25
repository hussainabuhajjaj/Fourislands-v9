@extends('frontend.layouts.master')

@section('page_title', __('translate.contact_us'))
@section('meta_desc', __('translate.contact_desc'))

@push('front_css')
    <style>
        .marker { background-image: url('{{ asset('pin.png') }}'); background-size: cover; width: 50px; height: 50px; border-radius: 50%; cursor: pointer; }
        .mapboxgl-popup { max-width: 200px; }
        .mapboxgl-popup-content { text-align: center; font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
@endpush

@section('content')
    <section class="relative pt-28 sm:pt-36 pb-16 sm:pb-20 bg-cover bg-center" data-background="{{ asset('NewFront/img/1.jpg') }}">
        <div class="absolute inset-0 bg-gradient-to-br from-navy-900/90 via-navy-900/70 to-navy-900/60"></div>
        <div class="relative z-[2] max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-3xl sm:text-4xl font-bold text-white mb-2">@lang('translate.contact_us')</h1>
            <nav aria-label="breadcrumb" class="text-sm">
                <a href="{{ route('home.home') }}" class="text-white/55 hover:text-gold-500 transition-colors">@lang('translate.home')</a>
                <span class="text-white/30 mx-2">/</span>
                <span class="text-gold-500">@lang('translate.contact')</span>
            </nav>
        </div>
    </section>

    <section class="py-16 sm:py-24 bg-white dark:bg-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
                <span class="section-tag">@lang('translate.get_in_touch')</span>
                <h2 class="section-title text-navy-950 dark:text-white">@lang('translate.contact_us')</h2>
                <p class="section-desc mx-auto">@lang('translate.contact_desc')</p>
            </div>

            @if($branches && $branches->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10 max-w-4xl mx-auto">
                    @foreach($branches as $branch)
                        <div class="card p-6 sm:p-8 text-center hover:border-sky-200 hover:shadow-md transition-all">
                            <div class="w-12 h-12 flex items-center justify-center rounded-md bg-sky-50 text-sky-700 dark:bg-sky-500/10 dark:text-sky-300 text-lg mx-auto mb-4">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h6 class="font-heading text-base mb-2 text-navy-950 dark:text-white">{{ $branch->city }}</h6>
                            <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">{{ $branch->address }}</p>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10 max-w-4xl mx-auto">
                <div>
                    <div class="card p-6 sm:p-8">
                        <div class="w-12 h-12 flex items-center justify-center rounded-md bg-sky-50 text-sky-700 dark:bg-sky-500/10 dark:text-sky-300 text-lg mb-4">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h6 class="font-heading text-base mb-2 text-navy-950 dark:text-white">@lang('translate.phone')</h6>
                        <p class="text-sm text-slate-600 dark:text-slate-300">{{ getSetting('phone') ?: '+965 123 456 789' }}</p>
                    </div>
                    <div class="card p-6 sm:p-8 mt-4">
                        <div class="w-12 h-12 flex items-center justify-center rounded-md bg-sky-50 text-sky-700 dark:bg-sky-500/10 dark:text-sky-300 text-lg mb-4">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h6 class="font-heading text-base mb-2 text-navy-950 dark:text-white">@lang('translate.email')</h6>
                        <p class="text-sm text-slate-600 dark:text-slate-300">{{ getSetting('email') ?: 'info@fourislands.com' }}</p>
                    </div>
                    <div class="card p-6 sm:p-8 mt-4">
                        <div class="w-12 h-12 flex items-center justify-center rounded-md bg-sky-50 text-sky-700 dark:bg-sky-500/10 dark:text-sky-300 text-lg mb-4">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h6 class="font-heading text-base mb-2 text-navy-950 dark:text-white">@lang('translate.address')</h6>
                        <p class="text-sm text-slate-600 dark:text-slate-300">{{ getSetting('address') ?: 'Kuwait - Qibla' }}</p>
                    </div>
                </div>
                <div class="lg:col-span-2">
                    <div class="card p-6 sm:p-8">
                        <form id="contactForm" method="post" action="{{ route('home.contacts.store') }}">
                            @csrf
                            <input type="hidden" name="_form_token" value="{{ encrypt(['time' => now()->timestamp, 'form' => 'contact']) }}">
                            <div style="position:absolute;left:-99999px;opacity:0;height:0;overflow:hidden;pointer-events:none" aria-hidden="true">
                                <label for="contact_company_website">Company website</label>
                                <input id="contact_company_website" type="text" name="company_website" tabindex="-1" autocomplete="off">
                            </div>
                            <div style="position:absolute;left:-99999px;opacity:0;height:0;overflow:hidden;pointer-events:none" aria-hidden="true">
                                <label for="contact_fax_number">Fax number</label>
                                <input id="contact_fax_number" type="text" name="fax_number" tabindex="-1" autocomplete="off">
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <input type="text" name="name" class="form-input" placeholder="@lang('translate.full_name')" required>
                                </div>
                                <div>
                                    <input type="text" name="phone" class="form-input" placeholder="@lang('translate.phone')">
                                </div>
                                <div class="sm:col-span-2">
                                    <input type="email" name="email" class="form-input" placeholder="@lang('translate.email')" required>
                                </div>
                                <div class="sm:col-span-2">
                                    <input type="text" name="subject" class="form-input" placeholder="@lang('translate.subject')">
                                </div>
                                <div class="sm:col-span-2">
                                    <textarea name="message" class="form-input" rows="5" placeholder="@lang('translate.your_message')" required></textarea>
                                </div>
                            </div>
                            <div id="contactSuccess" class="mt-4 hidden rounded-md border border-emerald-200 bg-emerald-50 p-4 text-sm font-semibold text-emerald-800">
                                @lang('translate.msg_sent')
                            </div>
                            <button type="submit" class="btn-primary mt-4">
                                @lang('translate.send_message')
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.27 3.13A59.78 59.78 0 0 1 21.49 12 59.77 59.77 0 0 1 3.27 20.87L6 12Zm0 0h7.5"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-16 sm:pb-24 -mt-8 bg-white dark:bg-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div id="bauen-contactMap" class="w-full h-[300px] sm:h-[400px] rounded-xl overflow-hidden"></div>
        </div>
    </section>
@endsection

@push('front_js')
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
    <script>
        document.getElementById("contactForm").addEventListener("submit", function(event) {
            event.preventDefault();
            var form = this, btn = form.querySelector('button[type="submit"]'), success = document.getElementById('contactSuccess');
            btn.disabled = true; btn.innerHTML = '@lang("translate.sending")...';
            success.classList.add('hidden');
            fetch("{{ route('home.contacts.store') }}", {
                method: "POST", body: new FormData(form),
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(function(r) { return r.json(); })
            .then(function(d) {
                form.reset();
                success.textContent = d.message || d.msg || '@lang("translate.msg_sent")';
                success.classList.remove('hidden');
                window.dataLayer = window.dataLayer || [];
                window.dataLayer.push({ event: 'lead_form_submit', form_name: 'contact' });
            })
            .catch(function() {
                success.textContent = '@lang("translate.error_occurred")';
                success.classList.remove('hidden', 'border-emerald-200', 'bg-emerald-50', 'text-emerald-800');
                success.classList.add('border-red-200', 'bg-red-50', 'text-red-800');
            })
            .finally(function() { btn.disabled = false; btn.innerHTML = '@lang("translate.send_message") <svg class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.27 3.13A59.78 59.78 0 0 1 21.49 12 59.77 59.77 0 0 1 3.27 20.87L6 12Zm0 0h7.5"/></svg>'; });
        });

        mapboxgl.accessToken = 'pk.eyJ1IjoiaHVzc2FpbjE5OTMxNyIsImEiOiJja3FtbWNtODIwNGZjMnBucGV1cWpoYTE5In0.OePEbx6NBUzRLkTStHiy-g';
        var map = new mapboxgl.Map({
            container: 'bauen-contactMap',
            style: 'mapbox://styles/mapbox/light-v10',
            center: [47.4818, 29.3117],
            zoom: 2
        });
        map.addControl(new mapboxgl.NavigationControl());
        map.on('load', function() {
            map.addSource('points', {
                'type': 'geojson',
                'data': {
                    'type': 'FeatureCollection',
                    'features': [
                        { 'type': 'Feature', 'properties': { 'title': 'Switzerland', 'description': 'Geneva' }, 'geometry': { 'type': 'Point', 'coordinates': [6.1432, 46.2044] } },
                        { 'type': 'Feature', 'properties': { 'title': 'Kuwait', 'description': 'Qibla, Dawliya complex, office 61, Ground Floor' }, 'geometry': { 'type': 'Point', 'coordinates': [47.4818, 29.3117] } }
                    ]
                }
            });
            map.addLayer({ 'id': 'circle', 'type': 'circle', 'source': 'points', 'paint': { 'circle-color': '#C5A35A', 'circle-radius': 8, 'circle-stroke-width': 2, 'circle-stroke-color': '#ffffff' } });
            map.on('click', 'circle', function(e) {
                new mapboxgl.Popup().setLngLat(e.features[0].geometry.coordinates).setHTML('<h5>' + e.features[0].properties.title + '</h5><p>' + e.features[0].properties.description + '</p>').addTo(map);
                map.flyTo({ center: e.features[0].geometry.coordinates });
            });
            map.on('mouseenter', 'circle', function() { map.getCanvas().style.cursor = 'pointer'; });
            map.on('mouseleave', 'circle', function() { map.getCanvas().style.cursor = ''; });
        });
    </script>
@endpush
