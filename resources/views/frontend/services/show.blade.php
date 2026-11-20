@extends('frontend.layouts.master')

@section('page_title', $services->title)
@section('meta_desc', $services->short_description ?: strip_tags($services->description))

@push('front_css')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Service",
    "name": "{{ $services->title }}",
    "description": "{{ $services->short_description ?: strip_tags($services->description) }}",
    "provider": {
        "@type": "Organization",
        "name": "Four Islands EST. for General Trading and Contracting"
    }
}
</script>
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "@lang('translate.home')", "item": "{{ url('/'.app()->getLocale()) }}" },
        { "@type": "ListItem", "position": 2, "name": "@lang('translate.services')", "item": "{{ route('home.services.index') }}" },
        { "@type": "ListItem", "position": 3, "name": "{{ $services->title }}" }
    ]
}
</script>
@endpush

@section('content')
    @php
        $trustYears = date('Y') - 1987;
        $testimonials = \App\Models\Testimonial::active()->get();
        $faqs = \App\Models\Faq::active()->get();
    @endphp

    <section class="relative pt-28 sm:pt-36 pb-16 sm:pb-20 bg-cover bg-center" data-background="{{ asset(@$services->large_image ?: @$services->image ?: 'NewFront/img/1.jpg') }}">
        <div class="absolute inset-0 bg-gradient-to-br from-navy-900/90 via-navy-900/70 to-navy-900/60"></div>
        <div class="relative z-[2] max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3 mb-2">
                @if($services->icon)
                    <span class="w-12 h-12 rounded-lg bg-white/10 flex items-center justify-center">
                        <i class="{{ $services->icon }} text-xl text-sky-300"></i>
                    </span>
                @endif
                <h1 class="font-heading text-3xl sm:text-4xl font-bold text-white">{{ $services->title }}</h1>
            </div>
            <nav aria-label="breadcrumb" class="text-sm">
                <a href="{{ route('home.home') }}" class="text-white/55 hover:text-gold-500 transition-colors">@lang('translate.home')</a>
                <span class="text-white/30 mx-2">/</span>
                <a href="{{ route('home.services.index') }}" class="text-white/55 hover:text-gold-500 transition-colors">@lang('translate.services')</a>
                <span class="text-white/30 mx-2">/</span>
                <span class="text-gold-500">{{ $services->title }}</span>
            </nav>

            <div class="mt-8 grid grid-cols-2 sm:grid-cols-4 gap-3 max-w-3xl">
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center">
                    <div class="text-2xl font-extrabold text-white">1987</div>
                    <div class="text-[10px] font-bold uppercase tracking-[1.2px] text-slate-300 mt-1">@lang('translate.established')</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center">
                    <div class="text-2xl font-extrabold text-white">{{ $trustYears }}+</div>
                    <div class="text-[10px] font-bold uppercase tracking-[1.2px] text-slate-300 mt-1">@lang('translate.years_exp')</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center">
                    <div class="text-2xl font-extrabold text-white">30+</div>
                    <div class="text-[10px] font-bold uppercase tracking-[1.2px] text-slate-300 mt-1">@lang('translate.countries_served')</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 text-center">
                    <div class="text-2xl font-extrabold text-white">100%</div>
                    <div class="text-[10px] font-bold uppercase tracking-[1.2px] text-slate-300 mt-1">@lang('translate.satisfaction')</div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 sm:py-24 bg-surface dark:bg-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <div class="lg:col-span-2 space-y-8">
                    @if($services->short_description)
                        <p class="text-lg leading-relaxed text-slate-600 dark:text-slate-300 font-semibold">{{ $services->short_description }}</p>
                    @endif

                    @if(@$services->image)
                        <div>
                            <img src="{{ asset(@$services->image) }}"
                                 class="w-full rounded-xl" alt="{{ $services->title }} - Four Islands"
                                 onerror="this.style.display='none'">
                        </div>
                    @endif

                    <div class="prose prose-slate dark:prose-invert max-w-none leading-relaxed">
                        {!! $services->description !!}
                    </div>

                    @if($services->features && count($services->features) > 0)
                        <div class="bg-alt dark:bg-slate-900 rounded-xl p-6 sm:p-8">
                            <h3 class="font-heading text-xl font-bold text-navy-950 dark:text-white mb-5">@lang('translate.key_features')</h3>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @foreach($services->features as $feature)
                                    <li class="flex items-start gap-3 text-sm text-slate-600 dark:text-slate-300">
                                        <svg class="w-5 h-5 text-sky-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        {{ $feature }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('home.quote-requests.index') }}?service={{ $services->id }}" class="btn-primary">
                            @lang('translate.get_quote')
                            <svg class="w-4 h-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0-5 5m5-5H6"/></svg>
                        </a>
                        <a href="{{ route('home.contacts.index') }}" class="inline-flex items-center gap-2 bg-transparent text-navy-900 dark:text-white border-2 border-slate-200 dark:border-slate-700 rounded-lg px-5 py-3 text-sm font-semibold hover:border-sky-700 hover:text-sky-700 dark:hover:text-sky-300 transition-all">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106a1.125 1.125 0 0 0-1.173.417l-.97 1.293a1.125 1.125 0 0 1-1.21.38 12.035 12.035 0 0 1-7.143-7.143 1.125 1.125 0 0 1 .38-1.21l1.293-.97c.363-.272.527-.74.417-1.173L6.963 3.102A1.125 1.125 0 0 0 5.872 2.25H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
                            @lang('translate.contact_us')
                        </a>
                    </div>
                </div>

                <div class="space-y-8">
                    <div class="card p-6">
                        <h4 class="font-heading text-base font-bold text-navy-950 dark:text-white mb-4 pb-3 border-b border-slate-200 dark:border-slate-700">@lang('translate.AllServices')</h4>
                        <ul class="space-y-0">
                            @foreach($allservices as $item)
                                <li class="py-2.5 border-b border-slate-100 dark:border-slate-800 last:border-0">
                                    <a href="{{ route('home.services.show', ['id' => $item->id]) }}" class="flex items-center gap-3 text-sm text-slate-600 dark:text-slate-300 hover:text-sky-700 dark:hover:text-sky-300 transition-colors {{ $item->id == $services->id ? 'text-sky-700 font-semibold' : '' }}">
                                        @if($item->icon)
                                            <i class="{{ $item->icon }} text-sky-600 w-4 text-center"></i>
                                        @else
                                            <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                        @endif
                                        {{ $item->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card p-6">
                        <h4 class="font-heading text-base font-bold text-navy-950 dark:text-white mb-4">@lang('translate.get_quote')</h4>
                        <p class="text-sm text-slate-600 dark:text-slate-300 mb-4">@lang('translate.lead_desc')</p>
                        <form id="serviceSideQuoteForm" method="post" action="{{ route('home.quote-requests.store') }}">
                            @csrf
                            <div class="sr-only" aria-hidden="true">
                                <label for="sq_company_website">Company website</label>
                                <input id="sq_company_website" type="text" name="company_website" tabindex="-1" autocomplete="off">
                            </div>
                            <input type="hidden" name="service_id" value="{{ $services->id }}">
                            <div class="space-y-3">
                                <input type="text" name="contact_person" class="form-input text-sm" placeholder="@lang('translate.full_name') *" required>
                                <input type="text" name="company_name" class="form-input text-sm" placeholder="@lang('translate.company_name')">
                                <input type="tel" name="phone" class="form-input text-sm" placeholder="@lang('translate.phone') *" required>
                                <textarea name="message" class="form-input text-sm" rows="3" placeholder="@lang('translate.your_message') *" required></textarea>
                            </div>
                            <div id="serviceSideQuoteSuccess" class="mt-3 hidden rounded-md border border-emerald-200 bg-emerald-50 p-3 text-sm font-semibold text-emerald-800">
                                @lang('translate.msg_sent')
                            </div>
                            <button type="submit" class="btn-primary mt-3 w-full justify-center text-sm">
                                @lang('translate.inquire')
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($testimonials->count() > 0)
        <section class="bg-alt dark:bg-slate-900 py-16 sm:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-3xl text-center">
                    <span class="section-tag justify-center before:hidden">@lang('translate.testimonials')</span>
                    <h2 class="section-title text-navy-950 dark:text-white">@lang('translate.what_clients_say')</h2>
                </div>
                <div class="testimonials-carousel owl-carousel mt-10 max-w-3xl mx-auto">
                    @foreach($testimonials as $t)
                        <div class="card p-6 sm:p-8 mx-2">
                            <div class="flex items-center gap-4 mb-4">
                                <span class="w-14 h-14 rounded-full bg-sky-100 dark:bg-sky-500/10 flex items-center justify-center text-sky-700 dark:text-sky-300 shrink-0">
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

    @if($faqs->count() > 0)
        <section class="bg-surface dark:bg-slate-950 py-16 sm:py-24">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <span class="section-tag">@lang('translate.faq')</span>
                    <h2 class="section-title text-navy-950 dark:text-white">@lang('translate.frequently_asked')</h2>
                </div>
                <div class="space-y-3">
                    @foreach($faqs as $faq)
                        <div class="faq-item card p-0 overflow-hidden">
                            <button class="faq-toggle w-full flex items-center justify-between p-5 text-start" aria-expanded="false">
                                <span class="font-heading font-bold text-sm text-navy-950 dark:text-white">{{ $faq->question }}</span>
                                <svg class="faq-chevron w-4 h-4 text-slate-400 shrink-0 ml-4 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div class="faq-answer hidden px-5 pb-5">
                                <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed">{{ $faq->answer }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="bg-slate-950 py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <span class="section-tag text-sky-200 before:bg-gold-500">@lang('translate.get_in_touch')</span>
                <h2 class="section-title text-white">@lang('translate.ready_start')</h2>
                <p class="mt-4 text-base leading-8 text-slate-300">@lang('translate.lead_desc')</p>
            </div>

            <div class="mt-10 max-w-2xl mx-auto">
                <div class="glass-panel rounded-lg p-6 sm:p-8">
                    <form id="serviceBottomQuoteForm" method="post" action="{{ route('home.quote-requests.store') }}">
                        @csrf
                        <div class="sr-only" aria-hidden="true">
                            <label for="sbq_company_website">Company website</label>
                            <input id="sbq_company_website" type="text" name="company_website" tabindex="-1" autocomplete="off">
                        </div>
                        <input type="hidden" name="service_id" value="{{ $services->id }}">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">@lang('translate.service_needed') *</label>
                                <select name="service_id" class="form-input" required>
                                    <option value="{{ $services->id }}" selected>{{ $services->title }}</option>
                                    @foreach($allservices as $item)
                                        @if($item->id != $services->id)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">@lang('translate.company_name')</label>
                                <input type="text" name="company_name" class="form-input" placeholder="@lang('translate.your_company')">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">@lang('translate.phone_whatsapp') *</label>
                                <input type="tel" name="phone" class="form-input" placeholder="@lang('translate.phone_example')" required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">@lang('translate.full_name') *</label>
                                <input type="text" name="contact_person" class="form-input" placeholder="@lang('translate.your_name')" required>
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">@lang('translate.your_message')</label>
                                <textarea name="message" class="form-input" rows="4" placeholder="@lang('translate.message_placeholder')"></textarea>
                            </div>
                        </div>
                        <div id="serviceBottomQuoteSuccess" class="mt-4 hidden rounded-md border border-emerald-200 bg-emerald-50 p-4 text-sm font-semibold text-emerald-800">
                            @lang('translate.msg_sent')
                        </div>
                        <button type="submit" class="btn-primary mt-4 w-full justify-center py-3.5">
                            @lang('translate.send_request')
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
    document.querySelectorAll('[id$=QuoteForm]').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            var btn = form.querySelector('button[type="submit"]');
            var success = form.querySelector('[id$=QuoteSuccess]');
            btn.disabled = true;
            btn.innerHTML = '@lang("translate.sending")...';
            success.classList.add('hidden');
            fetch('{{ route("home.quote-requests.store") }}', {
                method: 'POST',
                body: new FormData(form),
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(function(r) { return r.json(); })
            .then(function(d) {
                form.reset();
                success.textContent = d.message || d.msg || '@lang("translate.msg_sent")';
                success.classList.remove('hidden');
            })
            .catch(function() {
                success.textContent = '@lang("translate.error_occurred")';
                success.classList.remove('hidden', 'border-emerald-200', 'bg-emerald-50', 'text-emerald-800');
                success.classList.add('border-red-200', 'bg-red-50', 'text-red-800');
            })
            .finally(function() {
                btn.disabled = false;
                btn.innerHTML = '@lang("translate.send_request") <svg class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.27 3.13A59.78 59.78 0 0 1 21.49 12 59.77 59.77 0 0 1 3.27 20.87L6 12Zm0 0h7.5"/></svg>';
            });
        });
    });
</script>
@endpush
