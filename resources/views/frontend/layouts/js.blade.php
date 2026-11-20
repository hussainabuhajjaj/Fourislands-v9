<script src="{{ asset('NewFront/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('NewFront/js/popper.min.js') }}"></script>
<script src="{{ asset('NewFront/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('NewFront/js/owl.carousel.min.js') }}"></script>
<script src="{{ mix('js/app.js') }}?v={{ filemtime(public_path('js/app.js')) }}"></script>

@stack('front_js')

<script>
(function() {
    'use strict';

    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // — Preloader
    window.addEventListener('load', function() {
        var p = document.getElementById('preloader');
        if (p) p.classList.add('opacity-0', 'pointer-events-none');
    });

    // — Scroll to top
    var scrollTop = document.getElementById('scrollTop');
    if (scrollTop) {
        window.addEventListener('scroll', function() {
            scrollTop.classList.toggle('active', window.scrollY > 400);
        });
        scrollTop.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
        });
    }

    // — Mobile menu
    var toggle = document.getElementById('mobileToggle');
    var menu = document.getElementById('mobileMenu');
    if (toggle && menu) {
        toggle.addEventListener('click', function() {
            var open = !menu.classList.contains('hidden');
            menu.classList.toggle('hidden');
            toggle.setAttribute('aria-expanded', open ? 'false' : 'true');
            var spans = toggle.querySelectorAll('span');
            if (open) {
                spans[0].style.transform = '';
                spans[1].style.opacity = '';
                spans[2].style.transform = '';
            } else {
                spans[0].style.transform = 'rotate(45deg) translateY(8px)';
                spans[1].style.opacity = '0';
                spans[2].style.transform = 'rotate(-45deg) translateY(-8px)';
            }
        });
        menu.querySelectorAll('a').forEach(function(link) {
            link.addEventListener('click', function() {
                menu.classList.add('hidden');
                toggle.classList.remove('active');
                toggle.setAttribute('aria-expanded', 'false');
                var spans = toggle.querySelectorAll('span');
                spans[0].style.transform = '';
                spans[1].style.opacity = '';
                spans[2].style.transform = '';
            });
        });
    }

    // — data-background handler
    document.querySelectorAll('[data-background]').forEach(function(el) {
        el.style.backgroundImage = 'url(' + el.getAttribute('data-background') + ')';
    });

    // — Scroll animations (IntersectionObserver)
    if (window.IntersectionObserver) {
        var animObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

        document.querySelectorAll('.scroll-fade, .scroll-fade-left, .scroll-fade-right').forEach(function(el) {
            animObserver.observe(el);
            el.classList.add('scroll-fade');
        });
    }

    // — FAQ accordion
    document.querySelectorAll('.faq-toggle').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var item = this.closest('.faq-item');
            var chevron = item.querySelector('.faq-chevron');
            var wrap = item.querySelector('.faq-answer-wrap');
            if (wrap) {
                var isOpen = wrap.classList.contains('is-open');
                wrap.classList.toggle('is-open');
                item.classList.toggle('is-open');
                chevron.classList.toggle('rotate-180');
                this.setAttribute('aria-expanded', !isOpen);
                if (!isOpen) {
                    setTimeout(function() {
                        item.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'nearest' });
                    }, 100);
                }
            } else {
                var answer = item.querySelector('.faq-answer');
                if (!answer) return;
                var isOpen = !answer.classList.contains('hidden');
                answer.classList.toggle('hidden');
                chevron.classList.toggle('rotate-180');
                this.setAttribute('aria-expanded', !isOpen);
            }
        });
    });

    // — Theme toggle
    function setTheme(theme) {
        localStorage.setItem('theme', theme);
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
        document.querySelectorAll('#sunIcon, #sunIconM, #moonIcon, #moonIconM').forEach(function(el) {
            var isSun = el.id === 'sunIcon' || el.id === 'sunIconM';
            el.classList.toggle('hidden', theme === 'dark' ? isSun : !isSun);
        });
        document.querySelectorAll('#themeToggle, #themeToggleMobile').forEach(function(btn) {
            btn.setAttribute('aria-pressed', theme === 'dark' ? 'true' : 'false');
        });
    }
    var currentTheme = localStorage.getItem('theme') || (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
    setTheme(currentTheme);
    document.querySelectorAll('#themeToggle, #themeToggleMobile').forEach(function(btn) {
        btn.addEventListener('click', function() {
            setTheme(document.documentElement.classList.contains('dark') ? 'light' : 'dark');
        });
    });

    // — Cookie consent
    if (!localStorage.getItem('cookie_consent')) {
        var bar = document.createElement('div');
        bar.className = 'cookie-bar';
        bar.innerHTML = '<div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-3">' +
            '<p class="text-white/70 text-sm text-center sm:text-start">@lang("translate.cookie_desc")</p>' +
            '<div class="flex gap-2 shrink-0">' +
                '<button id="cookieAccept" class="bg-gold-500 text-navy-900 rounded-lg px-5 py-2 text-sm font-semibold hover:bg-gold-400 transition-colors cursor-pointer border-0">@lang("translate.cookie_accept")</button>' +
            '</div>' +
        '</div>';
        document.body.appendChild(bar);
        setTimeout(function() { bar.classList.add('show'); }, 300);
        document.getElementById('cookieAccept').addEventListener('click', function() {
            localStorage.setItem('cookie_consent', 'true');
            bar.classList.remove('show');
            setTimeout(function() { bar.remove(); }, 400);
        });
    }

    // — Owl Carousels
    if (typeof $ !== 'undefined') {
        $('.slider-fade .owl-carousel').owlCarousel({
            items: 1, loop: true, dots: false, margin: 0,
            autoplay: !reduceMotion, smartSpeed: 600, animateOut: 'fadeOut',
            nav: true, rtl: {{ app()->getLocale() == 'ar' ? 'true' : 'false' }},
            navText: [
                '<i class="fas fa-chevron-left" aria-hidden="true"></i>',
                '<i class="fas fa-chevron-right" aria-hidden="true"></i>'
            ]
        }).find('.owl-nav button').attr('aria-label', function() {
            return $(this).hasClass('owl-prev') ? '{{ app()->getLocale() == 'ar' ? 'الشريحة السابقة' : 'Previous slide' }}' : '{{ app()->getLocale() == 'ar' ? 'الشريحة التالية' : 'Next slide' }}';
        });
        $('.testimonials-carousel').owlCarousel({
            loop: true, margin: 20, mouseDrag: true, autoplay: !reduceMotion,
            dots: true, nav: false, items: 1,
            rtl: {{ app()->getLocale() == 'ar' ? 'true' : 'false' }},
            responsive: {
                0: { items: 1 },
                768: { items: 1 }
            }
        });
        $('.clients-carousel').owlCarousel({
            loop: true, margin: 30, mouseDrag: true, autoplay: !reduceMotion,
            dots: false, nav: false,
            rtl: {{ app()->getLocale() == 'ar' ? 'true' : 'false' }},
            responsive: {
                0: { margin: 10, items: 2 },
                600: { items: 3 },
                1000: { items: 5 }
            }
        });
    }
})();
</script>
