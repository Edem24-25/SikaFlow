<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page introuvable — SikaFlow</title>
    <meta name="robots" content="noindex">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex items-center justify-center antialiased">
    <div class="text-center px-4">
        <div class="w-20 h-20 mx-auto mb-6 rounded-3xl bg-gradient-to-br from-sika-500 to-sika-700 flex items-center justify-center text-white font-bold text-3xl shadow-glow-soft">S</div>
        <h1 class="text-7xl font-extrabold text-sika-600 mb-4">404</h1>
        <h2 class="text-2xl font-bold text-night-900 mb-3">Page introuvable</h2>
        <p class="text-slate-500 mb-8 max-w-md mx-auto">La page que vous recherchez n'existe pas ou a été déplacée. Vérifiez l'URL ou revenez à l'accueil.</p>
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-sika-600 text-white font-semibold hover:bg-sika-500 transition-all hover:-translate-y-0.5 shadow-soft">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Retour à l'accueil
        </a>
    </div>
</body>
</html>
