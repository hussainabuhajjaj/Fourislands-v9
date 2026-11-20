@extends('frontend.layouts.master')

@section('page_title', __('translate.home'))
@section('meta_desc', __('translate.meta_desc'))

@section('content')

    @php
        $heroImage = asset('NewFront/img/slider/1.jpg');
        $about = pages()->where('id', '36')->first();
    @endphp

    <section class="relative min-h-[92vh] overflow-hidden bg-slate-950 pt-28 lg:pt-36">
        <div class="absolute inset-0 z-[1] bg-cover bg-center opacity-70" data-background="{{ $heroImage }}"></div>
        <div class="absolute inset-0 z-[2] bg-[linear-gradient(110deg,rgba(2,6,23,.94)_0%,rgba(15,23,42,.82)_48%,rgba(15,23,42,.42)_100%)]"></div>

        <div class="relative z-[3] mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 pb-16 sm:px-6 lg:grid-cols-12 lg:gap-12 lg:px-8 lg:pb-20">
            <div class="flex flex-col justify-center lg:col-span-7">
                <span class="section-tag text-sky-200 before:bg-gold-500">@lang('translate.hero_tag')</span>
                <h1 class="max-w-4xl text-4xl font-extrabold leading-[1.03] tracking-normal text-white sm:text-5xl lg:text-7xl">
                    @lang('translate.hero_title')
                </h1>
                <p class="mt-6 max-w-2xl text-base leading-8 text-slate-200 sm:text-lg">@lang('translate.hero_desc')</p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('home.quote-requests.index') }}" class="btn-primary justify-center">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M5 11h14M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2Z"/></svg>
                        @lang('translate.get_quote')
                    </a>
                    <a href="{{ route('home.services.index') }}" class="btn-outline justify-center">
                        @lang('translate.ourservices')
                        <svg class="h-4 w-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0-5 5m5-5H6"/></svg>
                    </a>
                </div>

                <div class="mt-10 grid max-w-3xl grid-cols-3 gap-px overflow-hidden rounded-lg border border-white/10 bg-white/10">
                    <div class="bg-white/10 p-4 backdrop-blur-md sm:p-5">
                        <div class="text-2xl font-extrabold text-white sm:text-3xl">@lang('translate.est_year')</div>
                        <div class="mt-1 text-[11px] font-bold uppercase tracking-[1.6px] text-slate-300">@lang('translate.established')</div>
                    </div>
                    <div class="bg-white/10 p-4 backdrop-blur-md sm:p-5">
                        <div class="text-2xl font-extrabold text-white sm:text-3xl">30+</div>
                        <div class="mt-1 text-[11px] font-bold uppercase tracking-[1.6px] text-slate-300">@lang('translate.countries_served')</div>
                    </div>
                    <div class="bg-white/10 p-4 backdrop-blur-md sm:p-5">
                        <div class="text-2xl font-extrabold text-white sm:text-3xl">{{ date('Y') - 1987 }}+</div>
                        <div class="mt-1 text-[11px] font-bold uppercase tracking-[1.6px] text-slate-300">@lang('translate.years_exp')</div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="glass-panel rounded-lg p-4 sm:p-5">
                    <div class="image-frame">
                        <img src="{{ asset('NewFront/img/about.jpg') }}" alt="Four Islands operations" class="h-64 w-full object-cover sm:h-80 lg:h-96">
                    </div>
                    <div class="mt-5 grid grid-cols-2 gap-3">
                        <div class="metric-tile">
                            <div class="text-xs font-bold uppercase tracking-[1.4px] text-slate-600 dark:text-slate-400">@lang('translate.services_offered')</div>
                            <div class="mt-2 text-3xl font-extrabold text-navy-950 dark:text-white">{{ $services->count() }}+</div>
                        </div>
                        <div class="metric-tile">
                            <div class="text-xs font-bold uppercase tracking-[1.4px] text-slate-600 dark:text-slate-400">@lang('translate.partners_global')</div>
                            <div class="mt-2 text-3xl font-extrabold text-navy-950 dark:text-white">{{ $partners->count() }}+</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($partners->count() > 0)
        <section class="border-b border-slate-200 bg-surface py-8 dark:border-white/10 dark:bg-slate-950">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-6 lg:grid-cols-[240px_1fr] lg:items-center">
                    <div>
                        <span class="section-tag mb-0">@lang('translate.our_partners') @lang('translate.partner')</span>
                    </div>
                    <div class="clients-carousel owl-carousel min-w-0">
                        @foreach($partners as $partner)
                            <div class="flex h-24 flex-col items-center justify-center rounded-md border border-slate-200 bg-alt px-4 py-4 grayscale transition-all duration-300 hover:-translate-y-0.5 hover:bg-surface hover:grayscale-0 dark:border-white/10 dark:bg-white/5 dark:hover:bg-white/10">
                                <img src="{{ asset(@$partner->image) }}" alt="{{ @$partner->name }}" class="max-h-10 w-auto object-contain" onerror="this.onerror=null;this.src='{{ asset('NewFront/img/clients/1.png') }}'">
                                <h6 class="mt-2 text-center text-xs font-bold text-slate-600 dark:text-slate-400">{{ @$partner->name }}</h6>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($services->count() > 0)
        <section class="bg-alt py-16 dark:bg-slate-900 sm:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid gap-8 lg:grid-cols-12 lg:items-end">
                    <div class="lg:col-span-7">
                        <span class="section-tag">@lang('translate.what_we_do')</span>
                        <h2 class="section-title text-navy-950 dark:text-white">@lang('translate.ourservices')</h2>
                    </div>
                    <p class="section-desc lg:col-span-5">@lang('translate.services_desc')</p>
                </div>

                <div class="mt-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($services->take(6) as $item)
                        <a href="{{ route('home.services.show', ['id' => $item->id]) }}" class="card-hover group block overflow-hidden no-underline">
                            @if(@$item->image)
                                <img class="h-52 w-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{ asset(@$item->image) }}" alt="{{ $item->title }}" onerror="this.src='{{ asset('NewFront/img/service.jpg') }}'">
                            @else
                                <img class="h-52 w-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{ asset('NewFront/img/service.jpg') }}" alt="{{ $item->title }}">
                            @endif
                            <div class="p-6">
                                <div class="mb-4 flex items-center justify-between gap-4">
                                    <span class="icon-box">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-8 8h10a2 2 0 0 0 2-2V8l-6-6H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2Z"/></svg>
                                    </span>
                                    <svg class="h-5 w-5 text-slate-400 transition-transform group-hover:translate-x-1 group-hover:text-sky-700 dark:group-hover:text-sky-300 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0-5 5m5-5H6"/></svg>
                                </div>
                                <h3 class="text-xl font-extrabold text-navy-950 transition-colors group-hover:text-sky-700 dark:group-hover:text-sky-300 dark:text-white">{{ $item->title }}</h3>
                                <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $item->short_description ?: Str::limit(strip_tags($item->description), 120) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($about)
        <section class="bg-surface py-16 dark:bg-slate-950 sm:py-24">
            <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-12 lg:gap-14 lg:px-8">
                <div class="lg:col-span-5">
                    <div class="image-frame lg:sticky lg:top-32">
                        <img src="{{ asset('NewFront/img/1.jpg') }}" alt="Four Islands company profile" class="h-[420px] w-full object-cover">
                    </div>
                </div>
                <div class="lg:col-span-7">
                    <span class="section-tag">@lang('translate.about_us')</span>
                    <h2 class="section-title text-navy-950 dark:text-white">{{ $about->title }}</h2>
                    <div class="max-w-3xl text-base leading-8 text-slate-600 dark:text-slate-300">{!! $about->content !!}</div>

                    <div class="mt-8 grid gap-4 sm:grid-cols-2">
                        <div class="feature-line">
                            <span class="icon-box">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            </span>
                            <div>
                                <h3 class="text-base font-extrabold text-navy-950 dark:text-white">@lang('translate.satisfaction')</h3>
                                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">@lang('translate.services_desc')</p>
                            </div>
                        </div>
                        <div class="feature-line">
                            <span class="icon-box">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M6 7v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7M9 7V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2"/></svg>
                            </span>
                            <div>
                                <h3 class="text-base font-extrabold text-navy-950 dark:text-white">@lang('translate.products')</h3>
                                <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">@lang('translate.products_desc')</p>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('home.home') }}/about" class="btn-primary mt-8">
                        @lang('translate.read_more')
                        <svg class="h-4 w-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0-5 5m5-5H6"/></svg>
                    </a>
                </div>
            </div>
        </section>
    @endif

    @if($products->count() > 0)
        <section class="bg-alt py-16 dark:bg-slate-900 sm:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <span class="section-tag justify-center before:hidden">@lang('translate.our_products')</span>
                    <h2 class="section-title text-navy-950 dark:text-white">@lang('translate.featured_products')</h2>
                    <p class="section-desc mx-auto">@lang('translate.products_desc')</p>
                </div>

                <div class="mt-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($products->take(8) as $item)
                        <a href="{{ route('home.products.show', ['id' => $item->id]) }}" class="card-hover group block overflow-hidden no-underline">
                            @if(@$item->image)
                                <img class="h-56 w-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{ asset(@$item->image) }}" alt="{{ $item->title }}" onerror="this.src='{{ asset('NewFront/img/services/1.jpg') }}'">
                            @else
                                <img class="h-56 w-full object-cover transition-transform duration-500 group-hover:scale-105" src="{{ asset('NewFront/img/services/1.jpg') }}" alt="{{ $item->title }}">
                            @endif
                            <div class="p-5">
                                <h3 class="text-base font-extrabold leading-6 text-navy-950 transition-colors group-hover:text-sky-700 dark:group-hover:text-sky-300 dark:text-white">{{ Str::limit($item->title, 48) }}</h3>
                                <p class="mt-2 text-sm leading-6 text-slate-600 dark:text-slate-300">{{ Str::limit(strip_tags($item->description), 72) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($testimonials->count() > 0)
        <section class="bg-surface dark:bg-slate-950 py-16 sm:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <span class="section-tag justify-center before:hidden">@lang('translate.testimonials')</span>
                    <h2 class="section-title text-navy-950 dark:text-white">@lang('translate.what_clients_say')</h2>
                    <p class="section-desc mx-auto">@lang('translate.testimonials_desc')</p>
                </div>
                <div class="testimonials-carousel owl-carousel mt-10 max-w-3xl mx-auto">
                    @foreach($testimonials as $t)
                        <div class="card p-6 sm:p-8 mx-2">
                            <div class="flex items-center gap-4 mb-4">
                                <span class="w-14 h-14 rounded-full bg-sky-100 dark:bg-sky-500/10 flex items-center justify-center text-sky-700 dark:text-sky-300">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                                </span>
                                <div>
                                    <h4 class="font-heading font-bold text-navy-950 dark:text-white">{{ $t->name }}</h4>
                                    @if($t->position || $t->company)
                                        <p class="text-xs text-slate-600">{{ $t->position }}{{ $t->position && $t->company ? ', ' : '' }}{{ $t->company }}</p>
                                    @endif
                                </div>
                                @if($t->rating)
                                    <div class="ml-auto flex gap-0.5">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= $t->rating ? 'text-amber-400' : 'text-slate-200 dark:text-slate-600' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        @endfor
                                    </div>
                                @endif
                            </div>
                            <p class="text-sm leading-relaxed text-slate-600 dark:text-slate-300 italic">"{{ $t->content }}"</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="bg-slate-950 py-16 sm:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-4 sm:px-6 lg:grid-cols-12 lg:px-8">
            <div class="lg:col-span-5">
                <span class="section-tag text-sky-200 before:bg-gold-500">@lang('translate.get_in_touch')</span>
                <h2 class="section-title text-white">@lang('translate.lead_title')</h2>
                <p class="mt-4 text-base leading-8 text-slate-300">@lang('translate.lead_desc')</p>
                <div class="mt-8 grid grid-cols-2 gap-3">
                    <div class="rounded-md border border-white/10 bg-white/5 p-5">
                        <div class="text-3xl font-extrabold text-white">24h</div>
                        <div class="mt-1 text-xs font-bold uppercase tracking-[1.5px] text-slate-400">@lang('translate.contact_us')</div>
                    </div>
                    <div class="rounded-md border border-white/10 bg-white/5 p-5">
                        <div class="text-3xl font-extrabold text-white">100%</div>
                        <div class="mt-1 text-xs font-bold uppercase tracking-[1.5px] text-slate-400">@lang('translate.satisfaction')</div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7">
                <div class="glass-panel rounded-lg p-5 sm:p-8">
                    <form id="homeLeadForm" method="post" action="{{ route('home.contacts.store') }}">
                        @csrf
                        <div class="absolute left-[-9999px] top-auto h-px w-px overflow-hidden" aria-hidden="true">
                            <label for="home_company_website">Company website</label>
                            <input id="home_company_website" type="text" name="company_website" tabindex="-1" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <input type="text" name="name" class="form-input" placeholder="@lang('translate.full_name')" required>
                            <input type="email" name="email" class="form-input" placeholder="@lang('translate.email')" required>
                            <input type="text" name="phone" class="form-input" placeholder="@lang('translate.phone')" required>
                            <input type="text" name="subject" class="form-input" placeholder="@lang('translate.subject')">
                            <textarea name="message" class="form-input sm:col-span-2" rows="5" placeholder="@lang('translate.your_message')" required></textarea>
                        </div>
                        <div id="homeLeadSuccess" class="mt-4 hidden rounded-md border border-emerald-200 bg-emerald-50 p-4 text-sm font-semibold text-emerald-800">
                            @lang('translate.msg_sent')
                        </div>
                        <button type="submit" class="btn-primary mt-4 w-full justify-center py-3.5">
                            @lang('translate.send_message')
                            <svg class="h-4 w-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.27 3.13A59.78 59.78 0 0 1 21.49 12 59.77 59.77 0 0 1 3.27 20.87L6 12Zm0 0h7.5"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('front_js')
<script>
    document.getElementById('homeLeadForm').addEventListener('submit', function(e) {
        e.preventDefault();
        var form = this, btn = form.querySelector('button[type="submit"]'), success = document.getElementById('homeLeadSuccess');
        btn.disabled = true; btn.innerHTML = '@lang("translate.sending")...';
        success.classList.add('hidden');
        fetch(form.action, { method: 'POST', body: new FormData(form), headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(function(r) { return r.json(); })
            .then(function(d) {
                form.reset();
                success.textContent = d.message || d.msg || '@lang("translate.msg_sent")';
                success.classList.remove('hidden');
                window.dataLayer = window.dataLayer || [];
                window.dataLayer.push({ event: 'lead_form_submit', form_name: 'home_lead' });
            })
            .catch(function() {
                success.textContent = '@lang("translate.error_occurred")';
                success.classList.remove('hidden', 'border-emerald-200', 'bg-emerald-50', 'text-emerald-800');
                success.classList.add('border-red-200', 'bg-red-50', 'text-red-800');
            })
            .finally(function() { btn.disabled = false; btn.innerHTML = '@lang("translate.send_message")'; });
    });
</script>
@endpush
