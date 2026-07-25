<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@lang('translate.coming_soon') - @lang('translate.fourislands')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { colors: { navy: { 900: '#0F172A', 800: '#1E293B', 600: '#475569', 300: '#94A3B8', 200: '#CBD5E1', 50: '#F1F5F9' }, gold: { 500: '#C5A35A', 400: '#D4B978' }, brand: { blue: '#2563EB', 'blue-hover': '#1D4ED8' } }, fontFamily: { heading: ['Playfair Display', 'serif'], body: ['Inter', 'sans-serif'] } } }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; -webkit-font-smoothing: antialiased; }
    </style>
</head>
<body class="bg-navy-900 min-h-screen flex items-center justify-center p-6">
    <div class="text-center max-w-lg">
        <img src="{{ asset('logo.png') }}" alt="Four Islands" class="h-12 mx-auto mb-8 opacity-90">
        <h1 class="font-heading text-3xl sm:text-4xl font-bold text-white mb-3">@lang('translate.coming_soon')</h1>
        <p class="text-navy-300 text-base mb-8 leading-relaxed">@lang('translate.site_under_maintenance', ['default' => 'Our website is currently under maintenance. We\'ll be back shortly.'])</p>
        <div class="flex justify-center gap-3">
            @if(getSetting('facebook'))
            <a href="{{ getSetting('facebook') }}" target="_blank" rel="noopener" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white/10 text-white/60 hover:bg-gold-500 hover:text-navy-900 transition-all text-sm"><i class="fab fa-facebook-f"></i></a>
            @endif
            @if(getSetting('twitter'))
            <a href="{{ getSetting('twitter') }}" target="_blank" rel="noopener" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white/10 text-white/60 hover:bg-gold-500 hover:text-navy-900 transition-all text-sm"><i class="fab fa-twitter"></i></a>
            @endif
            @if(getSetting('instagram'))
            <a href="{{ getSetting('instagram') }}" target="_blank" rel="noopener" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white/10 text-white/60 hover:bg-gold-500 hover:text-navy-900 transition-all text-sm"><i class="fab fa-instagram"></i></a>
            @endif
            @if(getSetting('linkedin'))
            <a href="{{ getSetting('linkedin') }}" target="_blank" rel="noopener" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white/10 text-white/60 hover:bg-gold-500 hover:text-navy-900 transition-all text-sm"><i class="fab fa-linkedin-in"></i></a>
            @endif
        </div>
    </div>
</body>
</html>
