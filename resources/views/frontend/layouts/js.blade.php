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

    // — Header state on scroll + scroll-to-top
    var scrollTop = document.getElementById('scrollTop');
    var navbar = document.getElementById('navbar');
    function updateScrollState() {
        var y = window.scrollY || window.pageYOffset || 0;
        if (navbar) navbar.classList.toggle('is-scrolled', y > 24);
        if (scrollTop) scrollTop.classList.toggle('active', y > 400);
    }
    updateScrollState();
    window.addEventListener('scroll', updateScrollState, { passive: true });
    if (scrollTop) {
        scrollTop.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
        });
    }

    // — Mobile menu
    var toggle = document.getElementById('mobileToggle');
    var menu = document.getElementById('mobileMenu');
    var closeBtn = document.getElementById('mobileClose');
    if (toggle && menu) {
        var focusableSelector = 'a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])';

        function menuIsOpen() {
            return !menu.classList.contains('hidden');
        }

        function setMenu(open, returnFocus) {
            if (open === menuIsOpen()) return;

            menu.classList.toggle('hidden', !open);
            document.body.classList.toggle('menu-open', open);
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');

            var spans = toggle.querySelectorAll('.mobile-toggle-line');
            Array.prototype.forEach.call(spans, function(span) {
                span.style.transform = '';
                span.style.opacity = '';
            });
            if (open) {
                Array.prototype.forEach.call(spans, function(span, index) {
                    if (index === 0) span.style.transform = 'rotate(45deg) translateY(8px)';
                    if (index === 1) span.style.opacity = '0';
                    if (index === 2) span.style.transform = 'rotate(-45deg) translateY(-8px)';
                });
            }

            if (open && closeBtn) {
                closeBtn.focus();
            } else if (!open && returnFocus !== false) {
                toggle.focus();
            }
        }

        toggle.addEventListener('click', function() {
            setMenu(!menuIsOpen());
        });

        if (closeBtn) {
            closeBtn.addEventListener('click', function() {
                setMenu(false);
            });
        }

        menu.addEventListener('click', function(event) {
            var target = event.target;
            if (target === menu || (target && target.hasAttribute && target.hasAttribute('data-menu-backdrop'))) {
                setMenu(false, false);
            }
        });

        menu.querySelectorAll('a').forEach(function(link) {
            link.addEventListener('click', function() {
                setMenu(false, false);
            });
        });

        document.addEventListener('keydown', function(event) {
            if (!menuIsOpen()) return;

            if (event.key === 'Escape' || event.keyCode === 27) {
                event.preventDefault();
                setMenu(false);
                return;
            }

            if (event.key !== 'Tab' && event.keyCode !== 9) return;

            var focusable = Array.prototype.filter.call(
                menu.querySelectorAll(focusableSelector),
                function(el) { return el.offsetParent !== null || el === document.activeElement; }
            );
            if (!focusable.length) return;

            var first = focusable[0];
            var last = focusable[focusable.length - 1];
            var active = document.activeElement;

            if (event.shiftKey && (active === first || !menu.contains(active))) {
                event.preventDefault();
                last.focus();
            } else if (!event.shiftKey && (active === last || !menu.contains(active))) {
                event.preventDefault();
                first.focus();
            }
        });

        var desktopQuery = window.matchMedia && window.matchMedia('(min-width: 1024px)');
        function closeOnDesktop(event) {
            if (event.matches && menuIsOpen()) setMenu(false, false);
        }
        if (desktopQuery) {
            if (desktopQuery.addEventListener) desktopQuery.addEventListener('change', closeOnDesktop);
            else if (desktopQuery.addListener) desktopQuery.addListener(closeOnDesktop);
        }
    }

    // — data-background handler
    document.querySelectorAll('[data-background]').forEach(function(el) {
        el.style.backgroundImage = 'url(' + el.getAttribute('data-background') + ')';
    });

    // — Scroll reveal for existing content (progressive enhancement)
    if (document.documentElement.classList.contains('js-reveal') && window.IntersectionObserver) {
        var revealSelector = [
            'main .section-tag',
            'main .section-title',
            'main .section-desc',
            'main h1',
            'main h2',
            'main .card-hover',
            'main .card',
            'main .glass-panel',
            'main .metric-tile',
            'main .feature-line',
            'main .image-frame',
            'main .faq-item',
            'main .btn',
            'main .btn-primary',
            'main .btn-outline',
            'main .btn-gold',
            'main .clients-carousel',
            'main .testimonials-carousel'
        ].join(',');

        var candidates = Array.prototype.slice.call(document.querySelectorAll(revealSelector));
        var seen = [];
        candidates.forEach(function(el) {
            if (seen.indexOf(el) === -1) seen.push(el);
        });

        // Keep only outermost matches so nested buttons/cards do not animate twice.
        var targets = seen.filter(function(el) {
            return !seen.some(function(other) { return other !== el && other.contains(el); });
        });

        var groups = [];
        targets.forEach(function(el) {
            var parent = el.parentElement;
            var group = null;
            for (var i = 0; i < groups.length; i++) {
                if (groups[i].parent === parent) { group = groups[i]; break; }
            }
            if (!group) { group = { parent: parent, items: [] }; groups.push(group); }
            group.items.push(el);
        });

        var revealObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (!entry.isIntersecting) return;
                var el = entry.target;
                el.classList.add('is-revealing');
                revealObserver.unobserve(el);
                el.addEventListener('animationend', function() {
                    el.classList.remove('reveal', 'is-revealing');
                    el.style.removeProperty('--reveal-delay');
                }, { once: true });
            });
        }, { threshold: 0.08, rootMargin: '0px 0px -32px 0px' });

        groups.forEach(function(group) {
            group.items.forEach(function(el, index) {
                el.classList.add('reveal');
                el.style.setProperty('--reveal-delay', Math.min(index, 4) * 70 + 'ms');
                revealObserver.observe(el);
            });
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
