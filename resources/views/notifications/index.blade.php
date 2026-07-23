@extends('layouts.app')
@section('title','Notifications — SikaFlow')
@section('content')
<section class="max-w-3xl mx-auto px-4 py-10">
  <h1 class="text-3xl font-bold mb-6">Notifications</h1>
  <div class="space-y-3">
    @forelse($notifications as $n)
      <div class="p-4 bg-white rounded-2xl border {{ $n->lu_at ? 'border-slate-100' : 'border-sika-200 bg-sika-50/40' }} shadow-soft">
        <div class="flex justify-between">
          <div>
            <div class="font-semibold">{{ $n->titre }}</div>
            <div class="text-sm text-slate-600 mt-1">{{ $n->message }}</div>
            <div class="text-xs text-slate-400 mt-2">{{ $n->created_at->diffForHumans() }} · {{ $n->type }}</div>
          </div>
          @unless($n->lu_at)
            <form method="POST" action="{{ route('notifications.read', $n) }}">@csrf<button class="text-xs text-sika-700">Marquer lu</button></form>
          @endunless
        </div>
      </div>
    @empty
      <div class="p-8 text-center text-slate-500 bg-white rounded-2xl border border-slate-100">Aucune notification.</div>
    @endforelse
  </div>
  <div class="mt-4">{{ $notifications->links() }}</div>
</section>
@endsection
