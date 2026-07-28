@extends('layouts.app')
@section('title', 'Contact — SikaFlow')
@section('content')

{{-- Hero --}}
<section class="hero-gradient text-white py-16 sm:py-20">
  <div class="max-w-3xl mx-auto px-4 text-center">
    <h1 class="text-3xl sm:text-4xl font-bold mb-4 reveal">Contactez-nous</h1>
    <p class="text-slate-300 text-sm sm:text-base reveal reveal-delay-1">Une question, un partenariat ou un retour ? Notre équipe HODD GLOBAL est à votre écoute.</p>
  </div>
</section>

<section class="max-w-4xl mx-auto px-4 py-12 sm:py-16">
  <div class="grid md:grid-cols-2 gap-8">
    {{-- Contact info --}}
    <div class="space-y-5 reveal">
      <div class="bg-white p-6 rounded-2xl shadow-soft border border-slate-100 card-hover">
        <div class="flex items-center gap-3 mb-3">
          <div class="w-10 h-10 rounded-xl bg-sika-100 text-sika-700 flex items-center justify-center">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
          </div>
          <div>
            <div class="font-semibold">HODD GLOBAL</div>
            <div class="text-xs text-slate-400">Siège social</div>
          </div>
        </div>
        <p class="text-sm text-slate-600">Porto-Novo, Bénin</p>
      </div>

      <div class="bg-white p-6 rounded-2xl shadow-soft border border-slate-100 card-hover">
        <div class="flex items-center gap-3 mb-3">
          <div class="w-10 h-10 rounded-xl bg-sika-100 text-sika-700 flex items-center justify-center">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
          </div>
          <div>
            <div class="font-semibold">Téléphone</div>
            <a href="tel:+2290197458725" class="text-sm text-sika-700 hover:underline">01 97 45 87 25</a>
          </div>
        </div>
      </div>

      <div class="bg-white p-6 rounded-2xl shadow-soft border border-slate-100 card-hover">
        <div class="flex items-center gap-3 mb-3">
          <div class="w-10 h-10 rounded-xl bg-sika-100 text-sika-700 flex items-center justify-center">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
          </div>
          <div>
            <div class="font-semibold">E-mail</div>
            <a href="mailto:hoddglobal.contacts@gmail.com" class="text-sm text-sika-700 hover:underline break-all">hoddglobal.contacts@gmail.com</a>
          </div>
        </div>
      </div>

      <div class="bg-white p-6 rounded-2xl shadow-soft border border-slate-100 card-hover">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl bg-sika-100 text-sika-700 flex items-center justify-center">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
          </div>
          <div>
            <div class="font-semibold">Site web</div>
            <a href="https://www.hoddglobal.com" target="_blank" rel="noopener" class="text-sm text-sika-700 hover:underline">www.hoddglobal.com</a>
          </div>
        </div>
      </div>
    </div>

    {{-- Contact form (visual) --}}
    <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-soft border border-slate-100 reveal reveal-delay-2">
      <h2 class="text-xl font-bold mb-2">Envoyez-nous un message</h2>
      <p class="text-sm text-slate-500 mb-6">Nous vous répondrons dans les 24 heures ouvrées.</p>
      <form class="space-y-4" onsubmit="event.preventDefault(); alert('Merci ! Nous vous répondrons très bientôt.');">
        <div>
          <label class="text-sm font-medium text-slate-700">Nom complet</label>
          <input type="text" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sika-500/30 focus:border-sika-500 transition-shadow" placeholder="Votre nom" required>
        </div>
        <div>
          <label class="text-sm font-medium text-slate-700">E-mail</label>
          <input type="email" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sika-500/30 focus:border-sika-500 transition-shadow" placeholder="votre@email.com" required>
        </div>
        <div>
          <label class="text-sm font-medium text-slate-700">Sujet</label>
          <select class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sika-500/30 focus:border-sika-500 transition-shadow">
            <option>Question générale</option>
            <option>Support technique</option>
            <option>Partenariat</option>
            <option>Signaler un problème</option>
          </select>
        </div>
        <div>
          <label class="text-sm font-medium text-slate-700">Message</label>
          <textarea rows="4" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sika-500/30 focus:border-sika-500 transition-shadow resize-none" placeholder="Comment pouvons-nous vous aider ?" required></textarea>
        </div>
        <button type="submit" class="w-full py-3 rounded-xl bg-sika-600 text-white font-semibold hover:bg-sika-700 transition-all hover:-translate-y-0.5 shadow-soft">Envoyer le message</button>
      </form>
    </div>
  </div>
</section>

@endsection
