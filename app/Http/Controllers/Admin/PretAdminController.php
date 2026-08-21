<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pret;

class PretAdminController extends Controller
{
    public function index()
    {
        $prets = Pret::with('user', 'creancier')->whereHas('user')->whereHas('creancier')->latest()->paginate(20);
        return view('admin.prets.index', compact('prets'));
    }
}
