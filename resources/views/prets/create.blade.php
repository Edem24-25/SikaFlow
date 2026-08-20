@extends('layouts.app')
@section('title', 'Nouveau prêt — SikaFlow')
@section('content')
<section class="max-w-3xl mx-auto px-4 py-8 sm:py-12">
  <div class="mb-8 reveal">
    <div class="flex items-center gap-2 text-slate-400 text-xs uppercase tracking-widest mb-2">
      <i class="fa-solid fa-file-invoice-dollar text-sika-500"></i> Prêts
    </div>
    <h1 class="text-2xl sm:text-3xl font-bold text-night-900 tracking-tight">Enregistrer un nouveau prêt</h1>
    <p class="text-slate-500 text-sm mt-1">L'échéancier sera généré automatiquement.</p>
  </div>

  <form method="POST" action="{{ route('prets.store') }}" class="card p-6 sm:p-8 space-y-5 reveal reveal-delay-1">
    @csrf

    <div>
      <h2 class="font-semibold text-night-900 mb-4 flex items-center gap-2.5">
        <span class="w-8 h-8 rounded-xl bg-sika-100 text-sika-600 flex items-center justify-center text-sm"><i class="fa-solid fa-file-invoice-dollar"></i></span>
        Informations du prêt
      </h2>
      <div class="grid md:grid-cols-2 gap-4">
        <div>
          <label class="field-label">Créancier</label>
          <select name="creancier_id" class="select" required>
            @foreach($creanciers as $c)
              <option value="{{ $c->id }}" @selected(old('creancier_id', $pret->creancier_id ?? '') == $c->id)>{{ $c->nom }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="field-label">Montant principal (FCFA)</label>
          <input type="number" step="0.01" name="montant_principal" value="{{ old('montant_principal', $pret->montant_principal ?? '') }}" class="input" required>
        </div>
        <div>
          <label class="field-label">Taux d'intérêt annuel (%)</label>
          <input type="number" step="0.01" name="taux_interet" value="{{ old('taux_interet', $pret->taux_interet ?? '0') }}" class="input" required>
        </div>
        <div>
          <label class="field-label">Durée (mois)</label>
          <input type="number" name="duree_mois" value="{{ old('duree_mois', $pret->duree_mois ?? '12') }}" class="input" required>
        </div>
        <div>
          <label class="field-label">Périodicité</label>
          <select name="periodicite" class="select">
            @foreach(['mensuelle','trimestrielle','annuelle'] as $p)
              <option value="{{ $p }}" @selected(old('periodicite', $pret->periodicite ?? 'mensuelle') == $p)>{{ $p }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="field-label">Date de début</label>
          <input type="date" name="date_debut" value="{{ old('date_debut', isset($pret) ? $pret->date_debut->format('Y-m-d') : now()->format('Y-m-d')) }}" class="input" required>
        </div>
      </div>
    </div>

    {{-- Section Moyen de paiement Kkiapay --}}
    <div class="p-5 sm:p-6 rounded-2xl bg-slate-50 border border-slate-200" x-data>
      <div class="flex items-center justify-between mb-5">
        <div class="flex items-center gap-3">
          <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-sika-500 to-sika-700 text-white flex items-center justify-center shadow-glow-soft">
            <i class="fa-solid fa-credit-card"></i>
          </div>
          <div>
            <h3 class="text-sm font-semibold text-slate-800">Moyen de paiement</h3>
            <p class="text-xs text-slate-500">Pour le prélèvement automatique via Kkiapay</p>
          </div>
        </div>
        <button type="button" @click="$dispatch('open-moyen-modal')" class="text-xs px-3.5 py-2 rounded-lg bg-sika-600 text-white hover:bg-sika-500 transition-colors flex items-center gap-1.5 font-semibold">
          <i class="fa-solid fa-plus text-[10px]"></i> Ajouter
        </button>
      </div>

      @if($moyens->isEmpty())
        <div class="text-center py-8 text-slate-400">
          <span class="w-14 h-14 mx-auto mb-3 rounded-2xl bg-white border border-slate-200 flex items-center justify-center">
            <i class="fa-solid fa-credit-card text-xl text-slate-300"></i>
          </span>
          <p class="text-sm font-medium text-slate-500">Aucun moyen de paiement enregistré</p>
          <p class="text-xs mt-1">Ajoutez un moyen de paiement pour activer le prélèvement automatique</p>
        </div>
      @else
        <div class="space-y-2.5">
          @foreach($moyens as $m)
            <label class="flex items-center gap-3 p-3.5 rounded-xl border-2 transition-all cursor-pointer
              {{ old('moyen_paiement_id') == $m->id ? 'border-sika-500 bg-sika-50 shadow-glow-soft' : 'border-slate-200 bg-white hover:border-sika-300' }}">
              <input type="radio" name="moyen_paiement_id" value="{{ $m->id }}" class="w-4 h-4 text-sika-600 focus:ring-sika-500" @checked(old('moyen_paiement_id', $pret->moyen_paiement_id ?? '') == $m->id)>
              <div class="flex items-center gap-3 flex-1 min-w-0">
                @if($m->type === 'mobile_money')
                  @if(str_contains(strtolower($m->operateur), 'mtn'))
                    <div class="w-9 h-9 shrink-0 rounded-xl bg-yellow-100 flex items-center justify-center">
                      <span class="text-xs font-bold text-yellow-700">MTN</span>
                    </div>
                  @elseif(str_contains(strtolower($m->operateur), 'moov'))
                    <div class="w-9 h-9 shrink-0 rounded-xl bg-blue-100 flex items-center justify-center">
                      <span class="text-xs font-bold text-blue-700">Moov</span>
                    </div>
                  @else
                    <div class="w-9 h-9 shrink-0 rounded-xl bg-slate-100 flex items-center justify-center">
                      <i class="fa-solid fa-mobile-screen text-slate-500"></i>
                    </div>
                  @endif
                @else
                  <div class="w-9 h-9 shrink-0 rounded-xl bg-slate-100 flex items-center justify-center">
                    <i class="fa-solid fa-credit-card text-slate-500"></i>
                  </div>
                @endif
                <div class="flex-1 min-w-0">
                  <div class="text-sm font-medium text-slate-700">{{ $m->operateur }}</div>
                  <div class="text-xs text-slate-400 truncate">{{ $m->numero }} · {{ $m->titulaire }}</div>
                </div>
                @if($m->is_default)
                  <span class="text-[10px] px-2 py-1 rounded-full bg-sika-100 text-sika-700 font-semibold">Par défaut</span>
                @endif
              </div>
            </label>
          @endforeach
        </div>
      @endif

      <label class="flex items-center gap-2.5 mt-5 p-3.5 rounded-xl bg-white border border-slate-200 cursor-pointer hover:border-sika-300 transition-colors">
        <input type="hidden" name="prelevement_auto" value="0">
        <input type="checkbox" name="prelevement_auto" value="1" id="pauto" @checked(old('prelevement_auto', $pret->prelevement_auto ?? false)) class="w-4 h-4 rounded border-slate-300 text-sika-600 focus:ring-sika-500/30">
        <label for="pauto" class="text-sm text-slate-700 font-medium cursor-pointer">Activer le prélèvement automatique</label>
      </label>

      <div class="mt-4 flex items-center gap-2 text-xs text-slate-400">
        <svg class="w-4 h-4 text-sika-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        Paiements sécurisés par <span class="font-semibold text-slate-500">Kkiapay</span> — Mobile Money & Carte bancaire
      </div>
    </div>

    <button type="submit" class="btn-primary w-full !py-4 relative overflow-hidden">
      <i class="fa-solid fa-wand-magic-sparkles"></i> Enregistrer et générer l'échéancier
      <span class="absolute inset-y-0 -left-1/2 w-1/3 bg-white/25 blur-md -skew-x-12 animate-shimmer pointer-events-none"></span>
    </button>
  </form>

  {{-- Modal Ajout moyen de paiement --}}
  <div x-data="{
    showModal: false,
    submitting: false,
    error: '',
    form: { type: 'mobile_money', operateur: '', numero: '', titulaire: '', is_default: false },
    async submit() {
      this.error = '';
      this.submitting = true;
      try {
        const res = await fetch('{{ route("moyens.store") }}', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
            'Accept': 'application/json',
          },
          body: JSON.stringify(this.form),
        });
        const data = await res.json();
        if (res.ok) { window.location.reload(); }
        else {
          this.error = data.message || 'Une erreur est survenue.';
          if (data.errors) { this.error = Object.values(data.errors).flat().join(' '); }
        }
      } catch (e) { this.error = 'Erreur réseau. Veuillez réessayer.'; }
      finally { this.submitting = false; }
    }
  }" x-on:open-moyen-modal.window="showModal = true" x-show="showModal" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
    <div class="absolute inset-0 bg-night-900/60 backdrop-blur-sm" @click="showModal = false"></div>
    <div class="relative bg-white rounded-3xl shadow-lift w-full max-w-md p-6 sm:p-8 animate-fade-up" @click.stop>
      <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
          <span class="w-10 h-10 rounded-xl bg-sika-100 text-sika-600 flex items-center justify-center"><i class="fa-solid fa-credit-card"></i></span>
          <h3 class="text-lg font-bold text-night-900">Ajouter un moyen de paiement</h3>
        </div>
        <button @click="showModal = false" class="w-8 h-8 rounded-lg text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-colors flex items-center justify-center">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>

      <form @submit.prevent="submit" class="space-y-4">
        <div>
          <label class="field-label">Type</label>
          <div class="grid grid-cols-2 gap-3 mt-2">
            <button type="button" @click="form.type = 'mobile_money'" class="p-3.5 rounded-2xl border-2 text-left transition-all"
              :class="form.type === 'mobile_money' ? 'border-sika-500 bg-sika-50' : 'border-slate-200 hover:border-slate-300'">
              <i class="fa-solid fa-mobile-screen text-lg mb-1.5" :class="form.type === 'mobile_money' ? 'text-sika-600' : 'text-slate-400'"></i>
              <div class="text-sm font-medium" :class="form.type === 'mobile_money' ? 'text-sika-700' : 'text-slate-600'">Mobile Money</div>
              <div class="text-xs text-slate-400">MTN, Moov</div>
            </button>
            <button type="button" @click="form.type = 'bancaire'" class="p-3.5 rounded-2xl border-2 text-left transition-all"
              :class="form.type === 'bancaire' ? 'border-sika-500 bg-sika-50' : 'border-slate-200 hover:border-slate-300'">
              <i class="fa-solid fa-credit-card text-lg mb-1.5" :class="form.type === 'bancaire' ? 'text-sika-600' : 'text-slate-400'"></i>
              <div class="text-sm font-medium" :class="form.type === 'bancaire' ? 'text-sika-700' : 'text-slate-600'">Carte bancaire</div>
              <div class="text-xs text-slate-400">Visa, Mastercard</div>
            </button>
          </div>
        </div>

        <div x-show="form.type === 'mobile_money'" x-transition>
          <label class="field-label">Opérateur</label>
          <select x-model="form.operateur" class="select" required>
            <option value="">— Sélectionner —</option>
            <option value="MTN MoMo">MTN Mobile Money</option>
            <option value="Moov Money">Moov Money</option>
          </select>
        </div>

        <div x-show="form.type === 'bancaire'" x-transition>
          <label class="field-label">Opérateur</label>
          <input x-model="form.operateur" type="text" placeholder="Ex: Visa, Mastercard" class="input" required>
        </div>

        <div>
          <label class="field-label" x-text="form.type === 'mobile_money' ? 'Numéro de téléphone' : 'Numéro de carte'"></label>
          <input x-model="form.numero" type="text" :placeholder="form.type === 'mobile_money' ? '+22997000000' : '**** **** **** ****'" class="input" required>
        </div>

        <div>
          <label class="field-label">Titulaire du compte</label>
          <input x-model="form.titulaire" type="text" placeholder="Nom complet" class="input" required>
        </div>

        <label class="flex items-center gap-2.5 cursor-pointer">
          <input type="checkbox" x-model="form.is_default" id="new_moyen_default" class="w-4 h-4 rounded border-slate-300 text-sika-600 focus:ring-sika-500/30">
          <span class="text-sm text-slate-600">Définir comme moyen par défaut</span>
        </label>

        <div x-show="error" class="text-sm text-rose-600 bg-rose-50 border border-rose-200 rounded-xl p-3.5" x-text="error"></div>

        <button type="submit" :disabled="submitting" class="btn-primary w-full !py-3 disabled:opacity-50 flex items-center justify-center gap-2">
          <span x-show="!submitting">Enregistrer</span>
          <span x-show="submitting" x-cloak class="flex items-center gap-2">
            <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
            Enregistrement...
          </span>
        </button>
      </form>
    </div>
  </div>
</section>
@endsection
