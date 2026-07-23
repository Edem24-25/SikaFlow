<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PretController;
use App\Http\Controllers\EcheanceController;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\MoyenPaiementController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\PretAdminController;
use App\Http\Controllers\Admin\PaiementAdminController;
use App\Http\Controllers\Admin\NotificationAdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/a-propos', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::middleware('guest')->group(function () {
    Route::get('/connexion', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/connexion', [AuthController::class, 'login']);
    Route::get('/inscription', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/inscription', [AuthController::class, 'register']);
});

Route::post('/deconnexion', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/tableau-de-bord', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('prets', PretController::class);
    Route::get('/prets/{pret}/pdf', [PretController::class, 'pdf'])->name('prets.pdf');
    Route::post('/echeances/{echeance}/payer', [EcheanceController::class, 'pay'])->name('echeances.pay');

    Route::resource('abonnements', AbonnementController::class)->except(['show']);

    Route::get('/moyens-paiement', [MoyenPaiementController::class, 'index'])->name('moyens.index');
    Route::get('/moyens-paiement/nouveau', [MoyenPaiementController::class, 'create'])->name('moyens.create');
    Route::post('/moyens-paiement', [MoyenPaiementController::class, 'store'])->name('moyens.store');
    Route::delete('/moyens-paiement/{moyen}', [MoyenPaiementController::class, 'destroy'])->name('moyens.destroy');

    Route::get('/paiements', [PaiementController::class, 'index'])->name('paiements.index');
    Route::get('/paiements/pdf', [PaiementController::class, 'pdf'])->name('paiements.pdf');

    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{notification}/lu', [NotificationController::class, 'markRead'])->name('notifications.read');

    Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profil/mot-de-passe', [ProfileController::class, 'password'])->name('profile.password');
});

Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/utilisateurs', [UserAdminController::class, 'index'])->name('users.index');
    Route::post('/utilisateurs/{user}/toggle', [UserAdminController::class, 'toggle'])->name('users.toggle');
    Route::get('/prets', [PretAdminController::class, 'index'])->name('prets.index');
    Route::get('/paiements', [PaiementAdminController::class, 'index'])->name('paiements.index');
    Route::get('/notifications/nouvelle', [NotificationAdminController::class, 'create'])->name('notifications.create');
    Route::post('/notifications', [NotificationAdminController::class, 'store'])->name('notifications.store');
});
