@extends('layouts.app')
@section('title', 'SikaFlow — Ne manquez plus jamais une échéance')
@section('content')
<section class="relative overflow-hidden bg-gradient-to-br from-night-900 via-night-800 to-night-700 text-white">
  <div class="max-w-6xl mx-auto px-4 py-20 md:py-28 grid md:grid-cols-2 gap-10 items-center">
    <div>
      <span class="inline-block px-3 py-1 rounded-full bg-white/10 text-xs uppercase tracking-widest text-sika-200 mb-4">HODD GLOBAL · Fintech Bénin</span>
      <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4">Vos prêts et abonnements, <span class="text-sika-400">automatisés</span>.</h1>
      <p class="text-slate-300 text-lg mb-8 max-w-xl">SikaFlow centralise vos engagements financiers, déclenche vos paiements Mobile Money ou bancaires à la bonne date et vous alerte avant chaque échéance. Zéro oubli. Zéro pénalité.</p>
      <div class="flex flex-wrap gap-3">
        <a href="{{ route('register') }}" class="px-5 py-3 rounded-xl bg-sika-500 hover:bg-sika-400 font-semibold shadow-soft">Créer mon compte gratuit</a>
        <a href="{{ route('login') }}" class="px-5 py-3 rounded-xl border border-white/20 hover:bg-white/10">Se connecter</a>
      </div>
      <div class="mt-8 flex items-center gap-6 text-sm text-slate-400">
        <span>✓ MTN Mobile Money</span><span>✓ Moov Money</span><span>✓ Cartes bancaires</span>
      </div>
    </div>
    <div class="relative">
      <div class="rounded-2xl bg-white/5 backdrop-blur border border-white/10 p-6 shadow-2xl">
        <div class="text-xs uppercase text-slate-400 tracking-wider">Prochaine échéance</div>
        <div class="mt-2 flex items-end justify-between">
          <div>
            <div class="text-3xl font-bold">45 000 FCFA</div>
            <div class="text-sm text-slate-400">Ecobank · Prêt PRT-0001 · dans 3 jours</div>
          </div>
          <span class="px-2 py-1 rounded-md bg-gold-500/20 text-gold-400 text-xs">Auto</span>
        </div>
        <div class="my-6 h-px bg-white/10"></div>
        <div class="grid grid-cols-3 gap-3 text-center">
          <div><div class="text-xl font-bold text-sika-400">12</div><div class="text-xs text-slate-400">prêts suivis</div></div>
          <div><div class="text-xl font-bold text-sika-400">4</div><div class="text-xs text-slate-400">abonnements</div></div>
          <div><div class="text-xl font-bold text-sika-400">0</div><div class="text-xs text-slate-400">retard</div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-20">
  <div class="max-w-6xl mx-auto px-4">
    <div class="text-center mb-12">
      <h2 class="text-3xl md:text-4xl font-bold text-night-900">Tout ce qu'il faut pour reprendre le contrôle</h2>
      <p class="text-slate-600 mt-3 max-w-2xl mx-auto">Un tableau de bord clair, des rappels intelligents, des paiements sécurisés via nos partenaires Kkiapay, Flutterwave et PayDunya.</p>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
      @foreach([
        ['💳','Moyens de paiement liés','Ajoutez vos comptes Mobile Money et bancaires en toute sécurité.'],
        ['📅','Échéanciers automatiques','Enregistrez un prêt, l\'échéancier se génère instantanément.'],
        ['🔔','Rappels & alertes','Notifications avant chaque échéance et en cas d\'incident.'],
        ['🔁','Prélèvement auto','Activez le paiement automatique et oubliez les retards.'],
        ['📊','Suivi des abonnements','Canal+, Internet, streaming — tout regroupé au même endroit.'],
        ['🧾','Historique & PDF','Exportez vos relevés et échéanciers en un clic.'],
      ] as $f)
        <div class="p-6 rounded-2xl bg-white border border-slate-100 shadow-soft hover:-translate-y-1 transition">
          <div class="text-3xl mb-3">{{ $f[0] }}</div>
          <h3 class="font-semibold text-lg mb-2">{{ $f[1] }}</h3>
          <p class="text-sm text-slate-600">{{ $f[2] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
    <div>
      <h2 class="text-3xl font-bold text-night-900 mb-4">Comment ça marche</h2>
      <ol class="space-y-4">
        @foreach([
          ['1','Créez votre compte','Inscription en 30 secondes avec votre numéro de téléphone.'],
          ['2','Ajoutez vos engagements','Prêts et abonnements, avec échéancier généré automatiquement.'],
          ['3','Liez un moyen de paiement','MTN, Moov ou compte bancaire — validation sécurisée.'],
          ['4','Laissez SikaFlow travailler','Rappels, prélèvements et historique — vous restez informé.'],
        ] as $s)
          <li class="flex gap-4">
            <span class="w-9 h-9 rounded-full bg-sika-100 text-sika-700 font-bold flex items-center justify-center shrink-0">{{ $s[0] }}</span>
            <div><div class="font-semibold">{{ $s[1] }}</div><div class="text-sm text-slate-600">{{ $s[2] }}</div></div>
          </li>
        @endforeach
      </ol>
    </div>
    <div class="rounded-2xl bg-gradient-to-br from-sika-600 to-sika-800 p-8 text-white shadow-soft">
      <h3 class="text-2xl font-bold mb-3">Prêt à commencer ?</h3>
      <p class="text-sika-100 mb-6">Rejoignez les utilisateurs qui ne paient plus de pénalités de retard.</p>
      <a href="{{ route('register') }}" class="inline-block px-6 py-3 rounded-xl bg-white text-sika-700 font-semibold hover:bg-slate-100">Commencer maintenant →</a>
    </div>
  </div>
</section>
@endsection
