<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merci — SikaFlow</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex items-center justify-center antialiased">
    <div class="text-center px-4 max-w-md mx-auto">
        <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-emerald-100 flex items-center justify-center">
            <svg class="w-10 h-10 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        </div>
        <h1 class="text-3xl font-bold text-night-900 mb-3">Merci !</h1>
        <p class="text-slate-500 mb-8 leading-relaxed">{{ $message ?? 'Votre message a bien été envoyé. Nous vous répondrons très bientôt.' }}</p>
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-sika-600 text-white font-semibold hover:bg-sika-500 transition-all hover:-translate-y-0.5 shadow-soft">
            Retour à l'accueil
        </a>
    </div>
</body>
</html>
