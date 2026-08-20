@extends('layouts.app')
@section('title','Utilisateurs — Admin SikaFlow')
@section('content')
<section class="max-w-6xl mx-auto px-4 py-8 sm:py-10">
  <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8 reveal">
    <div>
      <div class="flex items-center gap-2 text-slate-400 text-xs uppercase tracking-widest mb-2">
        <i class="fa-solid fa-user-gear text-sika-500"></i> Administration
      </div>
      <h1 class="text-2xl sm:text-3xl font-bold text-night-900 tracking-tight">Utilisateurs</h1>
      <p class="text-slate-500 text-sm mt-1">Gérez les comptes de la plateforme.</p>
    </div>
    <span class="px-3.5 py-2 rounded-xl bg-slate-100 text-slate-600 text-sm font-semibold flex items-center gap-2">
      <i class="fa-solid fa-users text-slate-400"></i> {{ $users->total() }} comptes
    </span>
  </div>

  <div class="card overflow-hidden reveal reveal-delay-1">
    <div class="table-responsive">
      <table class="w-full text-sm min-w-[720px]">
        <thead class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider">
          <tr>
            <th class="text-left px-5 py-3.5 font-semibold">Utilisateur</th>
            <th class="text-left px-5 py-3.5 font-semibold">Téléphone</th>
            <th class="text-left px-5 py-3.5 font-semibold">E-mail</th>
            <th class="text-left px-5 py-3.5 font-semibold">Statut</th>
            <th class="text-left px-5 py-3.5 font-semibold">Inscrit</th>
            <th class="text-right px-5 py-3.5 font-semibold">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
          @forelse($users as $u)
            @php $actif = $u->status === 'actif'; @endphp
            <tr class="hover:bg-slate-50/60 transition-colors">
              <td class="px-5 py-3.5">
                <div class="flex items-center gap-3">
                  <span class="w-9 h-9 shrink-0 rounded-xl {{ $actif ? 'bg-sika-50 border border-sika-100 text-sika-700' : 'bg-slate-100 text-slate-400' }} text-sm font-bold flex items-center justify-center">{{ strtoupper(substr($u->nom, 0, 1)) }}</span>
                  <span class="font-semibold text-slate-800">{{ $u->nom }}</span>
                </div>
              </td>
              <td class="px-5 py-3.5 text-slate-500 whitespace-nowrap">{{ $u->telephone }}</td>
              <td class="px-5 py-3.5 text-slate-500">{{ $u->email }}</td>
              <td class="px-5 py-3.5">
                <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $actif ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                  <span class="w-1.5 h-1.5 inline-block rounded-full mr-1 {{ $actif ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                  {{ $u->status }}
                </span>
              </td>
              <td class="px-5 py-3.5 text-slate-500 whitespace-nowrap">{{ $u->created_at->format('d/m/Y') }}</td>
              <td class="px-5 py-3.5 text-right">
                <form method="POST" action="{{ route('admin.users.toggle', $u) }}" onsubmit="return confirm('{{ $actif ? 'Suspendre' : 'Réactiver' }} ce compte ?')">@csrf
                  <button class="text-xs px-3.5 py-2 rounded-lg font-semibold border transition-colors {{ $actif ? 'border-rose-200 text-rose-600 hover:bg-rose-50' : 'border-emerald-200 text-emerald-600 hover:bg-emerald-50' }}">
                    {{ $actif ? 'Suspendre' : 'Réactiver' }}
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="6" class="p-12 text-center text-slate-400">Aucun utilisateur.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  <div class="mt-5">{{ $users->links() }}</div>
</section>
@endsection
