@extends('layouts.app')
@section('title','Utilisateurs — Admin SikaFlow')
@section('content')
<section class="max-w-6xl mx-auto px-4 py-8 sm:py-10">
  <h1 class="text-2xl sm:text-3xl font-bold mb-6">Utilisateurs</h1>
  <div class="bg-white rounded-2xl border border-slate-100 shadow-soft overflow-hidden">
    <div class="table-responsive">
    <table class="w-full text-sm min-w-[640px]">
      <thead class="bg-slate-50 text-xs uppercase text-slate-500"><tr><th class="text-left px-4 py-3">Nom</th><th class="text-left px-4 py-3">Téléphone</th><th class="text-left px-4 py-3">E-mail</th><th class="text-left px-4 py-3">Statut</th><th class="text-left px-4 py-3">Inscrit</th><th></th></tr></thead>
      <tbody class="divide-y divide-slate-100">
        @foreach($users as $u)
          <tr>
            <td class="px-4 py-3 font-medium">{{ $u->nom }}</td>
            <td class="px-4 py-3">{{ $u->telephone }}</td>
            <td class="px-4 py-3">{{ $u->email }}</td>
            <td class="px-4 py-3"><span class="text-xs px-2 py-0.5 rounded-full {{ $u->status==='actif' ? 'bg-sika-100 text-sika-700' : 'bg-rose-100 text-rose-700' }}">{{ $u->status }}</span></td>
            <td class="px-4 py-3">{{ $u->created_at->format('d/m/Y') }}</td>
            <td class="px-4 py-3 text-right"><form method="POST" action="{{ route('admin.users.toggle', $u) }}">@csrf<button class="text-xs px-3 py-1 rounded border border-slate-200">{{ $u->status==='actif' ? 'Suspendre' : 'Réactiver' }}</button></form></td>
          </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
  <div class="mt-4">{{ $users->links() }}</div>
</section>
@endsection
