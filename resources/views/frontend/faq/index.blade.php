@extends('frontend.layouts.master')

@section('page_title', __('translate.faq'))
@section('meta_desc', __('translate.faq_desc'))

@push('front_css')
<style>
.faq-item {
    transition: box-shadow 0.3s ease, border-color 0.3s ease;
}
.faq-item.is-open {
    border-color: rgb(3 105 161 / 0.3);
    box-shadow: 0 4px 20px -8px rgba(197, 163, 90, 0.15);
}
.faq-item.is-open .faq-toggle {
    background-color: rgb(248 250 252);
}
.dark .faq-item.is-open {
    border-color: rgba(212, 185, 120, 0.25);
    box-shadow: 0 4px 20px -8px rgba(212, 185, 120, 0.12);
}
.dark .faq-item.is-open .faq-toggle {
    background-color: rgba(255, 255, 255, 0.03);
}
.faq-answer-wrap {
    display: grid;
    grid-template-rows: 0fr;
    transition: grid-template-rows 0.35s ease;
}
.faq-answer-wrap.is-open {
    grid-template-rows: 1fr;
}
.faq-answer-inner {
    overflow: hidden;
}
.faq-search-highlight {
    background-color: rgba(197, 163, 90, 0.25);
    border-radius: 2px;
    padding: 0 1px;
}
.dark .faq-search-highlight {
    background-color: rgba(197, 163, 90, 0.35);
}
</style>
@endpush

@section('content')
    <section class="relative pt-28 sm:pt-36 pb-16 sm:pb-20 bg-cover bg-center" data-background="{{ asset('NewFront/img/1.jpg') }}">
        <div class="absolute inset-0 bg-gradient-to-br from-navy-900/90 via-navy-900/70 to-navy-900/60"></div>
        <div class="relative z-[2] max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="font-heading text-3xl sm:text-4xl font-bold text-white mb-2">@lang('translate.faq')</h1>
            <nav aria-label="breadcrumb" class="text-sm">
                <a href="{{ route('home.home') }}" class="text-white/55 hover:text-gold-500 transition-colors">@lang('translate.home')</a>
                <span class="text-white/30 mx-2">/</span>
                <span class="text-gold-500">@lang('translate.faq')</span>
            </nav>
        </div>
    </section>

    <section class="py-16 sm:py-24 bg-surface dark:bg-slate-950">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <span class="section-tag">@lang('translate.faq')</span>
                <h2 class="section-title text-navy-950 dark:text-white">@lang('translate.faq_title')</h2>
                <p class="section-desc mx-auto">@lang('translate.faq_desc')</p>
            </div>

            <div class="relative mb-8" x-data="{ query: '' }">
                <div class="relative">
                    <svg class="absolute start-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400 pointer-events-none" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd"/>
                    </svg>
                    <input
                        type="text"
                        id="faqSearch"
                        placeholder="@lang('translate.search') @lang('translate.faq')..."
                        class="form-input ps-12 pe-4 py-3.5 text-base rounded-xl border-2 border-slate-200 dark:border-slate-700 focus:border-gold-500 focus:ring-4 focus:ring-gold-500/10 bg-surface dark:bg-slate-900 transition-all"
                        autocomplete="off"
                    >
                    <button
                        id="faqSearchClear"
                        class="absolute end-3 top-1/2 -translate-y-1/2 w-6 h-6 rounded-full bg-alt dark:bg-slate-600 text-slate-600 dark:text-slate-300 hover:bg-slate-300 dark:hover:bg-slate-500 transition-colors flex items-center justify-center hidden"
                        aria-label="Clear search"
                    >
                        <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                    </button>
                </div>
                <div id="faqResultCount" class="mt-3 text-sm text-slate-600 dark:text-slate-400 text-center"></div>
            </div>

            <div id="faqList">
                @forelse($faqs as $faq)
                    <div class="card mb-4 overflow-hidden faq-item" data-question="{{ strtolower($faq->question) }}" data-answer="{{ strtolower(strip_tags($faq->answer)) }}">
                        <button class="faq-toggle w-full flex items-center justify-between p-5 sm:p-6 text-start bg-surface dark:bg-surface hover:bg-alt dark:hover:bg-slate-800/40 transition-colors cursor-pointer border-0 font-inherit" aria-expanded="false">
                            <span class="faq-question-text font-heading text-base sm:text-lg font-semibold text-navy-950 dark:text-white pr-4">{{ $faq->question }}</span>
                            <svg class="faq-chevron w-5 h-5 text-gold-700 dark:text-gold-400 shrink-0 transition-transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <div class="faq-answer-wrap border-t border-slate-200 dark:border-slate-700">
                            <div class="faq-answer-inner">
                                <div class="faq-answer px-5 sm:px-6 py-5 sm:py-6 text-slate-600 dark:text-slate-300 text-sm sm:text-base leading-relaxed">
                                    {!! $faq->answer !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-16" id="faqEmpty">
                        <i class="fas fa-question-circle text-4xl text-slate-300 dark:text-slate-600 mb-4"></i>
                        <p class="text-slate-600">@lang('translate.no_data')</p>
                    </div>
                @endforelse
            </div>

            <div id="faqNoResults" class="text-center py-16 hidden">
                <svg class="w-16 h-16 mx-auto text-slate-300 dark:text-slate-600 mb-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd"/>
                </svg>
                <p class="text-lg font-semibold text-slate-600 dark:text-slate-300 mb-2">@lang('translate.no_results')</p>
                <p class="text-sm text-slate-600 dark:text-slate-400">@lang('translate.search_min')</p>
            </div>
        </div>
    </section>
@endsection

@push('front_js')
<script>
(function() {
    var searchInput = document.getElementById('faqSearch');
    var clearBtn = document.getElementById('faqSearchClear');
    var resultCount = document.getElementById('faqResultCount');
    var items = document.querySelectorAll('.faq-item');
    var noResults = document.getElementById('faqNoResults');
    var totalCount = items.length;

    function highlightText(text, query) {
        if (!query) return text;
        var re = new RegExp('(' + query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&') + ')', 'gi');
        return text.replace(re, '<span class="faq-search-highlight">$1</span>');
    }

    function filterFaqs() {
        var query = searchInput.value.trim().toLowerCase();
        var visibleCount = 0;

        items.forEach(function(item) {
            var question = item.getAttribute('data-question') || '';
            var answer = item.getAttribute('data-answer') || '';
            var match = !query || question.includes(query) || answer.includes(query);

            item.style.display = match ? '' : 'none';
            if (match) visibleCount++;

            if (query && match) {
                var questionEl = item.querySelector('.faq-question-text');
                questionEl.innerHTML = highlightText(questionEl.textContent, searchInput.value);
            } else {
                var questionEl = item.querySelector('.faq-question-text');
                questionEl.innerHTML = questionEl.textContent;
            }
        });

        if (noResults) {
            noResults.classList.toggle('hidden', visibleCount > 0 || totalCount === 0);
        }
        if (resultCount) {
            if (query) {
                resultCount.textContent = visibleCount + ' of ' + totalCount + ' questions';
            } else {
                resultCount.textContent = totalCount + ' questions';
            }
        }
        clearBtn.classList.toggle('hidden', !query);
    }

    if (searchInput) {
        searchInput.addEventListener('input', filterFaqs);
    }
    if (clearBtn) {
        clearBtn.addEventListener('click', function() {
            searchInput.value = '';
            filterFaqs();
            searchInput.focus();
        });
    }

    resultCount.textContent = totalCount + ' questions';
})();
</script>
@endpush
