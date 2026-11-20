@extends('frontend.layouts.master')

@section('page_title', __('translate.get_quote'))
@section('meta_desc', __('translate.get_quote_desc'))

@section('content')
    @php
        $selectedService = request()->get('service');
    @endphp

    <section class="relative pt-28 sm:pt-36 pb-16 sm:pb-20 bg-cover bg-center" data-background="{{ asset('NewFront/img/1.jpg') }}">
        <div class="absolute inset-0 bg-gradient-to-br from-navy-900/90 via-navy-900/70 to-navy-900/60"></div>
        <div class="relative z-[2] max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-3xl sm:text-4xl font-bold text-white mb-2">@lang('translate.get_quote')</h1>
            <nav aria-label="breadcrumb" class="text-sm">
                <a href="{{ route('home.home') }}" class="text-white/55 hover:text-gold-500 transition-colors">@lang('translate.home')</a>
                <span class="text-white/30 mx-2">/</span>
                <span class="text-gold-500">@lang('translate.get_quote')</span>
            </nav>
        </div>
    </section>

    <section class="py-16 sm:py-24 bg-surface dark:bg-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
                <span class="section-tag">@lang('translate.get_in_touch')</span>
                <h2 class="section-title text-navy-950 dark:text-white">@lang('translate.get_quote')</h2>
                <p class="section-desc mx-auto">@lang('translate.lead_desc')</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-5 gap-10 max-w-5xl mx-auto">
                <div class="lg:col-span-3">
                    <div class="card p-6 sm:p-8">
                        <form id="quoteRequestForm" method="post" action="{{ route('home.quote-requests.store') }}">
                            @csrf
                            <input type="hidden" name="_form_token" value="{{ encrypt(['time' => now()->timestamp, 'form' => 'quote-request']) }}">
                            <div class="sr-only" aria-hidden="true">
                                <label for="quote_company_website">Company website</label>
                                <input id="quote_company_website" type="text" name="company_website" tabindex="-1" autocomplete="off">
                            </div>
                            <div class="sr-only" aria-hidden="true">
                                <label for="quote_fax_number">Fax number</label>
                                <input id="quote_fax_number" type="text" name="fax_number" tabindex="-1" autocomplete="off">
                            </div>

                            <div class="space-y-6">
                                <div class="pb-4 border-b border-slate-200 dark:border-slate-700">
                                    <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-sky-700 text-white text-xs font-bold shrink-0">1</span>
                                    <span class="ml-2 text-sm font-bold text-navy-950 dark:text-white uppercase tracking-wider">@lang('translate.service_needed')</span>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <select name="service_id" class="form-input">
                                            <option value="">@lang('translate.select_service')</option>
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}" {{ $selectedService == $service->id ? 'selected' : '' }}>{{ $service->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <select name="product_id" class="form-input">
                                            <option value="">@lang('translate.select_product')</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="pb-4 border-b border-slate-200 dark:border-slate-700">
                                    <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-sky-700 text-white text-xs font-bold shrink-0">2</span>
                                    <span class="ml-2 text-sm font-bold text-navy-950 dark:text-white uppercase tracking-wider">@lang('translate.company_details')</span>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <input type="text" name="company_name" class="form-input" placeholder="@lang('translate.company_name')">
                                    </div>
                                    <div>
                                        <input type="text" name="contact_person" class="form-input" placeholder="@lang('translate.full_name') *" required>
                                    </div>
                                </div>

                                <div class="pb-4 border-b border-slate-200 dark:border-slate-700">
                                    <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-sky-700 text-white text-xs font-bold shrink-0">3</span>
                                    <span class="ml-2 text-sm font-bold text-navy-950 dark:text-white uppercase tracking-wider">@lang('translate.contact_info')</span>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <input type="tel" name="phone" class="form-input" placeholder="@lang('translate.phone_whatsapp') *" required>
                                    </div>
                                    <div>
                                        <input type="email" name="email" class="form-input" placeholder="@lang('translate.email') *" required>
                                    </div>
                                </div>

                                <div class="pb-4 border-b border-slate-200 dark:border-slate-700">
                                    <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-sky-700 text-white text-xs font-bold shrink-0">4</span>
                                    <span class="ml-2 text-sm font-bold text-navy-950 dark:text-white uppercase tracking-wider">@lang('translate.your_message')</span>
                                </div>
                                <div>
                                    <textarea name="message" class="form-input" rows="4" placeholder="@lang('translate.message_placeholder')" required></textarea>
                                </div>
                            </div>

                            <div id="quoteSuccess" class="mt-4 hidden rounded-md border border-emerald-200 bg-emerald-50 p-4 text-sm font-semibold text-emerald-800">
                                @lang('translate.msg_sent')
                            </div>

                            <button type="submit" class="btn-primary mt-6 w-full justify-center py-3.5 text-base">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.27 3.13A59.78 59.78 0 0 1 21.49 12 59.77 59.77 0 0 1 3.27 20.87L6 12Zm0 0h7.5"/></svg>
                                @lang('translate.send_request')
                            </button>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-6">
                    <div class="card p-6">
                        <h4 class="font-heading text-base font-bold text-navy-950 dark:text-white mb-4">@lang('translate.why_choose_us')</h4>
                        <ul class="space-y-4">
                            <li class="flex gap-3">
                                <span class="w-8 h-8 rounded-full bg-sky-100 dark:bg-sky-500/10 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4 text-sky-700 dark:text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </span>
                                <div>
                                    <h5 class="text-sm font-bold text-navy-950 dark:text-white">@lang('translate.est_since')</h5>
                                    <p class="text-xs text-slate-600 mt-0.5">@lang('translate.est_since_desc')</p>
                                </div>
                            </li>
                            <li class="flex gap-3">
                                <span class="w-8 h-8 rounded-full bg-sky-100 dark:bg-sky-500/10 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4 text-sky-700 dark:text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </span>
                                <div>
                                    <h5 class="text-sm font-bold text-navy-950 dark:text-white">@lang('translate.global_reach')</h5>
                                    <p class="text-xs text-slate-600 mt-0.5">@lang('translate.global_reach_desc')</p>
                                </div>
                            </li>
                            <li class="flex gap-3">
                                <span class="w-8 h-8 rounded-full bg-sky-100 dark:bg-sky-500/10 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4 text-sky-700 dark:text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </span>
                                <div>
                                    <h5 class="text-sm font-bold text-navy-950 dark:text-white">@lang('translate.fast_response')</h5>
                                    <p class="text-xs text-slate-600 mt-0.5">@lang('translate.fast_response_desc')</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="card p-6">
                        <h4 class="font-heading text-base font-bold text-navy-950 dark:text-white mb-4">@lang('translate.or_call_us')</h4>
                        @php
                            $phone = getSetting('phone') ?: '+965 2225 5565';
                            $whatsapp = getSetting('whatsapp') ?: $phone;
                            $waNumber = preg_replace('/[^0-9]/', '', $whatsapp);
                        @endphp
                        <div class="space-y-3">
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}"
                               class="flex items-center gap-3 p-3 rounded-lg bg-alt dark:bg-slate-800 no-underline hover:bg-sky-50 dark:hover:bg-sky-500/10 transition-colors">
                                <span class="w-9 h-9 rounded-full bg-sky-100 dark:bg-sky-500/10 flex items-center justify-center text-sky-700 dark:text-sky-300">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106a1.125 1.125 0 0 0-1.173.417l-.97 1.293a1.125 1.125 0 0 1-1.21.38 12.035 12.035 0 0 1-7.143-7.143 1.125 1.125 0 0 1 .38-1.21l1.293-.97c.363-.272.527-.74.417-1.173L6.963 3.102A1.125 1.125 0 0 0 5.872 2.25H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
                                </span>
                                <div>
                                    <div class="text-sm font-bold text-navy-950 dark:text-white">@lang('translate.call_us')</div>
                                    <div class="text-xs text-slate-600">{{ $phone }}</div>
                                </div>
                            </a>
                            <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode(__('translate.whatsapp_quote_message')) }}&utm_source=quote_page&utm_medium=whatsapp&utm_campaign=quote_request"
                               target="_blank" rel="noopener"
                               class="flex items-center gap-3 p-3 rounded-lg bg-alt dark:bg-slate-800 no-underline hover:bg-green-50 dark:hover:bg-green-500/10 transition-colors">
                                <span class="w-9 h-9 rounded-full bg-green-100 dark:bg-green-500/10 flex items-center justify-center text-green-600">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                </span>
                                <div>
                                    <div class="text-sm font-bold text-navy-950 dark:text-white">@lang('translate.chat_whatsapp')</div>
                                    <div class="text-xs text-slate-600">@lang('translate.quick_reply')</div>
                                </div>
                            </a>
                        </div>
                    </div>

                    @php $faqs = \App\Models\Faq::active()->take(4)->get(); @endphp
                    @if($faqs->count() > 0)
                        <div class="card p-6">
                            <h4 class="font-heading text-base font-bold text-navy-950 dark:text-white mb-4">@lang('translate.frequently_asked')</h4>
                            <div class="space-y-2">
                                @foreach($faqs as $faq)
                                    <div class="faq-item border-b border-slate-100 dark:border-slate-800 last:border-0 pb-2 last:pb-0">
                                        <button class="faq-toggle w-full flex items-center justify-between py-2 text-start" aria-expanded="false">
                                            <span class="text-xs font-semibold text-navy-950 dark:text-white pr-4">{{ $faq->question }}</span>
                                            <svg class="faq-chevron w-3 h-3 text-slate-400 shrink-0 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                                        </button>
                                        <div class="faq-answer hidden pb-2">
                                            <p class="text-xs text-slate-600 leading-relaxed">{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a href="{{ route('home.faq') }}" class="block text-center text-xs font-semibold text-sky-700 dark:text-sky-300 mt-3 no-underline hover:text-sky-800 dark:hover:text-sky-200">
                                @lang('translate.view_all_faq') &rarr;
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@push('front_js')
<script>
    document.getElementById("quoteRequestForm").addEventListener("submit", function(event) {
        event.preventDefault();
        var form = this, btn = form.querySelector('button[type="submit"]'), success = document.getElementById('quoteSuccess');
        btn.disabled = true; btn.innerHTML = '@lang("translate.sending")...';
        success.classList.add('hidden');
        fetch("{{ route('home.quote-requests.store') }}", {
            method: "POST", body: new FormData(form),
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(function(r) { return r.json(); })
        .then(function(d) {
            window.location.href = "{{ route('home.thank-you') }}";
        })
        .catch(function() {
            success.textContent = '@lang("translate.error_occurred")';
            success.classList.remove('hidden', 'border-emerald-200', 'bg-emerald-50', 'text-emerald-800');
            success.classList.add('border-red-200', 'bg-red-50', 'text-red-800');
        })
        .finally(function() { btn.disabled = false; btn.innerHTML = '@lang("translate.send_request")'; });
    });
</script>
@endpush
