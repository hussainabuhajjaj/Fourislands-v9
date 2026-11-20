<footer class="bg-navy-900 dark:bg-navy-950 relative">
    <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-gold-500 via-brand-blue to-gold-500"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-12">
            <div class="lg:col-span-4">
                <h5 class="font-heading text-white text-lg mb-4 pb-3 border-b border-gold-500/25">@lang('translate.about_us')</h5>
                <p class="text-white/70 text-sm leading-relaxed">@lang('translate.footer_desc')</p>
                @php
                    $isAr = app()->getLocale() === 'ar';
                    $socialLinks = [
                        'facebook'  => ['fab fa-facebook-f', $isAr ? 'فيسبوك' : 'Facebook'],
                        'twitter'   => ['fab fa-twitter', $isAr ? 'تويتر' : 'Twitter'],
                        'instagram' => ['fab fa-instagram', $isAr ? 'إنستغرام' : 'Instagram'],
                        'linkedin'  => ['fab fa-linkedin-in', $isAr ? 'لينكد إن' : 'LinkedIn'],
                    ];
                    $normalizeSocialUrl = function ($url) {
                        $url = trim((string) $url);
                        if ($url === '') return '#';
                        return preg_match('#^https?://#i', $url) ? $url : 'https://' . ltrim($url, '/');
                    };
                @endphp
                <div class="flex gap-2 mt-4">
                    @foreach($socialLinks as $key => $social)
                        @if(getSetting($key))
                        <a href="{{ $normalizeSocialUrl(getSetting($key)) }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $social[1] }}" title="{{ $social[1] }}" class="w-9 h-9 flex items-center justify-center rounded-lg bg-white/10 text-white/70 text-sm hover:bg-gold-500 hover:text-navy-900 transition-all hover:-translate-y-0.5"><i class="{{ $social[0] }}" aria-hidden="true"></i></a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="lg:col-span-3 md:col-span-1">
                <h5 class="font-heading text-white text-lg mb-4 pb-3 border-b border-gold-500/25">@lang('translate.quick_links')</h5>
                <ul class="space-y-2.5">
                    <li><a href="{{ route('home.home') }}" class="text-white/70 text-sm hover:text-gold-500 transition-colors">@lang('translate.home')</a></li>
                    <li><a href="{{ route('home.home') }}/about" class="text-white/70 text-sm hover:text-gold-500 transition-colors">@lang('translate.about')</a></li>
                    <li><a href="{{ route('home.services.index') }}" class="text-white/70 text-sm hover:text-gold-500 transition-colors">@lang('translate.services')</a></li>
                    <li><a href="{{ route('home.products.index') }}" class="text-white/70 text-sm hover:text-gold-500 transition-colors">@lang('translate.products')</a></li>
                    <li><a href="{{ route('home.blog.index') }}" class="text-white/70 text-sm hover:text-gold-500 transition-colors">@lang('translate.blog')</a></li>
                    <li><a href="{{ route('home.faq') }}" class="text-white/70 text-sm hover:text-gold-500 transition-colors">@lang('translate.faq')</a></li>
                    <li><a href="{{ route('home.contacts.index') }}" class="text-white/70 text-sm hover:text-gold-500 transition-colors">@lang('translate.contact')</a></li>
                </ul>
            </div>
            <div class="lg:col-span-5 md:col-span-1">
                <h5 class="font-heading text-white text-lg mb-4 pb-3 border-b border-gold-500/25">@lang('translate.newsletter_title')</h5>
                <p class="text-white/70 text-sm leading-relaxed mb-4">@lang('translate.newsletter_desc')</p>
                <form id="footerNewsletterForm" class="flex gap-2 mb-6">
                    @csrf
                    <input type="email" name="email" class="form-input flex-1 text-sm px-3 py-2 rounded-md border-0 bg-white/10 text-white placeholder:text-white/70 focus:ring-2 focus:ring-gold-500" placeholder="@lang('translate.newsletter_placeholder')" required>
                    <button type="submit" class="bg-gold-500 hover:bg-gold-600 text-navy-900 font-bold px-4 py-2 rounded-md text-sm transition-all whitespace-nowrap">@lang('translate.subscribe')</button>
                </form>
                <div id="newsletterMsg" class="text-sm mt-2 hidden"></div>

                <h5 class="font-heading text-white text-lg mb-4 pb-3 border-b border-gold-500/25 mt-8">@lang('translate.contact_us')</h5>
                <div class="space-y-3.5">
                    <div class="flex gap-3">
                        <i class="fas fa-phone text-gold-500 text-base mt-1 w-4 shrink-0"></i>
                        <p class="text-white/70 text-sm">{{ getSetting('phone') ?: '+965 123 456 789' }}</p>
                    </div>
                    <div class="flex gap-3">
                        <i class="fas fa-envelope text-gold-500 text-base mt-1 w-4 shrink-0"></i>
                        <p class="text-white/70 text-sm">{{ getSetting('email') ?: 'info@fourislands.com' }}</p>
                    </div>
                    <div class="flex gap-3">
                        <i class="fas fa-map-marker-alt text-gold-500 text-base mt-1 w-4 shrink-0"></i>
                        <p class="text-white/70 text-sm">{{ getSetting('address') ?: 'Kuwait - Qibla' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="border-t border-white/5 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-2">
            <p class="text-white/60 text-xs">&copy; {{ date('Y') }} Four Islands EST. @lang('translate.all_rights')</p>
            <p class="text-white/60 text-xs"><a href="#" class="hover:text-gold-500 transition-colors">@lang('translate.privacy_policy')</a></p>
        </div>
    </div>
</footer>

@push('front_js')
<script>
    document.getElementById('footerNewsletterForm')?.addEventListener('submit', function(e) {
        e.preventDefault();
        var form = this, btn = form.querySelector('button[type="submit"]'), msg = document.getElementById('newsletterMsg');
        btn.disabled = true; btn.textContent = '...';
        msg.classList.add('hidden');
        fetch('{{ route("newsletter.subscribe") }}', {
            method: 'POST', body: new FormData(form),
            headers: { 'X-Requested-With': 'XMLHttpRequest', 'X-CSRF-TOKEN': form.querySelector('[name=_token]').value }
        })
        .then(function(r) { return r.json(); })
        .then(function(d) {
            msg.classList.remove('hidden', 'text-red-400', 'text-green-400');
            msg.classList.add(d.status ? 'text-green-400' : 'text-red-400');
            msg.textContent = d.message;
            if (d.status) form.querySelector('input[name=email]').value = '';
        })
        .catch(function() {
            msg.classList.remove('hidden', 'text-green-400');
            msg.classList.add('text-red-400');
            msg.textContent = 'An error occurred. Please try again.';
        })
        .finally(function() { btn.disabled = false; btn.textContent = '@lang("translate.subscribe")'; });
    });
</script>
@endpush
