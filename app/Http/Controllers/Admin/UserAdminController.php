<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserAdminController extends Controller
{
    public function index()
    {
        $users = User::where('role','user')->latest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function toggle(User $user)
    {
        $user->update(['status' => $user->status === 'actif' ? 'suspendu' : 'actif']);
        return back()->with('success', 'Statut mis à jour.');
    }
}
