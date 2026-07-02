@extends('frontend.layouts.master')

@section('page_title', __('translate.get_quote'))
@section('meta_desc', __('translate.get_quote'))

@section('content')
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

    <section class="py-16 sm:py-24 bg-white dark:bg-slate-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
                <span class="section-tag">@lang('translate.get_in_touch')</span>
                <h2 class="section-title text-navy-950 dark:text-white">@lang('translate.get_quote')</h2>
                <p class="section-desc mx-auto">@lang('translate.lead_desc')</p>
            </div>

            <div class="max-w-3xl mx-auto">
                <div class="card p-6 sm:p-8">
                    <form id="quoteRequestForm" method="post" action="{{ route('home.quote-requests.store') }}">
                        @csrf
                        <div class="absolute left-[-9999px] top-auto h-px w-px overflow-hidden" aria-hidden="true">
                            <label for="quote_company_website">Company website</label>
                            <input id="quote_company_website" type="text" name="company_website" tabindex="-1" autocomplete="off">
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <input type="text" name="contact_person" class="form-input" placeholder="@lang('translate.full_name') *" required>
                            </div>
                            <div>
                                <input type="text" name="company_name" class="form-input" placeholder="@lang('translate.company_name')">
                            </div>
                            <div>
                                <input type="email" name="email" class="form-input" placeholder="@lang('translate.email') *" required>
                            </div>
                            <div>
                                <input type="text" name="phone" class="form-input" placeholder="@lang('translate.phone') *" required>
                            </div>
                            @if($services && $services->count() > 0)
                                <div>
                                    <select name="service_id" class="form-input">
                                        <option value="">@lang('translate.select_service')</option>
                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            @if($products && $products->count() > 0)
                                <div>
                                    <select name="product_id" class="form-input">
                                        <option value="">@lang('translate.select_product')</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="sm:col-span-2">
                                <textarea name="message" class="form-input" rows="5" placeholder="@lang('translate.your_message') *" required></textarea>
                            </div>
                        </div>
                        <div id="quoteSuccess" class="mt-4 hidden rounded-md border border-emerald-200 bg-emerald-50 p-4 text-sm font-semibold text-emerald-800">
                            @lang('translate.msg_sent')
                        </div>
                        <button type="submit" class="btn-primary mt-4">
                            @lang('translate.inquire')
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.27 3.13A59.78 59.78 0 0 1 21.49 12 59.77 59.77 0 0 1 3.27 20.87L6 12Zm0 0h7.5"/></svg>
                        </button>
                    </form>
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
            form.reset();
            success.textContent = d.message || d.msg || '@lang("translate.msg_sent")';
            success.classList.remove('hidden');
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ event: 'quote_request_submit', form_name: 'quote_request' });
        })
        .catch(function() {
            success.textContent = '@lang("translate.error_occurred")';
            success.classList.remove('hidden', 'border-emerald-200', 'bg-emerald-50', 'text-emerald-800');
            success.classList.add('border-red-200', 'bg-red-50', 'text-red-800');
        })
        .finally(function() { btn.disabled = false; btn.innerHTML = '@lang("translate.inquire") <svg class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.27 3.13A59.78 59.78 0 0 1 21.49 12 59.77 59.77 0 0 1 3.27 20.87L6 12Zm0 0h7.5"/></svg>'; });
    });
</script>
@endpush
