<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class NotificationAdminController extends Controller
{
    public function create() { return view('admin.notifications.create'); }

    public function store(Request $request, NotificationService $notif)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:160',
            'message' => 'required|string',
            'cible' => 'required|in:tous,actifs,suspendus',
        ]);

        $q = User::where('role','user');
        if ($data['cible'] === 'actifs') $q->where('status','actif');
        if ($data['cible'] === 'suspendus') $q->where('status','suspendu');

        foreach ($q->get() as $user) {
            $notif->push($user, 'diffusion', $data['titre'], $data['message']);
        }

        return back()->with('success', 'Notification diffusée.');
    }
}
