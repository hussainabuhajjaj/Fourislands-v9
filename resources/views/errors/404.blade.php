@php
    $isArabic = app()->getLocale() === 'ar';
    $localeSegment = request()->segment(1);
    if (in_array($localeSegment, ['ar', 'en'], true)) {
        $isArabic = $localeSegment === 'ar';
        app()->setLocale($localeSegment);
    }
@endphp
<!DOCTYPE html>
<html lang="{{ $isArabic ? 'ar' : 'en' }}" @if($isArabic) dir="rtl" @endif>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - @lang('translate.fourislands')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @if($isArabic)
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
    @else
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    @endif
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: { 900: '#0F172A', 800: '#1E293B', 600: '#475569', 300: '#94A3B8', 50: '#F1F5F9' },
                        gold: { 500: '#C5A35A', 400: '#D4B978' },
                        brand: { blue: '#2563EB', 'blue-hover': '#1D4ED8' },
                    },
                    fontFamily: { heading: ['{{ $isArabic ? 'Tajawal' : 'Playfair Display' }}', '{{ $isArabic ? 'sans-serif' : 'serif' }}'], body: ['{{ $isArabic ? 'Tajawal' : 'Inter' }}', 'sans-serif'] },
                }
            }
        }
    </script>
    <style>
        body { font-family: '{{ $isArabic ? 'Tajawal' : 'Inter' }}', sans-serif; -webkit-font-smoothing: antialiased; }
        @if($isArabic)
        h1, h2, h3, h4, h5, h6 { font-family: 'Tajawal', sans-serif; }
        @endif
    </style>
</head>
<body class="bg-navy-900 min-h-screen flex items-center justify-center p-6">
    <div class="text-center max-w-lg">
        <div class="font-heading text-8xl sm:text-9xl font-bold text-gold-500 mb-4">404</div>
        <h1 class="font-heading text-2xl sm:text-3xl font-bold text-white mb-3">@lang('translate.page_not_found', ['default' => 'Page Not Found'])</h1>
        <p class="text-navy-300 text-base mb-8 leading-relaxed">@lang('translate.page_not_found_desc', ['default' => 'The page you are looking for does not exist or has been moved.'])</p>
        <a href="{{ url('/') }}" class="inline-flex items-center gap-2 bg-brand-blue text-white rounded-lg px-8 py-3.5 text-sm font-semibold hover:bg-brand-blue-hover transition-all">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            @lang('translate.back_home', ['default' => 'Back to Home'])
        </a>
    </div>
</body>
</html>
