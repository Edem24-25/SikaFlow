<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SikaFlow — Gérez vos prêts et abonnements sans stress')</title>
    <meta name="description" content="SikaFlow centralise vos prêts et abonnements, automatise vos paiements Mobile Money et bancaires, et vous alerte avant chaque échéance.">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: { display: ['Sora','system-ui'], body: ['Manrope','system-ui'] },
            colors: {
              sika: {
                50: '#eefbf5', 100: '#d5f4e6', 200: '#a9e8cc', 300: '#72d6ab',
                400: '#3ebd88', 500: '#1ba36b', 600: '#128456', 700: '#106847',
                800: '#0f533a', 900: '#0d4531',
              },
              night: { 900:'#0b1220', 800:'#0f1830', 700:'#152040' },
              gold:  { 400:'#f5c460', 500:'#e8a93b' },
            },
            boxShadow: { soft:'0 10px 30px -12px rgba(15, 30, 60, 0.15)' },
          }
        }
      }
    </script>
    <style>body{font-family:'Manrope',system-ui;} h1,h2,h3,h4{font-family:'Sora',system-ui;}</style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">
    @include('layouts.nav')

    <main class="flex-1">
        @if(session('success'))
            <div class="max-w-6xl mx-auto mt-4 px-4">
                <div class="rounded-lg border border-sika-200 bg-sika-50 text-sika-800 px-4 py-3">{{ session('success') }}</div>
            </div>
        @endif
        @if($errors->any())
            <div class="max-w-6xl mx-auto mt-4 px-4">
                <div class="rounded-lg border border-rose-200 bg-rose-50 text-rose-800 px-4 py-3">
                    <ul class="list-disc list-inside text-sm">
                        @foreach($errors->all() as $err)<li>{{ $err }}</li>@endforeach
                    </ul>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    @include('layouts.footer')
</body>
</html>
