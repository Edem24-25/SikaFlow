@extends('layouts.app')
@section('title','Notifications — SikaFlow')
@section('content')
<section class="max-w-3xl mx-auto px-4 py-8 sm:py-12">
  <div class="flex items-center justify-between mb-8 reveal">
    <div>
      <div class="flex items-center gap-2 text-slate-400 text-xs uppercase tracking-widest mb-2">
        <i class="fa-solid fa-bell text-sika-500"></i> Centre de notifications
      </div>
      <h1 class="text-2xl sm:text-3xl font-bold text-night-900 tracking-tight">Notifications</h1>
    </div>
    @php $unread = $notifications->whereNull('lu_at')->count(); @endphp
    @if($unread > 0)
      <span class="px-3 py-1.5 rounded-full bg-sika-100 text-sika-700 text-xs font-bold flex items-center gap-1.5">
        <span class="w-2 h-2 rounded-full bg-sika-500 animate-pulse"></span> {{ $unread }} non lue{{ $unread > 1 ? 's' : '' }}
      </span>
    @endif
  </div>

  <div class="space-y-3.5">
    @forelse($notifications as $n)
      @php
        $icons = [
          'rappel' => ['fa-bell', 'bg-amber-100 text-amber-600'],
          'paiement' => ['fa-money-bill-wave', 'bg-emerald-100 text-emerald-600'],
          'systeme' => ['fa-gear', 'bg-sky-100 text-sky-600'],
        ];
        [$icon, $iconBg] = $icons[$n->type] ?? ['fa-envelope', 'bg-slate-100 text-slate-500'];
        $unread = is_null($n->lu_at);
      @endphp
      <div class="group relative p-5 rounded-2xl border transition-all duration-300 {{ $unread ? 'border-sika-200 bg-gradient-to-br from-sika-50 to-white shadow-card' : 'border-slate-100 bg-white' }} reveal">
        <div class="flex items-start gap-4">
          <span class="w-11 h-11 shrink-0 rounded-2xl {{ $iconBg }} flex items-center justify-center relative">
            <i class="fa-solid {{ $icon }}"></i>
            @if($unread)
              <span class="absolute -top-1 -right-1 w-3 h-3 rounded-full bg-sika-500 border-2 border-white"></span>
            @endif
          </span>
          <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2 flex-wrap">
              <span class="font-semibold text-night-900">{{ $n->titre }}</span>
              @if($unread)
                <span class="text-[10px] px-2 py-0.5 rounded-full bg-sika-100 text-sika-700 font-bold uppercase tracking-wider">Nouveau</span>
              @endif
            </div>
            <p class="text-sm text-slate-600 mt-1">{{ $n->message }}</p>
            <div class="flex items-center gap-2 text-xs text-slate-400 mt-2.5">
              <i class="fa-regular fa-clock"></i>
              {{ $n->created_at->diffForHumans() }}
              <span class="text-slate-300">·</span>
              <span class="capitalize">{{ $n->type }}</span>
            </div>
          </div>
          @if($unread)
            <form method="POST" action="{{ route('notifications.read', $n) }}" class="shrink-0">@csrf
              <button class="text-xs px-3 py-1.5 rounded-lg bg-white border border-sika-200 text-sika-700 hover:bg-sika-600 hover:text-white hover:border-sika-600 transition-colors font-semibold" title="Marquer comme lue">
                Marquer lue
              </button>
            </form>
          @else
            <span class="shrink-0 text-xs text-slate-300 mt-1"><i class="fa-solid fa-check-double"></i></span>
          @endif
        </div>
      </div>
    @empty
      <div class="p-12 text-center bg-white rounded-3xl border border-slate-100 flex flex-col items-center gap-3 reveal">
        <span class="w-14 h-14 rounded-full bg-sika-50 text-sika-400 flex items-center justify-center animate-float">
          <i class="fa-solid fa-bell text-2xl"></i>
        </span>
        <div class="text-slate-500 font-medium">Aucune notification.</div>
        <p class="text-sm text-slate-400 -mt-1.5">Vous serez prévenu ici des échéances, paiements et événements importants.</p>
      </div>
    @endforelse
  </div>
  <div class="mt-5">{{ $notifications->links() }}</div>
</section>
@endsection
