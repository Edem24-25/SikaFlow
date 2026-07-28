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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
            boxShadow: {
              soft:'0 10px 30px -12px rgba(15, 30, 60, 0.15)',
              glow:'0 0 40px -10px rgba(27, 163, 107, 0.4)',
            },
            animation: {
              'fade-up': 'fadeUp 0.7s ease-out forwards',
              'fade-in': 'fadeIn 0.6s ease-out forwards',
              'float': 'float 6s ease-in-out infinite',
              'pulse-soft': 'pulseSoft 3s ease-in-out infinite',
              'slide-down': 'slideDown 0.3s ease-out forwards',
            },
            keyframes: {
              fadeUp: {
                '0%': { opacity: '0', transform: 'translateY(24px)' },
                '100%': { opacity: '1', transform: 'translateY(0)' },
              },
              fadeIn: {
                '0%': { opacity: '0' },
                '100%': { opacity: '1' },
              },
              float: {
                '0%, 100%': { transform: 'translateY(0)' },
                '50%': { transform: 'translateY(-12px)' },
              },
              pulseSoft: {
                '0%, 100%': { opacity: '1' },
                '50%': { opacity: '0.7' },
              },
              slideDown: {
                '0%': { opacity: '0', transform: 'translateY(-8px)' },
                '100%': { opacity: '1', transform: 'translateY(0)' },
              },
            },
          }
        }
      }
    </script>
    <style>
      body { font-family: 'Manrope', system-ui; }
      h1, h2, h3, h4 { font-family: 'Sora', system-ui; }

      .reveal {
        opacity: 0;
        transform: translateY(28px);
        transition: opacity 0.7s ease-out, transform 0.7s ease-out;
      }
      .reveal.visible {
        opacity: 1;
        transform: translateY(0);
      }
      .reveal-delay-1 { transition-delay: 0.1s; }
      .reveal-delay-2 { transition-delay: 0.2s; }
      .reveal-delay-3 { transition-delay: 0.3s; }
      .reveal-delay-4 { transition-delay: 0.4s; }
      .reveal-delay-5 { transition-delay: 0.5s; }

      .hero-gradient {
        background: linear-gradient(135deg, #0b1220 0%, #0f1830 40%, #152040 100%);
      }
      .hero-glow {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        pointer-events: none;
      }

      .btn-primary {
        padding: 0.75rem 1.25rem;
        border-radius: 0.75rem;
        background: #1ba36b;
        font-weight: 600;
        box-shadow: 0 10px 30px -12px rgba(15, 30, 60, 0.15);
        transition: all 0.3s ease;
      }
      .btn-primary:hover {
        background: #3ebd88;
        transform: translateY(-2px);
        box-shadow: 0 0 40px -10px rgba(27, 163, 107, 0.4);
      }

      .card-hover {
        transition: all 0.3s ease;
      }
      .card-hover:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px -15px rgba(15, 30, 60, 0.2);
      }

      .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }

      [x-cloak] { display: none !important; }

      @media (prefers-reduced-motion: reduce) {
        .reveal, .animate-fade-up, .animate-float, .animate-pulse-soft {
          animation: none !important;
          transition: none !important;
          opacity: 1 !important;
          transform: none !important;
        }
      }
    </style>
    @stack('styles')
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">
    @include('layouts.nav')

    <main class="flex-1">
        @if(session('success'))
            <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)" class="max-w-6xl mx-auto mt-4 px-4 animate-slide-down">
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
            <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)" class="max-w-6xl mx-auto mt-4 px-4 animate-slide-down">
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

    @include('layouts.footer')

    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const reveals = document.querySelectorAll('.reveal');
        if (!reveals.length) return;

        const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              entry.target.classList.add('visible');
              observer.unobserve(entry.target);
            }
          });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        reveals.forEach(el => observer.observe(el));
      });
    </script>
    @stack('scripts')
</body>
</html>
