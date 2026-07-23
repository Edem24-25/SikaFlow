<footer class="bg-night-900 text-slate-300 mt-16">
  <div class="max-w-6xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-8">
    <div>
      <div class="flex items-center gap-2 mb-3">
        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-sika-400 to-sika-600 flex items-center justify-center text-white font-bold">S</div>
        <span class="font-display font-bold text-white">SikaFlow</span>
      </div>
      <p class="text-sm text-slate-400">Une solution HODD GLOBAL — Porto-Novo, Bénin. Gestion automatisée des remboursements de prêts et abonnements.</p>
    </div>
    <div>
      <h4 class="text-white font-semibold mb-3">Produit</h4>
      <ul class="text-sm space-y-2 text-slate-400">
        <li><a href="{{ route('about') }}" class="hover:text-white">À propos</a></li>
        <li><a href="{{ route('contact') }}" class="hover:text-white">Contact</a></li>
      </ul>
    </div>
    <div>
      <h4 class="text-white font-semibold mb-3">Contact</h4>
      <p class="text-sm text-slate-400">HODD GLOBAL<br>Porto-Novo, Bénin<br>01 97 45 87 25<br>hoddglobal.contacts@gmail.com</p>
    </div>
  </div>
  <div class="border-t border-slate-800">
    <div class="max-w-6xl mx-auto px-4 py-4 text-xs text-slate-500 flex justify-between">
      <span>© {{ date('Y') }} SikaFlow — HODD GLOBAL. Tous droits réservés.</span>
      <span>v1.0</span>
    </div>
  </div>
</footer>
