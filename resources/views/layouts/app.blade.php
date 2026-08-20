<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SikaFlow — Gérez vos prêts et abonnements sans stress')</title>
    <meta name="description" content="@yield('meta_description', 'SikaFlow centralise vos prêts et abonnements, automatise vos paiements Mobile Money et bancaires, et vous alerte avant chaque échéance.')">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'SikaFlow — Gérez vos prêts et abonnements sans stress')">
    <meta property="og:description" content="@yield('meta_description', 'SikaFlow centralise vos prêts et abonnements, automatise vos paiements Mobile Money et bancaires, et vous alerte avant chaque échéance.')">
    <meta property="og:image" content="@yield('og_image', asset('og-default.png'))">
    <meta property="og:site_name" content="SikaFlow">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'SikaFlow — Gérez vos prêts et abonnements sans stress')">
    <meta name="twitter:description" content="@yield('meta_description', 'SikaFlow centralise vos prêts et abonnements, automatise vos paiements Mobile Money et bancaires, et vous alerte avant chaque échéance.')">
    <meta name="twitter:image" content="@yield('og_image', asset('og-default.png'))">

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    @if(env('GOOGLE_ANALYTICS_ID'))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_ANALYTICS_ID') }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ env('GOOGLE_ANALYTICS_ID') }}');
    </script>
    @endif
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col antialiased">
    @include('layouts.nav')

    <main class="flex-1 pt-16 lg:pt-[4.5rem]">
        @if(session('success'))
            <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)" class="max-w-6xl mx-auto mt-4 px-4 animate-fade-down z-40">
                <div class="flex items-center gap-3 rounded-xl border border-sika-200 bg-sika-50 text-sika-800 px-4 py-3 shadow-soft">
                    <svg class="w-5 h-5 shrink-0 text-sika-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="text-sm font-medium flex-1">{{ session('success') }}</span>
                    <button @click="show = false" class="shrink-0 text-sika-600/60 hover:text-sika-700 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        @endif
        @if(session('error'))
            <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)" class="max-w-6xl mx-auto mt-4 px-4 animate-fade-down z-40">
                <div class="flex items-center gap-3 rounded-xl border border-rose-200 bg-rose-50 text-rose-800 px-4 py-3 shadow-soft">
                    <svg class="w-5 h-5 shrink-0 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="text-sm font-medium flex-1">{{ session('error') }}</span>
                    <button @click="show = false" class="shrink-0 text-rose-600/60 hover:text-rose-700 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        @endif
        @yield('content')
    </main>

    {{-- Sticky CTA mobile --}}
    @guest
    <div class="fixed bottom-0 inset-x-0 z-40 md:hidden bg-white/90 backdrop-blur-xl border-t border-slate-200 p-3 safe-area-bottom">
      <a href="{{ route('register') }}" class="block w-full text-center py-3.5 rounded-full bg-sika-600 text-white font-bold shadow-glow-soft hover:bg-sika-500 transition-colors">
        Créer un compte gratuitement
      </a>
    </div>
    @endguest

    @include('layouts.footer')
    @stack('scripts')
</body>
</html>
